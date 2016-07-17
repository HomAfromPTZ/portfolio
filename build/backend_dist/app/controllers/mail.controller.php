<?php
class Mail{
	private $response = array();



	public function __construct(){
		require_once "app/vendor/autoload.php";

		if(empty($_POST)){
			$this->response["status"] = "error";
			$this->response["message"] = "Произошла ошибка. Данные для отправки не переданы.";
			echo json_encode($this->response);
			exit();
		} else {
			$this->sendFeedback($_POST);
		}
	}



	private function validate($data){
		$valitron = new Valitron\Validator($data);
		$valitron->rule('required', ['name', 'email', 'message']);
		$valitron->rule('email', 'email');
		$valitron->rule('lengthMin', 'message', 10);

		return $valitron->validate();
	}



	private function prepareMessage($data){
		$message = "";
		$td_color = true;

		$cyrillic = array(
			'name' => 'Имя:',
			'email' => 'E-mail:',
			'message' => 'Сообщение:'
		);

		foreach ( $data as $key => $value ) {
			if ( $value != "" ) {
				$bgcolor = ($td_color = !$td_color) ? "background: #00bfa5;" : "background: #01665F;";

				$message .= "<tr style='border-radius: 10px; overflow: hidden'>";
				$message .= "<td style='padding: 10px; width: 30%;".$bgcolor."color: #f0efe9; border: #00bfa5 1px solid;'><b>{$cyrillic[$key]}</b></td>";
				$message .= "<td style='padding: 10px; width: 70%; background: #DFDFDF; border: #00bfa5 1px solid;'>$value</td></tr>";
			}
		}

		$message = "<table style='width: 100%;'>$message</table>";

		return $message;
	}



	private function sendFeedback($data){
		if(!$this->validate($data)){
			$this->response["status"] = "error";
			$this->response["message"] = "К сожалению ваше сообщение не прошло валидацию.<br/>Попробуйте еще раз.";
			echo json_encode($this->response);
			exit();
		} else {
			require_once "app/config/smtp.config.php";
			$message = $this->prepareMessage($data);

			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->Host = $hm_host;
			$mail->Username = $hm_username;
			$mail->Password = $hm_password;
			$mail->Port = $hm_port;


			$mail->setFrom($hm_from, $hm_project);
			$mail->addAddress($hm_email);
			$mail->Subject = $this->adopt($hm_subject);

			$mail->setLanguage('ru', 'phpmailer/language/');
			$mail->CharSet = 'UTF-8';
			$mail->isHTML(true);

			$mail->Body = $message;

			if(!$mail->send()) {
				$this->response["status"] = "error";
				$this->response["message"] = "При отправке сообщения произошла ошибка. Попробуйте еще раз";
			} else {
				$this->response["status"] = "sent";
				$this->response["message"] = "Сообщение отправлено";
			}

			echo json_encode($this->response);
			exit();
		}

	}

	private function adopt($text) {
		return '=?UTF-8?B?'.base64_encode($text).'?=';
	}
}