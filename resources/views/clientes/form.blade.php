<div class="row">
  <div class="col-xs-12">
    <div class="form-group">
      <strong>NIT : </strong>
      {!! Form::text('nit', null, ['placeholder'=>'124589-7','class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Nombre : </strong>
      {!! Form::text('nombre', null, ['placeholder'=>'Paquita','class'=>'form-control']) !!}
    </div>
  </div>
   <div class="col-xs-12">
    <div class="form-group">
      <strong>Apellido : </strong>
      {!! Form::text('apellido', null, ['placeholder'=>'Del Barrio','class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Direccion : </strong>
      {!! Form::textarea('direccion', null, ['placeholder'=>'Su casa','class'=>'form-control','style'=>'height:75px']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Telefono : </strong>
      {!! Form::text('telefono', null, ['placeholder'=>'25457898','class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <a class="btn btn-xs btn-success" href="{{ route('clientes.index') }}">Regresar</a>
    <button type="submit" class="btn btn-xs btn-primary" name="button">Aceptar</button>
  </div>
</div>
