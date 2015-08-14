<?php
namespace Devfactory\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Menu extends Model {

  use Translatable;

  public $translatedAttributes = [
    'title',
  ];

  protected $fillable = [
    'title',
    'url',
    'weight',
    'external',
  ];

  /**
   * Validation rules for this model
   */
  public $rules = [
    'title' => 'required',
    'url' => 'required'
  ];

  public function newQuery($ordered = true) {
    $query = parent::newQuery();

    if (empty($ordered)) {
        return $query;
    }

    return $query->orderBy('weight', 'ASC');
  }

}

class MenuTranslation extends Model {

  public $timestamps = FALSE;

  protected $fillable = [
    'title',
  ];

}