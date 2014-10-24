<?php return [
    '/films' => function($app) {
        return ['films',
            'films' => $app['model']->getFilms()
        ];
    }
];
