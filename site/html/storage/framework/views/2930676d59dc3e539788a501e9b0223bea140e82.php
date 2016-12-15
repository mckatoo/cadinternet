<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Identifique-se</h3>
                    </div>
                    <div class="panel-body">
                        <?php if(isset($sucesso)): ?>
                            <div class="alert alert-success">
                                <a class="close" data-dismiss="alert">&times;</a>
                                <strong>Sucesso!</strong> <?php echo e($sucesso); ?>

                            </div>
                        <?php endif; ?>
                        <form role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <fieldset>
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <input placeholder="E-Mail" id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input placeholder="Senha" id="password" type="password" class="form-control" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox">Lembre-me
                                    </label>
                                    <label class="pull-right">
                                        <a href="<?php echo e(url('/password/reset')); ?>">Redefinir minha senha.</a>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>
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