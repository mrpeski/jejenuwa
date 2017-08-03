@extends('admin.admin')

@section('content')
{!! Breadcrumbs::render('user_single') !!}
<div class="card">
	<h4>{{$user->name}}</h4>
	<h4>{{$user->role->name}}</h4>
	<h4>{{$user->warehouse->name}}</h4>
	<h4>{{$user->warehouse->phone_1}}</h4>
	<h4>{{$user->warehouse->phone_2}}</h4>
</div>

<form action="" method="POST">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control" value="{{$user->name}}">
	</div>
	<div class="form-group">
	<label for="_role">Designation:</label>
		<select class="form-control" name="ware">
			@foreach($wares as $warehouse)
				<option value="{{$warehouse->id}}" {{($warehouse->id == $user->warehouse_id)? 'selected' : ''}}>
					{{ $warehouse->name }}
				</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="_role">Role:</label>
		<select class="form-control" name="role" id="_role">
			@if($role->id)
				@foreach($roles as $role)
					<option value="{{$role->id}}" {{($role->id == $user->role_id)? 'selected' : ''}}>
						{{ $role->name }}
					</option>
				@endforeach
			@endif
		</select>
	</div>

	<input type="submit" value="Update" class="btn btn-primary">

</form>

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

