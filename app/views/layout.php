<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/style.css" />
        <title>Plankton example</title>
    </head>
    <body>
        <?php render('header'); ?>

        <?php render($page); ?>

        <hr/>

        <footer class="text-sm">
            <small>
                Powered by <em><a href="https://github.com/Gregwar/Plankton">Plankton pico framework</a></em>
            </small>
        </footer>
    </body>
</html>
