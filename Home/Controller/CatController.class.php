<?php
namespace Home\Controller;
use Think\Controller;
class CatController extends Controller {
    public function cat(){
    	//所有分类
    	$tree = D('Admin/Cat')->getTree();
    	$this->assign('tree',$tree);
    	if(I('get.cat_id')){
        	$cat_id = I('get.cat_id');
            $this->assign('his',array_reverse(session('history')));
            $cats = D('Goods')->field('goods_id,goods_name,shop_price,market_price,thumb_img')->where("cat_id=$cat_id")->select();
            $this-> assign('cat_goods',$cats);
        	$this->assign('mbx',$this->mbx($cat_id));   
            $this->display();
        }elseif(I('get.keywords')){
            $keywords = I('get.keywords');
            $goodsModel = M('Goods');
            $where['goods_name'] = array('like',"%{$keywords}%");;
            $cats = $goodsModel->where($where)->select();
            $this->assign('cat_goods',$cats);
            $this->assign('mbx',$this->mbx($cat_id)); 
            $this->display();
        }
    }
    public function mbx($cat_id){
    	$row = D('Cat')->find($cat_id);
    	$tree[] = $row;
    	
    	while($row['parent_id']>0){
    		$row = D('Cat')->find($row['parent_id']);
    		$tree[] = $row;
    	} 
    	return array_reverse($tree);
    }
}
