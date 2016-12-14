<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Trocar sua Senha</h3>
                    </div>

                    <div class="panel-body">
                        <?php if(session('status')!==null): ?>
                            <div class="alert alert-success">
                                <a class="close" data-dismiss="alert">&times;</a>
                                <strong>Sucesso!</strong> <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(isset($erro)): ?>
                            <div class="alert alert-danger">
                                <a class="close" data-dismiss="alert">&times;</a>
                                <strong>Erro!</strong> <?php echo e($erro); ?>

                            </div>
                        <?php endif; ?>
                        <form role="form" method="POST" action="<?php echo e(url('/salva/reset')); ?>">
                            <fieldset>
                                <input type="hidden" name="_token" value="<?php echo e($token); ?>">
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <input placeholder="EMail" id="email" type="email" class="form-control" name="email" value="<?php echo e(isset($email) ? $email : old('email')); ?>" required autofocus>

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <input placeholder="Nova senha" id="password" type="password" class="form-control" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                    <input placeholder="Confirme a nova senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    <?php if($errors->has('password_confirmation')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
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