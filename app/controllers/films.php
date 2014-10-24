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
    		if ($app['model']->createFilm($_POST['film']))
    			$_SESSION['message'] = ['success', 'Film added'];
    		else
    			['danger', 'Something wrong'];
    		
    		redirect('films');
    		return;
    	}
    	return ['films/form', 'title' => 'Add film'];
    },
    '/films/:id' => function($app, $id = 0) {
    	session_start();
    	$message ='';
    	if (isset($_SESSION['message'])) {
    		$message = $_SESSION['message'];
    		unset($_SESSION['message']);
    	}
    	$film = $app['model']->getFilm($id);
    	if (empty($film)) return ['error'];
    	return ['films/view',
    		'film' => $film,
    		'message' => $message
    	];
    },
    '/films/:id/edit' => function($app, $id = 0) {
    	if (isset($_POST['film'])) {
    		session_start();
    		if ($app['model']->updateFilm($_POST['film']))
    			$_SESSION['message'] = ['success', 'Film updated'];
    		else
    			$_SESSION['message'] = ['danger', 'Something wrong'];

    		redirect('films/'.$id);
    		return;
    	}
    	$film = $app['model']->getFilm($id);
    	if (empty($film)) return ['error'];
    	return ['films/form', 
    		'title' => 'Edit film', 
    		'film' => $film
    	];	
    },
    '/films/:id/delete' => function($app, $id = 0) {
		session_start();
		if ($app['model']->deleteFilm($id))
			$_SESSION['message'] = ['warning', 'Film deleted'];
		else
			$_SESSION['message'] = ['danger', 'Something wrong'];

		redirect('films');
    }
];
