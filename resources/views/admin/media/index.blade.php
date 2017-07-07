@inject('media', 'App\Media')
@extends('admin.admin')

@section('content')

<form method="POST" action="{{route('Media_upload')}}" enctype="multipart/form-data" class="dropzone">
	{{-- {{ csrf_field() }} --}}
  <div class="fallback">
	<input type="file" name="_upload" multiple/>
	<input type="submit" value="Upload" class="btn btn-default">
  </div>
</form>

@foreach($media->all() as $media)
	@if($media->isImg())
		<img src="{{ Storage::url($media->thumbnail_path)}}" alt="">
	@else
		<img src="{{asset($media->thumbnail_path)}}" alt="">
	@endif
@endforeach
@endsection