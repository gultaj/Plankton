<?php // Plankton

$root = __DIR__.'/app';
$app = include($root.'/app.php');
$response = '';
$actions = [];
$id = '';

function path($url = '') {
    return '/'.$url;
}
function redirect($path) {
    header('Location: '. path($path));
}

function render($page, $layout = '') {
    global $app, $root, $response;
    if (is_array($response)) extract($response, EXTR_SKIP);
    include($root.'/views/'.($layout ? $layout : $page).'.php');
}

$page = empty($_SERVER['PATH_INFO']) ? '/' : $_SERVER['PATH_INFO'];

$id = preg_replace('/(\/?\w+\/)(\d+)(\/\w*)*/im', '${2}', $page); 
$page = preg_replace('/(\/?\w+\/)(\d+)(\/\w*)*/i', '${1}:id${3}', $page);

foreach ($app['controllers'] as $controller) {
    $file = $root.'/controllers/'.$controller.'.php';
    $actions = array_merge($actions, include($file));
}

$app['action'] = isset($actions[$page]) ? $page : '/error';
$action = $actions[$app['action']];

$response = empty($id) ? $action($app) : $action($app, $id);
if (is_array($response)) {
    render($response[0], 'layout');
} else {
    echo $response;
}
