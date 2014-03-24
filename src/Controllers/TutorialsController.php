<?php
namespace CubexIo\Controllers;

use CubexIo\Views\ComingSoon;

class TutorialsController extends CubexIoController
{
  public function defaultAction()
  {
    return new ComingSoon("Tutorials");
  }
}
