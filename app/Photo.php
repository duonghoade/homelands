<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $table = 'photos';
  protected $fillable = ['img', 'article_id'];

  public function article()
  {
    return $this->belongsTo('App\Article', 'article_id');
  }

}