@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h3>Menu</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="pull-right">
        <a class="btn btn-xs btn-success" href="{{ route('menus.create') }}">Agregar plato al Menu</a>
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
      <th>Codigo</th>
      <th>Plato</th>
      <th>Descripcion</th>
      <th>Precio</th>
      <th width="300px">Acciones</th>
    </tr>

    @foreach ($menus as $menu)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $menu->id }}</td>
        <td>{{ $menu->plato }}</td>
        <td>{{ $menu->descripcion }}</td>
        <td>{{ $menu->precio }}</td>
        <td>
          <a class="btn btn-xs btn-info" href="{{ route('menus.show', $menu->id) }}">Mostrar</a>
          <a class="btn btn-xs btn-primary" href="{{ route('menus.edit', $menu->id) }}">Editar</a>

          {!! Form::open(['method' => 'DELETE', 'route'=>['menus.destroy', $menu->id], 'style'=> 'display:inline']) !!}
          {!! Form::submit('Eliminar',['class'=> 'btn btn-xs btn-danger']) !!}
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  {!! $menus->links() !!}
@endsection