<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(isset($erro)): ?>
        <h1 class="text-center"><?php echo e($erro); ?></h1>
		<div class="erro404"></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<script>
    setTimeout(function(){
      $('.alert').fadeOut();
      location.href="<?php echo e(url('/')); ?>";
    }, 9000);
</script>
<?php echo $__env->make('layouts.erro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>