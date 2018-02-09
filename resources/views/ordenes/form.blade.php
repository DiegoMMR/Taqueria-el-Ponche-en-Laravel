<div class="row">
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Cantidad : </strong>
      {!! Form::text('cantidad', null, ['placeholder'=>'2','class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Cod. del plato : </strong>
      {!! Form::text('idPlato', null, ['placeholder'=>'Codigo del plato','class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
      <strong>No. Factura : </strong>
      {!! Form::text('idFactura', null, ['placeholder'=>'# de la factura','class'=>'form-control']) !!}
    </div>
  </div>
   
  
  <div class="col-xs-12">
    <a class="btn btn-xs btn-success" href="{{ route('ordenes.index') }}">Regresar</a>
    <button type="submit" class="btn btn-xs btn-primary" name="button">Aceptar</button>
  </div>
</div>