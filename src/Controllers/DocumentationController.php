<?php
namespace CubexIo\Controllers;

use CubexIo\Views\Documentation;

class DocumentationController extends CubexIoController
{
  public function defaultAction()
  {
    $errorString = null;
    $content     = '';

    if(func_num_args() === 0)
    {
      $page = 'README';
    }
    else
    {
      $page = implode('/', func_get_args());
    }

    $docRoot = $this->getConfigItem('documentation', "source_path", 'docs');
    if(substr($docRoot, 0, 1) !== '/' && substr($docRoot, 1, 1) !== ':')
    {
      $docRoot = build_path(dirname($this->getCubex()->getDocRoot()), $docRoot);
    }

    $sidebar = file_get_contents($docRoot . 'contents.md');
    if(file_exists($docRoot . $page . '.md'))
    {
      $content = file_get_contents($docRoot . $page . '.md');
    }
    else
    {
      $errorString = 'File Not Found';
    }

    $docs = new Documentation($sidebar, $content);
    $docs->setError($errorString);
    return $docs;
  }
}
