<?php
class Works_model{
	public function get_works(){
		$sql = 'SELECT * FROM works';
		$result = DB::get_select($sql);

		if($result['count']>0){
			return $result['result'];
		}
	}

	public function insert_work($title, $tech, $link, $linktext, $file){
		$sql = 'INSERT INTO works SET title=:title, tech=:tech, link=:link, link_text=:linktext, img_src=:file';

		$data = array(
			':title'=>$title,
			':tech'=>$tech,
			':link'=>$link,
			':linktext'=>$linktext,
			':file'=>$file
		);

		$result = DB::insert($sql,$data);

		return $result;
	}
}