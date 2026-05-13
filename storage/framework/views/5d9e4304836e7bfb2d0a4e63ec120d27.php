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
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <h2 style="font-size:15px;font-weight:600;color:#fff;margin:0;">Gestión de Usuarios</h2>
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin:0;">Administración de cuentas y roles del sistema</p>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <style>
        .users-page { background:#eef2f9; background-image:radial-gradient(ellipse at 20% 0%,rgba(91,163,245,.12) 0%,transparent 60%),radial-gradient(ellipse at 80% 100%,rgba(12,45,107,.07) 0%,transparent 50%); padding:2rem 0 3rem; min-height:100vh; }

        .section-card { background:#fff; border-radius:10px; border:0.5px solid #d8e2ef; overflow:hidden; }

        .toolbar { padding:1rem 1.5rem; display:flex; align-items:center; justify-content:space-between; border-bottom:0.5px solid #e8eef6; flex-wrap:wrap; gap:12px; }
        .search-group { display:flex; align-items:center; gap:8px; flex-wrap:wrap; }
        .search-input { border:0.5px solid #d8e2ef; border-radius:7px; padding:8px 14px; font-size:13px; color:#2d4a7a; background:#f8fafd; outline:none; width:240px; transition:border .15s; }
        .search-input:focus { border-color:#185fa5; background:#fff; }
        .search-input::placeholder { color:#94a3b8; }

        .btn { font-size:12px; font-weight:500; padding:7px 14px; border-radius:6px; cursor:pointer; text-decoration:none; display:inline-flex; align-items:center; gap:5px; border:none; transition:opacity .15s; }
        .btn:hover { opacity:.85; }
        .btn-primary  { background:#0c2d6b; color:#fff; }
        .btn-outline  { background:#fff; color:#6b7fa3; border:0.5px solid #d8e2ef; }
        .btn-success  { background:#eaf3de; color:#3b6d11; font-weight:600; }
        .btn-dark     { background:#f0f4f9; color:#2d4a7a; border:0.5px solid #d8e2ef; font-weight:600; }
        .btn-edit     { background:#faeeda; color:#854f0b; border:none; font-size:12px; font-weight:600; padding:5px 12px; border-radius:6px; cursor:pointer; }
        .btn-edit:hover { background:#fac775; }
        .btn-delete   { background:#fcebeb; color:#a32d2d; border:none; font-size:12px; font-weight:600; padding:5px 12px; border-radius:6px; cursor:pointer; }
        .btn-delete:hover { background:#f7c1c1; }

        table.usr-table { width:100%; border-collapse:collapse; }
        .usr-table thead tr { background:#f5f8fc; }
        .usr-table th { text-align:left; padding:10px 1.5rem; font-size:11px; font-weight:600; color:#6b7fa3; text-transform:uppercase; letter-spacing:.07em; border-bottom:0.5px solid #e8eef6; }
        .usr-table th.center { text-align:center; }
        .usr-table td { padding:12px 1.5rem; font-size:13px; color:#2d4a7a; border-bottom:0.5px solid #f0f4f9; }
        .usr-table td.center { text-align:center; }
        .usr-table tbody tr:last-child td { border-bottom:none; }
        .usr-table tbody tr:hover td { background:#f8fafd; }

        .user-cell { display:flex; align-items:center; gap:10px; }
        .avatar { width:30px; height:30px; border-radius:50%; background:#b5d4f4; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:600; color:#0c447c; flex-shrink:0; text-transform:uppercase; }

        .role-badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600; }
        .role-admin      { background:#e6f1fb; color:#185fa5; }
        .role-profesor   { background:#eaf3de; color:#3b6d11; }
        .role-estudiante { background:#faeeda; color:#854f0b; }
        .role-default    { background:#f1efe8; color:#5f5e5a; }

        .action-row { display:flex; align-items:center; justify-content:center; gap:6px; }

        .modal-overlay { position:fixed; inset:0; z-index:50; display:flex; align-items:center; justify-content:center; background:rgba(12,45,107,.45); }
        .modal-box { background:#fff; border-radius:12px; border:0.5px solid #d8e2ef; box-shadow:0 16px 48px rgba(12,45,107,.18); width:100%; max-width:420px; overflow:hidden; }
        .modal-header { padding:14px 20px; background:linear-gradient(135deg,#7b1e1e,#a32d2d); display:flex; align-items:center; gap:8px; }
        .modal-header-title { font-size:14px; font-weight:600; color:#fff; }
        .modal-body { padding:20px; font-size:13px; color:#2d4a7a; line-height:1.6; }
        .modal-footer { padding:12px 20px; display:flex; justify-content:flex-end; gap:8px; border-top:0.5px solid #e8eef6; }

        .pagination-wrap { padding:1rem 1.5rem; border-top:0.5px solid #e8eef6; }

        .id-cell { font-size:11px; color:#94a3b8; font-weight:600; }
    </style>

    <div class="users-page" x-data="{ openModalId: null }">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="section-card">

                
                <div class="toolbar">
                    <form method="GET" action="<?php echo e(route('admin.users.index')); ?>" class="search-group">
                        <input type="text" name="email" placeholder="Buscar por correo..."
                            value="<?php echo e(request('email')); ?>" class="search-input" />
                        <button type="submit" class="btn btn-primary">
                            <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
                            </svg>
                            Buscar
                        </button>
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-outline">Limpiar</a>
                    </form>

                    <div style="display:flex;gap:8px;">
                        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success">
                            <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                            </svg>
                            Crear usuario
                        </a>
                        <a href="<?php echo e(route('admin.auditoria')); ?>" class="btn btn-dark">
                            <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Auditoría
                        </a>
                    </div>
                </div>

                
                <div style="overflow-x:auto;">
                    <table class="usr-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Roles</th>
                                <th class="center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="id-cell">#<?php echo e($user->id); ?></td>
                                    <td>
                                        <div class="user-cell">
                                            <div class="avatar"><?php echo e(strtoupper(substr($user->name, 0, 1))); ?></div>
                                            <?php echo e($user->name); ?>

                                        </div>
                                    </td>
                                    <td style="color:#6b7fa3;font-size:12px;"><?php echo e($user->email); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="role-badge
                                                <?php if($role->name === 'admin'): ?> role-admin
                                                <?php elseif($role->name === 'profesor'): ?> role-profesor
                                                <?php elseif($role->name === 'estudiante'): ?> role-estudiante
                                                <?php else: ?> role-default <?php endif; ?>">
                                                <?php echo e(ucfirst($role->name)); ?>

                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td class="center">
                                        <div class="action-row">
                                            <a href="<?php echo e(route('users.edit', $user)); ?>" class="btn-edit">✏️ Editar</a>
                                            <button @click="openModalId = <?php echo e($user->id); ?>" class="btn-delete">🗑️ Eliminar</button>
                                        </div>

                                        
                                        <div x-show="openModalId === <?php echo e($user->id); ?>" x-cloak class="modal-overlay">
                                            <div class="modal-box" @click.stop>
                                                <div class="modal-header">
                                                    <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="#fff" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                    <span class="modal-header-title">Confirmar eliminación</span>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de que deseas eliminar al usuario <strong><?php echo e($user->name); ?></strong>?
                                                    Esta acción no se puede deshacer.
                                                </div>
                                                <div class="modal-footer">
                                                    <button @click="openModalId = null" class="btn btn-outline">Cancelar</button>
                                                    <form action="<?php echo e(route('users.destroy', $user)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" style="background:#a32d2d;color:#fff;border:none;padding:7px 14px;border-radius:6px;font-size:12px;font-weight:600;cursor:pointer;">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" style="padding:2rem;text-align:center;color:#94a3b8;font-size:13px;font-style:italic;">
                                        No se encontraron usuarios.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="pagination-wrap">
                    <?php echo e($users->links('pagination::tailwind')); ?>

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
<?php endif; ?><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/admin/users/index.blade.php ENDPATH**/ ?>