<form class="form-horizontal" id="formCadastros" action="" method="post">
  {{csrf_field()}}
  <input type="hidden" name="id" id="id" value="">
  <div class="form-group">
    <label for="nome" class="col-sm-4 control-label">Nome Completo</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="nome" name="nome" autofocus>
    </div>
  </div>

  <div class="form-group">
    <label for="rarefunc" class="col-sm-4 control-label">RA RE ou Funcional</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="rarefunc" name="rarefunc">
    </div>
  </div>

  <div class="form-group hidden" id="grupoIP">
    <label for="IP" class="col-sm-4 control-label">Endereço IP</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="IP" name="IP">
    </div>
  </div>

  <div class="form-group">
    <label for="MAC" class="col-sm-4 control-label">Endereço MAC</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="MAC" name="MAC">
    </div>
  </div>

  <div class="form-group">
    <label for="tipo" class="col-sm-4 control-label">Tipo</label>
    <div class="col-sm-8">
        <select class="form-control" name="tipo" id="tipo">
            <option value="">SELECIONE...</option>
            @foreach ($tipo as $tp)
                <option value="{{$tp->id}}">{{$tp->tipo}}</option>
            @endforeach
        </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="campus" class="col-sm-4 control-label">Campus</label>
    <div class="col-sm-8">
        <select class="form-control" name="campus" id="campus">
            <option value="">SELECIONE...</option>
            @foreach ($campus as $cp)
                <option value="{{$cp->id}}">{{$cp->campus}}</option>
            @endforeach
        </select>
    </div>
  </div>

  <div class="modal-footer">
    <a href="" id="btnFechar" class="btn btn-default" onclick="fechar">Fechar</a>
    <button type="submit" id="btnPreCadastro" class="btn btn-primary">Cadastrar</button>
  </div>
</form>