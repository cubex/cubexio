<?php
namespace CubexIo\Views;

use Cubex\View\TemplatedViewModel;
use CubexIo\Helpers\SiteMarkdown;

class Documentation extends TemplatedViewModel
{
  protected $_sidebarMd;
  protected $_contentMd;
  protected $_mdEngine;
  protected $_error;

  public function __construct($sidebarMarkdown, $contentMarkdown)
  {
    $this->_sidebarMd = $sidebarMarkdown;
    $this->_contentMd = $contentMarkdown;
    $this->_mdEngine  = new SiteMarkdown();
  }

  public function setError($error)
  {
    $this->_error = $error;
    return $this;
  }

  public function hasError()
  {
    return $this->_error !== null;
  }

  public function getError()
  {
    switch($this->_error)
    {
      case 404:
        return "The page you requested was not found.";
    }
    return null;
  }

  public function getSidebar()
  {
    return $this->_mdEngine->transformMarkdown($this->_sidebarMd);
  }

  public function getContent()
  {
    return $this->_mdEngine->transformMarkdown($this->_contentMd);
  }
}
