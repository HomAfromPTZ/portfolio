<?php
class Admin{
	private $response = array();

	public function __construct(){

		require_once('app/models/works.model.php');
		require_once('app/models/skills.model.php');
		require_once('app/models/blog.model.php');

		if(!isset($_POST['action'])){
			session_start();
			$this->is_auth();
			$page_title = "Администратор";
			$page_description = 'Frontend разработчик. Административная панель.';

			$mdl = new Skills_model;
			$skills = $mdl->get_skills();

			require_once ('app/views/admin.php');
		}else{
			if($_POST['action'] == 'saveWork'){
				$this->saveWork();
			}
			if($_POST['action'] == 'saveSkills'){
				$this->saveSkills();
			}
			if($_POST['action'] == 'savePost'){
				$this->savePost();
			}
		}
	}

	private function is_auth(){
		if (isset($_SESSION['auth']) && $_SESSION['auth'] === true){
			return;
		} else {
			header("Location: http://".SITE_URL);
			exit();
		}
	}

	private function extension ($filename) {
		return pathinfo($filename,PATHINFO_EXTENSION);
	}

	private function filename ($filename){
		return pathinfo($filename,PATHINFO_FILENAME);
	}

	private function processFile(){
		$uploaded = false;

		if(!empty($_FILES['project-file'])){
			$file = $_FILES['project-file'];
			$file_tmp = $file['tmp_name'];
			$file_fullname = $file['name'];
			$file_name = $this->filename($file_fullname);
			$file_extension = $this->extension($file_fullname);
			$file_type = $file['type'];
			$file_info = getimagesize($file_tmp);
			$file_mime = $file_info['mime'];
			$file_size = $file['size'];
			$save_dir = 'assets/img/works/';

			if( ($file_type!='image/gif' && $file_type!='image/jpeg' && $file_type!='image/png') ||
				($file_mime!='image/gif' && $file_mime!='image/jpeg' && $file_mime!='image/png')) {
				$this->response["status"] = "error";
				$this->response["message"] = "Ошибка. Некорректный формат файла.";
				return $uploaded;
			}

			if($file_size == 0 || $file_size > 5242880){
				$this->response["status"] = "error";
				$this->response["message"] = "Ошибка. Слишком большой файл.";
				return $uploaded;
			}

			while(file_exists($save_dir.$file_fullname)==true){
				$file_fullname = $file_name . uniqid() . '.' . $file_extension;
			}

			$save_path = $save_dir.$file_fullname;

			if(!move_uploaded_file($file_tmp, $save_path)){
				$this->response["status"] = "error";
				$this->response["message"] = "Ошибка загрузки файла.";
				return $uploaded;
			}else{
				$uploaded = $save_path;
				return $uploaded;
			}
		} else {
			$this->response["status"] = "error";
			$this->response["message"] = "Не указан файл для загрузки.";
			return $uploaded;
		}
	}

	private function saveWork(){
		if(
			$_POST['project-title']=="" ||
			$_POST['project-tech']=="" ||
			$_POST['project-link']=="" ||
			$_POST['project-anchor']=="")
		{
			$this->response["status"] = "error";
			$this->response["message"] = "Ошибка. Заполнены не все поля";
		} else {
			if($file = $this->processFile()) {

				$mdl = new Works_model;
				$new = $mdl->insert_work($_POST['project-title'], $_POST['project-tech'], $_POST['project-link'], $_POST['project-anchor'], $file);

				if($new){
					$this->response["status"] = "saved";
					$this->response["message"] = "Работа сохранена";
				} else {
					$this->response["status"] = "error";
					$this->response["message"] = "Ошибка вставки в базу данных!";
				}
			}
		}
		echo json_encode($this->response);
		exit();
	}

	private function savePost(){
		if(
			$_POST['post-title']=="" ||
			$_POST['post-date']=="" ||
			$_POST['post-content']=="")
		{
			$this->response["status"] = "error";
			$this->response["message"] = "Ошибка. Заполнены не все поля";
		} else {

			$mdl = new Blog_model;
			$new = $mdl->insert_post($_POST['post-title'], $_POST['post-date'], $_POST['post-content']);

			if($new){
				$this->response["status"] = "saved";
				$this->response["message"] = "Запись сохранена";
			} else {
				$this->response["status"] = "error";
				$this->response["message"] = "Ошибка вставки в базу данных!";
			}
		}
		echo json_encode($this->response);
		exit();
	}


	private function saveSkills(){
		
		$mdl = new Skills_model;
		$new = $mdl->insert_skills($_POST['skills']);

		if($new){
			$this->response["status"] = "ok";
			$this->response["message"] = "Навыки сохранены";
		} else {
			$this->response["status"] = "error";
			$this->response["message"] = "Внесены все навыки за исключением пустых!";
		}

		echo json_encode($this->response);
		exit();
	}
}