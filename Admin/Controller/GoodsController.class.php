<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function goodsAdd(){
        //$this->display();
        if(!IS_POST){
        	$this->display();
        }else{
        	$goodsModel= D('Goods');
            $upload = new \Think\Upload();
            //$upload->maxSize = 3145728 ;//设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/up/'; // 设置附件上传根目录
            $info = $upload->upload();
            if(!$info){
                var_dump($upload->getError());
                exit();
            }else{

                //这是原图地址存到数据库中的
                $_POST['goods_img'] = '/Public/up/'.$info['goods_img']['savepath'].$info['goods_img']['savename'];

                //缩略图需要打开的地址.
                $path = './Public/up/'.$info['goods_img']['savepath'].$info['goods_img']['savename'];

                $img = new \Think\Image();
                $img->open($path);

                //保存的缩略图的路径
                $thumb_path = './Public/up/thumb/'.$info['goods_img']['savename'];


                //这是需要存到数据库的不带点的路径
                $thumb_path1 = '/Public/up/thumb/'.$info['goods_img']['savename'];
                $img->thumb(208,208)->save($thumb_path);//

                $_POST['thumb_img'] = $thumb_path1;
            }

        	if(!$goodsModel->create()){
        		echo $goodsModel->getError();
        		exit();
        	}else{
                if($goods_id = $goodsModel->add()){
                    $model = M('goods_attr');
                    $model->goods_id = $goods_id;
                    $model->attr_key = $_POST['size'];
                    $model->attr_value = $_POST['color'];
                    $model->add();
                } 

                
        	}
        	//print_r($_POST);
        }
    }

    public function goodslist(){
        //$model = new \Home\Model\GoodsModel();
        $model = D('Goods');
        $count = $model->count();
        $page = new \Think\Page($count,10);
        $show = $page->show();//这是出来的页码数

        $goods = $model->field('goods_id,goods_name,goods_sn,shop_price,is_on_sale,is_best,is_new,is_hot,goods_number')->order('goods_id desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        //print_r($goods);
        $this->assign('goods',$goods);
        $this->display();
    }

    public function goodsdel(){
        $model = D('Goods');
        $res = $model->delete(I('get.goods_id'));//影响行数
        if($res){
            $this->redirect('Admin/Goods/goodslist');
        }else{
            echo "失败";
        }
    }
}