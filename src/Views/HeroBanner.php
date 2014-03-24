<?php
namespace CubexIo\Views;

use Cubex\View\TemplatedViewModel;
use Packaged\Dispatch\AssetManager;

class HeroBanner extends TemplatedViewModel
{
  public function __construct()
  {
    AssetManager::assetType()->requireCss('css/hero');
  }
}
