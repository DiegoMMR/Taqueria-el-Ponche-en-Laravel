@extends('layouts.master')

@section('content')
	
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-left">
				<h3>Mostrar Factura</h3> 				
			</div>
		</div>		
	</div>
	
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong># </strong>
				{{ $factura[0]->id  }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Cliente : </strong>
				{{ $factura[0]->nombre  }} {{ $factura[0]->apellido  }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong># </strong>
				{{ $factura[0]->nit  }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<strong>Fecha : </strong>
				{{ $factura[0]->created_at  }}
				<br> <br>
				<a class="btn btn-xs btn-primary" href="{{ route('facturas.index') }}">Regresar</a>
			</div>
		</div>
	</div>


@endsection