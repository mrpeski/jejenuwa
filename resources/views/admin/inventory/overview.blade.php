@extends('admin.admin')

@section('content')
{!! Breadcrumbs::render('insights') !!}
	<div class="row">
		<div class="col-lg-4">
    		<canvas id="bar" width="400" height="400"></canvas>
    	</div>
    	<div class="col-lg-4">
    		<canvas id="pie" width="400" height="400"></canvas>
    	</div>
    	<div class="col-lg-4">
    		<canvas id="polar" width="400" height="400"></canvas>
    	</div>
    </div>

@section('modular_script')
	<script type="" src="{{ asset('js/overview.js') }}"></script>
@endsection
@stop