<?php 
namespace Admin\Model;
use Think\Model;

class GoodsModel extends Model{
	protected $_validate = array(
		array('goods_name','3,10','商品名必须3-10位',1,'length',3),
		array('goods_sn','','商品已经存在,请重新添加',1,'unique'),
	);

	protected $_auto = array(
		array('add_time','time',1,'function'),
		array('last_update','time',2,'function')
	);

	//允许添加的字段.
	protected $insertFields = "goods_id,cat_id,goods_sn,goods_name,goods_number,goods_weight,shop_price,goods_desc,
goods_brief,ori_img,goods_img,thumb_img,is_best,
is_new,is_hot,is_sale,add_time";
}
