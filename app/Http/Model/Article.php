<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//文章模型
class Article extends Model
{

    protected $table = 'article';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $arr_type = [];

    protected $guarded = [];  //排除敏感字段

    //文章查询
    public function sel(){
        $article = Article::orderBy('time','desc')->paginate(15);
        foreach ($article as $v){
            $arctype =  Arctype::get();
            foreach ($arctype as $a){
                if($v->typeid == $a->id){
                    $v['typename']=$a['typename'];
                }
            }
        }
        return $article;
    }

    //文章添加提交
    public function add(){
        $input = Input::except('_token','file');

        //判断是否选择发布时间
        if ($input['time'] == false){
            $input['time']=time();
        }else{
            $input['time']=strtotime($input['time']);
        }

        $re = Article::create($input);
        return $re;
    }

    //文章编辑
    public function edit($id){
        $field = Article::find($id);
        return $field;
    }

    //文章更新
    public function upd($id){
        $input = Input::except('_token','_method','file');

        //判断是否选择发布时间
        if ($input['time'] == false){
            $input['time']=time();
        }else{
            $input['time']=strtotime($input['time']);
        }

        $re = Article::where('id',$id)->update($input);
        return $re;
    }












    //文章删除
    public function del($id){
        $re = Article::where('id',$id)->delete();
        return $re;
    }



}


?>