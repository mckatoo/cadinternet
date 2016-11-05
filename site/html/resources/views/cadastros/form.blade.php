<form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label for="nome" class="col-sm-4 control-label">Nome Completo</label>
      <div class="col-sm-8">
          <input type="text" class="form-control" id="nome">
      </div>
    </div>
    <div class="form-group">
      <label for="rarefunc" class="col-sm-4 control-label">RA RE ou Funcional</label>
      <div class="col-sm-8">
          <input type="text" class="form-control" id="rarefunc">
      </div>
    </div>
    <div class="form-group">
      <label for="IP" class="col-sm-4 control-label">Endereço IP</label>
      <div class="col-sm-8">
          <input type="text" class="form-control" id="IP">
      </div>
    </div>
    <div class="form-group">
      <label for="MAC" class="col-sm-4 control-label">Endereço MAC</label>
      <div class="col-sm-8">
          <input type="text" class="form-control" id="MAC">
      </div>
    </div>
    <div class="form-group">
      <label for="campus" class="col-sm-4 control-label">Campus</label>
      <div class="col-sm-8">
          <select class="form-control" name="campus">
              <option value="">SELECIONE...</option>
              @foreach ($campus as $cp)
                  <option value="{{$cp->id}}">{{$cp->campus}}</option>
              @endforeach
          </select>
      </div>
    </div>
</form>
