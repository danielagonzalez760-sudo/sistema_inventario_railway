<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex items-center gap-3 px-2 py-1">
            <div style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.15);border:1.5px solid rgba(255,255,255,0.4);display:flex;align-items:center;justify-content:center;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:18px;height:18px;" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/>
                </svg>
            </div>
            <div>
                <h2 style="font-size:15px;font-weight:600;color:#fff;margin:0;"><?php echo e($item->nombre); ?></h2>
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin:0;">Detalle del ítem · <?php echo e($item->codigo); ?></p>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <style>
        .show-page { background:#eef2f9; background-image:radial-gradient(ellipse at 20% 0%,rgba(91,163,245,.12) 0%,transparent 60%),radial-gradient(ellipse at 80% 100%,rgba(12,45,107,.07) 0%,transparent 50%); padding:2rem 0 3rem; min-height:100vh; }

        .top-grid { display:grid; grid-template-columns:1fr 2fr; gap:16px; margin-bottom:1.5rem; }
        @media(max-width:768px){ .top-grid{ grid-template-columns:1fr; } }

        .card { background:#fff; border-radius:10px; border:0.5px solid #d8e2ef; overflow:hidden; }

        /* Info card */
        .info-head { padding:1.25rem 1.5rem; border-bottom:0.5px solid #e8eef6; }
        .item-icon-wrap { width:52px; height:52px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:24px; margin-bottom:10px; }
        .ci-equipos   { background:#e6f1fb; }
        .ci-reactivos { background:#eaf3de; }
        .ci-materiales{ background:#faeeda; }
        .ci-default   { background:#f0f4f9; }
        .item-main-name { font-size:17px; font-weight:700; color:#0c2d6b; }
        .item-code { font-size:12px; color:#94a3b8; font-family:monospace; margin-top:2px; }
        .cat-badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:.06em; margin-top:8px; }
        .cat-equipos   { background:#e6f1fb; color:#185fa5; }
        .cat-reactivos { background:#eaf3de; color:#3b6d11; }
        .cat-materiales{ background:#faeeda; color:#854f0b; }
        .cat-default   { background:#f0f4f9; color:#6b7fa3; }

        .info-body { padding:1rem 1.5rem; }
        .info-row { display:flex; justify-content:space-between; align-items:center; padding:8px 0; border-bottom:0.5px solid #f0f4f9; }
        .info-row:last-child { border-bottom:none; }
        .info-key { font-size:11px; font-weight:600; color:#94a3b8; text-transform:uppercase; letter-spacing:.05em; }
        .info-val { font-size:13px; color:#1e3a6e; font-weight:500; text-align:right; }

        /* Stock card */
        .stock-head { padding:1.25rem 1.5rem; border-bottom:0.5px solid #e8eef6; display:flex; align-items:center; justify-content:space-between; }
        .stock-title { font-size:13px; font-weight:600; color:#0c2d6b; }
        .stock-body { padding:1.25rem 1.5rem; }
        .stock-big { font-size:42px; font-weight:700; line-height:1; margin-bottom:4px; }
        .stock-ok   { color:#0c2d6b; }
        .stock-warn { color:#e24b4a; }
        .stock-sub  { font-size:12px; color:#94a3b8; margin-bottom:16px; }
        .bar-wrap { background:#f0f4f9; border-radius:99px; height:8px; overflow:hidden; margin-bottom:6px; }
        .bar-fill { height:100%; border-radius:99px; }
        .fill-ok   { background:linear-gradient(90deg,#185fa5,#5ba3f5); }
        .fill-warn { background:linear-gradient(90deg,#e24b4a,#f87171); }
        .bar-meta  { display:flex; justify-content:space-between; font-size:11px; color:#94a3b8; }
        .restock-alert { margin-top:14px; background:#fcebeb; border:0.5px solid #f7c1c1; border-radius:8px; padding:10px 14px; display:flex; align-items:center; gap:8px; font-size:12px; font-weight:600; color:#a32d2d; }

        /* Actions */
        .actions-row { display:flex; gap:8px; flex-wrap:wrap; margin-bottom:1.5rem; }
        .btn { font-size:12px; font-weight:600; padding:8px 16px; border-radius:7px; cursor:pointer; text-decoration:none; display:inline-flex; align-items:center; gap:6px; border:none; transition:all .15s; }
        .btn:hover { opacity:.88; }
        .btn-edit   { background:#faeeda; color:#854f0b; }
        .btn-stock  { background:#e6f1fb; color:#185fa5; }

        /* Tabs */
        .tabs-wrap { background:#fff; border-radius:10px; border:0.5px solid #d8e2ef; overflow:hidden; }
        .tabs-header { display:flex; border-bottom:0.5px solid #e8eef6; background:#f8fafd; }
        .tab-btn { flex:1; padding:12px 16px; font-size:12px; font-weight:600; color:#6b7fa3; border:none; background:transparent; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:6px; border-bottom:2px solid transparent; transition:all .15s; }
        .tab-btn:hover { color:#185fa5; background:#f0f4f9; }
        .tab-btn.active { color:#0c2d6b; border-bottom-color:#185fa5; background:#fff; }
        .tab-content { padding:1.5rem; }

        /* Tables */
        table.det-table { width:100%; border-collapse:collapse; }
        .det-table thead tr { background:#f5f8fc; }
        .det-table th { text-align:left; padding:10px 1rem; font-size:11px; font-weight:600; color:#6b7fa3; text-transform:uppercase; letter-spacing:.07em; border-bottom:0.5px solid #e8eef6; }
        .det-table td { padding:11px 1rem; font-size:13px; color:#2d4a7a; border-bottom:0.5px solid #f0f4f9; }
        .det-table tbody tr:last-child td { border-bottom:none; }
        .det-table tbody tr:hover td { background:#f8fafd; }

        .badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600; }
        .badge-entrada   { background:#eaf3de; color:#3b6d11; }
        .badge-salida    { background:#fcebeb; color:#a32d2d; }
        .badge-reserva   { background:#e6f1fb; color:#185fa5; }
        .badge-pendiente { background:#faeeda; color:#854f0b; }
        .badge-prestado  { background:#e6f1fb; color:#185fa5; }
        .badge-devuelto  { background:#eaf3de; color:#3b6d11; }
        .badge-cancelado { background:#fcebeb; color:#a32d2d; }
        .badge-atendida  { background:#eaf3de; color:#3b6d11; }
        .badge-default   { background:#f1efe8; color:#5f5e5a; }

        /* Stats */
        .stats-row { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; margin-bottom:1.5rem; }
        .stat-mini { background:#f8fafd; border-radius:8px; border:0.5px solid #e8eef6; padding:12px 14px; }
        .stat-mini-label { font-size:10px; font-weight:600; color:#94a3b8; text-transform:uppercase; letter-spacing:.06em; margin-bottom:4px; }
        .stat-mini-val { font-size:22px; font-weight:700; }

        .empty-msg { padding:2rem; text-align:center; color:#94a3b8; font-size:13px; font-style:italic; }
        .pagination-wrap { margin-top:1rem; }

        .chart-wrap { max-width:320px; margin-bottom:1.5rem; }
    </style>

    <div class="show-page" x-data="{ tab: '<?php echo e(request('tab', 'transacciones')); ?>', mostrarStats: false }">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <?php
                $cat = strtolower($item->categoria);
                $isLow = $item->cantidad <= $item->umbral_minimo;
                $pct = $item->umbral_minimo > 0 ? min(100, round(($item->cantidad / ($item->umbral_minimo * 2)) * 100)) : 100;
                $icons = ['equipos'=>'🔧','reactivos'=>'🧪','materiales'=>'📦'];
                $icon = $icons[$cat] ?? '📋';
                $totalAlertas = $alertas->total();
                $pendientes = $alertas->where('estado','pendiente')->count();
                $atendidas  = $alertas->where('estado','atendida')->count();
            ?>

            
            <?php if(auth()->user()->hasRole('admin')): ?>
                <div class="actions-row">
                    <a href="<?php echo e(route('items.edit', $item)); ?>" class="btn btn-edit">
                        <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Editar ítem
                    </a>
                    <a href="<?php echo e(route('items.editStock', $item)); ?>" class="btn btn-stock">
                        <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/></svg>
                        Actualizar stock
                    </a>
                </div>
            <?php endif; ?>

            
            <div class="top-grid">
                
                <div class="card">
                    <div class="info-head">
                        <div class="item-icon-wrap ci-<?php echo e($cat); ?>"><?php echo e($icon); ?></div>
                        <div class="item-main-name"><?php echo e($item->nombre); ?></div>
                        <div class="item-code"><?php echo e($item->codigo); ?></div>
                        <div><span class="cat-badge cat-<?php echo e($cat); ?>"><?php echo e($item->categoria); ?></span></div>
                    </div>
                    <div class="info-body">
                        <div class="info-row">
                            <span class="info-key">Ubicación</span>
                            <span class="info-val"><?php echo e($item->ubicacion ?? '—'); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-key">Proveedor</span>
                            <span class="info-val"><?php echo e($item->proveedor ?? '—'); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-key">Vencimiento</span>
                            <span class="info-val"><?php echo e($item->fecha_vencimiento ?? 'No aplica'); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-key">Umbral mínimo</span>
                            <span class="info-val"><?php echo e($item->umbral_minimo); ?></span>
                        </div>
                    </div>
                </div>

                
                <div class="card">
                    <div class="stock-head">
                        <span class="stock-title">Estado del stock</span>
                        <span class="badge <?php echo e($isLow ? 'badge-salida' : 'badge-devuelto'); ?>">
                            <?php echo e($isLow ? '⚠️ Stock bajo' : '✓ Normal'); ?>

                        </span>
                    </div>
                    <div class="stock-body">
                        <div class="stock-big <?php echo e($isLow ? 'stock-warn' : 'stock-ok'); ?>"><?php echo e($item->cantidad); ?></div>
                        <div class="stock-sub">unidades disponibles</div>
                        <div class="bar-wrap">
                            <div class="bar-fill <?php echo e($isLow ? 'fill-warn' : 'fill-ok'); ?>" style="width:<?php echo e($pct); ?>%"></div>
                        </div>
                        <div class="bar-meta">
                            <span>0</span>
                            <span>Umbral: <?php echo e($item->umbral_minimo); ?></span>
                            <span><?php echo e($item->umbral_minimo * 2); ?>+</span>
                        </div>
                        <?php if($isLow): ?>
                            <div class="restock-alert">
                                <svg style="width:15px;height:15px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                                </svg>
                                Este ítem requiere reabastecimiento urgente
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="tabs-wrap">
                <div class="tabs-header">
                    <button class="tab-btn" :class="{ active: tab === 'transacciones' }"
                        @click="tab = 'transacciones'; window.history.replaceState(null,'','?tab=transacciones')">
                        <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Transacciones
                    </button>
                    <button class="tab-btn" :class="{ active: tab === 'reservas' }"
                        @click="tab = 'reservas'; window.history.replaceState(null,'','?tab=reservas')">
                        <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Reservas
                    </button>
                    <button class="tab-btn" :class="{ active: tab === 'alertas' }"
                        @click="tab = 'alertas'; window.history.replaceState(null,'','?tab=alertas')">
                        <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
                        Alertas
                    </button>
                </div>

                
                <div class="tab-content" x-show="tab === 'transacciones'" x-cloak>
                    <?php if($transacciones->isEmpty()): ?>
                        <div class="empty-msg">No hay transacciones registradas aún.</div>
                    <?php else: ?>
                        <div style="overflow-x:auto;">
                            <table class="det-table">
                                <thead><tr>
                                    <th>Fecha</th><th>Tipo</th><th>Cantidad</th><th>Descripción</th>
                                </tr></thead>
                                <tbody>
                                    <?php $__currentLoopData = $transacciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="color:#6b7fa3;font-size:12px;"><?php echo e($t->created_at->format('d/m/Y H:i')); ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo e($t->tipo === 'entrada' ? 'entrada' : ($t->tipo === 'salida' ? 'salida' : 'reserva')); ?>">
                                                <?php echo e(ucfirst($t->tipo)); ?>

                                            </span>
                                        </td>
                                        <td style="font-weight:600;"><?php echo e($t->cantidad); ?></td>
                                        <td><?php echo e($t->user ? 'Préstamo por '.$t->user->email : ($t->descripcion ?? 'Usuario eliminado')); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-wrap"><?php echo e($transacciones->appends(['tab'=>'transacciones'])->links()); ?></div>
                    <?php endif; ?>
                </div>

                
                <div class="tab-content" x-show="tab === 'reservas'" x-cloak>
                    <?php if($reservas->isEmpty()): ?>
                        <div class="empty-msg">Este ítem no ha sido reservado aún.</div>
                    <?php else: ?>
                        <div style="overflow-x:auto;">
                            <table class="det-table">
                                <thead><tr>
                                    <th>Usuario</th><th>Cantidad</th><th>Fecha reserva</th><th>Devolución</th><th>Estado</th>
                                </tr></thead>
                                <tbody>
                                    <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="font-size:12px;color:#6b7fa3;"><?php echo e($reserva->user->email ?? 'Usuario desconocido'); ?></td>
                                        <td><?php echo e($reserva->cantidad ?? 1); ?></td>
                                        <td style="font-size:12px;color:#6b7fa3;"><?php echo e($reserva->created_at->format('d/m/Y H:i')); ?></td>
                                        <td style="font-size:12px;color:#6b7fa3;">
                                            <?php if($reserva->fecha_devolucion_real): ?>
                                                <?php echo e($reserva->fecha_devolucion_real->format('d/m/Y H:i')); ?>

                                            <?php else: ?>
                                                <span style="color:#94a3b8;font-style:italic;"><?php echo e($reserva->estado === 'devuelto' ? 'Sin fecha' : 'Pendiente'); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge badge-<?php echo e($reserva->estado); ?>"><?php echo e(ucfirst($reserva->estado)); ?></span>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-wrap"><?php echo e($reservas->appends(['tab'=>'reservas'])->links()); ?></div>
                    <?php endif; ?>
                </div>

                
                <div class="tab-content" x-show="tab === 'alertas'" x-cloak>
                    <div class="stats-row">
                        <div class="stat-mini">
                            <div class="stat-mini-label">Pendientes</div>
                            <div class="stat-mini-val" style="color:#854f0b;"><?php echo e($pendientes); ?></div>
                        </div>
                        <div class="stat-mini">
                            <div class="stat-mini-label">Atendidas</div>
                            <div class="stat-mini-val" style="color:#3b6d11;"><?php echo e($atendidas); ?></div>
                        </div>
                        <div class="stat-mini">
                            <div class="stat-mini-label">Total</div>
                            <div class="stat-mini-val" style="color:#0c2d6b;"><?php echo e($totalAlertas); ?></div>
                        </div>
                    </div>

                    <div class="chart-wrap">
                        <canvas id="alertasChart"></canvas>
                    </div>

                    <?php if($alertas->isEmpty()): ?>
                        <div class="empty-msg">Este ítem no tiene alertas registradas.</div>
                    <?php else: ?>
                        <div style="overflow-x:auto;">
                            <table class="det-table">
                                <thead><tr>
                                    <th>Fecha</th><th>Ítem</th><th>Cantidad</th><th>Estado</th>
                                </tr></thead>
                                <tbody>
                                    <?php $__currentLoopData = $alertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alerta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="font-size:12px;color:#6b7fa3;"><?php echo e($alerta->created_at->format('d/m/Y H:i')); ?></td>
                                        <td><?php echo e($item->nombre); ?></td>
                                        <td style="font-weight:600;"><?php echo e($alerta->cantidad); ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo e($alerta->estado === 'atendida' ? 'atendida' : 'pendiente'); ?>">
                                                <?php echo e(ucfirst($alerta->estado)); ?>

                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-wrap"><?php echo e($alertas->appends(['tab'=>'alertas'])->links()); ?></div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('alertasChart');
            if(ctx) {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Pendientes', 'Atendidas'],
                        datasets: [{
                            data: [<?php echo e($pendientes); ?>, <?php echo e($atendidas); ?>],
                            backgroundColor: ['#faeeda', '#eaf3de'],
                            borderColor: ['#f5a623', '#7ec843'],
                            borderWidth: 2,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { position: 'bottom', labels: { font: { size: 12 }, color: '#6b7fa3' } }
                        },
                        cutout: '70%'
                    }
                });
            }
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/items/show.blade.php ENDPATH**/ ?>