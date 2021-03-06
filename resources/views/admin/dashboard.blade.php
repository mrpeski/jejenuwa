@extends('admin.admin')

@section('content')
{!! Breadcrumbs::render('dash_asset') !!}
<style>
	#map { height: 500px; width: 600px;}
</style>
<div class="col-lg-8">
	<div id="map"></div>
</div>
<div class="col-lg-4">
	<p>Ship Name: Challenger 55</p>
	<p>Speed: 2000 dork</p>
	<p>Docked: Mario, Spain</p>
	<p>Next Port: Bulgar, Belgium</p>
	<p>ETA: 55 days </p>
</div>
@endsection

@section('modular_script')
<script src="{{asset('js/dash.js')}}"></script>
@endsection