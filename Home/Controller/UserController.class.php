<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function login(){
        if(!IS_POST){
            $this->display();    
        }else{
            if($this->checkyzm(I('post.yzm'))){
                $username = I('post.username');
                $password = I('post.password');
                $user = D('User')->where("username='$username'")->find();
                $salt = $user['salt'];
                if($user['password'] === md5($password.$salt)){
                    //echo "登陆成功!";
                    cookie('username',$user['username']);
                    cookie('cooke',md5($user['username'].C('salt')));
                    $this->redirect('/');
                }else{
                    echo "用户名或者密码错误";
                }

            }
        }
    }
    //退出
    public function logout(){
        cookie('username',null);
        $this->redirect('/');
    }
    public function yzm(){
    	$v = new \Think\Verify();
    	$v->imageW = 125;
    	$v->imageH = 35;
    	$v->fontSize = 20;
    	$v->length = 4;
    	$v->useNoise = false;
    	$v->useCurve = false;
    	$v->entry();
    }

    public function checkyzm(){
    	$v = new \Think\Verify();
    	if($v->check(I('post.yzm'))){
    		return true;
    	}else{
    		echo "验证码都看不清吗?";
    	}
    }
    public function reg(){
        if(!IS_POST){
            $this->display();
        }else{
            $userModel = D('User');
            if(!$userModel->create()){
                echo $userModel->getError();
            }else{
                $yan = $this->yan();
                $userModel->password = md5(($userModel->password).$yan);
                $userModel->salt = $yan;
                if($userModel->add()){
                   $this->redirect('Home/User/login'); 
                }
            }
        }
    }
    public function yan(){
        return mt_rand(11111,99999);
    }
}