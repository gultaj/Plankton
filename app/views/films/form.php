<h2 class="text-muted"><?= $title ?></h2>

<form method="post"class="form">
	<div class="form-group">
		<label for="name">Film name</label>
		<input type="hidden" name="film[id]" value="<?= $film['id'] ?>">
		<input type="text" id="name" class="form-control" value="<?= $film['name'] ?>" name="film[name]" placeholder="Enter film name">
	</div>
	<button type="submit" class="btn btn-success">Submit</button>
	<a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-default">Cancel</a>
</form>