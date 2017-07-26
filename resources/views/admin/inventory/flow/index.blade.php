@extends('admin.admin')

@section('content')
{!! Breadcrumbs::render('flow') !!}
<div class="row">	
	<div class="col-lg-4">
	<h4>IN</h4>
	<form action="" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
		<label for="in">SKU</label>
		<input type="text" class="form-control" name="in">
		</div>
		<div class="form-group">
			<label for="in_qty">Qty</label>
			<input type="number" name="in_qty" class="form-control">
		</div>
		<div class="form-group">
			<label for="in_notes">Notes</label>
			<textarea name="in_notes" id="" cols="30" rows="10" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-default" value="Add">
		</div>
	</form>
		<h6>recently in</h6>
		@if(count($latest_IN))
		<div class="list-group">
	  		@foreach ($latest_IN as $product)
				<a href="#" class="list-group-item active">
		    	<h4 class="list-group-item-heading">{{ $product->author->name }}</h4>
		    	<p class="list-group-item-text">{{ $product->product_id }}</p>
		    	<p class="list-group-item-text">{{ $product->created_at }}</p>
		  		</a>
			@endforeach
		</div>

		@endif
	</div>
	<div class="col-lg-4">
	<h4>OUT</h4>
	<form action="" method="POST">
		{{ csrf_field() }}
		<div class="form-group">	
			<label for="out">SKU</label>
			<input type="text" class="form-control" name="out">
		</div>
		<div class="form-group">	
			<label for="out_qty">Qty</label>
			<input type="number" name="out_qty" class="form-control">
		</div>

		
		<div class="form-group">
			<label for="out_notes">Notes</label>
			<textarea name="out_notes" id="" cols="30" rows="10" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-default" value="Add">
		</div>
	</form>
		<h6>recently out</h6>
		@if(count($latest_OUT))
		@foreach ($latest_OUT as $product)
			<li>
				<p>sku: {{ $product->product_id }}</p>
				<p>author: {{ $product->author->name }}</p>
				<p>date: {{ $product->created_at }}</p>
			</li>
		@endforeach
		@endif
	</div>
</div>
@stop