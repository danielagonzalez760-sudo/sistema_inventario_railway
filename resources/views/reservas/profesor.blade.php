<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3 px-2 py-1">
            <div style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.15);border:1.5px solid rgba(255,255,255,0.4);display:flex;align-items:center;justify-content:center;">
                📚
            </div>

            <div>
                <h2 style="font-size:15px;font-weight:600;color:#fff;margin:0;">
                    Ítems Disponibles Docente
                </h2>

                <p style="font-size:11px;color:rgba(255,255,255,0.6);margin:0;">
                    Reserva materiales para tus clases y laboratorios
                </p>
            </div>
        </div>
    </x-slot>

    <style>
        .est-items-page {
            background:#eef2f9;
            padding:2rem 0 3rem;
            min-height:100vh;
        }

        .items-grid {
            display:grid;
            grid-template-columns:repeat(auto-fill,minmax(300px,1fr));
            gap:16px;
        }

        .item-card {
            background:#fff;
            border-radius:12px;
            border:0.5px solid #d8e2ef;
            overflow:hidden;
            transition:.2s;
        }

        .item-card:hover {
            box-shadow:0 8px 24px rgba(12,45,107,.1);
            transform:translateY(-2px);
        }

        .card-bar {
            height:4px;
            width:100%;
        }

        .bar-equipos { background:linear-gradient(90deg,#185fa5,#5ba3f5); }
        .bar-reactivos { background:linear-gradient(90deg,#3b6d11,#7ec843); }
        .bar-materiales { background:linear-gradient(90deg,#854f0b,#f5a623); }

        .card-head {
            padding:14px 16px 10px;
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
        }

        .card-name {
            font-size:15px;
            font-weight:700;
            color:#0c2d6b;
        }

        .cat-badge {
            padding:3px 10px;
            border-radius:20px;
            font-size:10px;
            font-weight:700;
            text-transform:uppercase;
        }

        .cat-equipos {
            background:#e6f1fb;
            color:#185fa5;
        }

        .cat-reactivos {
            background:#eaf3de;
            color:#3b6d11;
        }

        .cat-materiales {
            background:#faeeda;
            color:#854f0b;
        }

        .card-info {
            padding:0 16px 12px;
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:8px;
        }

        .info-item {
            background:#f8fafd;
            border-radius:7px;
            padding:7px 10px;
        }

        .info-label {
            font-size:10px;
            color:#94a3b8;
            text-transform:uppercase;
        }

        .stock-value {
            font-size:20px;
            font-weight:700;
            color:#0c2d6b;
        }

        .info-value {
            font-size:13px;
            color:#2d4a7a;
        }

        .card-form {
            padding:12px 16px 14px;
            border-top:0.5px solid #f0f4f9;
        }

        .form-input {
            width:100%;
            border:0.5px solid #d8e2ef;
            border-radius:7px;
            padding:8px 12px;
            font-size:13px;
            margin-bottom:10px;
            background:#f8fafd;
        }

        .btn-reservar {
            width:100%;
            background:linear-gradient(135deg,#0c2d6b,#1a4a9e);
            color:#fff;
            border:none;
            border-radius:8px;
            padding:10px;
            font-size:13px;
            font-weight:600;
            cursor:pointer;
            transition:.2s;
        }

        .btn-reservar:hover {
            opacity:.9;
        }
    </style>

    <div class="est-items-page">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="items-grid">

                @foreach($items as $item)

                    @php
                        $cat = strtolower($item->categoria);
                    @endphp

                    <div class="item-card">

                        <div class="card-bar bar-{{ $cat }}"></div>

                        <div class="card-head">

                            <div>
                                <div class="card-name">
                                    {{ $item->nombre }}
                                </div>
                            </div>

                            <span class="cat-badge cat-{{ $cat }}">
                                {{ $item->categoria }}
                            </span>

                        </div>

                        <div class="card-info">

                            <div class="info-item">
                                <div class="info-label">Disponibles</div>

                                <div class="stock-value">
                                    {{ $item->cantidad }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Ubicación</div>

                                <div class="info-value">
                                    {{ $item->ubicacion }}
                                </div>
                            </div>

                        </div>

                        {{-- FORMULARIO DOCENTE --}}
                        <div class="card-form">

                            <form action="{{ route('reservas.profesor_store', $item->id) }}" method="POST">
                                @csrf

                                <label style="font-size:12px;font-weight:600;color:#6b7fa3;">
                                    Cantidad a reservar
                                </label>

                                <input
                                    type="number"
                                    name="cantidad"
                                    min="1"
                                    max="{{ $item->cantidad }}"
                                    value="1"
                                    required
                                    class="form-input"
                                >

                                <button type="submit" class="btn-reservar">
                                    Reservar material
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>