<div id="PagesList" class="col-lg-2 well" style="clear: both;">
	<h5>Pages</h5>
    @if(count($allpages))
        @foreach($allpages as $page)
        <div class="form-group">
            <div class="checkbox">
                    <label for="{{ $page['slug'] }}">
				{{ Form::checkbox('allpages[]', $page['slug'], '', ['id' => $page['slug'], 'data-uri' => route('Front_pages', $page['slug']), 'data-id' => $page['id'], 'data-title' => $page['title']]) }} {{ trim($page['title'], "") }}</label>
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