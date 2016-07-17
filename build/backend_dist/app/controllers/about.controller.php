<?php
class About{
	public function __construct(){
		$page_title = "Обо мне";
		$page_description = 'Frontend разработчик. Коротко обо мне.';
		$menu_item = "about";

		require_once ('app/views/about.php');
	}
}