@extends('admin.admin')

@section('content')
@if(session()->has('message'))
	<div class="alert alert-info">{{ session('message') }}</div>
@endif
<div>
<h4 style="display: inline-block;">Menu</h4>
<a href="" class="primary-link toggle_new" style="display: inline-block;">New Menu</a>
</div>
<form action="#" method="POST"  class="new_menu" style="display: none;">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Menu Name" style="background: transparent; width: 400px;" name="new_menu">
		<!-- <input type="submit" name="" value="Create"> -->
	</div>
</form>

<div id="PagesList" class="col-lg-2 well" style="clear: both;">
	<h5>Pages</h5>
    @if(count($allpages))
        @foreach($allpages as $page)
        <div class="form-group">
            <div class="checkbox">
                    <label for="{{ $page['id'] }}">
                    {{ Form::checkbox('allpages[]', $page['id'], '', ['id' => $page['id'], 'data-id' => $page['id'], 'data-title' => $page['title']]) }} {{ trim($page['title'], "") }}</label>
            </div>
        </div>
        @endforeach
    @endif
<button class="btn btn-default" id="addtoMenu">Add to Menu</button>
<div class="separator"></div>
	<h5>Custom Link</h5>

	<form action="" id="custom_link_form">
		{{ csrf_field() }}
		<div class="form-group">
		<input type="text" value="" placeholder="Title" class="form-control custom_title" style="background: transparent;">
		<input type="text" value="" placeholder="Link" class="form-control custom_link" style="background: transparent;">
		</div>
		<input type="submit" value="Add To Menu" class="btn btn-default" id="add_cust_link">
	</form>
</div>

<div id="orderResult" class="col-lg-4">
<div style="clear: both;">
	<select name="menu_list_" id="menu_list_" class="form-control" form="menu_form" style="width:auto; margin-bottom: 10px;">
			<option value="" selected disabled="">Select Menu</option>
            @if(count($menus))
                @foreach( $menus as $menu )
                    @if($menu->value)<option value="{{ $menu->key }}">{{$menu->value['menu_name']}}</option>@endif
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

<div class="col-lg-4 loc">
	<h5>Menu Locations</h5>
	<div class="form-group">
		<input type="checkbox" value="primary" id="primary_loc" checked form="menu_form" name="loc[]">
		<label for="primary_loc" >Primary</label>
	</div>
	<div class="form-group">
		<input type="checkbox" value="footer" id="footer_loc" form="menu_form" name="loc[]">
		<label for="footer_loc">Footer</label>
	</div>

</div>

<script>
	 $(document).ready(function(){

        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div',
            maxLength: 2,
            change: function(){
	 			console.log('fired');
	 		},
        });

    });
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$('.toggle_new').on('click', function(e){
		e.preventDefault();
		$('.new_menu').slideToggle('400');
	});

	$('#menu_list_').on('change', function()
	{
		$('.sortable').children().remove();
		$.get('/control/get_menus', { name: $(this).val() }).then(function(data)
		{
			// console.log(data);
			$.each(data, function(key, value){
				var str = '';
				str += '<li id=';
				str +=  'list_' + ++key + '>';
				str += '<div class="ui-sortable-handle">';
				str += value.title;
				
				var input = '<input type="hidden" form="menu_form" name="menu_items[]" value="' + value.link + '">';
				var title = '<input type="hidden" form="menu_form" name="menu_titles[]" value="' + value.title + '">';
				var x = "<span class='close remove_menu' title='Remove this Slide'>&times;</span>";
				
				str += x + input + title;
				str += '</li></div>';
				$(str).appendTo('ol.sortable');
			});
			// $.each(data, function( key, value )
			// {
			// 	var img = '<img src="' +  value[1] + '">' ;
			// 	var input = '<input type="hidden" form="slideshow_form" name="slides[]" value="' + value[0] + '">';
			// 	var tn = '<input type="hidden" form="slideshow_form" name="tn[]" value="' + value[1] + '">';
			// 	var x = "<span class='close remove_slide' title='Remove this Slide'>&times;</span>";
			// 	var html = '<li>' + img + input +  tn + x + '</li>';
			// 	$(html).appendTo('.slides_container');
			// });
		});

	});

	$('#save').on('click', function(e)
	 {
	 	e.preventDefault();
	 	var menu_items = $('.sortable [name*="menu_items"]');
	 	var menu_ids = $('.sortable [name*="menu_ids"]')
	 	var menu_titles = $('.sortable [name*="menu_titles"]');

	 	var oSortable = $('.sortable').nestedSortable('toArray');
	 	// var sort = $('.sortable').sortable('toArray');

	 	var menu_list_ = $('#menu_list_').val();
	 	
	 	var loc_ = $('.loc :input');

	 	var menus = new Array(), ids = new Array(), titles = new Array(), loc = new Array();

	 	$.each(menu_items, function(key, item){
	 		menus.push(item.value);
	 	});
	 	$.each(menu_ids, function(key, item){
	 		ids.push(item.value);
	 	});
	 	$.each(menu_titles, function(key, item){
	 		titles.push(item.value);
	 	});

	 	$.each(loc_, function(key, item){
	 		if($(item).is(':checked'))
	 		{
	 			loc.push($(item).val());
	 		}
	 	});

	 	var option = { nestData: oSortable , menu_items: menus, menu_ids: ids, menu_titles: titles, loc: loc, menu_list_: menu_list_, };

		$.post('#', option).then( function(data) {
	 		console.log(data);
	 	});
	 });
	var id = 0;
	$('#addtoMenu').on('click', function() {
		var check = $('.checkbox :checked');
		for(i=0; i < check.length; i++) {
			window.id = window.id+1; 
			var str='';
			str += '<li id=';
			str +=  'list_' + window.id + '>';
			str += '<div class="ui-sortable-handle">';
			str += $(check[i]).val();
		
			var input = '<input type="hidden" form="menu_form" name="menu_items[]" value="' + $(check[i]).data('uri') + '">';
			var title = '<input type="hidden" form="menu_form" name="menu_titles[]" value="' + $(check[i]).data('title') + '">';
			var x = "<span class='close remove_menu' title='Remove this Slide'>&times;</span>";
			var ids = '<input type="hidden" form="menu_form" name="menu_ids[]" value="' + window.id + '">';
			
			str += x + input + title + ids;
			str += '</li></div>';
			$(str).appendTo('ol.sortable');
		}
	});

	$('ol.sortable').on('sortchange', function(){
		//var nestData = $('.sortable').nestedSortable('toArray');
		// console.log(nestData);
		// console.log('fired');
	});

	$('#add_cust_link').on('click', function(e){
		e.preventDefault();
		var link = $('input.custom_link').val();
		var title = $('input.custom_title').val();

		var form = document.getElementById('custom_link_form');
		form.reset();

		var str='';
			str += '<li id=';
			str +=  'list_' + ++window.id + '>';
			str += '<div class="ui-sortable-handle">';
			str += title
			
			var input = '<input type="hidden" form="menu_form" name="menu_items[]" value="' + link + '">';
			var title = '<input type="hidden" form="menu_form" name="menu_titles[]" value="' + title + '">';
			var x = "<span class='close remove_menu' title='Remove this Slide'>&times;</span>";
			var ids = '<input type="hidden" form="menu_form" name="menu_ids[]" value="' + window.id++ + '">';
			str += x + input + title + ids;
			str += '</li></div>';
			$(str).appendTo('ol.sortable');
	});

	$('.sortable').on('click', '.remove_menu', function(e){
			$(e.target).parents('li').remove();
	});

</script>

@stop
