<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_controller{

	public function index() {
		$this->loadPages(
			'login/login',
			'login/login_header',
			'login/login_footer',
			'login/login_script',
			array("activeHeaders"=>"Login"),
			'login/login_header'
		);
	}
}
