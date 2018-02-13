@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">
                    
<div class="row">
    <div class="col-lg-12">
      <h3>Facturas</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="pull-right">
        <a class="btn btn-xs btn-success" href="{{ route('facturas.create') }}">Generar nueva Factura</a>
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
      <th>No. Factura</th>
      <th>Cod. Cliente</th>
      <th>Nombre</th>
      <th>NIT</th>
      <th>Fecha</th>
      <th width="300px">Acciones</th>
    </tr>

    @foreach ($facturas as $factura)
      <tr>
        <td>{{ $factura->NoFactura }}</td>
        <td>{{ $factura->CodCliente }}</td>
        <td>{{ $factura->nombre }} {{ $factura->apellido }}</td>
        <td>{{ $factura->nit }}</td>
        <td>{{ $factura->created_at }}</td>
        <td>
          <a class="btn btn-xs btn-info" href="{{ route('facturas.show', $factura->NoFactura) }}">Mostrar</a>
          <a class="btn btn-xs btn-primary" href="{{ route('facturas.edit', $factura->NoFactura) }}">Editar</a>

          {!! Form::open(['method' => 'DELETE', 'route'=>['facturas.destroy', $factura->NoFactura], 'style'=> 'display:inline']) !!}
          {!! Form::submit('Eliminar',['class'=> 'btn btn-xs btn-danger']) !!}
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  <div class="pull-lrft">
        <a class="btn btn-xs btn-info" href="/" >Regresar al menu principal</a>
  </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>

  
@endsection