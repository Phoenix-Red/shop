<?php 
namespace Home\Controller;
use Think\Controller;

class FlowController extends Controller{
	public function checkout(){
		$goods = D('Goods');
		if(!$goods_info = $goods->find(I('get.goods_id'))){
			$this->redirect('/');
			exit;
		}else{
			$car = \Home\Tool\CarTool::getIns();
			//此时,无论加多少东西在购物车中都不能正常存在,因为每次页面都要重新执行.
			//因此,修改购物车类,改成单例模式.
			$car->add($goods_info['goods_id'],$goods_info['goods_name'],$goods_info['shop_price']);
      $this->assign('count',$car->calcType());
			$this->assign('buy',$car->items());
			$this->assign('money',$car->calcMoney());
			$this->display();
		}
	}

	public function done(){
    	$car = \Home\Tool\CarTool::getIns();
    	$oi = M('ordinfo');
    	$oi->create();
    	$oi->ord_sn = $ord_sn = date('YmdHis').rand(100000,999999);
    	$oi->user_id = cookie('user_id')?cookie('user_id'):0;
    	$oi->money = $car->calcMoney();
    	$oi->ordtime = time();
    	//echo $oi->add()?'ok':'fail';
    	if($ordinfo_id = $oi->add()){
    		$og = M('ordgoods');
    		$data = array();

    		foreach($car->items() as $k=>$v){
    			$row = array();
    			$row['goods_id'] = $k;
    			$row['goods_name'] = $v['goods_name'];
    			$row['shop_price'] = $v['shop_price'];
    			$row['goods_num'] = $v['num'];
    			$row['ordinfo_id'] = $ordinfo_id;
    			$data[] = $row;
    		}

    		if($og->addAll($data)){
    			$this->assign('ord_sn',$ord_sn);
    			$this->assign('money',$car->calcMoney());
    		}
    	}
    	$this->display();
    }


       public function pay(){
       //v_amount v_moneytype v_oid v_mid v_url key
       //'1009001'=>'#(%#WU)(UFGDKJGNDFG'
       $row = array();
       $row['v_amount'] = 0.01;//支付金额
       $row['v_moneytype'] = 'CNY';//币种
       $row['v_oid'] = date('YmdHis').mt_rand('1000,9999');//订单编号
       $row['v_mid'] = '1009001';//商户编号
       $row['v_url'] = 'http://127.0.0.1/2.php';//支付动作完成后返回到该url，支付结果以POST方式发送
       $row['key'] = '#(%#WU)(UFGDKJGNDFG';//
       $row['v_md5info'] = strtoupper(md5($row['v_amount'].$row['v_moneytype'].$row['v_oid'].$row['v_mid'].$row['v_url'].$row['key']));//MD5校验码
       $this->assign('pay',$row);
       $this->display();

    }
    public function overpay(){
    	echo $this->success('支付完成!','/',3);
    }

}