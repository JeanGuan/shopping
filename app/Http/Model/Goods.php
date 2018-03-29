<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

//商品模型
class Goods extends Model
{

    protected $table = 'goods';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $arr_type = [];

    protected $guarded = [];  //排除敏感字段
    static $pid='';

    //关联评论模型
    public function comment() {
        return $this->hasMany('\App\Http\Model\Comment','gid');
    }

    //商品查询
    public function sel(){
        $goods = Goods::orderby('id','desc')->paginate(15);
        foreach ($goods as $v){
            $types = Types::get();
            foreach ($types as $t){
                if ($v->tid == $t->id){
                    $v['typename'] = $t['typename'];
                }
            }
        }
        return $goods;
    }

    //商品添加提交
    public function add(){
        $input = Input::except('_token','file','show');

        //商品分类层级path
        $tid =  $input['tid'];
        $data = Types::where("id",$tid)->first();
        self::$pid = $tid;
        $str = '';
        for ($i=0;$i<=$data['level'];$i++){
            $data = Types::where("id",self::$pid)->first();
            $str .= $data['pid'].',';
            self::$pid = $data['pid'];
        }

        $input['path'] = ','.$str;

        //商品图片处理
        if(isset($input['picarr'])) {
            if (is_array($input['picarr'])) {
                $info = $input['info'];

                foreach ($input['picarr'] as $key => $v) {
                    $row[$key]['img'] = $v;
                    $row[$key]['info'] = $info[$key];
                }

                $input['picarr'] = serialize($row);
            }
            unset($input['info']);
        }

        //商品属性（笛卡尔积）
        $input['goodsattr'] = '';
        $input['attr'] = '';

        if(isset($input['attrs_group'])&&isset($input['price'])){

            $list = $input['attrs_group'];
            $attr_num = count($list);
            $titles=array();
            $attrs=array();
            for($i=0;$i<$attr_num;$i++){
                if(isset($input['attrs'.$i])){
                    $title['title'] = $input['attrs_group'][$i];
                    $title['attrs'] = $input['attrs'.$i];

                    $titles[]=$title;
                    $attrs[]=$input['attrs'.$i];
                }
            }
            $a = self::Descartes($attrs);
            $arra=array();
            for($i=0;$i<count($a);$i++){
                $arr=array();
                $attrs_key=implode('_',$a[$i]);
                $arr['price']=$input['price'][$i];
                $arr['oldprice']=$input['oldprice'][$i];
                $arr['homenum']=$input['homenum'][$i];
                $arra[$attrs_key]=$arr;
            }
            $input['goodsattr'] = serialize($arra);
            $input['attr'] = serialize($titles);
            unset($input['attrs0']);
            unset($input['attrs1']);
            unset($input['attrs2']);
            unset($input['attrs3']);
            unset($input['homenum']);

            unset($input['price']);
            unset($input['oldprice']);
        }
        unset($input['attrs_group']);


        $re = Goods::create($input);
        return $re;
    }

    //商品编辑
    public function edit($id){
        $goods = Goods::find($id);
        return $goods;
    }

    //商品更新
    public function upd($id){
        $input = Input::except('_token','_method','show');

        //商品组图数据处理
        if (isset($input['picarr'])){
            if(is_array($input['picarr']))
            {
                $info = $input['info'];

                foreach($input['picarr'] as $key=>$v){
                    $row[$key]['img'] = $v;
                    $row[$key]['info'] = $info[$key];
                }

                $input['picarr'] =  serialize($row);
            }
            unset($input['info']);
            unset($input['picimg']);
        }


        //商品 笛卡尔积数据处理
        $input['goodsattr'] = '';
        $input['attr'] = '';

        if(isset($input['attrs_group'])&&isset($input['price'])){
            $list = $input['attrs_group'];
            $attr_num = count($list);
            $titles=array();
            $attrs=array();
            for($i=0;$i<$attr_num;$i++){
                if(isset($input['attrs'.$i])){
                    $title['title'] = $input['attrs_group'][$i];
                    $title['attrs'] = $input['attrs'.$i];

                    $titles[]=$title;
                    $attrs[]=$input['attrs'.$i];
                }
            }

            $a = self::Descartes($attrs);
            $arra=array();
            for($i=0;$i<count($a);$i++){
                $arr=array();
                $attrs_key=implode('_',$a[$i]);
                $arr['price']=$input['price'][$i];
                $arr['oldprice']=$input['oldprice'][$i];
                $arr['homenum']=$input['homenum'][$i];
                $arra[$attrs_key]=$arr;
            }
            $input['goodsattr'] = serialize($arra);
            $input['attr'] = serialize($titles);

            unset($input['attrs0']);
            unset($input['attrs1']);
            unset($input['attrs2']);
            unset($input['attrs3']);
            unset($input['homenum']);

            unset($input['price']);
            unset($input['oldprice']);
        }
        unset($input['attrs_group']);


        $re = Goods::where('id',$id)->update($input);
        return $re;
    }

    //商品删除
    public function del($id){
        $re = Goods::where('id',$id)->delete();
        return $re;
    }

    //商品品牌
    public function brand(){
        $brand = Brand::get();
        return $brand;
    }


    public function getAttr(){
        $typeid = Input::get('typeid');
        $attrs = Protype::where(['id'=>$typeid])->first();
        $attrs = unserialize($attrs['attrs']);
        return json_encode($attrs);

    }

    public static function Descartes($t) {
        if(count($t) == 1) //return call_user_func_array( __FUNCTION__, $t[0] );
        {
            $a = array_shift($t);
            $r=array();
            foreach($a as $v){
                $r[]=array($v);
            }
            return $r;
        }
        else{
            $a = array_shift($t);
            if(! is_array($a)) $a = array($a);
            $a = array_chunk($a, 1);
            do {
                $r = array();
                $b = array_shift($t);
                if(! is_array($b)) $b = array($b);
                foreach($a as $p)
                    foreach(array_chunk($b, 1) as $q)
                        $r[] = array_merge($p, $q);
                $a = $r;
            }while($t);

            return $r;
        }
    }

}
?>