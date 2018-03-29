<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

//订单模型
class Orders extends Model
{

    protected $table = 'orders';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    public    $arr_type=[];

    protected $guarded = [];  //排除敏感字段

    //反向关联 -商品模型        belongsTo('关联模型位置','外键','主键') 如果父模型主键 = $primaryKey 可不写
    public function goods(){

        return $this->belongsTo('App\Http\Model\goods','gid');
    }

    //反向关联 -用户模型
    public function user(){

        return $this->belongsTo('App\Http\Model\user','uid');
    }

    //反向关联 -订单状态模型
    public function orderstatus(){

        return $this->belongsTo('App\Http\Model\user','sid');
    }

    //反向关联 -订单状态模型
    public function addr(){

        return $this->belongsTo('App\Http\Model\addr','aid');
    }

    public function sel(){
        $goods = Orders::find(1)->goods;
        return $goods;
    }


}
