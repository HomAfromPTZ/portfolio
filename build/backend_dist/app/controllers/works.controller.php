<?php
class Works{
	public function __construct(){
		$page_title = "Мои работы";
		$page_description = 'Frontend разработчик. Примеры работ.';
		$menu_item = "works";

		require_once('app/models/works.model.php');
		$class = new Works_model;
		$works = $class->get_works();

		require_once ('app/views/works.php');
	}
}