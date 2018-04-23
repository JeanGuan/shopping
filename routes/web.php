<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//前台路由
Route::get('/','Home\IndexController@index');                       //前台首页

Route::any('/register','Home\RegisterController@index');            //用户注册
Route::any('/login','Home\LoginController@index');                  //用户登录
Route::get('/logout','Home\LoginController@logout');                //用户退出
Route::get('/code','Home\CommonController@code');                   //生成验证码


Route::get('/sms','Home\SmsController@phoneCode');                  //手机短信验证码
Route::get('/CheckPhone','Home\AjaxController@CheckPhone');         //ajax验证
Route::get('/Checkcode','Home\AjaxController@Checkcode');           //验证码检测


Route::get('/types/{id}','Home\TypesController@index');             //商品分类
Route::get('/goods/{id}','Home\GoodsController@index');             //商品详情
Route::POST('/goods/ajaxComment','Home\AjaxController@ajaxComment');       //商品详情评论

Route::get('/cart','Home\CartController@index');                        //购物车
Route::post('/addCart','Home\CartController@addCart');                   //加入购物车
Route::post('/addCart/stock','Home\AjaxController@ajaxStock');           //更新商品数量
Route::post('/addCart/delCart','Home\CartController@delCart');           //移除购物车

Route::get('/order','Home\OrderController@index');                       //订单
Route::post('/order/addOrder','Home\OrderController@addOrder');           //订单提交
Route::get('/pay','Home\PayController@index');                            //订单支付


Route::resource('addr','AddrController');                           //收货地址
Route::POST('/addrLinkage','Home\AjaxController@addrLinkage');       //ajax地区联动
Route::POST('/ajaxArea','Home\AjaxController@ajaxArea');        //ajax订单添加地址


Route::group(['namespace'=>'Home','middleware'=>'homeLogin'],function() {

    Route::get('/person','PersonController@index');                      //个人中心
    Route::get('/person/info','PersonController@info');                 //个人资料

    Route::get('/person/order','PersonController@order');               //个人订单
    Route::post('/person/orderDetail','PersonController@orderDetail');    //个人订单详情
    Route::post('/person/delOrder','PersonController@delOrder');         //个人订单删除
    Route::post('/person/cancelOrder','PersonController@cancelOrder');    //个人订单取消

    Route::get('/person/addrList','PersonController@addrList');    //个人地址
    Route::post('/person/delAddr','PersonController@delAddr');    //个人删除
    Route::post('/person/createAddr','PersonController@createAddr');    //个人地址添加



});



//后台路由
Route::any('admin/login', 'Admin\LoginController@index');           //后台登录
Route::get('admin/logout','Admin\LoginController@logout');          //注销登录

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'adminLogin'],function(){
    //命名空间,前缀,中间件

    Route::get('/', 'IndexController@index');                        //后台主页
    Route::resource('admin','AdminController');                     //管理员
    Route::resource('admintypes','AdmintypesControllers');          //管理组


    Route::resource('user','UserController');                       //用户
    Route::resource('usertypes','UsertypesController');             //用户组

    Route::resource('article','ArticleController');                      //文章
    Route::resource('arctype','ArctypeController');                      //文章分类
    Route::post('arctype/changeOrder', 'ArctypeController@changeOrder');   //文章分类排序


    Route::resource('goods','GoodsController');                        //商品
    Route::resource('types','TypesController');                        //商品分类
    Route::post('types/changeOrder', 'TypesController@changeOrder');   //商品分类排序
    Route::resource('brand','BrandController');                        //商品品牌
    Route::get('comment','CommentController@index');                   //商品评论
    Route::post('comment/status','CommentController@status');           //商品评论状态


    Route::get('orders','OrdersController@index');                             //订单
    Route::get('orders/details','OrdersController@details');                  //订单详情
    Route::get('orders/status/edit/{sid}','OrdersController@statusEdit');          //订单状态编辑
    Route::post('orders/status/update/{id}','OrdersController@statusUpdate');          //订单状态更新
    Route::get('orders/status','OrdersController@statusList');          //订单状态管理


    Route::resource('slider','SliderController');                           //轮播图
    Route::post('slider/changeOrder', 'SliderController@changeOrder');      //轮播图排序
    Route::resource('ads','AdsController');                                 //广告
    Route::post('ads/changeOrder', 'AdsController@changeOrder');            //广告排序


    Route::any('upload','CommonController@upload');         //单图上传
    Route::any('uploads','CommonController@uploads');       //产品多图上传
    Route::any('upldel','CommonController@upldel');         //图片删除

    Route::get('flush','IndexController@flush');            //清除站点缓存



    Route::resource('config','ConfigController');                      //系统配置

});
