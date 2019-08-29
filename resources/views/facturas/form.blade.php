<div class="row">
  
  <div class="col-xs-12">

    <div class="form-group {{ $errors->has('idCliente') ? 'has-error' : ''}} ">
          {!! Form::label('idCliente', 'Cliente', ['class' => ' control-label']) !!}
          {!! Form::select('idCliente', $clientes, null, [ 'class' => 'form-control selectpicker', 'id'=>'id', 'required'=>'required']) !!}
          {!! $errors->first('idCliente', '<p class="help-block">:message</p>') !!}
      
    </div>
  </div>
  <div class="col-xs-12">
    <a class="btn btn-xs btn-success" href="{{ route('facturas.index') }}">Regresar</a>
    <button type="submit" class="btn btn-xs btn-primary" name="button">Aceptar</button>
  </div>
</div>
