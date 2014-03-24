<?php
namespace CubexIo;

use Cubex\Kernel\ApplicationKernel;
use CubexIo\Controllers\DocumentationController;
use CubexIo\Controllers\GenericController;

class CubexIoApplication extends ApplicationKernel
{
  public function docs()
  {
    return new DocumentationController();
  }

  public function defaultAction()
  {
    return new GenericController();
  }
}
