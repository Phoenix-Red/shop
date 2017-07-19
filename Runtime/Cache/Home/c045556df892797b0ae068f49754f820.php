<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0153)./index.htm -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Generator" content="ECSHOP v2.7.3">

<meta name="Keywords" content="ECSHOP演示站">
<meta name="Description" content="ECSHOP演示站">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
<title>ECSHOP演示站 - </title>
<link rel="shortcut icon" href="./favicon.ico">
<link rel="icon" href="./animated_favicon.gif" type="image/gif">
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css">
<link rel="alternate" type="application/rss+xml" title="RSS|ECSHOP演示站 - " href="./feed.php">
</head>
<body>
<div class="head-bar clearfix">
<div class="block1">
    <div class="site-bar"><font id="ECS_MEMBERZONE"> 您好，欢迎光临本店！ 
    <?php if(cookie_check() == 0): ?><a href="<?php echo U('Home/User/login');?>" style="color:#50884b">登录</a> | 
    <a href="<?php echo U('Home/User/reg');?>" style="color:#50884b">免费注册</a>
    <?php else: ?>
    <?php echo (cookie('username')); ?> |
    <a href="<?php echo U('Home/User/logout');?>" style="color:#50884b">退出</a><?php endif; ?>
    </font></div>
      <ul class="sitelinks">
        <li><a href="<?php echo U('Home/Flow/checkout');?>" title="查看购物车">购物车有{}件商品</a></li>
        <li> <a href="<?php echo U('Home/Flow/checkout');?>">查看购物车</a> </li>         
        <li style=" margin-top:0px;*margin-top:-2px;">|</li>
        <li> <a href="./pick_out.php.htm">选购中心</a> </li>
        <li style=" margin-top:0px;*margin-top:-2px;">|</li>
        <li> <a href="./article_cat.php-id=3.htm">帮助中心</a> </li>       
      </ul>
  </div></div>
<div class="page-header clearfix">
  <div class="block1 clearfix" style="position:relative;">
    <div class="logo fl"><a href="./index.php.htm" title=""><img src="/Public/Home/images/logo.gif" width="311" height="55" alt=""></a></div>    
    <div class="btMap">
      <div class="search ">
        <form id="searchForm" name="searchForm" method="get" action="<?php echo U('Home/Cat/cat');?>">
          <div class="sideShadow"></div>
          <input type="text" name="keywords" class="keyWord" value="" id="keyword" onclick="javascript:this.value=&#39;&#39;;this.style.color=&#39;#333333&#39;;">
          <input type="submit" class="submit" value="">
        </form> 
      </div>
      <div class="guanjianzi">
        <ul>
          <li>热门搜索：</li>

          <li><a href="">大屏手机</a></li>

        </ul>
      </div>
      </div>
       <div class="tel">
        <p>400-8899-379</p>
      </div>
    </div>
  </div>
<div class="globa-nav clearfix" style="position:relative">
<div class="block1">  
  <div class="allMenu fl"> <a href="./index.php.htm" title="" style="font-size:15px;" class="index current">首页</a> 
    <a href="<?php echo U('Home/Cat/cat',array('cat_id'=>$cat_goods['cat_id']));?>" style="font-size:15px;" title="GSM手机">GSM手机</a> 
    <a href="" style="font-size:15px;" title="双模手机">双模手机</a> 
    <a href="" style="font-size:15px;" title="手机配件">手机配件</a> 
    <a href="" style="font-size:15px;" title="团购商品">团购商品</a> 
    <a href="" style="font-size:15px;" title="优惠活动">优惠活动</a>      
  </div>
