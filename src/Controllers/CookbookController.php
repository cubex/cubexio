<?php
namespace CubexIo\Controllers;

use CubexIo\Views\ComingSoon;

class CookbookController extends CubexIoController
{
  public function defaultAction()
  {
    return new ComingSoon('Cookbooks');
  }
}
