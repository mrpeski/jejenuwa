@extends('admin.admin')

@section('content')
@include('admin._layouts.modal')
<input type="button" class="btn btn-primary trigger" value="Attach File">
<style>
.img {
	min-height: 300px;
	background: teal;
	margin-left: 2px;
}
.over {
	background: #ddd;
	border: 1px dashed #fff;
}
</style>
<div class="row dropZone" id="items" style="height: 400px;">
	<div class="img col-lg-3" id="dra" draggable="true" ondragstart="dragstart_handler(event)">
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure porro, maxime ea debitis minus rem molestiae sint temporibus possimus totam, quae labore. Beatae adipisci, repudiandae facilis eaque molestiae, laudantium rem.</p>
	</div>
	<p draggable="true" ondragstart="dragstart_handler(event)" id="p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae provident animi sit expedita, dolore repudiandae eum ducimus ea laborum illum! Est accusantium minus aperiam veritatis dolorum suscipit debitis sint inventore.</p>
</div>
<div class="dropZone" style="height:300px; background: #ccc;">
	
</div>
<div id="content" class="dropZone">
<h3>{{ $page->title }}</h3>

<p>{{ $page->body }}</p>
</div>
@section('modular_script')
	<script src="{{ asset('js/modal.js') }}"></script>
	<script src="{{ asset('js/drags.js') }}"></script>
	<script>
	function dragstart_handler(event) {
	        var id = event.target.id;
	        event.dataTransfer.setData('text/plain', id);
	        event.dataTransfer.dropEffect = "copy";
    }
	</script>
@endsection
@endsection