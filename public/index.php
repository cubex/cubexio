<?php
define('PHP_START', microtime(true));

use Cubex\Cubex;
use CubexIo\CubexApplication;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$loader = require_once(dirname(__DIR__) . '/vendor/autoload.php');
try
{
  $cubex = new Cubex(dirname(__DIR__), $loader);
  $cubex->handle(new CubexApplication($cubex));
}
catch(Throwable $e)
{
  $handler = new Run();
  $handler->pushHandler(new PrettyPageHandler());
  $handler->handleException($e);
}
finally
{
  if($cubex instanceof Cubex)
  {
    //Call the shutdown command
    $cubex->shutdown();
  }
}
