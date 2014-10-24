<?php 

include(__DIR__.'/autoload.php');

return [
    'controllers' => ['default', 'films'],
    'model' => new \Model('plankton', 'root', ''),

    'request' => [
        'parameters' => $_REQUEST,
        'method' => $_SERVER['REQUEST_METHOD'],
    ]
];
