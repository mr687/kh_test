<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {
	public function index()
	{
		return $this->template->call_landing_template([
			'title' => 'KH_Test',
			'body' => $this->load->view('welcome_message', [], true)
		]);
	}
}
