<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registre-se</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <fieldset>
                                <div class="form-group<?php echo e($errors->has('tipo') ? ' has-error' : ''); ?>">
                                        <select class="form-control" name="tipo">
                                            <option value="">TIPO DE USUÁRIO...</option>
                                            <?php $__currentLoopData = $tipo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo e($tp->id); ?>"><?php echo e($tp->tipo); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                        <?php if($errors->has('tipo')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('tipo')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                        <input placeholder="NOME" id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                        <input placeholder="E-MAIL" id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                        <input placeholder="SENHA" id="password" type="password" class="form-control" name="password" required>

                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                        <input placeholder="CONFIRME A SENHA" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </fieldset>

                            <fieldset>
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                                        Registrar
                                    </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>