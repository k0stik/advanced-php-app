<?php

// require services
require_once __DIR__ . '/Service.php';

// require Rest API classes
require_once __DIR__ . '/RestAPI/Controller/Base.php';
require_once __DIR__ . '/RestAPI/Controller/Books.php';

//
// SlimPHP Example Application
// =============================================================================
//

// Create monolog logger and store logger in container as singleton
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () use ($app) {
    $log = new \Monolog\Logger('slim-skeleton');

    $log->pushHandler(
        new \Monolog\Handler\StreamHandler( __DIR__ . '/../../logs/app.log', \Monolog\Logger::DEBUG)
    );

    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset'           => 'utf-8',
    'cache'             => false,
    'auto_reload'       => true,
    'strict_variables'  => true,
    'autoescape'        => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// Define routes

$app->get('/', function () use ($app) {
    // Sample log message
    $app->log->info("Slim-Skeleton '/' route");
    // Render index view
    $app->render('index.html');
});

// Define API routes
$app->group('/api', function () use ($app) {

    $app->group('/books', function () use ($app) {

        $books = new RestAPI\Controller\Books($app);

        $app->get('/:id',    array($books, 'show'  ))->name('show_books'  );
        $app->get('/',       array($books, 'index' ))->name('index_books' );
        $app->post('/',      array($books, 'create'))->name('create_books');
        $app->put('/:id',    array($books, 'update'))->name('update_books');
        $app->delete('/:id', array($books, 'delete'))->name('delete_books');

    });

});


?>