<?php
class Blog_model{
	public function get_posts(){
		$sql = 'SELECT * FROM blog ORDER BY id DESC';
		$result = DB::get_select($sql);

		if($result['count']>0){
			return $result['result'];
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
}