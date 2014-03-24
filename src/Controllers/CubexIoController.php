<?php
namespace CubexIo\Controllers;

use Cubex\Http\Response;
use Cubex\Kernel\ControllerKernel;
use Cubex\View\Layout;
use Cubex\View\Renderable;
use Cubex\View\ViewModel;
use Packaged\Dispatch\AssetManager;

abstract class CubexIoController extends ControllerKernel
{
  protected $_layout;

  protected $_contentName = 'content';

  /**
   * @return Layout
   */
  public function layout()
  {
    if($this->_layout === null)
    {
      $this->_layout = new Layout($this);
      $am            = AssetManager::assetType();
      $am->requireCss('css/base');
    }

    return $this->_layout;
  }

  public function __toString()
  {
    return $this->layout()->render();
  }

  public function handleResponse($response, $capturedOutput)
  {
    if($response instanceof ViewModel)
    {
      $this->layout()->insert($response, $this->_contentName);
      return new Response($this->layout());
    }

    if($response === null)
    {
      $this->layout()->insert(
        new Renderable($capturedOutput),
        $this->_contentName
      );
      return new Response($this->layout());
    }

    if(is_scalar($response))
    {
      $this->layout()->insert(
        new Renderable($response),
        $this->_contentName
      );
      return new Response($this->layout());
    }

    return parent::handleResponse($response, $capturedOutput);
  }
}
