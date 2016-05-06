<?php namespace Devfactory\Menu\Controllers;

use Illuminate\Http\Request;

use Devfactory\Menu\Models\Menu;
use Config;
use Input;
use Lang;
use Redirect;
use URL;
use View;
use App;
use App\Libs\Helpers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class MenuController extends BaseController {

	use DispatchesJobs, ValidatesRequests;

  protected $model;

  /**
   * Initializer.
   *
   * @return void
   */
  public function __construct(Menu $menu) {
    $this->model = $menu;

    $layout = (object) [
      'extends' => config('menu_admin.config.layout.extends'),
      'header' => config('menu_admin.config.layout.header'),
      'content' => config('menu_admin.config.layout.content'),
    ];

    View::share('layout', $layout);
  }
  /**
   * Show a list of all the menu.
   *
   * @return View
   */
  public function getIndex() {

    $menus = Menu::all();

    return view('menu_admin::index', compact('menus'));
  }

  /**
   * Show a list of all the menu.
   *
   * @return View
   */
  public function getCreate() {
    return view('menu_admin::create');
  }

  public function postStore(Request $request) {
     $this->validate($request, isset($this->model->rules_create) ? $this->model->rules_create : $this->model->rules);

    $fillable_data = array_only($request->all(), $this->model->getFillable());

    App::setLocale(Helpers::getLang());

     $menu = $this->model->create($fillable_data);

     return Redirect::to(action('\Devfactory\Menu\Controllers\MenuController@getIndex'))->with('success', 'Created');
  }

  public function getEdit($id) {
    $menu = $this->model->findOrFail($id);

    App::setLocale(Helpers::getLang());

    return view('menu_admin::edit', compact('menu'));
  }

  public function putUpdate($id, Request $request) {
    $this->validate($request, isset($this->model->rules_update) ? $this->model->rules_update : $this->model->rules);

    $menu = $this->model->findOrFail($id);

    $fillable_data = array_only($request->all(), $this->model->getFillable());

    App::setLocale(Helpers::getLang());

    $menu->update($fillable_data);

     return Redirect::to(action('\Devfactory\Menu\Controllers\MenuController@getIndex'))->with('success', 'Updated');
  }

  public function deleteDestroy($id) {
    $this->model->destroy($id);

    return response()->json(['OK']);
  }

}