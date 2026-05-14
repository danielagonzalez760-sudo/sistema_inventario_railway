<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Reporte {{ ucfirst($tipo) }}</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            font-family: Arial, sans-serif;
            background:#fff;
            color:#2d4a7a;
            font-size:12px;
            line-height:1.5;
        }

        /* Header institucional */
        .header {
            background:linear-gradient(135deg, #0c2d6b 0%, #1a4a9e 100%);
            padding:28px 35px 22px;
            color:#fff;
        }
        .header-top {
            display:flex;
            align-items:center;
            justify-content:space-between;
            margin-bottom:16px;
            border-bottom:1px solid rgba(255,255,255,0.2);
            padding-bottom:14px;
        }
        .inst-name {
            font-size:11px;
            font-weight:700;
            color:rgba(255,255,255,0.8);
            text-transform:uppercase;
            letter-spacing:0.08em;
        }
        .inst-sub {
            font-size:10px;
            color:rgba(255,255,255,0.55);
            margin-top:2px;
        }
        .report-badge {
            background:rgba(255,255,255,0.15);
            border:1px solid rgba(255,255,255,0.25);
            border-radius:6px;
            padding:5px 12px;
            font-size:10px;
            font-weight:700;
            color:#fff;
            text-transform:uppercase;
            letter-spacing:0.06em;
        }
        .header-title {
            font-size:22px;
            font-weight:700;
            color:#fff;
            margin-bottom:4px;
        }
        .header-sub {
            font-size:12px;
            color:rgba(255,255,255,0.65);
        }

        /* Meta pills */
        .meta-row {
            display:flex;
            gap:10px;
            margin-top:14px;
        }
        .meta-pill {
            background:rgba(255,255,255,0.12);
            border:1px solid rgba(255,255,255,0.2);
            border-radius:5px;
            padding:5px 12px;
            font-size:10px;
            color:#fff;
        }
        .meta-pill strong { color:rgba(255,255,255,0.9); }

        /* Body */
        .body { padding:24px 35px; }

        /* Summary cards */
        .summary-grid {
            display:table;
            width:100%;
            margin-bottom:24px;
            border-collapse:separate;
            border-spacing:10px;
        }
        .summary-row { display:table-row; }
        .summary-cell {
            display:table-cell;
            background:#f5f8fc;
            border:1px solid #d8e2ef;
            border-radius:8px;
            padding:12px 14px;
            width:33%;
            vertical-align:top;
        }
        .summary-label {
            font-size:9px;
            font-weight:700;
            color:#94a3b8;
            text-transform:uppercase;
            letter-spacing:0.07em;
            margin-bottom:4px;
        }
        .summary-value {
            font-size:18px;
            font-weight:700;
            color:#0c2d6b;
        }
        .summary-sub {
            font-size:10px;
            color:#94a3b8;
            margin-top:2px;
        }

        /* Sections */
        .section { margin-bottom:24px; }
        .section-title {
            font-size:13px;
            font-weight:700;
            color:#0c2d6b;
            padding-bottom:8px;
            border-bottom:2px solid #e8eef6;
            margin-bottom:14px;
            display:flex;
            align-items:center;
            gap:7px;
        }
        .section-dot {
            width:8px;
            height:8px;
            border-radius:50%;
            background:#185fa5;
            display:inline-block;
        }

        /* Item list */
        .item-list { width:100%; border-collapse:collapse; }
        .item-list tr { border-bottom:1px solid #f0f4f9; }
        .item-list tr:last-child { border-bottom:none; }
        .item-list td { padding:9px 12px; font-size:11px; }
        .item-num {
            width:28px;
            color:#94a3b8;
            font-weight:700;
            font-size:10px;
        }
        .item-name {
            color:#1e3a6e;
            font-weight:600;
        }
        .item-bar-cell { width:160px; }
        .item-bar-wrap {
            background:#f0f4f9;
            border-radius:99px;
            height:6px;
            overflow:hidden;
        }
        .item-bar-fill {
            height:100%;
            border-radius:99px;
            background:linear-gradient(90deg,#185fa5,#5ba3f5);
        }
        .item-badge {
            display:inline-block;
            padding:2px 8px;
            border-radius:99px;
            font-size:10px;
            font-weight:700;
            background:#e6f1fb;
            color:#185fa5;
        }

        /* Reabastecimiento table */
        .reab-table { width:100%; border-collapse:collapse; }
        .reab-table th {
            text-align:left;
            padding:8px 12px;
            font-size:9px;
            font-weight:700;
            color:#6b7fa3;
            text-transform:uppercase;
            letter-spacing:0.07em;
            background:#f5f8fc;
            border-bottom:1px solid #e8eef6;
        }
        .reab-table td {
            padding:9px 12px;
            font-size:11px;
            color:#2d4a7a;
            border-bottom:1px solid #f0f4f9;
        }
        .reab-table tr:last-child td { border-bottom:none; }
        .freq-badge {
            display:inline-block;
            padding:2px 8px;
            border-radius:99px;
            font-size:10px;
            font-weight:700;
        }
        .freq-semanal   { background:#eaf3de; color:#3b6d11; }
        .freq-mensual   { background:#e6f1fb; color:#185fa5; }
        .freq-trimestral{ background:#faeeda; color:#854f0b; }
        .freq-ocasional { background:#f1efe8; color:#5f5e5a; }
        .freq-sin       { background:#fcebeb; color:#a32d2d; }

        /* Tendencias */
        .tend-table { width:100%; border-collapse:collapse; }
        .tend-table th {
            text-align:left;
            padding:8px 12px;
            font-size:9px;
            font-weight:700;
            color:#6b7fa3;
            text-transform:uppercase;
            letter-spacing:0.07em;
            background:#f5f8fc;
            border-bottom:1px solid #e8eef6;
        }
        .tend-table td {
            padding:9px 12px;
            font-size:11px;
            color:#2d4a7a;
            border-bottom:1px solid #f0f4f9;
        }
        .tend-table tr:last-child td { border-bottom:none; }
        .qty-value { font-weight:700; color:#0c2d6b; font-size:13px; }

        /* Empty */
        .empty-msg {
            background:#f8fafd;
            border:1px solid #e8eef6;
            border-radius:7px;
            padding:14px 16px;
            font-size:11px;
            color:#94a3b8;
            font-style:italic;
            text-align:center;
        }

        /* Footer */
        .footer {
            background:#f5f8fc;
            border-top:1px solid #e8eef6;
            padding:14px 35px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-top:30px;
        }
        .footer-left { font-size:10px; color:#94a3b8; }
        .footer-right {
            font-size:10px;
            color:#185fa5;
            font-weight:700;
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <div class="header">
        <div class="header-top">
            <div>
                <div class="inst-name">Instituto Universitario Pascual Bravo</div>
                <div class="inst-sub">Sistema de Gestión de Inventario de Laboratorio · IUPB-LAB</div>
            </div>
            <div class="report-badge">Reporte Oficial</div>
        </div>
        <div class="header-title">
            Reporte de {{ ucwords(str_replace('_', ' ', strtolower($tipo))) }}
        </div>
        <div class="header-sub">Análisis de inventario y consumo del laboratorio institucional</div>
        <div class="meta-row">
            <div class="meta-pill"><strong>Periodo:</strong> {{ ucfirst($periodo) }}</div>
            <div class="meta-pill"><strong>Desde:</strong> {{ $estadisticas['fecha_inicio'] }}</div>
            <div class="meta-pill"><strong>Hasta:</strong> {{ $estadisticas['fecha_fin'] }}</div>
            <div class="meta-pill"><strong>Generado:</strong> {{ now()->format('d/m/Y H:i') }}</div>
        </div>
    </div>

    {{-- Body --}}
    <div class="body">

        {{-- Ítems más usados --}}
        <div class="section">
            <div class="section-title">
                <span class="section-dot"></span>
                Ítems más usados
            </div>
            @if($estadisticas['items_mas_usados']->isEmpty() ?? count($estadisticas['items_mas_usados']) === 0)
                <div class="empty-msg">No hay datos registrados en este periodo.</div>
            @else
                <table class="item-list">
                    @foreach($estadisticas['items_mas_usados'] as $index => $item)
                    <tr style="background:{{ $index % 2 === 0 ? '#fff' : '#f8fafd' }}">
                        <td class="item-num">{{ $index + 1 }}</td>
                        <td class="item-name">{{ $item }}</td>
                        <td class="item-bar-cell">
                            <div class="item-bar-wrap">
                                <div class="item-bar-fill" style="width:{{ max(15, 100 - ($index * 15)) }}%"></div>
                            </div>
                        </td>
                        <td style="text-align:right;">
                            <span class="item-badge">Top {{ $index + 1 }}</span>
                        </td>
                    </tr>
                    @endforeach
                </table>
            @endif
        </div>

        {{-- Frecuencia de reabastecimiento --}}
        @if(!empty($estadisticas['frecuencia_reabastecimiento']) && is_array($estadisticas['frecuencia_reabastecimiento']))
        <div class="section">
            <div class="section-title">
                <span class="section-dot" style="background:#3b6d11;"></span>
                Frecuencia de Reabastecimiento
            </div>
            <table class="reab-table">
                <thead>
                    <tr>
                        <th>Ítem</th>
                        <th>Frecuencia estimada</th>
                        <th>Recomendación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estadisticas['frecuencia_reabastecimiento'] as $item => $frecuencia)
                    <tr>
                        <td style="font-weight:600;color:#0c2d6b;">{{ $item }}</td>
                        <td>
                            @php
                                $freq = strtolower($frecuencia);
                                $cls = match(true) {
                                    str_contains($freq,'semanal')    => 'freq-semanal',
                                    str_contains($freq,'mensual')    => 'freq-mensual',
                                    str_contains($freq,'trimestral') => 'freq-trimestral',
                                    str_contains($freq,'ocasional')  => 'freq-ocasional',
                                    default                          => 'freq-sin',
                                };
                            @endphp
                            <span class="freq-badge {{ $cls }}">{{ ucfirst($frecuencia) }}</span>
                        </td>
                        <td style="color:#6b7fa3;font-size:10px;">
                            @if(str_contains($freq,'semanal'))
                                Revisar stock cada semana
                            @elseif(str_contains($freq,'mensual'))
                                Programar compra mensual
                            @elseif(str_contains($freq,'trimestral'))
                                Compra trimestral suficiente
                            @elseif(str_contains($freq,'sin'))
                                Recopilar más datos de uso
                            @else
                                Monitorear según demanda
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        {{-- Tendencias de consumo --}}
        <div class="section">
            <div class="section-title">
                <span class="section-dot" style="background:#854f0b;"></span>
                Tendencias de Consumo
            </div>
            @php
                $tendencias = is_string($estadisticas['tendencias_consumo'])
                    ? $estadisticas['tendencias_consumo']
                    : $estadisticas['tendencias_consumo'];
                $esTexto = is_string($tendencias);
            @endphp

            @if($esTexto)
                <div class="empty-msg">{{ $tendencias }}</div>
            @elseif(empty($tendencias) || count($tendencias) === 0)
                <div class="empty-msg">No hay datos de consumo para este periodo.</div>
            @else
                <table class="tend-table">
                    <thead>
                        <tr>
                            <th>
                                @if($periodo === 'diario') Fecha
                                @elseif($periodo === 'semanal') Año / Semana
                                @else Mes
                                @endif
                            </th>
                            <th>Cantidad consumida</th>
                            <th>Nivel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $maxConsumo = collect($tendencias)->max('total_consumido') ?: 1; @endphp
                        @foreach($tendencias as $registro)
                        @php
                            $total = $registro['total_consumido'] ?? $registro->total_consumido ?? 0;
                            $pct = round(($total / $maxConsumo) * 100);
                        @endphp
                        <tr>
                            <td style="color:#6b7fa3;">
                                @if($periodo === 'diario')
                                    {{ $registro['fecha'] ?? $registro->fecha ?? '-' }}
                                @elseif($periodo === 'semanal')
                                    Sem. {{ $registro['semana'] ?? $registro->semana ?? '-' }} / {{ $registro['anio'] ?? $registro->anio ?? '-' }}
                                    @isset($registro->rango_fechas)
                                        <br><span style="font-size:9px;color:#94a3b8;">{{ $registro->rango_fechas }}</span>
                                    @endisset
                                @else
                                    {{ $registro['mes'] ?? $registro->mes ?? '-' }}
                                @endif
                            </td>
                            <td><span class="qty-value">{{ $total }}</span> unidades</td>
                            <td style="width:120px;">
                                <div class="item-bar-wrap">
                                    <div class="item-bar-fill" style="width:{{ $pct }}%;background:linear-gradient(90deg,#854f0b,#f5a623);"></div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>

    {{-- Footer --}}
    <div class="footer">
        <div class="footer-left">
            Documento generado automáticamente por IUPB-LAB · {{ now()->format('d/m/Y H:i') }}<br>
            Instituto Universitario Pascual Bravo — Sistema de Inventario de Laboratorio
        </div>
        <div class="footer-right">IUPB-LAB</div>
    </div>

</body>
</html>