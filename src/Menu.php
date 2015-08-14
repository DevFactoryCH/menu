<?php namespace Devfactory\Menu;

use Devfactory\Menu\Controllers\MenuController;

class Menu  {

  public function test() {
    $c = new MenuController;
    echo "<pre>";
    print_r($c);
    echo "</pre>";
  }
}
