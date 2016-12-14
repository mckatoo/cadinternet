<?php $__env->startSection('content'); ?>
<div id="page-wrapper" class="conteudo">
  <div class="row">
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-thumbs-up fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge contaOK"><?php echo e($conta['OK']); ?></div>
              <div>OK!</div>
            </div>
          </div>
        </div>
        <a id="ok" href="<?php echo e(route('cadastros.status', '3')); ?>">
          <div class="panel-footer">
            <span class="pull-left">Ver Detalhes</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-yellow">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-edit fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge contaOK"><?php echo e($conta['CADASTRANDO']); ?></div>
              <div>Cadastrando...</div>
            </div>
          </div>
        </div>
        <a id="cadastrando" href="<?php echo e(route('cadastros.status', '2')); ?>">
          <div class="panel-footer">
            <span class="pull-left">Ver Detalhes</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-red">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-thumbs-o-down fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge contaOK"><?php echo e($conta['PENDENTES']); ?></div>
              <div>Pendentes...</div>
            </div>
          </div>
        </div>
        <a id="pendente" href="<?php echo e(route('cadastros.status', '1')); ?>">
          <div class="panel-footer">
            <span class="pull-left">Ver Detalhes</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-green">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-list-alt fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge contaOK"><?php echo e($conta['TODOS']); ?></div>
              <div>Todos!</div>
            </div>
          </div>
        </div>
        <a id="todos" href="<?php echo e(route('cadastros.status')); ?>">
          <div class="panel-footer">
            <span class="pull-left">Ver Detalhes</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <input type="hidden" name="token" id="token" value="<?php echo e(csrf_token()); ?>">
  <?php if(isset($titulo)): ?>
  <input type="hidden" name="titulo" id="titulo" value="<?php echo e($titulo); ?>">
  <?php endif; ?>
  <div class="panel panel-default">
    <div class="panel-heading painel-com-botao">
      <div class="titulo-painel">
        <?php if(isset($titulo)): ?>
        <h5>
          <?php echo e($titulo); ?>

        </h5>
        <button type="button" data-toggle="modal" data-target="#form" class="btn btn-primary pull-right" id="btnNovo">
          <i class="fa fa-plus"></i> Novo Cadastro
        </button>
        <?php else: ?>
        Resultado da Pesquisa
        <?php endif; ?>
      </div>
    </div>
    <?php if($errors->any()): ?>
      <ul class="list-group">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <li class="alert alert-warning list-group-item"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </ul>
    <?php endif; ?>
    <?php if(session('mensagem')!==null): ?>
      <div class="alert alert-success"><?php echo e(session('mensagem')); ?></div>
    <?php endif; ?>
    
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Nome</th>
            <th>RA RE Funcional</th>
            <th>Campus</th>
            <th>Status</th>
            <th>Tipo</th>
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
            <td class="centro-total"><?php echo e($req->tipo->tipo); ?></td>
            <td class="centro-total"><?php echo e(date('d/m/Y H:i', strtotime($req->created_at))); ?></td>
            <td class="centro-total">
              <?php if($req->status->status == 'PENDENTE'): ?>
              <a href="#" class="btn btn-primary" id="btnAtivar" data-toggle="modal" data-target="#form" onclick="preencheForm(
                '<?php echo e(csrf_token()); ?>',
                '<?php echo e($req->id); ?>',
                '<?php echo e($req->nome); ?>',
                '<?php echo e($req->rarefunc); ?>',
                '<?php echo e($req->MAC); ?>',
                '<?php echo e($req->tipo->id); ?>',
                '<?php echo e($req->campus->id); ?>',
                'cadastros/atualizar')">
                <i class="fa fa-save"></i> Ativar
                <?php endif; ?>
                <?php if($req->status->status == 'CADASTRANDO'): ?>
                <a href="#" class="btn btn-success disabled">
                  <i class="fa fa-save"></i> Ativar
                  <?php endif; ?>
                  <?php if($req->status->status == 'OK'): ?>
                  <a href="#" class="btn btn-success">
                    <i class="fa fa-edit"></i> Editar
                    <?php endif; ?>
                  </a>
                </td>
                <td class="centro-total">
                  <form id="#formApagarRequisicao" action=" <?php echo e(route('cadastros.apagar')); ?> " method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($req->id); ?>">
                    <button href="#" class="btn btn btn-danger" id="btnApagarRequisicao">
                      <i class="fa fa-recycle"></i> Apagar
                    </button>
                  </form>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="8" class="text-center">
                  <?php echo e($requisicoes->render()); ?>

                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="">Cadastrar <?php echo e($titulo); ?></h4>
            </div>
            <div class="modal-body" include="titulo-painel">
              <?php echo $__env->make('../cadastros/form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            </div>
          </div>
        </div>
        <?php $__env->stopSection(); ?>
        
<?php echo $__env->make('layouts.adm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>