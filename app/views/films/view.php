<h2 class="text-muted">Film</h2>
<?php if (!empty($message)) : ?>
	<div class="alert alert-<?= $message[0]?>" role="alert"><?= $message[1] ?></div>
<?php endif ?>
<div class="row">
<style>.actions{margin: 20px 0 10px}</style>
<script> window.onload = function() {document.getElementById('delete').onclick = function() {if (!confirm('You are serious?')) return false; }; }; </script>
<h3 class="col-xs-9"><?= $film['name'] ?></h3>
<div class="actions col-xs-3 text-right">
	<a id="delete" href="<?= path('films/'.$film['id'].'/delete'); ?>" class="btn btn-danger btn-xs">Delete</a>
	<a href="<?= path('films/'.$film['id'].'/edit'); ?>" class="btn btn-primary btn-xs">Edit</a>	
</div>
</div>