</div>
</div>
	<div class="block1 clearfix">
	<div class="ur_here blank">
		当前位置: <a href="/">首页</a> 
    <?php if(is_array($mbx)): foreach($mbx as $key=>$m): ?><code>&gt;</code> 
    <a href=""><?php echo ($m['cat_name']); ?></a><?php endforeach; endif; ?>
	</div>  <div id="pageLeft" class="fl">
	 <h1 style="background:url(/Public/Home/images/sdgg.gif) repeat-x; height:27px; line-height:27px; padding-left:10px;"><a href=""><font style="color:#000; font-size:14px;">所有分类</font></a></h1>
	<div class="mod1 mod2 blank" id="historybox">
	<span class="lb"></span><span class="rb"></span>
	<div class="cagegoryCon clearfix">
  <?php if(is_array($tree)): foreach($tree as $key=>$t1): if($t1["parent_id"] == 0): ?><dl>
    <dt><?php echo ($t1["cat_name"]); ?></dt>
    <dd class="clearfix"> 
        <?php if(is_array($tree)): foreach($tree as $key=>$t2): if($t2['parent_id'] == $t1['cat_id']): ?><p class=""><a href="<?php echo U('Home/Cat/cat',array('cat_id'=>$t2['cat_id']));?>" title="<?php echo ($t2["cat_name"]); ?>" class="txtdot"><?php echo ($t2["cat_name"]); ?></a></p><?php endif; endforeach; endif; ?>    
    </dd>
  </dl><?php endif; endforeach; endif; ?>
</div>
	<div class="blank"></div>
	</div> 
	<h1 class="mod2tit" style="background:url(/Public/Home/images/sdgg.gif) repeat-x; height:27px; color:#000">浏览历史</h1>
	<div class="mod1 mod2 blank" id="topbox">
	<span class="lb"></span><span class="rb"></span>
	 <ul id="top10">
      <?php if(is_array($his)): foreach($his as $key=>$his): ?><li>
			 <div class="first">
			  <div class="fl">
				<font style="color:#F00; font-weight:bold"></font> <a href="<?php echo U('Home/goods/goods',array('goods_id'=>$his['goods_id']));?>" title="<?php echo ($his['goods_name']); ?>"><?php echo ($his['goods_name']); ?></a>
				</div>
				<div class="fr"><b class="f1">￥<?php echo ($his['shop_price']); ?>元</b></div>
			 </div>
			</li><?php endforeach; endif; ?>
		 </ul>
</div>
	</div>
	<div id="pageRight" class="fr">  	
	<div class="goodsTitle clearfix blank"> <span class="fl">商品列表</span>
  <form method="GET" class="sort fr" name="listform">
    显示方式： 
    <a href=""><img src="/Public/Home/images/display_mode_list.gif" alt=""></a> 
    <a href=""><img src="/Public/Home/images/display_mode_grid_act.gif" alt=""></a> 
    <a href=""><img src="/Public/Home/images/display_mode_text.gif" alt=""></a>&nbsp;&nbsp; 
    <a href=""><img src="/Public/Home/images/goods_id_DESC.gif" alt="按上架时间排序"></a>
    <a href=""><img src="/Public/Home/images/shop_price_default.gif" alt="按价格排序"></a>
    <a href=""><img src="/Public/Home/images/last_update_default.gif" alt="按更新时间排序"></a>
    <input type="hidden" name="category" value="1">
    <input type="hidden" name="display" value="grid" id="display">
    <input type="hidden" name="brand" value="0">
    <input type="hidden" name="price_min" value="0">
    <input type="hidden" name="price_max" value="0">
    <input type="hidden" name="filter_attr" value="0">
    <input type="hidden" name="page" value="1">
    <input type="hidden" name="sort" value="goods_id">
    <input type="hidden" name="order" value="DESC">
  </form>
</div>
<div class="clearfix modContent"> 
    <form name="compareForm" action="" method="post">
        <div class="clearfix grid"> 
    <?php if(is_array($cat_goods)): foreach($cat_goods as $key=>$cats): ?><div class="goodsbox1" style="margin: 5px 9px 8px 8px;*margin:5px 6px 10px 14px;">
        <div class="imgbox1"><a href="<?php echo U('/Home/goods/goods',array('goods_id'=>$cats['goods_id']));?>"><img src="<?php echo ($cats['thumb_img']); ?>" alt="<?php echo ($cats["goods_name"]); ?>"></a></div>
        <a href="<?php echo U('/Home/goods/goods',array('goods_id'=>$cats['goods_id']));?>" title="<?php echo ($cats["goods_name"]); ?>"><?php echo ($cats["goods_name"]); ?></a><br>
        <font class="market">￥<?php echo ($cats["market_price"]); ?>元</font> 
        <b class="f1">￥<?php echo ($cats["shop_price"]); ?>元</b><br>
      </div><?php endforeach; endif; ?>
    </div>
      </form>
