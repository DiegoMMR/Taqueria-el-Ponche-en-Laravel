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
				<strong>NIT : </strong>
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
			</div>
		</div>
	</div>
	<table class="table table-bordered">
    <tr>
      <th>Cantidad</th>
      <th>Plato</th>
      <th>Precio</th>
      <th width="300px">Subtotal</th>
    </tr>
	
	<?php $i=0; ?>

    @foreach ($descripcion as $descripciones)
      <tr>
        <td>{{ $descripciones->cantidad }}</td>
        <td>{{ $descripciones->plato }}</td>
        <td>Q. {{ $descripciones->precio }}</td>
        <td>Q. {{ $descripciones->subtotal }}</td>
		
        </td>
      </tr>
    @endforeach
    <tr>
    	<th>Total:</th>
    	<th>Q. {{ $total[0]->total  }}</th>
    </tr>
  </table>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				
				<a class="btn btn-xs btn-primary" href="{{ route('facturas.index') }}">Regresar</a>
				<a class="btn btn-xs btn-success" href="{{ route('pagos.edit',$factura[0]->id ) }}">pagar</a>
				
			</div>
		</div>
	</div>

                </div>
            </div>
        </div>
    </div>
</div>
	
	


@endsection