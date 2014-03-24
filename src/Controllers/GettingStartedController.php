<?php
namespace CubexIo\Controllers;

use CubexIo\Views\ComingSoon;

class GettingStartedController extends CubexIoController
{
  public function defaultAction()
  {
    return new ComingSoon('Getting Started Guides');
  }
}
