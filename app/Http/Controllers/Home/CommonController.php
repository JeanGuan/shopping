<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/3 0003
 * Time: 15:00
 */

namespace App\Http\Controllers\Home;

require_once 'org/code/Code.class.php';
use App\Http\Controllers\Controller;
use App\Http\Model\Types;

class CommonController extends Controller
{
    //验证码
    public function code(){

        $code = new \Code();
        $code->make();
    }

    //左侧分类树
    public function Tree(){
        $type = Types::orderBY('sort','asc')->get();
        $types = $this->checkTypeData($type);
        return $types;
    }

    //递归 左侧分类处理
    public function checkTypeData($data,$pid=0){

        $newArr = array();
        foreach($data as $k=>$v){
            if ($v->pid == $pid){
                $newArr[$v->id] = $v;
                $newArr[$v->id]['subclass'] = $this->checkTypeData($data,$v->id);
            }
        }
        return $newArr;
    }

}