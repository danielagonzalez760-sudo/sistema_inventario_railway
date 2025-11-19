<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f7; padding: 20px; }
        .card {
            background: #fff;
            border-left: 6px solid #ef4444;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 3px 6px rgba(0,0,0,0.1);
        }
        h1 { color: #ef4444; }
        p { font-size: 16px; line-height: 1.5; }
        .footer { margin-top: 20px; font-size: 12px; color: #6c757d; }
    </style>
</head>
<body>
    <div class="card">
        <h1>❌ Reserva Rechazada</h1>
        <p>Hola <?php echo e($reserva->user->name); ?>!</p>
        <p>Tu reserva del ítem <strong><?php echo e($reserva->item->nombre); ?></strong> ha sido <strong>rechazada</strong> por el administrador.</p>
        <p><strong>Cantidad:</strong> <?php echo e($reserva->cantidad); ?></p>
        <p><strong>Fecha de devolución prevista:</strong> <?php echo e($reserva->fecha_devolucion_prevista->format('d/m/Y')); ?></p>
        <p>Si tienes dudas, por favor contacta al administrador.</p>
    </div>

    <div class="footer">
        📌 Sistema de Inventario - Universidad Pascual Bravo
    </div>
</body>
</html><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio\resources\views/emails/reserva_rechazada.blade.php ENDPATH**/ ?>