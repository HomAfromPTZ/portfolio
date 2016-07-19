<?php
class Blog{
	public function __construct(){
		$page_title = "Блог";
		$page_description = 'Frontend разработчик. Заметки.';
		$menu_item = "blog";

		require_once('app/models/blog.model.php');
		$mdl = new Blog_model;
		$posts = $mdl->get_posts();
		$posts = $this->preparePosts($posts);

		require_once ('app/views/blog.php');
	}

	private function preparePosts($posts = array()){
		$monthsName = array(
			'1' => "Января",
			'2' => "Февраля",
			'3' => "Марта",
			'4' => "Апреля",
			'5' => "Мая",
			'6' => "Июня",
			'7' => "Июля",
			'8' => "Августа",
			'9' => "Сентября",
			'10' => "Октября",
			'11' => "Ноября",
			'12' => "Декабря"
		);

		for($i=0; $i<count($posts); $i++){
			$date = strtotime($posts[$i]['date']);
			$month = $monthsName[date('n', $date)];
			$day = date('j', $date);
			$year = date('Y', $date);

			$posts[$i]['date'] = $day." ".$month." ".$year;
		}

		return $posts;
	}
}