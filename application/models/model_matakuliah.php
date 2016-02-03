<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_matakuliah extends CI_model{

	public function tampilmatkul($key)
	{
		$this->db->where('kd_prodi',$key);
		$query = $this->db->get('prodi');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$hasil = $row->prodi;
			}
		}
		else
		{
			$hasil = '';
		}
		return $hasil;
	}

	public function getlistjurusan()
	{
		return $this->db->get('prodi');
	}
}