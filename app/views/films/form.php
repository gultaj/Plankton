<h2 class="text-muted">Add film</h2>

<form method="post"class="form">
	<div class="form-group">
		<label for="name">Film name</label>
		<input type="text" id="name" class="form-control" name="film[name]" placeholder="Enter film name">
	</div>
	<button type="submit" class="btn btn-success">Submit</button>
	<a href="<?= path('films'); ?>" class="btn btn-default">Cancel</a>
</form>