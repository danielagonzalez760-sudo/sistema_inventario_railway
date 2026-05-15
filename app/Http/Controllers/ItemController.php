<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Reserva;
use App\Models\Transaccion;
use App\Models\Alerta;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('transacciones')->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'            => 'required|string|max:255',
            'codigo'            => 'required|string|max:50|unique:items',
            'categoria'         => 'required|in:Equipos,Reactivos,Materiales',
            'cantidad'          => 'required|integer|min:0',
            'ubicacion'         => 'nullable|string|max:255',
            'proveedor'         => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'umbral_minimo'     => 'required|integer|min:0',
        ]);

        $item = Item::create($validated);

        Transaccion::create([
            'item_id'     => $item->id,
            'tipo'        => 'entrada',
            'cantidad'    => $item->cantidad,
            'descripcion' => 'Registro inicial de stock',
        ]);

        if ($item->cantidad <= $item->umbral_minimo) {
            $this->crearAlertaYNotificar($item);
        }

        return redirect()->route('items.index')->with('success', 'Ítem creado correctamente.');
    }

    public function show(Item $item)
    {
        $transacciones = $item->transacciones()
            ->with('user')
            ->orderByDesc('created_at')
            ->paginate(10, ['*'], 'transacciones_page');

        $reservas = $item->reservas()
            ->with('user')
            ->orderByDesc('created_at')
            ->paginate(10, ['*'], 'reservas_page');

        $alertas = $item->alertas()
            ->orderByDesc('created_at')
            ->paginate(10, ['*'], 'alertas_page');

        return view('items.show', compact('item', 'transacciones', 'reservas', 'alertas'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'nombre'            => 'required|string|max:255',
            'codigo'            => 'required|string|max:50|unique:items,codigo,' . $item->id,
            'categoria'         => 'required|in:Equipos,Reactivos,Materiales',
            'cantidad'          => 'required|integer|min:0',
            'ubicacion'         => 'nullable|string|max:255',
            'proveedor'         => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'umbral_minimo'     => 'required|integer|min:0',
        ]);

        if ($validated['cantidad'] != $item->cantidad) {
            $tipo = $validated['cantidad'] > $item->cantidad ? 'entrada' : 'salida';
            $cantidadCambio = abs($validated['cantidad'] - $item->cantidad);

            Transaccion::create([
                'item_id'     => $item->id,
                'tipo'        => $tipo,
                'cantidad'    => $cantidadCambio,
                'descripcion' => 'Actualización manual de stock',
            ]);
        }

        $item->update($validated);

        if ($item->cantidad <= $item->umbral_minimo) {
            $this->crearAlertaYNotificar($item);
        } else {
            $this->cerrarAlertasYNotificarReabastecido($item);
        }

        return redirect()->route('items.index')->with('success', 'Ítem actualizado correctamente.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Ítem eliminado correctamente.');
    }

    public function adminDashboard()
    {
        $items = Item::whereColumn('cantidad', '<=', 'umbral_minimo')->get();
        $totalItems = Item::count();
        $lowStockCount = Item::whereColumn('cantidad', '<=', 'umbral_minimo')->count();
        $reservasPendientes = Reserva::where('estado', 'pendiente')->count();
        $ultimasReservas = Reserva::with('user', 'item')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'items',
            'totalItems',
            'lowStockCount',
            'reservasPendientes',
            'ultimasReservas'
        ));
    }

    public function studentIndex()
    {
        $items = Item::where('cantidad', '>', 0)->get();
        return view('items.student_index', compact('items'));
    }

    public function docenteIndex()
    {
        $items = Item::all();
        return view('items.docente_index', compact('items'));
    }

    public function editStock(Item $item)
    {
        return view('items.update_stock', compact('item'));
    }

    public function updateStock(Request $request, Item $item)
    {
        $validated = $request->validate([
            'tipo'        => 'required|in:entrada,salida',
            'cantidad'    => 'required|integer|min:1',
            'descripcion' => 'nullable|string|max:500',
        ]);

        if ($validated['tipo'] === 'salida' && $validated['cantidad'] > $item->cantidad) {
            return redirect()->back()->withErrors(['cantidad' => 'No hay suficiente stock disponible.']);
        }

        $item->cantidad += $validated['tipo'] === 'entrada'
            ? $validated['cantidad']
            : -$validated['cantidad'];

        $item->save();

        Transaccion::create([
            'item_id'     => $item->id,
            'tipo'        => $validated['tipo'],
            'cantidad'    => $validated['cantidad'],
            'descripcion' => $validated['descripcion'] ?? ($validated['tipo'] === 'entrada' ? 'Entrada de stock' : 'Salida de stock'),
        ]);

        if ($item->cantidad <= $item->umbral_minimo) {
            $this->crearAlertaYNotificar($item);
        } else {
            $this->cerrarAlertasYNotificarReabastecido($item);
        }

        return redirect()->route('items.show', $item)->with('success', '✅ Stock actualizado correctamente.');
    }

    public function reservar(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        if ($item->cantidad <= 0) {
            return redirect()->back()->with('error', 'No hay stock disponible para reservar.');
        }

        $item->cantidad -= 1;
        $item->save();

        Transaccion::create([
            'item_id'     => $item->id,
            'tipo'        => 'reserva',
            'cantidad'    => 1,
            'descripcion' => 'Reserva realizada por usuario',
        ]);

        if ($item->cantidad <= $item->umbral_minimo) {
            $this->crearAlertaYNotificar($item);
        }

        return redirect()->back()->with('success', 'Reserva realizada correctamente.');
    }

    private function crearAlertaYNotificar(Item $item)
    {
        $yaExiste = Alerta::where('item_id', $item->id)
            ->where('estado', 'pendiente')
            ->exists();

        if ($yaExiste) return;

        Alerta::create([
            'item_id'  => $item->id,
            'cantidad' => $item->cantidad,
            'estado'   => 'pendiente',
        ]);

        try {
                $admins = \App\Models\User::whereHas('roles', fn($q) => $q->where('name', 'admin'))->get();
                foreach ($admins as $admin) {
                    $admin->notify(new \App\Notifications\StockLowNotification($item->nombre, $item->cantidad));
                }
            } catch (\Exception $e) {
                session()->flash('error', 'Alerta guardada, pero falló el correo a admins: ' . $e->getMessage());
            }
    }

    private function cerrarAlertasYNotificarReabastecido(Item $item)
    {
        $alertasPendientes = Alerta::where('item_id', $item->id)
            ->where('estado', 'pendiente')
            ->exists();

        if (!$alertasPendientes) return;

        Alerta::where('item_id', $item->id)
            ->where('estado', 'pendiente')
            ->update(['estado' => 'atendida']);

        try {
                $admins = \App\Models\User::whereHas('roles', fn($q) => $q->where('name', 'admin'))->get();
                foreach ($admins as $admin) {
                    $admin->notify(new \App\Notifications\StockReabastecido($item->nombre, $item->cantidad));
                }
            } catch (\Exception $e) {
                session()->flash('error', 'Stock actualizado, pero falló el correo a admins: ' . $e->getMessage());
            }
    }
}