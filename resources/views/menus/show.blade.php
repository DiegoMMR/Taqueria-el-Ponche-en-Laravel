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
				<h3>Mostrar Plato</h3> 				
			</div>
		</div>		
	</div>
	
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Codigo : </strong>
				{{ $menu->id  }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Plato : </strong>
				{{ $menu->plato  }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Descripcion : </strong>
				{{ $menu->descripcion  }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Precio : </strong>Q.
				{{ $menu->precio  }}
				<br> <br>
				<a class="btn btn-xs btn-primary" href="{{ route('menus.index') }}">Regresar</a>
			</div>
		</div>
	</div>

                </div>
            </div>
        </div>
    </div>
</div>
	
	


@endsection