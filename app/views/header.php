<div class="page-header">
    <h1>
        Plankton demo
        <span class="small text-muted"><?= $app['action']; ?></span>
    </h1>
    <nav class="navbar navbar-inverse" role="navigation">
        <ul class="nav navbar-nav">
            <li><a href="<?= path(); ?>">Home</a></li>
            <li><a href="<?= path('hello'); ?>">Hello</a></li>
            <li><a href="<?= path('films'); ?>">Films</a></li>
        </ul>

        <div class="navbar-header pull-right">
            <a class="navbar-brand" href="https://github.com/Gregwar/Plankton">Plankton</a>
        </div>
    </nav>
</div>
