<a href="" class="primary-link toggle_new" style="display: inline-block;">New Menu</a>
</div>
<!-- New Menu -->
<form action="" method="POST"  class="new_menu" style="display: none;">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Menu Name" style="background: transparent; width: 400px;" name="new_menu">
		<!-- <input type="submit" name="" value="Create"> -->
	</div>
</form>