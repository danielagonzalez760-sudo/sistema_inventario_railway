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
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v2H5a2 2 0 01-2-2V7a2 2 0 012-2h4v2H5v10h4zm10-6h-8v2h8v-2zm0-4h-8v2h8V7zm0 8h-8v2h8v-2z"/>
                </svg>
            </div>
            <div>
                <h2 style="font-size:15px;font-weight:600;color:#fff;margin:0;">Generación de Reportes</h2>
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin:0;">Genera y exporta reportes del inventario del laboratorio</p>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <style>
        .rep-page { background:#eef2f9; background-image:radial-gradient(ellipse at 20% 0%,rgba(91,163,245,.12) 0%,transparent 60%),radial-gradient(ellipse at 80% 100%,rgba(12,45,107,.07) 0%,transparent 50%); padding:2rem 0 3rem; min-height:100vh; }

        .rep-layout { display:grid; grid-template-columns:1fr 1.4fr; gap:20px; align-items:start; }
        @media(max-width:900px){ .rep-layout{ grid-template-columns:1fr; } }

        /* Form card */
        .form-card { background:#fff; border-radius:12px; border:0.5px solid #d8e2ef; overflow:hidden; }
        .form-card-head { padding:1.25rem 1.5rem; border-bottom:0.5px solid #e8eef6; display:flex; align-items:center; gap:8px; }
        .form-card-title { font-size:14px; font-weight:700; color:#0c2d6b; }
        .form-card-body { padding:1.5rem; }

        .form-group { margin-bottom:1.25rem; }
        .form-label { font-size:11px; font-weight:700; color:#6b7fa3; text-transform:uppercase; letter-spacing:.06em; margin-bottom:8px; display:block; }

        /* Option cards */
        .option-grid { display:grid; grid-template-columns:1fr 1fr; gap:8px; }
        .option-card { border:0.5px solid #d8e2ef; border-radius:8px; padding:10px 12px; cursor:pointer; transition:all .15s; display:flex; align-items:center; gap:8px; background:#f8fafd; }
        .option-card:hover { border-color:#185fa5; background:#f0f7ff; }
        .option-card.selected { border-color:#185fa5; background:#e6f1fb; }
        .option-card input[type=radio] { display:none; }
        .option-icon { width:32px; height:32px; border-radius:7px; display:flex; align-items:center; justify-content:center; font-size:15px; flex-shrink:0; }
        .oi-stock     { background:#e6f1fb; }
        .oi-prestamos { background:#eaf3de; }
        .oi-reactivos { background:#faeeda; }
        .oi-equipos   { background:#f0eafb; }
        .option-text { font-size:12px; font-weight:600; color:#2d4a7a; line-height:1.2; }
        .option-sub  { font-size:10px; color:#94a3b8; margin-top:1px; }

        /* Period pills */
        .period-pills { display:flex; gap:8px; }
        .period-pill { flex:1; border:0.5px solid #d8e2ef; border-radius:8px; padding:9px; cursor:pointer; text-align:center; font-size:12px; font-weight:600; color:#6b7fa3; background:#f8fafd; transition:all .15s; }
        .period-pill:hover { border-color:#185fa5; color:#185fa5; background:#f0f7ff; }
        .period-pill.selected { border-color:#185fa5; background:#e6f1fb; color:#185fa5; }
        .period-pill input[type=radio] { display:none; }

        .btn-generar { width:100%; background:linear-gradient(135deg,#0c2d6b,#1a4a9e); color:#fff; border:none; border-radius:8px; padding:12px; font-size:13px; font-weight:700; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px; transition:opacity .15s; box-shadow:0 4px 12px rgba(12,45,107,.2); margin-top:1.5rem; }
        .btn-generar:hover { opacity:.88; }
        .btn-limpiar { width:100%; background:#f0f4f9; color:#6b7fa3; border:0.5px solid #d8e2ef; border-radius:8px; padding:10px; font-size:12px; font-weight:600; cursor:pointer; text-align:center; text-decoration:none; display:flex; align-items:center; justify-content:center; gap:6px; margin-top:8px; transition:opacity .15s; }
        .btn-limpiar:hover { opacity:.85; }

        /* Info cards */
        .info-section { display:flex; flex-direction:column; gap:16px; }
        .info-card { background:#fff; border-radius:12px; border:0.5px solid #d8e2ef; padding:1.25rem 1.5rem; }
        .info-card-title { font-size:13px; font-weight:700; color:#0c2d6b; margin-bottom:12px; display:flex; align-items:center; gap:7px; }
        .info-item { display:flex; align-items:flex-start; gap:10px; padding:8px 0; border-bottom:0.5px solid #f0f4f9; }
        .info-item:last-child { border-bottom:none; }
        .info-item-icon { width:30px; height:30px; border-radius:7px; display:flex; align-items:center; justify-content:center; font-size:14px; flex-shrink:0; }
        .info-item-text { font-size:12px; color:#2d4a7a; }
        .info-item-label { font-size:11px; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:.05em; margin-bottom:2px; }

        .tip-card { background:linear-gradient(135deg,#0c2d6b,#1a4a9e); border-radius:12px; padding:1.25rem 1.5rem; }
        .tip-title { font-size:13px; font-weight:700; color:#fff; margin-bottom:10px; }
        .tip-item { font-size:12px; color:rgba(255,255,255,0.8); padding:4px 0; display:flex; align-items:center; gap:6px; }
    </style>

    <div class="rep-page">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="rep-layout">

                
                <div class="form-card">
                    <div class="form-card-head">
                        <svg style="width:16px;height:16px;color:#185fa5;" fill="none" stroke="#185fa5" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                        <span class="form-card-title">Configurar reporte</span>
                    </div>
                    <div class="form-card-body">
                        <form id="formReporte">

                            
                            <div class="form-group">
                                <label class="form-label">Tipo de informe</label>
                                <div class="option-grid">
                                    <label class="option-card" id="card-stock">
                                        <input type="radio" name="tipo" value="stock" onchange="selectOption(this)"/>
                                        <div class="option-icon oi-stock">📦</div>
                                        <div>
                                            <div class="option-text">Stock actual</div>
                                            <div class="option-sub">Inventario y niveles</div>
                                        </div>
                                    </label>
                                    <label class="option-card" id="card-prestamos">
                                        <input type="radio" name="tipo" value="prestamos" onchange="selectOption(this)"/>
                                        <div class="option-icon oi-prestamos">🕓</div>
                                        <div>
                                            <div class="option-text">Préstamos</div>
                                            <div class="option-sub">Historial de uso</div>
                                        </div>
                                    </label>
                                    <label class="option-card" id="card-consumo_reactivos">
                                        <input type="radio" name="tipo" value="consumo_reactivos" onchange="selectOption(this)"/>
                                        <div class="option-icon oi-reactivos">⚗️</div>
                                        <div>
                                            <div class="option-text">Reactivos</div>
                                            <div class="option-sub">Consumo por periodo</div>
                                        </div>
                                    </label>
                                    <label class="option-card" id="card-equipos_usados">
                                        <input type="radio" name="tipo" value="equipos_usados" onchange="selectOption(this)"/>
                                        <div class="option-icon oi-equipos">🔬</div>
                                        <div>
                                            <div class="option-text">Equipos</div>
                                            <div class="option-sub">Más utilizados</div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="form-label">Periodo</label>
                                <div class="period-pills">
                                    <label class="period-pill" id="pill-diario">
                                        <input type="radio" name="periodo" value="diario" onchange="selectPeriod(this)"/>
                                        📅 Diario
                                    </label>
                                    <label class="period-pill" id="pill-semanal">
                                        <input type="radio" name="periodo" value="semanal" onchange="selectPeriod(this)"/>
                                        🗓️ Semanal
                                    </label>
                                    <label class="period-pill" id="pill-mensual">
                                        <input type="radio" name="periodo" value="mensual" onchange="selectPeriod(this)"/>
                                        📈 Mensual
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn-generar">
                                <svg style="width:15px;height:15px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v2H5a2 2 0 01-2-2V7a2 2 0 012-2h4v2H5v10h4zm10-6h-8v2h8v-2zm0-4h-8v2h8V7zm0 8h-8v2h8v-2z"/>
                                </svg>
                                Generar informe
                            </button>
                            <a href="<?php echo e(route('admin.reportes.formulario')); ?>" class="btn-limpiar">
                                <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Limpiar selección
                            </a>
                        </form>
                    </div>
                </div>

                
                <div class="info-section">
                    <div class="info-card">
                        <div class="info-card-title">
                            <svg style="width:15px;height:15px;" fill="none" stroke="#185fa5" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tipos de reporte disponibles
                        </div>
                        <div class="info-item">
                            <div class="info-item-icon oi-stock">📦</div>
                            <div>
                                <div class="info-item-label">Stock actual</div>
                                <div class="info-item-text">Muestra el inventario completo con niveles de stock, ítems bajo umbral y frecuencia de reabastecimiento.</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-item-icon oi-prestamos">🕓</div>
                            <div>
                                <div class="info-item-label">Historial de préstamos</div>
                                <div class="info-item-text">Lista los ítems más solicitados, usuarios más activos y tendencias de uso en el periodo seleccionado.</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-item-icon oi-reactivos">⚗️</div>
                            <div>
                                <div class="info-item-label">Consumo de reactivos</div>
                                <div class="info-item-text">Analiza el consumo específico de reactivos de laboratorio y su tendencia de uso.</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-item-icon oi-equipos">🔬</div>
                            <div>
                                <div class="info-item-label">Equipos más utilizados</div>
                                <div class="info-item-text">Ranking de equipos con mayor número de préstamos para planificar mantenimiento.</div>
                            </div>
                        </div>
                    </div>

                    <div class="tip-card">
                        <div class="tip-title">💡 Recomendaciones</div>
                        <div class="tip-item">✓ Usa el periodo <strong>mensual</strong> para planificar compras</div>
                        <div class="tip-item">✓ El reporte de <strong>stock</strong> incluye alertas de reabastecimiento</div>
                        <div class="tip-item">✓ Exporta en <strong>PDF</strong> para compartir con directivos</div>
                        <div class="tip-item">✓ Revisa <strong>equipos usados</strong> antes de programar mantenimiento</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function selectOption(radio) {
            document.querySelectorAll('.option-card').forEach(c => c.classList.remove('selected'));
            document.getElementById('card-' + radio.value).classList.add('selected');
        }

        function selectPeriod(radio) {
            document.querySelectorAll('.period-pill').forEach(p => p.classList.remove('selected'));
            document.getElementById('pill-' + radio.value).classList.add('selected');
        }

        document.getElementById('formReporte').addEventListener('submit', function(e) {
            e.preventDefault();
            const tipo    = document.querySelector('input[name="tipo"]:checked');
            const periodo = document.querySelector('input[name="periodo"]:checked');

            if (!tipo || !periodo) {
                alert('Por favor selecciona el tipo de informe y el periodo.');
                return;
            }
            window.location.href = `/admin/reportes/generar/${tipo.value}/${periodo.value}`;
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
<?php endif; ?><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/admin/reportes/formulario.blade.php ENDPATH**/ ?>