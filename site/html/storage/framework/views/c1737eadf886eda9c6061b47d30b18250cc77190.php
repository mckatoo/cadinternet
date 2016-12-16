<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Recuperação de Senha</h3>
                </div>
                <div class="panel-body">
                    <?php if(isset($erro)): ?>
                        <div class="alert alert-danger">
                            <a class="close" data-dismiss="alert">&times;</a>
                            <strong><?php echo e($erro); ?></strong> 
                        </div>
                    <?php endif; ?>
                    <form role="form" method="POST" action="<?php echo e(url('enviar/reset')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <fieldset>
                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <input id="email" placeholder="SEU ENDEREÇO DE EMAIL" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Enviar link para recuperar senha
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script>
    setTimeout(function(){
      $('.alert').fadeOut();
    }, 3000);
</script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>