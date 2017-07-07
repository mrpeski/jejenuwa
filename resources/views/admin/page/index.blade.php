@extends('admin.admin')

@section('content')
	@if (session('message'))
		<div class="alert alert-success">{{ session('message') }}</div>
	@endif
	<h4 style="display: inline-block;">Pages</h4>
	<a href="pages/create" class="primary-link" style="display: inline-block;">New Page</a>
<p>All({{count($pages->all())}})</p>
<form action="" method="POST" id="bulk_action_form">
	{{ csrf_field() }}
	<!-- <label for="bulk_action" style="float: left; height: 43px; text-align: center; line-height: 3; margin: 0 10px;">Bulk Action</label> -->
	<select name="action" id="bulk_action" class="form-control" style="width:auto; float: left; margin-right: 20px; margin-bottom: 10px;">
    	<option value="" disabled selected>Bulk Action</option>
 		<option value="delete">Delete</option>
	</select>
	<input type="submit" value="Apply" class="btn btn-default" style="float: left; text-align: center;">
</form>
<table class="table table-bordered" style="background: #ccc; color:#333;">
	<tr>
		<th style="width:10px;"><input type="checkbox" id="bulk_select"></th>
		<th style="width: calc(100vw - 600px);">Title</th>
		<th>Date</th>
		<th>Delete</th>
	</tr>
	@if(count($pages))
	@foreach( $pages as $page )
	<tr class="">
		<td><input type="checkbox" value="{{$page->id}}" form="bulk_action_form" name="feed[]" class="checkbox"></td>
		<td>
			<a href="{{route('Page_edit', $page->id)}}"><h6>{{ $page->title }}</h6></a>
			<a href="{{route('Page_edit', $page->id)}}" class="small">Edit</a>
		</td>
		<td><h6>{{ $page->created_at }}</h6></td>
		<td>
			<form action="{{route('Page_delete', $page->id)}}" method="POST">
				{{csrf_field()}}
				<input name="_method" value="DELETE" type="hidden">
				<input type="submit" value="Delete" class="btn btn-primary">
			</form>
		</td>
	</tr>
	@endforeach
	@else
	<tr>
	 <td  colspan="4">No Feedback Found.</td>
	</tr>
	@endif


	<tr>
		<th><input type="checkbox" id="footer_checkbox"></th>
		<th>Title</th>
		<th>Date</th>
		<th>Delete</th>
	</tr>
</table>

<script>
	$('#bulk_select, #footer_checkbox').on(
		{
		change: function() 
		{
			var ischecked = $('.checkbox').is(':checked');
			if(this.checked) {
				if(!ischecked) 
				{
					$('.checkbox').attr('checked', 'checked');
				}
								console.log('if');		
			}
			else 
			{
				if(ischecked) 
		            {
						$('.checkbox').each( function() { $(this).removeAttr('checked')});
					}
			}
          
		}
	});
</script>
@stop

