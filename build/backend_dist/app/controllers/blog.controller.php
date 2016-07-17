<?php
class Blog{
	public function __construct(){
		$page_title = "Блог";
		$page_description = 'Frontend разработчик. Заметки.';
		$menu_item = "blog";

		require_once ('app/views/blog.php');
	}
}