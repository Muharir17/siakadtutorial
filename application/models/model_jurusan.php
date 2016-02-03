<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_jurusan extends CI_model{

	public function getdata($key)
	{
		$this->db->where('kd_prodi',$key);
		$hasil = $this->db->get('prodi');
		return $hasil;
	}

	public function getinsert($data)
	{
		$this->db->insert('prodi',$data);
	}

	public function getupdate($key,$data)
	{
		$this->db->where('kd_prodi',$key);
		$this->db->update('prodi',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('kd_prodi',$key);
		$this->db->delete('prodi');
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */