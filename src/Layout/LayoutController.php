<?php
namespace CubexIo\Layout;

use Cubex\Controller\Controller;
use Cubex\Mv\View;
use Cubex\Mv\ViewModel;
use Packaged\Context\Context;
use Packaged\Dispatch\ResourceManager;
use Packaged\Ui\Renderable;

abstract class LayoutController extends Controller
{
  public function __construct()
  {
    ResourceManager::componentClass(self::class)->requireCss('css/layout.css');
  }

  protected function _prepareResponse(Context $c, $result, $buffer = null)
  {
    if($result instanceof ViewModel)
    {
      $result = $result->createView();
      if($result instanceof View)
      {
        $result = $result->render();
      }
    }

    if($result instanceof Renderable || is_scalar($result))
    {
      return parent::_prepareResponse($c, (new HtmlWrap())->setContent($result), $buffer);
    }

    return parent::_prepareResponse($c, $result, $buffer);
  }
}
