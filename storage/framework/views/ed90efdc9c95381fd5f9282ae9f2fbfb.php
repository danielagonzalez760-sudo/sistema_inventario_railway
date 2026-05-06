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
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L15 12 9.75 7v10z" />
                </svg>
            </div>
            <div>
                 <h2 class="font-bold text-xl text-blue-800 dark:text-blue-300">Bienvenido <?php echo e(auth()->user()->name); ?> 🛠️</h2>
                
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin:0;">Panel de gestión de inventario y reservas de laboratorio</p>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

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

            
            <div class="kpi-grid">
                <div class="kpi-card">
                    <div>
                        <div class="kpi-label">Total ítems</div>
                        <div class="kpi-value" style="color:#0c2d6b"><?php echo e($totalItems); ?></div>
                        <div class="kpi-sub">En inventario activo</div>
                    </div>
                    <div class="kpi-icon icon-blue">📦</div>
                </div>
                <div class="kpi-card">
                    <div>
                        <div class="kpi-label">Ítems bajo stock</div>
                        <div class="kpi-value" style="color:#e24b4a"><?php echo e($lowStockCount); ?></div>
                        <div class="kpi-sub">Sin alertas activas</div>
                    </div>
                    <div class="kpi-icon icon-amber">⚠️</div>
                </div>
                <div class="kpi-card">
                    <div>
                        <div class="kpi-label">Reservas pendientes</div>
                        <div class="kpi-value" style="color:#185fa5"><?php echo e($reservasPendientes); ?></div>
                        <div class="kpi-sub">Requieren atención</div>
                    </div>
                    <div class="kpi-icon icon-green">📋</div>
                </div>
            </div>

            
            <div class="section-card">
                <div class="section-header">
                    <div class="section-title-wrap">
                        <div class="section-dot dot-red"></div>
                        <span class="section-title">Ítems con bajo stock</span>
                    </div>
                    <div class="btn-row">
                        <a href="<?php echo e(route('items.index')); ?>" class="btn btn-outline">Ver inventario completo</a>
                        <a href="<?php echo e(route('items.create')); ?>" class="btn btn-primary">+ Agregar ítem</a>
                    </div>
                </div>
                <?php if($items->isEmpty()): ?>
                    <div class="empty-state">
                        <div style="font-size:28px;margin-bottom:8px">✅</div>
                        No hay ítems con bajo stock actualmente
                    </div>
                <?php else: ?>
                    <div class="table-wrap">
                        <table class="dash-table">
                            <thead>
                                <tr><th>Nombre</th><th>Cantidad</th><th>Umbral mínimo</th><th>Acciones</th></tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->nombre); ?></td>
                                    <td><?php echo e($item->cantidad); ?></td>
                                    <td><?php echo e($item->umbral_minimo); ?></td>
                                    <td><a href="<?php echo e(route('items.editStock', $item)); ?>" class="btn-warning">✏️ Actualizar stock</a></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="section-card">
                <div class="section-header">
                    <div class="section-title-wrap">
                        <div class="section-dot dot-blue"></div>
                        <span class="section-title">Últimas reservas</span>
                    </div>
                    <a href="<?php echo e(route('items.index')); ?>" class="btn btn-outline">Ver todas</a>
                </div>
                <div class="table-wrap">
                    <table class="dash-table">
                        <thead>
                            <tr><th>Usuario</th><th>Ítem</th><th>Cantidad</th><th>Estado</th></tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $ultimasReservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="avatar"><?php echo e(strtoupper(substr($reserva->user->name ?? $reserva->user->email, 0, 1))); ?><?php echo e(strtoupper(substr(explode('.', $reserva->user->name ?? '')[1] ?? '', 0, 1))); ?></div>
                                        <div>
                                            <div class="user-name"><?php echo e($reserva->user->name ?? 'Usuario'); ?></div>
                                            <div class="user-email"><?php echo e($reserva->user->email); ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo e($reserva->item->nombre); ?></td>
                                <td><?php echo e($reserva->cantidad); ?></td>
                                <td>
                                    <span class="badge
                                        <?php if($reserva->estado=='pendiente'): ?> badge-pendiente
                                        <?php elseif($reserva->estado=='prestado'): ?> badge-prestado
                                        <?php elseif($reserva->estado=='devuelto'): ?> badge-devuelto
                                        <?php else: ?> badge-default <?php endif; ?>">
                                        <?php echo e(ucfirst($reserva->estado)); ?>

                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="4" style="padding:2rem;text-align:center;color:#94a3b8;font-size:13px;font-style:italic">No hay reservas recientes.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>


<?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>