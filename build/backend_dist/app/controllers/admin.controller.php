<?php
class Admin{
	private $response = array();

	public function __construct(){
		if(!isset($_POST['action'])){
			session_start();
			$this->is_auth();
			$page_title = "Администратор";
			$page_description = 'Frontend разработчик. Административная панель.';

			require_once ('app/views/admin.php');
		}else{
			if($_POST['action'] == 'saveWork'){
				$this->saveWork();
			}
			if($_POST['action'] == 'saveSkills'){

			}
			if($_POST['action'] == 'saveArticle'){

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

	private function saveWork(){
		if($_POST['project-title']=="" || $_POST['project-tech']=="" || $_POST['project-link']==""){
			$this->response["status"] = "error";
			$this->response["message"] = "Ошибка. Заполнены не все поля";
		} else {
			if($file = $this->processFile()) {
				$sql = 'INSERT INTO works SET title=:title, tech=:tech, link=:link, img_src=:file';
				$data = array(
					':title'=>$_POST['project-title'],
					':tech'=>$_POST['project-tech'],
					':link'=>$_POST['project-link'],
					':file'=>$file,
					);
				$result = DB::get_insert($sql,$data);

				$this->response["status"] = "saved";
				$this->response["message"] = "Работа сохранена";
			}
		}
		echo json_encode($this->response);
		exit();
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

			// if($file_extension=="jpg" || $file_extension=="jpeg" || $file_extension=="png" || $file_extension=="gif"){

			// 	if($file_extension=="jpg" || $file_extension=="jpeg" ){
			// 		$src = imagecreatefromjpeg($file_tmp);
			// 	}else if($file_extension=="png"){
			// 		$src = imagecreatefrompng($file_tmp);
			// 	}else{
			// 		$src = imagecreatefromgif($file_tmp);
			// 	}

				
			// 	imagejpeg($src, $save_path, 100);
			// 	imagedestroy($src);
			// }

			$i=1;
			while(file_exists($save_dir.$file_fullname)==true){
				$file_fullname = $file_name.$i.'.'.$file_extension;
				$i++;
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
}