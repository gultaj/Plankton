<?php
$app = include(__DIR__.'/app.php');

function path($url, $asset = false) {
    $directory = $_SERVER['SCRIPT_NAME'];
    if ($asset) {
        $directory = dirname($directory);
        if ($directory[strlen($directory)-1] == '/') {
            $directory = substr($directory, 0, -1);
        }
    } else {
        $directory .= '/';
    }
    return $directory.$url;
}

function render($page, array $variables = array()) {
    global $app;
    extract($variables);
    include(__DIR__.'/views/layout.php');
}

$page = isset($_SERVER['PATH_INFO']) ? 
    $_SERVER['PATH_INFO'] : '/';

$actions = array();
foreach ($app['controllers'] as $controller) {
    $actions = array_merge($actions, 
        include(__DIR__.'/controllers/'.$controller.'.php'));
}

$action = isset($actions[$page]) ? $actions[$page] 
    : $actions['/404'];

if ($response = $action($app)) {
    if (is_array($response)) {
        render($response[0], isset($response[1]) ? $response[1] 
            : array());
    } else {
        echo $response;
    }
}
