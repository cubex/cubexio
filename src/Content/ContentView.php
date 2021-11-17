<?php
namespace CubexIo\Content;

use Cubex\Mv\AbstractView;
use Cubex\Mv\Model;
use Packaged\SafeHtml\ISafeHtmlProducer;
use Packaged\SafeHtml\SafeHtml;
use Packaged\Ui\TemplateLoaderTrait;

class ContentView extends AbstractView
{
  use TemplateLoaderTrait;

  protected ?Model $_model;

  protected function _render(): ?ISafeHtmlProducer
  {
    return new SafeHtml($this->_renderTemplate());
  }
}
