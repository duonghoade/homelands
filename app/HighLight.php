<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'highlights';
  protected $fillable = ['name', 'type'];

  public function product()
    {
      return $this->hasOne('App\Product', 'hight_id');
    }

}