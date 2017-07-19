<?php 
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	protected $_validate = array(
		array('username','3,10','用户名长度必须为3-10位',1,'length',3),
		array('email','email','邮箱格式不合法',1,'regex',3),
		array('password','6,16','密码长度为6-16位',1,'length',3),
		array('re_password','password','两次密码输入不一致',1,'confirm',3)
	);
	
}