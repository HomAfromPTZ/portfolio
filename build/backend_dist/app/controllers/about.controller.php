<?php
class About{
	public function __construct(){
		$page_title = "Обо мне";
		$page_description = 'Frontend разработчик. Коротко обо мне.';
		$menu_item = "about";

		require_once('app/models/skills.model.php');
		$mdl = new Skills_model;
		$skills = $mdl->get_skills();

		require_once ('app/views/about.php');
	}

}