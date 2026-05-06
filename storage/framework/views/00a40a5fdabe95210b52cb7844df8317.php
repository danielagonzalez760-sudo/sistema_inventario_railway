<a <?php echo e($attributes->merge([
    'style' => 'display:flex;align-items:center;gap:10px;padding:9px 16px;font-size:13px;color:#2d4a7a;text-decoration:none;transition:background .15s;cursor:pointer;'
])); ?>

   onmouseover="this.style.background='#f5f8fc'"
   onmouseout="this.style.background='transparent'"
>
    <?php echo e($slot); ?>

</a><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/components/dropdown-link.blade.php ENDPATH**/ ?>