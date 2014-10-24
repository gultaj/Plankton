<?php // Plankton

$root = __DIR__.'/app';
$app = include($root.'/app.php');
$response = '';
$actions = [];

function path($url = '') {
    return '/'.$url;
}

function render($page, $layout = '') {
    global $app, $root, $response;
    if (is_array($response))
        extract($response, EXTR_SKIP);
    include($root.'/views/'.($layout ? $layout : $page).'.php');
}

$page = empty($_SERVER['PATH_INFO']) ? '/' : $_SERVER['PATH_INFO'];

foreach ($app['controllers'] as $controller) {
    $file = $root.'/controllers/'.$controller.'.php';
    $actions = array_merge($actions, include($file));
}

$app['action'] = isset($actions[$page]) ? $page : '/error';
$action = $actions[$app['action']];

if ($response = $action($app)) {
    if (is_array($response)) {
        render($response[0], 'layout');
    } else {
        echo $response;
    }
}
