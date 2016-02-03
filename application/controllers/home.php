<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->model_sequrity->getsequrity();
		$isi['konten'] 	= 'tampilan_konten';
		$isi['judul']		= 'Home';
		$isi['sub_judul'] 	= '';
		$this->load->view('tampilan_home',$isi);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}