@extends('admin.admin')

@section('content')
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
			<label for="destination">Destination</label>
			<select name="destination" id="" class="form-control">
			@if(count($location))
				@foreach ($location as $product_loc)
					<option value="{{$product_loc->id}}">
						{{ $product_loc->name }}
					</option>
				@endforeach
			@endif
			</select>
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
	<div class="col-lg-4">
	<h4>LOCATIONS</h4>
		<form action="{{route('Location_store')}}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="location">Warehouse</label>
				<input type="text" class="form-control" name="location">
			</div>
			<div class="form-group">
				<input type="submit" value="Add New Location" class="btn btn-primary">
			</div>
		</form>
		<h6>saved locations</h6>
		@if(count($location))
		<div class="list-group">
		@foreach ($location as $product_loc)
			<li class="list-group-item active">
				<p class="list-group-item-text">{{ $product_loc->name }}</p>
			</li>
		@endforeach
		</div>
		@endif
	</div>
</div>
@stop