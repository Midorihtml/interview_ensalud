<?php
use Src\lib\View;
use Src\models\File;

$router = new \Bramus\Router\Router();

session_start();

$router->get('/', function() {
    $home = new View();
    $home->render('home');
});

$router->get('/q&a', function() {
    $qa = new View();
    $qa->render('q&a');
});

$router->mount('/user', function() use ($router){
        $router->get('/{id}', function() {
            $user_id = (explode('/', $_SERVER['PATH_INFO']))[2];
            $avatar = File::get($user_id, 'jpg');
            $cv = File::get($user_id, 'pdf');
            $data = [
                'avatar' => $avatar,
                'cv' => $cv
            ];
            $form_user = new View();
            $form_user->render('form_user', $data);
        });

        $router->post('/{id}', function () use ($router){
            require_once $GLOBALS['src'] . 'controllers/user/index.php';
        });
});

$router->run();
?>