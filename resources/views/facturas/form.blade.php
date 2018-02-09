<div class="row">
  
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Codigo Cliente : </strong>
      {!! Form::text('idCliente', null, ['placeholder'=>'5','class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <a class="btn btn-xs btn-success" href="{{ route('facturas.index') }}">Regresar</a>
    <button type="submit" class="btn btn-xs btn-primary" name="button">Aceptar</button>
  </div>
</div>
