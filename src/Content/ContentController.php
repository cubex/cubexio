<?php
namespace CubexIo\Content;

use CubexIo\Layout\LayoutController;

class ContentController extends LayoutController
{
  protected function _generateRoutes()
  {
    return 'content';
  }

  public function processContent()
  {
    //Create a view model
    $model = ContentModel::withContext($this);

    //Return the model with a preferred view for improved testability
    return $model->setDefaultView(ContentView::class);
  }
}
