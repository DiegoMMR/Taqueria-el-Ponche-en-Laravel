<div class="row">
  <div class="col-xs-12">
    <div class="form-group">
      <strong>Cantidad : </strong>
      {!! Form::text('cantidad', null, ['placeholder'=>'2','class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group {{ $errors->has('idPlato') ? 'has-error' : ''}} ">
          {!! Form::label('idPlato', 'Plato', ['class' => ' control-label']) !!}
          {!! Form::select('idPlato', $menu, null, [ 'class' => 'form-control selectpicker', 'id'=>'id', 'required'=>'required']) !!}
          {!! $errors->first('idPlato', '<p class="help-block">:message</p>') !!}
      
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