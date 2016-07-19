<?php
class Works{
	public function __construct(){
		$page_title = "Мои работы";
		$page_description = 'Frontend разработчик. Примеры работ.';
		$menu_item = "works";

		require_once('app/models/works.model.php');
		$mdl = new Works_model;
		$works = $mdl->get_works();

		require_once ('app/views/works.php');
	}
}