<h2 class="text-muted">Films</h2>

<ul class="list-group">
    <?php foreach ($films as $film) { ?>
        <li class="list-group-item"><?= htmlspecialchars($film['name']); ?></li>
    <?php } ?>
</ul>
