<div id="orderResult" class="col-lg-4">
	<div style="clear: both;">
		<select name="menu_list_" id="menu_list_" class="form-control" form="menu_form" style="width:auto; margin-bottom: 10px;">
				<option value="" selected disabled="">Select Menu</option>
	            @if(count($menus))
	                @foreach( $menus as $menu )
	                    @if($menu->value)<option value="{{ $menu->s_key }}">{{$menu->value['menu_name']}}</option>@endif
	                @endforeach
	            @endif
		</select>
	</div>	
	<div>
		<ol class="sortable ui-sortable">
			
		</ol>
		<div class="form-group" style="clear: both;">
			<form action="" id="menu_form" method="POST">
				{{ csrf_field() }}
				<input type="submit" value="Save" class="btn btn-primary" id="save">
			</form>
		</div>
	</div>
</div>