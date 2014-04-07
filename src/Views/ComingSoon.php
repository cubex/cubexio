<?php
namespace CubexIo\Views;

use Cubex\View\TemplatedViewModel;

class ComingSoon extends TemplatedViewModel
{
  protected $_feature;

  public function __construct($feature)
  {
    $this->_feature = $feature;
  }

  public function getFeature()
  {
    return $this->_feature;
  }
}
