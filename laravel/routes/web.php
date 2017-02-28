<?php

Route::get('/',"IndexController@index");

Route::get('/system',"IndexController@system");

Route::get('search_type',"IndexController@search_type");
Route::get('askforData',"IndexController@askforData");

Route::get('redis',"IndexController@showProfile");

Route::group(['middleware' => ['web','admin.login.login']], function () {
	Route::get('addArticle',"CenterController@addArticle");
	Route::get('center',"CenterController@index");
	Route::get('comment_article',"CenterController@comment");
	Route::post('add_pro',"CenterController@add_pro");
	Route::get('/center',"CenterController@index");
	//我的铺子
	Route::get('op',"CenterController@shop");
	//我的动态
	Route::get('/condition',"CenterController@condition");
	//我的收藏
	Route::get('/collect',"CenterController@collect");
	//我的私信
	Route::get("/private","CenterController@private");
	//我的好友
	Route::get("/friend","CenterController@friend");
	//发表的文章
	Route::get("/issue","CenterController@issue");
	//草稿
	Route::get("/draft","CenterController@draft");	
	//草稿详情
	Route::get("draft_detail","CenterController@draft_detail");	
	//草稿修改
	Route::post("up_draft","CenterController@up_draft");	
	//个人资料
	Route::get("/information","CenterController@information");
	//个人信息入库
	Route::any('/user_information',"CenterController@user_information");
	//修改头像
	Route::get("/head","CenterController@head");
	//修改头像入库
	Route::any("/update_head","CenterController@update_head");
	//修改头像的极点即改
	Route::any("/image_update","CenterController@image_update");
	//修改密码
	Route::get("/password","CenterController@password");
	//修改密码入库
	Route::get("/update_password","CenterController@update_password");
	//私信页面
	Route::get('private',"CenterController@private_latter");
//添加私信
	Route::post('add_private',"CenterController@add_private");
//私信标题
	Route::get('private_list',"CenterController@private_list");
//私信详情
	Route::get('private_connect',"CenterController@private_connect");
//回复私信
	Route::post('reply_private',"CenterController@reply_private");

});

//友情链接
Route::get('friendlyLink',"IndexController@friendlyLink");
//关于我们
Route::get('about',"IndexController@about");
//隐私政策
Route::get('serect',"IndexController@serect");

//评论用户的详情信息
Route::get('user_info',"IndexController@user_info");
// 展示帮帮忙页面
Route::get('help_show',"HelpController@help_show");
//意见信息提交
Route::post('help_add',"HelpController@help_add");

Route::get('add',"RegisterController@add");
Route::get('register_add',"RegisterController@register_add");
Route::get('only_name',"RegisterController@only_name");
Route::get('check',"RegisterController@check");
Route::post('login',"RegisterController@login");
Route::get('up_pwd',"RegisterController@up_pwd");
//获取微信用户信息
Route::get('weixin_login',"RegisterController@weixin_login");
//回调模式
Route::get('weixin_huidiao',"RegisterController@weixin_huidiao");
Route::post('check_pwd',"RegisterController@check_pwd");
//文章详情
Route::get('/zhengwen',"IndexController@zhengwen");
//举报文章
Route::get('report',"IndexController@report");
Route::post('/zhengwen',"IndexController@reply");
//点赞
Route::post('/user_like_article',"IndexController@user_like_article");
//收藏文章
Route::post('/collect',"IndexController@collect");
//关注作者
Route::post('/attentd',"IndexController@attentd");
Route::get('user_login',"RegisterController@user_login");

//取消关注 hhj
Route::post('clear_attentd',"CenterController@clear_attentd");
