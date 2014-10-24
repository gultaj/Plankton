<h2 class="text-muted">Films 
	<a href="<?= path('films/create'); ?>" class="btn btn-success btn-xs">Add film</a>
</h2>

<ul class="list-group">
	<?php if (!empty($message)) : ?>
		<div class="alert alert-<?= $message[0]?>" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<?= $message[1] ?></div>
	<?php endif ?>
	<?php if (empty($films)) : ?>
		<h3 class="text-muted">Nothing</p>
	<?php endif ?>
    <?php foreach ($films as $film) { ?>
        <li class="list-group-item"><?= htmlspecialchars($film['name']); ?></li>
    <?php } ?>
</ul>
