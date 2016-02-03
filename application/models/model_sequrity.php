<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_sequrity extends CI_model {

	public function getsequrity()
	{
		$username = $this->session->userdata('username');
		if(empty($username))
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	
}