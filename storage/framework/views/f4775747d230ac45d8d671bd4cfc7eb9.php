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
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" x-data="{ openModalId: null }">
         <?php $__env->slot('header', null, []); ?> 
            <div class="flex items-center gap-3 px-2 py-1">
                <div style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.15);border:1.5px solid rgba(255,255,255,0.4);display:flex;align-items:center;justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:18px;height:18px;" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <h2 style="font-size:15px;font-weight:600;color:#fff;margin:0;">Reservas pendientes</h2>
                    <p style="font-size:11px;color:rgba(255,255,255,0.6);margin:0;">Gestión y seguimiento de reservas del laboratorio</p>
                </div>
            </div>
         <?php $__env->endSlot(); ?>

        <style>
            .res-page { background:#eef2f9; background-image:radial-gradient(ellipse at 20% 0%,rgba(91,163,245,.12) 0%,transparent 60%),radial-gradient(ellipse at 80% 100%,rgba(12,45,107,.07) 0%,transparent 50%); padding:2rem 0 3rem; min-height:100vh; }

            .search-bar { display:flex; flex-wrap:wrap; align-items:center; gap:10px; padding:1rem 1.5rem; border-bottom:0.5px solid #e8eef6; }
            .search-input { border:0.5px solid #d8e2ef; border-radius:7px; padding:8px 14px; font-size:13px; color:#2d4a7a; background:#f8fafd; outline:none; width:260px; transition:border .15s; }
            .search-input:focus { border-color:#185fa5; background:#fff; }
            .search-input::placeholder { color:#94a3b8; }

            .section-card { background:#fff; border-radius:10px; border:0.5px solid #d8e2ef; overflow:hidden; margin-top:1.5rem; }
            .section-header { padding:1rem 1.5rem; display:flex; align-items:center; gap:8px; border-bottom:0.5px solid #e8eef6; }
            .section-dot { width:8px; height:8px; border-radius:50%; background:#185fa5; flex-shrink:0; }
            .section-title { font-size:14px; font-weight:600; color:#0c2d6b; }

            .btn { font-size:12px; font-weight:500; padding:7px 14px; border-radius:6px; cursor:pointer; text-decoration:none; display:inline-flex; align-items:center; gap:5px; border:none; transition:opacity .15s; }
            .btn:hover { opacity:.85; }
            .btn-primary  { background:#0c2d6b; color:#fff; }
            .btn-outline  { background:#fff; color:#6b7fa3; border:0.5px solid #d8e2ef; }
            .btn-approve  { background:#eaf3de; color:#3b6d11; border:none; font-size:12px; font-weight:600; padding:5px 12px; border-radius:6px; cursor:pointer; }
            .btn-approve:hover { background:#c0dd97; }
            .btn-reject   { background:#fcebeb; color:#a32d2d; border:none; font-size:12px; font-weight:600; padding:5px 12px; border-radius:6px; cursor:pointer; }
            .btn-reject:hover  { background:#f7c1c1; }
            .btn-return   { background:#e6f1fb; color:#185fa5; border:none; font-size:12px; font-weight:600; padding:5px 12px; border-radius:6px; cursor:pointer; }
            .btn-return:hover  { background:#b5d4f4; }
            .btn-cancel-r { background:#faeeda; color:#854f0b; border:none; font-size:12px; font-weight:600; padding:5px 12px; border-radius:6px; cursor:pointer; }
            .btn-cancel-r:hover { background:#fac775; }

            table.res-table { width:100%; border-collapse:collapse; }
            .res-table thead tr { background:#f5f8fc; }
            .res-table th { text-align:left; padding:10px 1.5rem; font-size:11px; font-weight:600; color:#6b7fa3; text-transform:uppercase; letter-spacing:.07em; border-bottom:0.5px solid #e8eef6; }
            .res-table th.center { text-align:center; }
            .res-table td { padding:13px 1.5rem; font-size:13px; color:#2d4a7a; border-bottom:0.5px solid #f0f4f9; }
            .res-table td.center { text-align:center; }
            .res-table tbody tr:last-child td { border-bottom:none; }
            .res-table tbody tr:hover td { background:#f8fafd; }

            .user-cell { display:flex; align-items:center; gap:10px; }
            .avatar { width:30px; height:30px; border-radius:50%; background:#b5d4f4; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:600; color:#0c447c; flex-shrink:0; text-transform:uppercase; }
            .user-email { font-size:12px; color:#6b7fa3; }

            .badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600; }
            .badge-pendiente { background:#faeeda; color:#854f0b; }
            .badge-prestado  { background:#e6f1fb; color:#185fa5; }
            .badge-devuelto  { background:#eaf3de; color:#3b6d11; }
            .badge-cancelado { background:#fcebeb; color:#a32d2d; }
            .badge-default   { background:#f1efe8; color:#5f5e5a; }

            .action-row { display:flex; align-items:center; justify-content:center; gap:6px; }

            /* Modal */
            .modal-overlay { position:fixed; inset:0; z-index:50; display:flex; align-items:center; justify-content:center; background:rgba(12,45,107,.45); }
            .modal-box { background:#fff; border-radius:12px; border:0.5px solid #d8e2ef; box-shadow:0 16px 48px rgba(12,45,107,.18); width:100%; max-width:420px; overflow:hidden; }
            .modal-header { padding:14px 20px; background:linear-gradient(135deg,#0c2d6b,#1a4a9e); }
            .modal-header-title { font-size:14px; font-weight:600; color:#fff; }
            .modal-body { padding:20px; font-size:13px; color:#2d4a7a; line-height:1.6; }
            .modal-footer { padding:12px 20px; display:flex; justify-content:flex-end; gap:8px; border-top:0.5px solid #e8eef6; }

            .pagination-wrap { padding:1rem 1.5rem; border-top:0.5px solid #e8eef6; }
        </style>

        <div class="res-page">
            <div class="section-card">
                
                <form method="GET" action="<?php echo e(route('admin.reservas.index')); ?>" class="search-bar">
                    <input type="text" name="email" placeholder="Buscar por correo..."
                        value="<?php echo e(request('email')); ?>" class="search-input" />
                    <button type="submit" class="btn btn-primary">
                        <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
                        </svg>
                        Buscar
                    </button>
                    <a href="<?php echo e(route('admin.reservas.index')); ?>" class="btn btn-outline">Limpiar</a>
                </form>

                
                <div class="overflow-x-auto">
                    <table class="res-table">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Ítem</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                                <th class="center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <div class="user-cell">
                                            <div class="avatar"><?php echo e(strtoupper(substr($reserva->user->email, 0, 1))); ?></div>
                                            <span class="user-email"><?php echo e($reserva->user->email); ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo e($reserva->item->nombre); ?></td>
                                    <td><?php echo e($reserva->cantidad); ?></td>
                                    <td>
                                        <span class="badge
                                            <?php if($reserva->estado==='pendiente'): ?> badge-pendiente
                                            <?php elseif($reserva->estado==='prestado'): ?> badge-prestado
                                            <?php elseif($reserva->estado==='devuelto'): ?> badge-devuelto
                                            <?php elseif($reserva->estado==='cancelado'): ?> badge-cancelado
                                            <?php else: ?> badge-default <?php endif; ?>">
                                            <?php echo e(ucfirst($reserva->estado)); ?>

                                        </span>
                                    </td>
                                    <td class="center">
                                        <?php if($reserva->estado === 'cancelado'): ?>
                                            <span class="badge badge-cancelado">Cancelado</span>
                                        <?php elseif($reserva->estado === 'devuelto'): ?>
                                            <span class="badge badge-devuelto">Devuelto</span>
                                        <?php elseif(Auth::user()->roles->contains('name', 'admin')): ?>
                                            <?php if($reserva->estado === 'pendiente'): ?>
                                                <div class="action-row">
                                                    <form action="<?php echo e(route('admin.reservas.aprobar', $reserva)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                                        <button type="submit" class="btn-approve">✓ Aprobar</button>
                                                    </form>
                                                    <form action="<?php echo e(route('admin.reservas.rechazar', $reserva)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                                        <button type="submit" class="btn-reject">✕ Rechazar</button>
                                                    </form>
                                                </div>
                                            <?php elseif($reserva->estado === 'prestado'): ?>
                                                <button @click="openModalId = <?php echo e($reserva->id); ?>" class="btn-return">
                                                    ↩ Devolver
                                                </button>

                                                
                                                <div x-show="openModalId === <?php echo e($reserva->id); ?>" x-cloak class="modal-overlay">
                                                    <div class="modal-box" @click.stop>
                                                        <div class="modal-header">
                                                            <div class="modal-header-title">Confirmar devolución</div>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Marcar como <strong>devuelto</strong> el ítem
                                                            <strong><?php echo e($reserva->item->nombre); ?></strong>
                                                            reservado por <strong><?php echo e($reserva->user->email); ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button @click="openModalId = null" class="btn btn-outline">Cancelar</button>
                                                            <form action="<?php echo e(route('admin.reservas.devolver', $reserva)); ?>" method="POST">
                                                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <span style="font-size:12px;color:#94a3b8;font-style:italic;">Sin acción</span>
                                            <?php endif; ?>
                                        <?php elseif($reserva->user_id === Auth::id() && $reserva->estado === 'pendiente'): ?>
                                            <form action="<?php echo e(route('reservas.cancelar', $reserva)); ?>" method="POST"
                                                onsubmit="return confirm('¿Deseas cancelar esta reserva?');">
                                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                                <button type="submit" class="btn-cancel-r">✕ Cancelar</button>
                                            </form>
                                        <?php else: ?>
                                            <span style="font-size:12px;color:#94a3b8;font-style:italic;">Sin acción</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" style="padding:2.5rem;text-align:center;color:#94a3b8;font-size:13px;font-style:italic;">
                                        No se encontraron reservas.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="pagination-wrap">
                    <?php echo e($reservas->appends(request()->query())->links()); ?>

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
<?php endif; ?><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/reservas/index.blade.php ENDPATH**/ ?>