<?php 
namespace Home\Model;
use Think\Model\RelationModel;

class GoodsModel extends relationModel{
	protected $_link = array(
		'comment' => self::HAS_MANY,

		);
}