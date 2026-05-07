<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f7; padding: 20px; }
        .card {
            background: #fff;
            border-left: 6px solid #e24b4a;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 3px 6px rgba(0,0,0,0.1);
        }
        h1 { color: #e24b4a; }
        p { font-size: 16px; line-height: 1.5; }
        .badge { display:inline-block; background:#fcebeb; color:#a32d2d; padding:3px 10px; border-radius:20px; font-size:13px; font-weight:600; }
        .footer { margin-top: 20px; font-size: 12px; color: #6c757d; }
    </style>
</head>
<body>
    <div class="card">
        <h1>⚠️ Alerta de Stock Bajo</h1>
        <p>El siguiente ítem ha alcanzado o está por debajo del umbral mínimo de stock:</p>
        <p><strong>Ítem:</strong> <?php echo e($item->nombre); ?></p>
        <p><strong>Cantidad actual:</strong> <span class="badge"><?php echo e($item->cantidad); ?></span></p>
        <p><strong>Umbral mínimo:</strong> <?php echo e($item->umbral_minimo); ?></p>
        <?php if($item->ubicacion): ?>
        <p><strong>Ubicación:</strong> <?php echo e($item->ubicacion); ?></p>
        <?php endif; ?>
        <?php if($item->proveedor): ?>
        <p><strong>Proveedor:</strong> <?php echo e($item->proveedor); ?></p>
        <?php endif; ?>
        <p>Por favor ingresa al sistema para reabastecer el inventario.</p>
    </div>
    <div class="footer">
        📌 Sistema de Inventario - Universidad Pascual Bravo
    </div>
</body>
</html><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/emails/stock_bajo.blade.php ENDPATH**/ ?>