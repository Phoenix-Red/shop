<?php
namespace Admin\Controller;
use Think\Controller;
class CatController extends Controller {

	//栏目的增加
    public function cateAdd(){
    	if(!IS_POST){
			$this->display();
    	}else{
            //print_r($_POST);
            $catModel = D('Cat');
            //属性添加.
            if(!$catModel->create()){
                echo $catModel->getError();
                exit();
            }else{
                if($cat_id = $catModel->add($_POST)){
                    $model = D('attr');

                    $info = array();
                    //尺寸
                    $value_size = implode(',',$_POST['attr_value']);

                    //颜色
                    $value_color = implode(',',$_POST['attr_value1']);
                    $attr_name = $_POST['attr_name'];
                    $attr_key = $_POST['attr_key'];
                    $attr_name1 = $_POST['attr_name1'];
                    $attr_key1 = $_POST['attr_key1'];

                    $info[] = array('cat_id'=>$cat_id,'attr_value'=>$value_size,'attr_name'=>$attr_name,'attr_key'=>$attr_key);
                    $info[] = array('cat_id'=>$cat_id,'attr_value'=>$value_color,'attr_name'=>$attr_name1,'attr_key'=>$attr_key1);    
                    $model->addAll($info);
                }
            }
    		
    		
    	}      
    }
    //栏目的列表
    public function catelist(){
     	$catModel = D('Cat');
        $cat = S('catlist');
        if($cat == false){
            echo "这是从数据库读出来的,并不是缓存";
            $catlist = $catModel->getTree();
            S('catlist',$catlist,5);//设置缓存时间5秒,及5秒后缓存失效
        }else{
            echo "这是从缓存出来的数据";
            $catlist = $cat;
        }
        
       
     	$this->assign('list',$catlist);
     	$this->display();
    }

    //栏目删除
    public function catedel(){
    	$catModel = D('Cat');
    	$cat_id = I('cat_id');
    	//echo $cat_id;
    	$catModel->delete($cat_id);
    	$this->success('删除成功','',3);
    }

    public function catedit(){

     	$catModel = D('Cat');
		if(!IS_POST){
			$cat_id = I('cat_id'); 
	    	$catinfo = $catModel->find($cat_id);
	    	//print_r($catinfo); 
	    	$this->assign('info',$catinfo);
	    	$this->display(); 
		}else{
			//print_r($_POST);
			$catModel->where('cat_id='.$_POST['cat_id'])->save($_POST);
		}		
    }
}