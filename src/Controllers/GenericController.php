<?php
namespace CubexIo\Controllers;

use CubexIo\Views\Homepage;
use CubexIo\Views\Licence;

class GenericController extends CubexIoController
{
  public function renderLicence()
  {
    return new Licence();
  }

  public function defaultAction()
  {
    return new Homepage($this->layout());
  }
}
