<?php return [
    '/films' => function($app) {
    	session_start();
    	$message ='';
    	if (isset($_SESSION['message'])) {
    		$message = $_SESSION['message'];
    		unset($_SESSION['message']);
    	}

        return ['films/index',
            'films' => $app['model']->getFilms(),
            'message' => $message
        ];
    },
    '/films/create' => function($app) {
    	if (isset($_POST['film'])) {
    		session_start();
    		$id = $app['model']->createFilm($_POST['film']);
    		$_SESSION['message'] = $id ? ['success', 'Films add'] : ['danger', 'Something wrong'];
    		header('Location: '. path('films'));
    		return;
    	}
    	return ['films/form'];
    }
];
