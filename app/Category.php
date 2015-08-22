<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'categories';
  protected $fillable = ['name', 'type', 'img'];

  public function subs()
  {
    return $this->hasMany('App\SubCategory');
  }

  public function products()
    {
      return $this->hasManyThrough('App\Product', 'App\SubCategory');
    }

}