<?php 

include(__DIR__.'/autoload.php');

return array(
    'controllers' => ['default', 'films'],
    'model' => new \Model('cinema', 'root', 'root'),

    'request' => [
        'parameters' => $_REQUEST,
        'method' => $_SERVER['REQUEST_METHOD'],
    ]
);
