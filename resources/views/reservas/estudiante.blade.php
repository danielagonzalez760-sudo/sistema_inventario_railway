<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3 px-2 py-1">
            <div style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.15);border:1.5px solid rgba(255,255,255,0.4);display:flex;align-items:center;justify-content:center;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:18px;height:18px;" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/>
                </svg>
            </div>
            <div>
                <h2 style="font-size:15px;font-weight:600;color:#fff;margin:0;">Ítems Disponibles</h2>
                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin:0;">Selecciona un ítem para realizar tu solicitud de préstamo</p>
            </div>
        </div>
    </x-slot>

    <style>
        .est-items-page { background:#eef2f9; background-image:radial-gradient(ellipse at 20% 0%,rgba(91,163,245,.12) 0%,transparent 60%),radial-gradient(ellipse at 80% 100%,rgba(12,45,107,.07) 0%,transparent 50%); padding:2rem 0 3rem; min-height:100vh; }

        .flash-success { background:#eaf3de; border:0.5px solid #7ec843; color:#3b6d11; padding:10px 16px; border-radius:8px; font-size:13px; font-weight:500; margin-bottom:1rem; display:flex; align-items:center; gap:8px; }
        .flash-error   { background:#fcebeb; border:0.5px solid #f7c1c1; color:#a32d2d; padding:10px 16px; border-radius:8px; font-size:13px; font-weight:500; margin-bottom:1rem; display:flex; align-items:center; gap:8px; }

        /* Grid de cards */
        .items-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:16px; }

        /* Item card */
        .item-card { background:#fff; border-radius:12px; border:0.5px solid #d8e2ef; overflow:hidden; transition:box-shadow .2s, transform .2s; }
        .item-card:hover { box-shadow:0 8px 24px rgba(12,45,107,.1); transform:translateY(-2px); }

        /* Barra top por categoría */
        .card-bar { height:4px; width:100%; }
        .bar-equipos   { background:linear-gradient(90deg,#185fa5,#5ba3f5); }
        .bar-reactivos { background:linear-gradient(90deg,#3b6d11,#7ec843); }
        .bar-materiales{ background:linear-gradient(90deg,#854f0b,#f5a623); }
        .bar-default   { background:linear-gradient(90deg,#6b7fa3,#94a3b8); }

        .card-head { padding:14px 16px 10px; display:flex; align-items:flex-start; justify-content:space-between; gap:10px; }
        .card-icon { width:42px; height:42px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:18px; flex-shrink:0; }
        .ci-equipos   { background:#e6f1fb; }
        .ci-reactivos { background:#eaf3de; }
        .ci-materiales{ background:#faeeda; }
        .ci-default   { background:#f0f4f9; }
        .card-name { font-size:15px; font-weight:700; color:#0c2d6b; line-height:1.2; }
        .cat-badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:.06em; flex-shrink:0; }
        .cat-equipos   { background:#e6f1fb; color:#185fa5; }
        .cat-reactivos { background:#eaf3de; color:#3b6d11; }
        .cat-materiales{ background:#faeeda; color:#854f0b; }
        .cat-default   { background:#f0f4f9; color:#6b7fa3; }

        .card-info { padding:0 16px 12px; display:grid; grid-template-columns:1fr 1fr; gap:8px; }
        .info-item { background:#f8fafd; border-radius:7px; padding:7px 10px; }
        .info-label { font-size:10px; font-weight:600; color:#94a3b8; text-transform:uppercase; letter-spacing:.05em; margin-bottom:2px; }
        .info-value { font-size:13px; color:#2d4a7a; font-weight:500; }
        .stock-value { font-size:20px; font-weight:700; color:#0c2d6b; }

        /* Formulario de reserva */
        .card-form { padding:12px 16px 14px; border-top:0.5px solid #f0f4f9; }
        .form-label { font-size:11px; font-weight:600; color:#6b7fa3; text-transform:uppercase; letter-spacing:.05em; margin-bottom:4px; display:block; }
        .form-input { width:100%; border:0.5px solid #d8e2ef; border-radius:7px; padding:8px 12px; font-size:13px; color:#2d4a7a; background:#f8fafd; outline:none; transition:border .15s; margin-bottom:8px; box-sizing:border-box; }
        .form-input:focus { border-color:#185fa5; background:#fff; }
        .form-textarea { width:100%; border:0.5px solid #d8e2ef; border-radius:7px; padding:8px 12px; font-size:13px; color:#2d4a7a; background:#f8fafd; outline:none; transition:border .15s; resize:vertical; min-height:70px; box-sizing:border-box; margin-bottom:10px; }
        .form-textarea:focus { border-color:#185fa5; background:#fff; }
        .form-textarea::placeholder, .form-input::placeholder { color:#94a3b8; }

        .btn-reservar { width:100%; background:linear-gradient(135deg,#0c2d6b,#1a4a9e); color:#fff; border:none; border-radius:8px; padding:10px; font-size:13px; font-weight:600; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:6px; transition:opacity .15s; box-shadow:0 4px 12px rgba(12,45,107,.2); }
        .btn-reservar:hover { opacity:.88; }

        .empty-state { background:#fff; border-radius:12px; border:0.5px solid #d8e2ef; padding:4rem; text-align:center; color:#94a3b8; font-size:13px; }

        .page-title { font-size:13px; font-weight:600; color:#6b7fa3; margin-bottom:1.5rem; }

        @if($errors->any())
        .error-list { background:#fcebeb; border:0.5px solid #f7c1c1; color:#a32d2d; padding:10px 16px; border-radius:8px; font-size:13px; margin-bottom:1rem; }
        @endif
    </style>

    <div class="est-items-page">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="flash-success">✅ {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="flash-error">❌ {{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="error-list">
                    @foreach($errors->all() as $error)
                        <div>⚠️ {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="page-title">{{ $items->count() }} ítem{{ $items->count() !== 1 ? 's' : '' }} disponibles</div>

            @if($items->isEmpty())
                <div class="empty-state">
                    <div style="font-size:36px;margin-bottom:12px;">📦</div>
                    No hay ítems disponibles en este momento.
                </div>
            @else
                <div class="items-grid">
                    @foreach($items as $item)
                        @php
                            $cat = strtolower($item->categoria);
                            $icons = ['equipos'=>'🔧','reactivos'=>'🧪','materiales'=>'📦'];
                            $icon = $icons[$cat] ?? '📋';
                        @endphp
                        <div class="item-card">
                            <div class="card-bar bar-{{ $cat }} {{ !in_array($cat,['equipos','reactivos','materiales']) ? 'bar-default' : '' }}"></div>

                            <div class="card-head">
                                <div style="display:flex;gap:10px;align-items:flex-start;flex:1;min-width:0;">
                                    <div class="card-icon ci-{{ $cat }}">{{ $icon }}</div>
                                    <div style="min-width:0;">
                                        <div class="card-name">{{ $item->nombre }}</div>
                                    </div>
                                </div>
                                <span class="cat-badge cat-{{ $cat }}">{{ $item->categoria }}</span>
                            </div>

                            <div class="card-info">
                                <div class="info-item">
                                    <div class="info-label">Disponibles</div>
                                    <div class="stock-value">{{ $item->cantidad }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Ubicación</div>
                                    <div class="info-value">{{ $item->ubicacion ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="card-form">
                                <form action="{{ route('reservas.store', $item->id) }}" method="POST">
                                    @csrf
                                    <label class="form-label">Fecha de devolución</label>
                                    <input type="date" name="fecha_devolucion_prevista" required class="form-input"
                                    min="{{ date('Y-m-d') }}"
                                    max="{{ date('Y-m-d', strtotime('+1 day')) }}"/>

                                    <label class="form-label">Motivo del préstamo</label>
                                    <textarea name="motivo" required class="form-textarea"
                                        placeholder="Describe el motivo de tu solicitud..."></textarea>

                                    <button type="submit" class="btn-reservar">
                                        <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Solicitar préstamo
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>