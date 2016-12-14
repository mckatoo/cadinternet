<?php $__env->startSection('content'); ?>
<div id="page-wrapper" class="conteudo">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        Cadastros de <?php echo e($titulo); ?>

                    </h4>
                    <div class="pull-right painel-com-botao">
                        <button type="button" data-toggle="modal" data-target="#novo" class="btn btn-primary" id="btnNovo">
                            <i class="fa fa-plus"></i> Novo Cadastro
                        </button>
                    </div>
                </div>
                <?php if(isset($mensagem)): ?>
                    <div class="alert alert-success"><?php echo e($mensagem); ?></div>
                <?php endif; ?>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>RA RE Funcional</th>
                                <th>Campus</th>
                                <th>Status</th>
                                <th>Cadastrado em</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $requisicoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="odd gradeX">
                                    <td class="centro-esquerda"><?php echo e($req->nome); ?></td>
                                    <td class="centro-esquerda"><?php echo e($req->rarefunc); ?></td>
                                    <td class="centro-total"><?php echo e($req->campus->campus); ?></td>
                                    <td class="centro-total">
                                        <?php if($req->status->status == 'OK'): ?>
                                            <button class="btn btn-primary btn-social-icon" title="Já foi cadastrado!">
                                                <i class="fa fa-thumbs-up"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if($req->status->status == 'CADASTRANDO'): ?>
                                            <button class="btn btn-warning btn-social-icon" title="Estamos cadastrando...">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if($req->status->status == 'PENDENTE'): ?>
                                            <button class="btn btn-danger btn-social-icon" title="Está pendente. Aguarde...">
                                                <i class="fa fa-thumbs-down"></i>
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                    <td class="centro-total"><?php echo e(date('d/m/Y H:i', strtotime($req->created_at))); ?></td>
                                    <td class="centro-total">
                                        <?php if($req->status->status == 'PENDENTE'): ?>
                                            <a href="#" class="btn btn-xs btn-primary">
                                                <i class="fa fa-save"></i> Cadastrar
                                        <?php endif; ?>
                                        <?php if($req->status->status == 'CADASTRANDO'): ?>
                                            <a href="#" class="btn btn-xs btn-success disabled">
                                                <i class="fa fa-save"></i> Cadastrar
                                        <?php endif; ?>
                                        <?php if($req->status->status == 'OK'): ?>
                                            <a href="#" class="btn btn-xs btn-success" id="btnEditar">
                                                <i class="fa fa-edit"></i> Editar
                                        <?php endif; ?>
                                        </a>
                                    </td>
                                    <td class="centro-total">
                                        <a class="btn btn-xs btn-danger">
                                            <i class="fa fa-recycle"></i> Apagar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    <?php echo e($requisicoes->render()); ?>

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div> <!-- panel-body -->
            </div> <!-- panel-default -->
        </div>
    </div>

    <div class="modal fade" id="novo" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="">Cadastrar <?php echo e($titulo); ?></h4>
                </div>
                <div class="modal-body">
                    <?php echo $__env->make('cadastros.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="modal-footer">
                    <button id="btnFechar" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button id="btnPreCadastro" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>