<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//所有分类
    	$tree = D('Admin/Cat')->getTree();
    	$this->assign('tree',$tree);
    	//热销商品
    	$hot_goods = D('Goods')->field('goods_id,goods_name,shop_price,market_price,thumb_img')->where('is_hot=1')->order('goods_id desc')->limit(4)->select();
    	$this-> assign('hot_goods',$hot_goods);
    	//精品推荐
    	$best_goods = D('Goods')->field('goods_id,goods_name,shop_price,market_price,thumb_img')->where('is_best=1')->order('goods_id desc')->limit(4)->select();
    	$this-> assign('best_goods',$best_goods);
    	//新品上市
    	$new_goods = D('Goods')->field('goods_id,goods_name,shop_price,market_price,thumb_img')->where('is_new=1')->order('goods_id desc')->limit(4)->select();
    	$this-> assign('new_goods',$new_goods);
        $this->display();
    }
}