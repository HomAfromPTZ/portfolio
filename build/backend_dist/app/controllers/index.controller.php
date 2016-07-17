<?php
class Index{
	public function __construct(){
		$page_title = "Добро пожаловать";
		$page_description = 'Frontend разработчик';

		require_once ('app/views/index.php');
	}
}