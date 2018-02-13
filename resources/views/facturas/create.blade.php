@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">
                    
<div class="row">
    <div class="col-lg-12">
      <div class="pull-left">
        <h3>Agregar Nueva Factura</h3>
      </div>
    </div>
  </div>

  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whooops!! </strong> Hay un problema con tu informacion.<br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {!! Form::open(['route' => 'facturas.store', 'method' => 'POST']) !!}
    @include('facturas.form')
  {!! Form::close() !!}
                    

                </div>
            </div>
        </div>
    </div>
</div>

  

@endsection