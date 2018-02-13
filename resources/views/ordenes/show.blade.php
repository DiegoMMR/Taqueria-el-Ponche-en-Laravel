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
				<h3>Mostrar Orden</h3> 				
			</div>
		</div>		
	</div>
	
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Cantidad : </strong>
				{{ $orden[0]->cantidad }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Plato : </strong>
				{{ $orden[0]->plato }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Precio : </strong>Q. 
				{{ $orden[0]->precio }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Subtotal : </strong>Q.
				{{ $orden[0]->subtotal }}
				<br> <br>
				<a class="btn btn-xs btn-primary" href="{{ route('ordenes.index') }}">Regresar</a>
			</div>
		</div>
	</div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
	
	


@endsection