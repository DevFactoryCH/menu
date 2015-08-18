<?php namespace Devfactory\Menu;

use Devfactory\Menu\Controllers\MenuController;
use Devfactory\Menu\Models\Menu as MenuModel;
use Menu as VespaokenMenu;

class Menu {

  public function show($classes = '') {
    VespaokenMenu::handler('main')->hydrate(function() {
      return MenuModel::all();
    }, function($children, $item) {
      $attributes = array();
      if($item->external) {
        $attributes['target'] = '_blank';
        $parse_url = parse_url($item->url);

        if(!isset($parse_url['scheme'])){
          $item->url = 'http://' . $item->url;
        }
      }

      $children->add($item->url, $item->title, VespaokenMenu::items($item->url), $attributes);
    });

    return VespaokenMenu::handler('main')->addClass($classes)->render();
  }

}