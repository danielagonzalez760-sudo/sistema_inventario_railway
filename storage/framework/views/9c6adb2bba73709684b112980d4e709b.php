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
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div>
                <h2 style="font-size:15px;font-weight:600;color:#fff;margin:0;">Historial de Auditoría</h2>
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin:0;">Registro de acciones realizadas en el sistema</p>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <style>
        .audit-page { background:#eef2f9; background-image:radial-gradient(ellipse at 20% 0%,rgba(91,163,245,.12) 0%,transparent 60%),radial-gradient(ellipse at 80% 100%,rgba(12,45,107,.07) 0%,transparent 50%); padding:2rem 0 3rem; min-height:100vh; }

        .btn-back { display:inline-flex; align-items:center; gap:6px; background:#fff; color:#2d4a7a; border:0.5px solid #d8e2ef; font-size:12px; font-weight:500; padding:7px 14px; border-radius:6px; text-decoration:none; transition:opacity .15s; margin-bottom:1.5rem; }
        .btn-back:hover { opacity:.85; }

        .log-card { background:#fff; border-radius:10px; border:0.5px solid #d8e2ef; overflow:hidden; margin-bottom:1rem; }
        .log-card-header { padding:1rem 1.5rem; display:grid; grid-template-columns:1fr 1fr; gap:10px; border-bottom:0.5px solid #e8eef6; }
        @media(max-width:640px){ .log-card-header{ grid-template-columns:1fr; } }

        .log-meta { display:flex; align-items:center; gap:8px; font-size:13px; color:#2d4a7a; }
        .log-meta-icon { width:28px; height:28px; border-radius:7px; display:flex; align-items:center; justify-content:center; font-size:13px; flex-shrink:0; }
        .icon-user    { background:#e6f1fb; }
        .icon-date    { background:#f0f4f9; }
        .icon-action  { background:#faeeda; }
        .icon-model   { background:#eaf3de; }
        .log-meta-label { font-size:11px; font-weight:600; color:#94a3b8; text-transform:uppercase; letter-spacing:.05em; display:block; }
        .log-meta-value { font-size:13px; color:#1e3a6e; font-weight:500; }

        .log-desc { padding:12px 1.5rem; font-size:13px; color:#2d4a7a; border-bottom:0.5px solid #f0f4f9; }
        .log-desc strong { color:#0c2d6b; }

        .log-details { padding:0 1.5rem 1rem; }
        details.data-block { margin-top:10px; background:#f8fafd; border-radius:8px; border:0.5px solid #e8eef6; overflow:hidden; }
        details.data-block summary { padding:10px 14px; cursor:pointer; font-size:12px; font-weight:600; color:#2d4a7a; display:flex; align-items:center; gap:6px; list-style:none; user-select:none; }
        details.data-block summary::-webkit-details-marker { display:none; }
        details.data-block[open] summary { border-bottom:0.5px solid #e8eef6; }
        details.data-block pre { margin:0; padding:12px 14px; font-size:11px; color:#2d4a7a; background:#f5f8fc; overflow-x:auto; line-height:1.6; }

        .action-badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600; }
        .action-crear     { background:#eaf3de; color:#3b6d11; }
        .action-actualizar{ background:#e6f1fb; color:#185fa5; }
        .action-eliminar  { background:#fcebeb; color:#a32d2d; }
        .action-default   { background:#f1efe8; color:#5f5e5a; }

        .empty-state { background:#fff; border-radius:10px; border:0.5px solid #d8e2ef; padding:3rem; text-align:center; color:#94a3b8; font-size:13px; font-style:italic; }

        .pagination-wrap { margin-top:1.5rem; }
    </style>

    <div class="audit-page">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <a href="<?php echo e(route('users.index')); ?>" class="btn-back">
                <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver a Usuarios
            </a>

            <?php if($logs->count()): ?>
                <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="log-card">
                        <div class="log-card-header">
                            <div class="log-meta">
                                <div class="log-meta-icon icon-user">👤</div>
                                <div>
                                    <span class="log-meta-label">Usuario</span>
                                    <span class="log-meta-value"><?php echo e($log->usuario->name ?? 'Sistema'); ?></span>
                                </div>
                            </div>
                            <div class="log-meta">
                                <div class="log-meta-icon icon-date">🕒</div>
                                <div>
                                    <span class="log-meta-label">Fecha</span>
                                    <span class="log-meta-value"><?php echo e($log->created_at->format('d/m/Y H:i')); ?></span>
                                </div>
                            </div>
                            <div class="log-meta">
                                <div class="log-meta-icon icon-action">⚙️</div>
                                <div>
                                    <span class="log-meta-label">Acción</span>
                                    <span class="action-badge
                                        <?php if(strtolower($log->accion) === 'crear'): ?> action-crear
                                        <?php elseif(strtolower($log->accion) === 'actualizar'): ?> action-actualizar
                                        <?php elseif(strtolower($log->accion) === 'eliminar'): ?> action-eliminar
                                        <?php else: ?> action-default <?php endif; ?>">
                                        <?php echo e(ucfirst($log->accion)); ?>

                                    </span>
                                </div>
                            </div>
                            <div class="log-meta">
                                <div class="log-meta-icon icon-model">📌</div>
                                <div>
                                    <span class="log-meta-label">Modelo afectado</span>
                                    <span class="log-meta-value"><?php echo e($log->modelo_afectado); ?> #<?php echo e($log->modelo_id); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="log-desc">
                            <strong>Descripción:</strong> <?php echo e($log->descripcion); ?>

                        </div>

                        <?php if($log->datos_anteriores || $log->datos_nuevos): ?>
                            <div class="log-details">
                                <?php if($log->datos_anteriores): ?>
                                    <details class="data-block">
                                        <summary>
                                            <svg style="width:13px;height:13px;opacity:.6;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                                            </svg>
                                            Datos anteriores
                                        </summary>
                                        <pre><?php echo e(json_encode($log->datos_anteriores, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); ?></pre>
                                    </details>
                                <?php endif; ?>
                                <?php if($log->datos_nuevos): ?>
                                    <details class="data-block">
                                        <summary>
                                            <svg style="width:13px;height:13px;opacity:.6;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            Datos nuevos
                                        </summary>
                                        <pre><?php echo e(json_encode($log->datos_nuevos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); ?></pre>
                                    </details>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="pagination-wrap">
                    <?php echo e($logs->links('pagination::tailwind')); ?>

                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div style="font-size:28px;margin-bottom:8px;">📋</div>
                    No hay registros de auditoría aún.
                </div>
            <?php endif; ?>

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
<?php endif; ?><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/admin/users/auditoria.blade.php ENDPATH**/ ?>