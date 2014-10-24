<?php return [
    '/' => function() {
        return ['home'];
    },
    '/hello' => function($app) {
        $parameters = $app['request']['parameters'];
        return ['hello',
            'name' => isset($parameters['name']) ? $parameters['name'] : 'you'
        ];
    },
    '/error' => function() {
        header("HTTP/1.0 404 Not Found");
        header("Status: 404 Not Found");
        return ['error'];
    },
];
