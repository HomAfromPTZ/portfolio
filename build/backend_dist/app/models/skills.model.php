<?php
class Skills_model{
	public function get_skills(){
		$sql = 'SELECT * FROM skills';
		$result = DB::get_select($sql);

		if($result['count']>0){
			$skills = $result['result'];
			return $this->prepareSkills($skills);
		}
	}



	public function insert_skills($skills = array()){

		DB::clear('skills');

		foreach($skills as $skill_block){
			if(!empty($skill_block['name']) && !empty($skill_block['skills'])) {
				$category = $skill_block['name'];
				$skills_list = $this->parseSkills($skill_block['skills']);

				$sql = 'INSERT INTO skills SET category=:category, skills=:skills';
				$data = array(
					':category'=>$category,
					':skills'=>$skills_list
				);

				$result = DB::insert($sql,$data);
			} else {
				$result = false;
			}
		}


		return $result;
	}



	private function prepareSkills($skills = array()){
		for($i=0; $i<count($skills); $i++){
			$skills[$i]['skills'] = json_decode($skills[$i]['skills'], true);
		}

		return $skills;
	}



	private function parseSkills($skills = array()){
		$parsed = array();

		foreach($skills as $skill){
			if(!empty($skill['name']) && !empty($skill['percentage'])){
				$parsed[$skill['name']]=$skill['percentage'];
			}
		}

		return json_encode($parsed);
	}
}