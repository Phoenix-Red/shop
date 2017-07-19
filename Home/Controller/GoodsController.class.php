<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function goods(){
        $goods = D('Goods');
    	$goods_info = $goods->find(I('get.goods_id'));
        if($goods_info){
            $this->history($goods_info);
        }
    	$this->assign('goods',$goods_info);
        //评论列表
        $goods_comment = $goods->relationGet('comment');
        $this->assign('goods_comment',$goods_comment);
        //面包屑查询
        $this->assign('mbx',$this->mbx($goods_info['cat_id']));
        
        $this->display();
    }
    //面包屑查询
    public function mbx($cat_id){
    	$row = D('Cat')->find($cat_id);
    	$tree[] = $row;
    	
    	while($row['parent_id']>0){
    		$row = D('Cat')->find($row['parent_id']);
    		$tree[] = $row;
    	} 
    	return array_reverse($tree);
    }
    public function history($goods_info){
        //判断session里面有没有历史,没有为空 有的话把session的值赋给$row
        $row = session('?history')?session('history'):array();
        $g = array();
        $g['goods_name'] = $goods_info['goods_name'];
        $g['shop_price'] = $goods_info['shop_price'];
        $g['goods_id'] = $goods_info['goods_id'];
        $row[$goods_info['goods_id']] = $g;
        //假如大于5条,删除第一条
        if(count($row)>5){
            $key = key($row);
            unset($row[$key]);
        }
        session('history',$row);
    }


    //添加评论
    public function addcomment(){
        $comment = D('comment');
        if($comment->add($_POST)){
            echo $this->success('添加评论成功!');
        }else{
            echo $this->getError();
        }
    }

}
