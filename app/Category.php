<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public function articles()
    {
        return $this->hasMany('App\Articles','category_id');
    }

}
