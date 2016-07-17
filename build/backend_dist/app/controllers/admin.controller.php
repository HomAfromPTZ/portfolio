<?php
class Admin{
	public function __construct(){
		session_start();
		$this->is_auth();
		$page_title = "Администратор";
		$page_description = 'Frontend разработчик. Административная панель.';

		require_once ('app/views/admin.php');
	}

	private function is_auth(){
		if (isset($_SESSION['auth']) && $_SESSION['auth'] === true){
			return;
		} else {
			header("Location: http://".SITE_URL);
			exit();
		}
	}
}