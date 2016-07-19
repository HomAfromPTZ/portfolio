<?php
class Blog_model{
	public function get_posts(){
		$sql = 'SELECT * FROM blog ORDER BY id DESC';
		$result = DB::get_select($sql);

		if($result['count']>0){
			$posts = $result['result'];
			return $this->preparePosts($posts);
		}
	}

	public function insert_post($title, $date, $content){
		$sql = 'INSERT INTO blog SET title=:title, date=:date, content=:content';

		$date = date("Y-m-j", strtotime($date));

		$data = array(
			':title'=>$title,
			':date'=>$date,
			':content'=>$content
		);

		$result = DB::insert($sql,$data);

		return $result;
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