</div>

<div class="pagebar">
<form name="selectPageForm" action="http://free.68ecshop.com/hechaw2013/category.php" method="get">
 <div id="pager">
  总计 <b>15</b>  个记录                      <span class="page_now">1</span>
                      <a href="">2</a>
            
  <a class="next" href="">下一页</a>    </div>
</form>
</div>
	</div>
</div>
<div class="pageFooter">
  <div class="artBox ">
    <div class="artList"> 
      <div class="list">
        <h4>新手上路 </h4>
        <ul>
          <li><a href="" target="_blank" title="售后流程">售后流程</a> </li>
          <li><a href="" target="_blank" title="购物流程">购物流程</a> </li>
          <li><a href="" target="_blank" title="订购方式">订购方式</a> </li>
        </ul>
      </div>
      <div class="list">
        <h4>手机常识 </h4>
        <ul>
          <li><a href="" target="_blank" title="如何分辨原装电池">如何分辨原装电池</a> </li>
          <li><a href="" target="_blank" title="如何分辨水货手机 ">如何分辨水货手机</a> </li>
          <li><a href="" target="_blank" title="如何享受全国联保">如何享受全国联保</a> </li>                    
        </ul>
      </div>
      <div class="list">
        <h4>配送与支付 </h4>
        <ul>
          <li><a href="" target="_blank" title="货到付款区域">货到付款区域</a> </li>
          <li><a href="" target="_blank" title="配送支付智能查询 ">配送支付智能查询</a> </li>
          <li><a href="" target="_blank" title="支付方式说明">支付方式说明</a> </li>                   
        </ul>
      </div>
      <div class="list">
        <h4>会员中心</h4>
        <ul>
          <li><a href="" target="_blank" title="资金管理">资金管理</a> </li>
          <li><a href="" target="_blank" title="我的收藏">我的收藏</a> </li>
          <li><a href="" target="_blank" title="我的订单">我的订单</a> </li>
        </ul>
      </div>
      <div class="list">
        <h4>服务保证 </h4>
        <ul>
          <li><a href="" target="_blank" title="退换货原则">退换货原则</a> </li>
          <li><a href="" target="_blank" title="售后服务保证 ">售后服务保证</a> </li>
          <li><a href="" target="_blank" title="产品质量保证 ">产品质量保证</a> </li>
        </ul>
      </div>
      <div class="list">
        <h4>联系我们 </h4>
        <ul>
          <li><a href="" target="_blank" title="网站故障报告">网站故障报告</a> </li>
          <li><a href="" target="_blank" title="选机咨询 ">选机咨询</a> </li>
          <li><a href="" target="_blank" title="投诉与建议 ">投诉与建议</a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="block tc" style=""> <img src="/Public/Home/images/serviceImg1.jpg"> </div>
<div class="block tc" style="margin-bottom:20px;"> 
  <a href="">免责条款</a>| 
  <a href="">隐私保护</a>| 
  <a href="">咨询热点</a>| 
  <a href="">联系我们</a>| 
  <a href="">公司简介</a>| 
  <a href="">批发方案</a>| 
  <a href="">配送方式</a> 
<br>
<br>  
   <a href="" style="display:none;">68ECSHOP模版中心</a>  
<br>   
  共执行 5 个查询，用时 0.021133 秒，在线 17 人，Gzip 已禁用，占用内存 3.415 MB<img src="./api/cron.php-t=1452023217" alt="" style="width:0px;height:0px;"><br>
</div>
</body></html>