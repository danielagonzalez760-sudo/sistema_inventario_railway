<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3 px-2 py-1">
            <div style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.15);border:1.5px solid rgba(255,255,255,0.4);display:flex;align-items:center;justify-content:center;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:18px;height:18px;" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/>
                </svg>
            </div>
            <div>
                <h2 style="font-size:15px;font-weight:600;color:#fff;margin:0;">Inventario de Ítems</h2>
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin:0;">Gestión completa del inventario del laboratorio</p>
            </div>
        </div>
    </x-slot>

    <style>
        .inv-page { background:#eef2f9; background-image:radial-gradient(ellipse at 20% 0%,rgba(91,163,245,.12) 0%,transparent 60%),radial-gradient(ellipse at 80% 100%,rgba(12,45,107,.07) 0%,transparent 50%); padding:2rem 0 3rem; min-height:100vh; }

        /* Toolbar */
        .inv-toolbar { display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem; flex-wrap:wrap; gap:12px; }
        .inv-title { font-size:13px; font-weight:600; color:#6b7fa3; }
        .btn { font-size:12px; font-weight:600; padding:8px 16px; border-radius:7px; cursor:pointer; text-decoration:none; display:inline-flex; align-items:center; gap:6px; border:none; transition:all .15s; }
        .btn:hover { opacity:.88; transform:translateY(-1px); }
        .btn-new { background:linear-gradient(135deg,#0c2d6b,#1a4a9e); color:#fff; box-shadow:0 4px 12px rgba(12,45,107,.25); }

        /* Grid de cards */
        .items-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(320px,1fr)); gap:16px; }

        /* Item card */
        .item-card { background:#fff; border-radius:12px; border:0.5px solid #d8e2ef; overflow:hidden; transition:box-shadow .2s, transform .2s; position:relative; }
        .item-card:hover { box-shadow:0 8px 24px rgba(12,45,107,.1); transform:translateY(-2px); }
        .item-card.low-stock { border-color:#f7c1c1; background:linear-gradient(180deg,#fff8f8 0%,#fff 60%); }

        /* Card top bar por categoría */
        .card-bar { height:4px; width:100%; }
        .bar-equipos   { background:linear-gradient(90deg,#185fa5,#5ba3f5); }
        .bar-reactivos { background:linear-gradient(90deg,#3b6d11,#7ec843); }
        .bar-materiales{ background:linear-gradient(90deg,#854f0b,#f5a623); }
        .bar-default   { background:linear-gradient(90deg,#6b7fa3,#94a3b8); }

        /* Card header */
        .card-head { padding:14px 16px 10px; display:flex; align-items:flex-start; justify-content:space-between; gap:10px; }
        .card-icon { width:42px; height:42px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:18px; flex-shrink:0; }
        .ci-equipos   { background:#e6f1fb; }
        .ci-reactivos { background:#eaf3de; }
        .ci-materiales{ background:#faeeda; }
        .ci-default   { background:#f0f4f9; }
        .card-name { font-size:15px; font-weight:700; color:#0c2d6b; line-height:1.2; }
        .card-code { font-size:11px; color:#94a3b8; margin-top:2px; font-family:monospace; }
        .cat-badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:.06em; flex-shrink:0; }
        .cat-equipos   { background:#e6f1fb; color:#185fa5; }
        .cat-reactivos { background:#eaf3de; color:#3b6d11; }
        .cat-materiales{ background:#faeeda; color:#854f0b; }
        .cat-default   { background:#f0f4f9; color:#6b7fa3; }

        /* Stock meter */
        .stock-section { padding:0 16px 12px; }
        .stock-row { display:flex; align-items:center; justify-content:space-between; margin-bottom:6px; }
        .stock-label { font-size:11px; font-weight:600; color:#94a3b8; text-transform:uppercase; letter-spacing:.06em; }
        .stock-value { font-size:22px; font-weight:700; }
        .stock-ok   { color:#0c2d6b; }
        .stock-warn { color:#e24b4a; }
        .stock-bar-wrap { background:#f0f4f9; border-radius:99px; height:6px; overflow:hidden; }
        .stock-bar-fill { height:100%; border-radius:99px; transition:width .4s; }
        .fill-ok   { background:linear-gradient(90deg,#185fa5,#5ba3f5); }
        .fill-warn { background:linear-gradient(90deg,#e24b4a,#f87171); }
        .stock-meta { display:flex; justify-content:space-between; margin-top:4px; font-size:10px; color:#94a3b8; }

        /* Alert banner */
        .restock-banner { margin:0 16px 12px; background:#fcebeb; border:0.5px solid #f7c1c1; border-radius:7px; padding:7px 12px; display:flex; align-items:center; gap:7px; font-size:12px; font-weight:600; color:#a32d2d; }

        /* Info grid */
        .card-info { padding:0 16px 12px; display:grid; grid-template-columns:1fr 1fr; gap:8px; }
        .info-item { background:#f8fafd; border-radius:7px; padding:7px 10px; }
        .info-label { font-size:10px; font-weight:600; color:#94a3b8; text-transform:uppercase; letter-spacing:.05em; margin-bottom:2px; }
        .info-value { font-size:12px; color:#2d4a7a; font-weight:500; }

        /* Actions */
        .card-actions { padding:10px 16px 14px; display:flex; gap:6px; flex-wrap:wrap; border-top:0.5px solid #f0f4f9; }
        .act-btn { flex:1; min-width:60px; font-size:11px; font-weight:600; padding:6px 8px; border-radius:6px; border:none; cursor:pointer; text-decoration:none; text-align:center; display:inline-flex; align-items:center; justify-content:center; gap:4px; transition:opacity .15s; }
        .act-btn:hover { opacity:.85; }
        .act-edit    { background:#faeeda; color:#854f0b; }
        .act-detail  { background:#e6f1fb; color:#185fa5; }
        .act-stock   { background:#eaf3de; color:#3b6d11; }
        .act-delete  { background:#fcebeb; color:#a32d2d; }

        /* Empty */
        .empty-state { background:#fff; border-radius:12px; border:0.5px solid #d8e2ef; padding:4rem; text-align:center; color:#94a3b8; font-size:13px; }

        /* Modal */
        .modal-overlay { position:fixed; inset:0; z-index:50; display:flex; align-items:center; justify-content:center; background:rgba(12,45,107,.45); }
        .modal-box { background:#fff; border-radius:12px; border:0.5px solid #d8e2ef; box-shadow:0 16px 48px rgba(12,45,107,.18); width:100%; max-width:400px; overflow:hidden; }
        .modal-header { padding:14px 20px; background:linear-gradient(135deg,#7b1e1e,#a32d2d); display:flex; align-items:center; gap:8px; }
        .modal-header-title { font-size:14px; font-weight:600; color:#fff; }
        .modal-body { padding:20px; font-size:13px; color:#2d4a7a; line-height:1.6; }
        .modal-footer { padding:12px 20px; display:flex; justify-content:flex-end; gap:8px; border-top:0.5px solid #e8eef6; }
        .btn-outline { background:#fff; color:#6b7fa3; border:0.5px solid #d8e2ef; font-size:12px; font-weight:500; padding:7px 14px; border-radius:6px; cursor:pointer; }
        .btn-danger  { background:#a32d2d; color:#fff; border:none; font-size:12px; font-weight:600; padding:7px 14px; border-radius:6px; cursor:pointer; }
    </style>

    <div class="inv-page" x-data="{ openModalId: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="inv-toolbar">
                <span class="inv-title">{{ $items->count() }} ítem{{ $items->count() !== 1 ? 's' : '' }} en inventario</span>
                <a href="{{ route('items.create') }}" class="btn btn-new">
                    <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nuevo ítem
                </a>
            </div>

            @if($items->isEmpty())
                <div class="empty-state">
                    <div style="font-size:36px;margin-bottom:12px;">📦</div>
                    No hay ítems en el inventario.
                </div>
            @else
                <div class="items-grid">
                    @foreach($items as $item)
                        @php
                            $cat = strtolower($item->categoria);
                            $isLow = $item->cantidad <= $item->umbral_minimo;
                            $pct = $item->umbral_minimo > 0
                                ? min(100, round(($item->cantidad / ($item->umbral_minimo * 2)) * 100))
                                : 100;
                            $icons = ['equipos'=>'🔧','reactivos'=>'🧪','materiales'=>'📦'];
                            $icon = $icons[$cat] ?? '📋';
                        @endphp
                        <div class="item-card {{ $isLow ? 'low-stock' : '' }}">
                            <div class="card-bar bar-{{ $cat }} {{ !in_array($cat,['equipos','reactivos','materiales']) ? 'bar-default' : '' }}"></div>

                            <div class="card-head">
                                <div style="display:flex;gap:10px;align-items:flex-start;flex:1;min-width:0;">
                                    <div class="card-icon ci-{{ $cat }}">{{ $icon }}</div>
                                    <div style="min-width:0;">
                                        <div class="card-name">{{ $item->nombre }}</div>
                                        <div class="card-code">{{ $item->codigo }}</div>
                                    </div>
                                </div>
                                <span class="cat-badge cat-{{ $cat }}">{{ $item->categoria }}</span>
                            </div>

                            @if($isLow && auth()->user()->hasRole('admin'))
                                <div class="restock-banner">
                                    <svg style="width:14px;height:14px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                                    </svg>
                                    Stock bajo — requiere reabastecimiento
                                </div>
                            @endif

                            <div class="stock-section">
                                <div class="stock-row">
                                    <span class="stock-label">Stock actual</span>
                                    <span class="stock-value {{ $isLow ? 'stock-warn' : 'stock-ok' }}">{{ $item->cantidad }}</span>
                                </div>
                                <div class="stock-bar-wrap">
                                    <div class="stock-bar-fill {{ $isLow ? 'fill-warn' : 'fill-ok' }}" style="width:{{ $pct }}%"></div>
                                </div>
                                <div class="stock-meta">
                                    <span>Mínimo: {{ $item->umbral_minimo }}</span>
                                    <span>{{ $isLow ? '⚠️ Por debajo del umbral' : '✓ Stock normal' }}</span>
                                </div>
                            </div>

                            <div class="card-info">
                                <div class="info-item">
                                    <div class="info-label">Ubicación</div>
                                    <div class="info-value">{{ $item->ubicacion ?? '—' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Proveedor</div>
                                    <div class="info-value">{{ $item->proveedor ?? '—' }}</div>
                                </div>
                                <div class="info-item" style="grid-column:span 2;">
                                    <div class="info-label">Vencimiento</div>
                                    <div class="info-value">{{ $item->fecha_vencimiento ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="card-actions">
                                <a href="{{ route('items.edit', $item->id) }}" class="act-btn act-edit">✏️ Editar</a>
                                <a href="{{ route('items.show', $item->id) }}" class="act-btn act-detail">🔍 Detalles</a>
                                <a href="{{ route('items.editStock', $item->id) }}" class="act-btn act-stock">📊 Stock</a>
                                <button @click="openModalId = {{ $item->id }}" class="act-btn act-delete">🗑️ Eliminar</button>
                            </div>

                            {{-- Modal --}}
                            <div x-show="openModalId === {{ $item->id }}" x-cloak class="modal-overlay">
                                <div class="modal-box" @click.stop>
                                    <div class="modal-header">
                                        <svg style="width:16px;height:16px;" fill="none" stroke="#fff" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        <span class="modal-header-title">Confirmar eliminación</span>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que deseas eliminar <strong>{{ $item->nombre }}</strong>? Esta acción no se puede deshacer.
                                    </div>
                                    <div class="modal-footer">
                                        <button @click="openModalId = null" class="btn-outline">Cancelar</button>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>