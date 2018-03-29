<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
//商品评论模型
class Comment extends Model
{

    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $arr_type = [];

    protected $guarded = [];  //排除敏感字段

    //获取该评论的商品
    public function good(){
        return $this->belongsTo('App\Http\Model\Goods');
    }


}
?>