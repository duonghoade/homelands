<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $table = 'photos';
  protected $fillable = ['img', 'product_id'];

  public function product()
  {
    return $this->belongsTo('App\Product', 'product_id');
  }

}