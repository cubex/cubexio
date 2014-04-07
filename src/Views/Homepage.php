<?php
namespace CubexIo\Views;

use Cubex\View\Layout;
use Cubex\View\TemplatedViewModel;

class Homepage extends TemplatedViewModel
{
  public function __construct(Layout $layout)
  {
    $layout->insert('hero', new HeroBanner());
  }
}
