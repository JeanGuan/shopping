<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;


//商品分类模型
class Types extends Model
{

    protected $table = 'types';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $arr_type = [];

    protected $guarded = [];  //排除敏感字段

    //商品分类查询
    public  function tree(){
        // $categorys = $this->get();

        $this->getTree(0);

        $types = $this->arr_type;

        return $types;
    }


    //商品分类添加提交
    public function add(){
        $input = Input::except('_token','file');
        //根据父ID求出等级
        $level = Types::where('id',$input['pid'])->first();
        $input['level'] = $level['level'] + 1;

        $re = Types::create($input);
        return $re;
    }

    //商品分类编辑
    public function edit($id){
        $types = Types::find($id);
        return $types;
    }

    //商品分类更新
    public function upd($id){

        //except() 排除不需要的表单值
        $input = Input::except('_token','_method','file');

        $re = Types::where('id',$id)->update($input);
        return $re;
    }

    //商品分类删除
    public function del($id){
        //删除一级分类 自动删除下级所有分类
        $re = Types::where('id',$id)->delete();
        return $re;
    }

    //商品分类排序
    public function change(){
            $input = Input::all();
            $cate = Types::find($input['id']);
            $cate->sort = $input['sort'];
            $re = $cate->Update();
            return $re;
    }


    //商品无限极分类
    public function getTree($id=0, $i=0)
    {

        $res = $this->where('pid', $id)->orderby('sort', 'asc')->get(); //先循环一级分类

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