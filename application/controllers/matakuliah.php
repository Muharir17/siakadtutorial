<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

	public function index()
	{	
		$this->load->model('Model_matakuliah');
		$this->model_sequrity->getsequrity();
		$isi['konten'] 	= 'Matakuliah/tampil_matakuliah';
		$isi['judul']		= 'Master';
		$isi['sub_judul'] 	= 'Mata Kuliah';
		$isi['data']		= $this->db->get('mata_kuliah');
		$this->load->view('tampilan_home',$isi);
	}

		public function tambah()
	{
		$this->load->model('Model_matakuliah');
		$this->model_sequrity->getsequrity();
		$isi['konten'] 	= 'Matakuliah/form_tambahmatakuliah';
		$isi['judul']		= 'master';
		$isi['sub_judul'] 	= 'matakuliah';
		$this->load->view('tampilan_home',$isi);
	}

	public function simpan()
	{
		$this->load->model('Model_matakuliah');
		$this->model_sequrity->getsequrity();

		$key['kd_mk']		= $this->input->post('kode');
		$data['kd_mk']		= $this->input->post('kode');
		$data['kd_prodi']	= $this->input->post('jurusan');
		$data['nama_mk']	= $this->input->post('makul');
		$data['sks']		= $this->input->post('sks');
		$data['smt']		= $this->input->post('smt');
		$data['aktif']		= $this->input->post('aktif');

		$query = $this->db->get_where('mata_kuliah',$key);
		if($query->num_rows()>0)
		{
			$this->db->update('mata_kuliah',$key,$data);
			echo "data sukses di update";
		}
		else
		{
			$this->db->insert('mata_kuliah',$data);
			echo "data sukses di simpan";
		}
	}

	public function getDataMK()
	{
		//script ini bisa di taro di construct
		
		$this->load->model('model_matakuliah');

		$jurusan = $this->input->post('jurusan');

		$this->db->where('kd_prodi',$jurusan); // filter data by kd_prodi
		$isi['data'] = $this->db->get('mata_kuliah');
		$this->load->view('matakuliah/view_datamatakuliah',$isi);

		
		//kita tes hasilnya
	}
}