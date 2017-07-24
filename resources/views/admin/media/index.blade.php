@inject('media', 'App\Media')
@extends('admin.admin')

@section('content')
@can('create', App\Media::class)
	<form method="POST" action="{{route('Media_upload')}}" enctype="multipart/form-data" class="dropzone">
		{{ csrf_field() }}
	  <div class="fallback">
		<input type="file" name="file" multiple/>
		<input type="submit" value="Upload" class="btn btn-default">
	  </div>
	</form>	
@endcan

<div id="_tile">
@foreach($media->all() as $media)
	@if($media->isImg())
		<div style="margin:5px; width: 200px; overflow: hidden;float:left;">
			<a href="{{ $media->path() }}"><img src="{{ Storage::url($media->thumbnail_path) }}" alt=""></a>
			<div style="width:inherit;height:80px;">
				<a href="{{ $media->path() }}"><h4>{{ $media->name }}</h4></a>
				<p>{{ convertSize($media->filesize) }}</p>
			</div>
		</div>
	@else
		<div style="margin:5px; width: 200px; overflow: hidden;float: left;">
			<a href="{{ $media->path() }}"><img src="{{asset($media->thumbnail_path)}}" alt=""></a>
			<div style="width: inherit;height:80px;">
				<a href="{{ $media->path() }}"><h4>{{ $media->name }}</h4></a>
				<p>{{ convertSize($media->filesize) }}</p>
			</div>
		</div>
	@endif
@endforeach
</div>
@endsection