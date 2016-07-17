<?php
class Auth{
	public function __construct(){
		if(ADMIN_LOGIN===$_POST['username'] && ADMIN_PASS===md5(md5($_POST['password']))){
			session_start();
			$_SESSION['auth'] = true;

			$this->response["status"] = "passed";
			$this->response["message"] = "Добро пожаловать!";
			echo json_encode($this->response);
		} else {
			$this->response["status"] = "denied";
			$this->response["message"] = "Логин или пароль указаны неверно!";
			echo json_encode($this->response);
		}
	}
}