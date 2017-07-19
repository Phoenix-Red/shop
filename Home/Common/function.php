<?php 
	function cookie_check(){
		if(md5(cookie('username').C('salt')) === cookie('cooke')){
			return 1;
		}else{
			return 0;
		}
	}