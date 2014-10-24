<h2 class="text-muted">Films 
	<a href="<?= path('films/create'); ?>" class="btn btn-success btn-sm pull-right">Add film</a>
</h2>

<ul class="list-group">
	<?php if (!empty($message)) : ?>
		<div class="alert alert-<?= $message[0]?>" role="alert"><?= $message[1] ?></div>
	<?php endif ?>
	<?php if (empty($films)) : ?>
		<h3 class="text-muted">Nothing</p>
	<?php endif ?>
    <?php foreach ($films as $film) { ?>
        <li class="list-group-item">
        <a href="<?= path('films/'.$film['id']) ?>"><?= htmlspecialchars($film['name']); ?></a></li>
    <?php } ?>
</ul>
