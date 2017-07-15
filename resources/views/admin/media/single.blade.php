@extends('admin.admin')

@section('content')


@if($image)
<div class="container">
	<h4>Attachment Details</h4>
	<div class="row">
		<div class="col-lg-6">
		@if($image->isImg())
			<img src="{{Storage::url($image->file_path)}}" width="90%">
		@elseif($image->isVideo())
			<video src="{{Storage::url($image->file_path)}}" autoplay="autoplay" width="400" height="" controls="controls"></video>
		@else
			<a href="{{Storage::url($image->file_path)}}">Launch in Browser </a>
		@endif
		</div>
		<div class="col-lg-6">
			<form action="">
				<div class="form-group">
					<label for="filename">FileName:</label>
					<input type="text" class="form-control" value="{{ $image->name }}" id="filename">
					<p><a href="{{ url($image->file_path) }}" target="_blank">{{ url($image->file_path) }}</a></p>
				</div>
				<div class="form-group">
				<label for="filesize">Filesize:</label>
					<input type="text" class="form-control" value="{{ convertSize($image->filesize) }}" disabled="disabled">
				</div>
				<div class="form-group">
				<label for="imgwidth">Image Width:</label>
					<input type="text" class="form-control" id="imgwidth" value="{{ $image->width }}">
				</div>
				<div class="form-group">
				<label for="imgheight">Image Height:</label>
					<input type="text" class="form-control" id="imgheight" value="{{ $image->height }}">
				</div>
			</form>
			{{ Form::open(['method' => 'POST'])}}
				<input type="submit" value="Delete Attachment Permanently" class="btn btn-link">
			{{ Form::close() }}
		</div>
	</div>
</div>

	<!-- <h4> Create new Size </h4>
	{{ Form::open(['method' => 'POST'])}}
		<label for="width">Width:</label>
		<input type="number" name="width" id="width">
		<label for="height">Height:</label>
		<input type="number" name="height">
		<input type="submit">
	{{ Form::close() }} -->
@endif

@stop