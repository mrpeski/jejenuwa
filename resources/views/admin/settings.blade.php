@extends('admin.admin')

@section('content')

<h4>Settings</h4>

{{ Form::open(['route' => 'Setting_post', 'method' => 'POST', 'class' => 'form-horizontal'])}}
<table class="table settings_page">
	<tr>
		<td>
			<label for="sitename">Site Name</label>
		</td>
		<td>
			<input type="text" id="sitename" name="sitename" value="{{ (bool) isset($formData['sitename']) ? $formData['sitename'] : '' }}" class="form-control">
		</td>
	</tr>
	<tr>
		<td>
			<label for="sitelogo">Site Logo</label>
		</td>
		<td>
			<input type="text" id="sitelogo" name="sitelogo" value="{{ isset($formData['sitelogo']) ? $formData['sitelogo'] : '' }}" class="form-control">
		</td>
	</tr>
	<tr>
		<td>
		<label for="desc">Site Description</label>
		</td>
		<td>
		<input type="text" id="desc" name="desc" value="{{ isset($formData['desc']) ? $formData['desc'] : '' }}" class="form-control">
		</td>
	</tr>

	<tr>
	<td><label for="social-media">Social Links</label></td>
	<td>
		<fieldset name="social-media" id="social-media">
			<label for="facebook">Facebook Link</label>
			<input type="text" id="facebook" name="facebook" value="{{ isset($formData['facebook']) ? $formData['facebook'] : '' }}" class="form-control">
			<label for="twitter">Twitter Link</label>
			<input type="text" id="twitter" name="twitter" value="{{ isset($formData['twitter']) ? $formData['twitter'] : '' }}" class="form-control">
			<label for="instagram">Instagram Link</label>
			<input type="text" id="twitter" name="twitter" value="{{ isset($formData['instagram']) ? $formData['instagram'] : '' }}" class="form-control">
			<label for="skype">Skpe Id</label>
			<input type="text" id="twitter" name="twitter" value="{{ isset($formData['skype']) ? $formData['skype'] : '' }}" class="form-control">
		</fieldset>
	</td>
	</tr>
	
	<tr>
		<td>
			<input type="submit" value="Save" class="btn btn-primary">
		</td>
	</tr>
</table>
{{ Form::close() }}

@stop