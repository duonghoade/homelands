<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';
  protected $fillable = ['name', 'summary', 'price', 'unit', 'code', 'subcategory_id', 'guarantee', 'thick', 'hight_id'];

  public function sub_category()
  {
    return $this->belongsTo('App\SubCategory');
  }

  public function high()
  {
    return $this->belongsTo('App\HighLight', 'hight_id');
  }

  public function photos()
  {
    return $this->hasMany('App\Photo', 'product_id');
  }

  public static function make($str){
    if(!$str) return false;
    $unicode = array(
        'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd'=>array('đ'),
        'D'=>array('Đ'),
        'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
        'i'=>array('í','ì','ỉ','ĩ','ị'),
        'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
        '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
        'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
        'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
        'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
        'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
        '-'=>array(' ','&quot;','.',"'",'"'),
        ' '=>array('?')
    );

    foreach($unicode as $nonUnicode=>$uni){
        foreach($uni as $value)
            $str = str_replace($value,$nonUnicode,$str);
    }
    $str=trim(strtolower($str));
    $str=rtrim($str,"-");
    return $str;
  }

  public function title(){
    $str = $this->name;
    if(!$str) return false;
    $unicode = array(
        'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd'=>array('đ'),
        'D'=>array('Đ'),
        'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
        'i'=>array('í','ì','ỉ','ĩ','ị'),
        'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
        '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
        'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
        'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
        'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
        'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
        '-'=>array(' ','&quot;','.',"'",'"'),
        ' '=>array('?')
    );

    foreach($unicode as $nonUnicode=>$uni){
        foreach($uni as $value)
            $str = str_replace($value,$nonUnicode,$str);
    }
    $str=trim(strtolower($str));
    $str=rtrim($str,"-");
    return $str;
  }

}
