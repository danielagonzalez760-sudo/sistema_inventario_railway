<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f7; padding: 20px; }
        .card {
            background: #fff;
            border-left: 6px solid #0c2d6b;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 3px 6px rgba(0,0,0,0.1);
        }
        h1 { color: #0c2d6b; }
        p { font-size: 16px; line-height: 1.5; }
        .badge { display:inline-block; background:#faeeda; color:#854f0b; padding:3px 10px; border-radius:20px; font-size:13px; font-weight:600; }
        .footer { margin-top: 20px; font-size: 12px; color: #6c757d; }
    </style>
</head>
<body>
    <div class="card">
        <h1>🔔 Nueva Reserva Pendiente</h1>
        <p>Se ha registrado una nueva solicitud de reserva que requiere tu aprobación.</p>
        <p><strong>Usuario:</strong> <?php echo e($reserva->user->name); ?> (<?php echo e($reserva->user->email); ?>)</p>
        <p><strong>Ítem:</strong> <?php echo e($reserva->item->nombre); ?></p>
        <p><strong>Cantidad:</strong> <?php echo e($reserva->cantidad); ?></p>
        <p><strong>Motivo:</strong> <?php echo e($reserva->motivo); ?></p>
        <p><strong>Fecha de devolución prevista:</strong> <?php echo e($reserva->fecha_devolucion_prevista->format('d/m/Y')); ?></p>
        <p>Ingresa al sistema para aprobar o rechazar la solicitud.</p>
    </div>
    <div class="footer">
        📌 IUPB-LABS - Universidad Pascual Bravo
    </div>
</body>
</html><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/emails/reserva_solicitada.blade.php ENDPATH**/ ?>