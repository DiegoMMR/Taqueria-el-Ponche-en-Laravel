<div class="row">
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Plato : </strong>
      {!! Form::text('plato', null, ['placeholder'=>'Nombre del taco','class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Descripcion : </strong>
      {!! Form::textarea('descripcion', null, ['placeholder'=>'Describa los ingredientes','class'=>'form-control','style'=>'height:150px']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Precio : </strong>
      {!! Form::text('precio', null, ['placeholder'=>'25','class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <a class="btn btn-xs btn-success" href="{{ route('menus.index') }}">Regresar</a>
    <button type="submit" class="btn btn-xs btn-primary" name="button">Aceptar</button>
  </div>
</div>