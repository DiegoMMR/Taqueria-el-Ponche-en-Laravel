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
				<h3>Mostrar Cliente</h3> 				
			</div>
		</div>		
	</div>
	
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Codigo : </strong>
				{{ $cliente->id  }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Nit : </strong>
				{{ $cliente->nit  }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Nombre : </strong>
				{{ $cliente->nombre  }} {{ $cliente->apellido  }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Direccion : </strong>
				{{ $cliente->direccion  }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Telefono : </strong>
				{{ $cliente->telefono  }}
				<br> <br>
				<a class="btn btn-xs btn-primary" href="{{ route('clientes.index') }}">Regresar</a>
			</div>
		</div>
	</div>

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

	

@endsection