@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">
                    

                   <div class="row">
    <div class="col-lg-12">
      <h3>Clientes</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="pull-right">
        <a class="btn btn-xs btn-success" href="{{ route('clientes.create') }}">Agregar un cliente</a>
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
      <th>Codigo</th>
      <th>NIT</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th width="300px">Acciones</th>
    </tr>

    @foreach ($clientes as $cliente)
      <tr>
        <td>{{ $cliente->id }}</td>
        <td>{{ $cliente->nit }}</td>
        <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
        <td>{{ $cliente->direccion }}</td>
        <td>{{ $cliente->telefono }}</td>
        <td>
          <a class="btn btn-xs btn-info" href="{{ route('clientes.show', $cliente->id) }}">Mostrar</a>
          <a class="btn btn-xs btn-primary" href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>

          {!! Form::open(['method' => 'DELETE', 'route'=>['clientes.destroy', $cliente->id], 'style'=> 'display:inline']) !!}
          {!! Form::submit('Eliminar',['class'=> 'btn btn-xs btn-danger']) !!}
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  {!! $clientes->links() !!}
  <div class="pull-lrft">
        <a class="btn btn-xs btn-info" href="/" >Regresar al menu principal</a>
  </div> 
                    
                </div>
            </div>
        </div>
    </div>
</div>

  
@endsection