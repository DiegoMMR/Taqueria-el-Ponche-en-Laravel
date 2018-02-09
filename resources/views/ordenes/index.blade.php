@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h3>Ordenes</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="pull-right">
        <a class="btn btn-xs btn-success" href="{{ route('ordenes.create') }}">Agregar plato al Menu</a>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

  <table class="table table-bordered">
    <tr>
      <th>No.</th>
      <th>Cantidad</th>
      <th>Plato No.</th>
      <th>Factura No.</th>
      <th>Subtotal</th>
      <th width="300px">Acciones</th>
    </tr>

    @foreach ($ordenes as $orden)
      <tr>        
        <td>{{ ++$i }}</td>
        <td>{{ $orden->cantidad }}</td>
        <td>{{ $orden->idPlato }}</td>
        <td>{{ $orden->idFactura }}</td>
        <td>Q. {{ $orden->subtotal }}</td>
        <td>
          <a class="btn btn-xs btn-info" href="{{ route('ordenes.show', $orden->id) }}">Mostrar</a>
          <a class="btn btn-xs btn-primary" href="{{ route('ordenes.edit', $orden->id) }}">Editar</a>

          {!! Form::open(['method' => 'DELETE', 'route'=>['ordenes.destroy', $orden->id], 'style'=> 'display:inline']) !!}
          {!! Form::submit('Eliminar',['class'=> 'btn btn-xs btn-danger']) !!}
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  {!! $ordenes->links() !!}
  <div class="pull-lrft">
        <a class="btn btn-xs btn-info" href="/" >Regresar al menu principal</a>
  </div>
@endsection