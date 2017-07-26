@extends('admin.admin')

@section('content')
{!! Breadcrumbs::render('dash_asset') !!}
<style>
	#map { height: 500px; width: 600px;}
</style>
<div class="col-lg-12">
	<div id="map"></div>
</div>
@endsection

@section('modular_script')
<script src="{{asset('js/dash.js')}}"></script>
@endsection