<?php
//Defining PHP_START will allow cubex to add an execution time header
define('PHP_START', microtime(true));

//Include the composer autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

//Create an instance of cubex, with the web root defined
$app = new \Cubex\Cubex(__DIR__);
$app->boot();

$dispatcher = new \Packaged\Dispatch\Dispatch(
  $app, $app->getConfiguration()->getSection('dispatch')
);
$dispatcher->setBaseDirectory(dirname(__DIR__));

//If you wish to use stackphp, uncomment the line below and require stackphp
$app = (new \Stack\Builder())
  ->push([$dispatcher, 'prepare'])
  ->resolve($app);

//Create a request object
$request = \Cubex\Http\Request::createFromGlobals();

//Tell Cubex to handle the request, and do its magic
$response = $app->handle($request);

//Send the generated response to the user
$response->send();

//Shutdown Cubex
$app->terminate($request, $response);
