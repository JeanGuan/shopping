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

    //商品评论查询
    public function comment(){
        $comment = Comment::select('comment.*','user.username','goods.picurl','goods.title')
            ->join('user','user.id','=','comment.uid')
            ->join('goods','goods.id','=','comment.gid')
            ->orderBy('comment.time','desc')->paginate(10);
        return $comment;
    }



}
?>