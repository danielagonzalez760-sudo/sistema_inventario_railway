<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['align' => 'right', 'width' => '48', 'contentClasses' => '']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['align' => 'right', 'width' => '48', 'contentClasses' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top' => 'origin-top',
    default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};
?>

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        <?php echo e($trigger); ?>

    </div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute z-50 mt-2 <?php echo e($alignmentClasses); ?>"
         style="display:none;min-width:220px;"
         @click="open = false">

        
        <div style="
            background:#fff;
            border-radius:12px;
            border:0.5px solid #d8e2ef;
            box-shadow:0 8px 24px rgba(12,45,107,0.12), 0 2px 6px rgba(0,0,0,0.06);
            overflow:hidden;
        ">
            
            <div style="
                padding:14px 16px 12px;
                background:linear-gradient(135deg,#0c2d6b 0%,#1a4a9e 100%);
                display:flex;
                align-items:center;
                gap:10px;
            ">
                <div style="
                    width:36px;height:36px;border-radius:50%;
                    background:#5ba3f5;
                    display:flex;align-items:center;justify-content:center;
                    font-size:14px;font-weight:700;color:#0c2d6b;
                    flex-shrink:0;
                ">
                    <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                </div>
                <div>
                    <div style="font-size:13px;font-weight:600;color:#fff;line-height:1.2;"><?php echo e(Auth::user()->name); ?></div>
                    <div style="font-size:11px;color:rgba(255,255,255,0.55);margin-top:1px;"><?php echo e(Auth::user()->email); ?></div>
                </div>
            </div>

            
            <div style="height:0.5px;background:#e8eef6;"></div>

            
            <div style="padding:6px 0;">
                <?php echo e($content); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Mauricio\Documents\GitHub\sistema_inventario_laboratorio2\resources\views/components/dropdown.blade.php ENDPATH**/ ?>