<?php

namespace Eleusis\Portfolio\src\model;

use Eleusis\Portfolio\config\Parameter;

class Contact {

	public function sendMail(Parameter $postUrl) {
		$name = $postUrl->get('name');
		$email = $postUrl->get('email');
		$title = $postUrl->get('messageTitle');
		$message = $postUrl->get('message');
		$header = 'From:'.$email."\r\n".
		'Reply-To:'.$email."\r\n";
		$adminMail = 'testp5oc@gmail.com';
		mail($adminMail, $title, $message, $header);
	}
} 