<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f7; padding: 20px; }
        .card {
            background: #fff;
            border-left: 6px solid #3b6d11;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 3px 6px rgba(0,0,0,0.1);
        }
        h1 { color: #3b6d11; }
        p { font-size: 16px; line-height: 1.5; }
        .badge { display:inline-block; background:#eaf3de; color:#3b6d11; padding:3px 10px; border-radius:20px; font-size:13px; font-weight:600; }
        .footer { margin-top: 20px; font-size: 12px; color: #6c757d; }
    </style>
</head>
<body>
    <div class="card">
        <h1>✅ Stock Reabastecido</h1>
        <p>El siguiente ítem ha sido reabastecido:</p>
        <p><strong>Ítem:</strong> <?php echo e($item); ?></p>
        <p><strong>Nueva cantidad:</strong> <span class="badge"><?php echo e($cantidad); ?></span></p>
        <p>No se requiere ninguna acción adicional.</p>
    </div>
    <div class="footer">
        📌 Sistema de Inventario - Universidad Pascual Bravo
    </div>
</body>
</html><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/emails/stock_reabastecido.blade.php ENDPATH**/ ?>