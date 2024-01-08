<?php $__env->startSection('step'); ?>
    <p class="pb-2 text-gray-800">
        Welcome to the installation wizard.
    </p>
    <p class="pb-3 text-gray-800">
        Before getting started, we need some information on the database.
        You will need to know the following items before proceeding.
    </p>
    <div class="px-3 pb-3 text-gray-800">
        <ol class="list-decimal list-inside">
            <li>Database host</li>
            <li>Database port</li>
            <li>Database name</li>
            <li>Database username</li>
            <li>Database password</li>
        </ol>
    </div>
    <p class="pb-3 text-gray-800">
        Most likely these items were supplied to you by your Web Host.
        If you don’t have this information, then you will need to contact them before you can continue.
    </p>
    <p class="pb-3 text-gray-800">
        Installer will insert this information inside a configuration file so your site can communicate with your database.
    </p>
    <?php if(config('installer.support_url')): ?>
        <p class="pb-4 text-gray-800">
            Need more help?
            <a class="text-blue-500 hover:underline" href="<?php echo e(config('installer.support_url')); ?>" target="_blank">Contact support</a>.
        </p>
    <?php endif; ?>
    <div class="flex justify-end">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'installer::components.link','data' => ['href' => route('LaravelWizardInstaller::install.server')]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('installer::link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('LaravelWizardInstaller::install.server'))]); ?>
            Next step
            <svg class="fill-current w-5 h-5 ml-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer::install', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sirt\resources\views/vendor/installer/steps/welcome.blade.php ENDPATH**/ ?>