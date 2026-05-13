<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3 px-2 py-1">
            <div style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.15);border:1.5px solid rgba(255,255,255,0.4);display:flex;align-items:center;justify-content:center;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:18px;height:18px;" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L15 12 9.75 7v10z" />
                </svg>
            </div>
            <div>
                 <h2 class="font-bold text-xl text-blue-800 dark:text-blue-300">Bienvenido {{ auth()->user()->name }} 🛠️</h2>
                
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin:0;">Panel de gestión de inventario y reservas de laboratorio</p>
            </div>
        </div>
    </x-slot>

    <style>
        .dash-page{background:#eef2f9;background-image:radial-gradient(ellipse at 20% 0%, rgba(91,163,245,0.12) 0%, transparent 60%), radial-gradient(ellipse at 80% 100%, rgba(12,45,107,0.07) 0%, transparent 50%);padding:2rem 0 3rem;min-height:100vh}
        .kpi-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:1.5rem}
        @media(max-width:768px){.kpi-grid{grid-template-columns:1fr}}
        .kpi-card{background:#fff;border-radius:10px;border:0.5px solid #d8e2ef;padding:1.25rem 1.5rem;display:flex;align-items:center;justify-content:space-between}
        .kpi-label{font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.07em;color:#6b7fa3;margin-bottom:6px}
        .kpi-value{font-size:30px;font-weight:600;line-height:1}
        .kpi-sub{font-size:11px;color:#94a3b8;margin-top:5px}
        .kpi-icon{width:46px;height:46px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0}
        .icon-blue{background:#e6f1fb}.icon-amber{background:#faeeda}.icon-green{background:#eaf3de}
        .section-card{background:#fff;border-radius:10px;border:0.5px solid #d8e2ef;overflow:hidden;margin-bottom:1.5rem}
        .section-header{padding:1rem 1.5rem;display:flex;align-items:center;justify-content:space-between;border-bottom:0.5px solid #e8eef6;flex-wrap:wrap;gap:12px}
        .section-title-wrap{display:flex;align-items:center;gap:8px}
        .section-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0}
        .dot-red{background:#e24b4a}.dot-blue{background:#185fa5}
        .section-title{font-size:14px;font-weight:600;color:#0c2d6b}
        .btn-row{display:flex;gap:8px;flex-wrap:wrap}
        .btn{font-size:12px;font-weight:500;padding:7px 14px;border-radius:6px;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;gap:5px}
        .btn:hover{opacity:.85}
        .btn-outline{background:#fff;color:#185fa5;border:0.5px solid #185fa5}
        .btn-primary{background:#0c2d6b;color:#fff;border:none}
        .btn-warning{background:#f59e0b;color:#fff;border:none;font-size:12px;padding:5px 12px;border-radius:5px;text-decoration:none;display:inline-flex;align-items:center;gap:4px}
        .btn-warning:hover{opacity:.85}
        .empty-state{padding:2rem 1.5rem;text-align:center;color:#94a3b8;font-size:13px}
        .table-wrap{overflow-x:auto}
        table.dash-table{width:100%;border-collapse:collapse}
        .dash-table thead tr{background:#f5f8fc}
        .dash-table th{text-align:left;padding:10px 1.5rem;font-size:11px;font-weight:600;color:#6b7fa3;text-transform:uppercase;letter-spacing:.07em;border-bottom:0.5px solid #e8eef6}
        .dash-table td{padding:12px 1.5rem;font-size:13px;color:#2d4a7a;border-bottom:0.5px solid #f0f4f9}
        .dash-table tbody tr:last-child td{border-bottom:none}
        .dash-table tbody tr:hover td{background:#f8fafd}
        .user-cell{display:flex;align-items:center;gap:10px}
        .avatar{width:30px;height:30px;border-radius:50%;background:#b5d4f4;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:600;color:#0c447c;flex-shrink:0;text-transform:uppercase}
        .user-name{font-size:13px;color:#1e3a6e;font-weight:500}
        .user-email{font-size:11px;color:#94a3b8}
        .badge{display:inline-block;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600}
        .badge-pendiente{background:#faeeda;color:#854f0b}
        .badge-prestado{background:#e6f1fb;color:#185fa5}
        .badge-devuelto{background:#eaf3de;color:#3b6d11}
        .badge-default{background:#f1efe8;color:#5f5e5a}
    </style>

    <div class="dash-page">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- KPI Cards --}}
            <div class="kpi-grid">
                <div class="kpi-card">
                    <div>
                        <div class="kpi-label">Total ítems</div>
                        <div class="kpi-value" style="color:#0c2d6b">{{ $totalItems }}</div>
                        <div class="kpi-sub">En inventario activo</div>
                    </div>
                    <div class="kpi-icon icon-blue">📦</div>
                </div>
                <div class="kpi-card">
                    <div>
                        <div class="kpi-label">Ítems bajo stock</div>
                        <div class="kpi-value" style="color:#e24b4a">{{ $lowStockCount }}</div>
                        <div class="kpi-sub">Sin alertas activas</div>
                    </div>
                    <div class="kpi-icon icon-amber">⚠️</div>
                </div>
                <div class="kpi-card">
                    <div>
                        <div class="kpi-label">Reservas pendientes</div>
                        <div class="kpi-value" style="color:#185fa5">{{ $reservasPendientes }}</div>
                        <div class="kpi-sub">Requieren atención</div>
                    </div>
                    <div class="kpi-icon icon-green">📋</div>
                </div>
            </div>

            {{-- Bajo Stock --}}
            <div class="section-card">
                <div class="section-header">
                    <div class="section-title-wrap">
                        <div class="section-dot dot-red"></div>
                        <span class="section-title">Ítems con bajo stock</span>
                    </div>
                    <div class="btn-row">
                        <a href="{{ route('items.index') }}" class="btn btn-outline">Ver inventario completo</a>
                        <a href="{{ route('items.create') }}" class="btn btn-primary">+ Agregar ítem</a>
                    </div>
                </div>
                @if ($items->isEmpty())
                    <div class="empty-state">
                        <div style="font-size:28px;margin-bottom:8px">✅</div>
                        No hay ítems con bajo stock actualmente
                    </div>
                @else
                    <div class="table-wrap">
                        <table class="dash-table">
                            <thead>
                                <tr><th>Nombre</th><th>Cantidad</th><th>Umbral mínimo</th><th>Acciones</th></tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->cantidad }}</td>
                                    <td>{{ $item->umbral_minimo }}</td>
                                    <td><a href="{{ route('items.editStock', $item) }}" class="btn-warning">✏️ Actualizar stock</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            {{-- Últimas Reservas --}}
            <div class="section-card">
                <div class="section-header">
                    <div class="section-title-wrap">
                        <div class="section-dot dot-blue"></div>
                        <span class="section-title">Últimas reservas</span>
                    </div>
                    <a href="{{ route('admin.reservas.index') }}" class="btn btn-outline">Ver todas</a>
                </div>
                <div class="table-wrap">
                    <table class="dash-table">
                        <thead>
                            <tr><th>Usuario</th><th>Ítem</th><th>Cantidad</th><th>Estado</th></tr>
                        </thead>
                        <tbody>
                            @forelse ($ultimasReservas as $reserva)
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="avatar">{{ strtoupper(substr($reserva->user->name ?? $reserva->user->email, 0, 1)) }}{{ strtoupper(substr(explode('.', $reserva->user->name ?? '')[1] ?? '', 0, 1)) }}</div>
                                        <div>
                                            <div class="user-name">{{ $reserva->user->name ?? 'Usuario' }}</div>
                                            <div class="user-email">{{ $reserva->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $reserva->item->nombre }}</td>
                                <td>{{ $reserva->cantidad }}</td>
                                <td>
                                    <span class="badge
                                        @if($reserva->estado=='pendiente') badge-pendiente
                                        @elseif($reserva->estado=='prestado') badge-prestado
                                        @elseif($reserva->estado=='devuelto') badge-devuelto
                                        @else badge-default @endif">
                                        {{ ucfirst($reserva->estado) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" style="padding:2rem;text-align:center;color:#94a3b8;font-size:13px;font-style:italic">No hay reservas recientes.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>


