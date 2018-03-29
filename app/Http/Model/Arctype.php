<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//文章分类模型
class Arctype extends Model
{

    protected $table = 'arctype';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $arr_type = [];

    protected $guarded = [];  //排除敏感字段

    //文章分类查询
    public  function tree(){
        $this->getTree(0);

        $types = $this->arr_type;

        return $types;
    }

    //文章分类添加
    public function add(){
        $input = Input::except('_token','file');
        $re = Arctype::create($input);
        return $re;
    }

    //文章分类编辑
    public function edit($id){
        $field = Arctype::find($id);
        return $field;
    }

    //文章分类更新
    public function upd($id){
        $input = Input::except('_token','_method','file');
        $re = Arctype::where('id',$id)->update($input);
        return $re;
    }

    //文章分类排序
    public function change(){
        $input = Input::all();
        $cate = Arctype::find($input['id']);
        $cate->order_id = $input['order_id'];
        $re = $cate->Update();
        return $re;
    }

    //文章无限极分类
    public function getTree($id=0, $i=0)
    {

        $res = $this->where('pid', $id)->orderby('order_id', 'asc')->get(); //先循环一级分类

        foreach ($res as &$v) {
            $title = '';
            for ($p = 1; $p < $i; $p++) {
                $title .= '&nbsp;&nbsp;&nbsp;';
            }

            if ($v['pid'] != 0) {
                $title .= '|--- ';
            }
            $title .= $v['typename'];
            $v['typename'] = $title;
            $arr = array_push($this->arr_type, $v);

            $this->getTree($v['id'], $i + 2);
        }

    }

}

?>