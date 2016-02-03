<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurusan extends CI_Controller {


	public function index()
	{
		$this->model_sequrity->getsequrity();
		$isi['konten'] 	= 'jurusan/tampil_jurusan';
		$isi['judul']		= 'Master';
		$isi['sub_judul'] 	= 'Jurusan';
		$isi['data']		= $this->db->get('prodi');
		$this->load->view('tampilan_home',$isi);
	}

	public function tambah()
	{
		$this->model_sequrity->getsequrity();
		$isi['konten'] 	= 'jurusan/form_tambahjurusan';
		$isi['judul']		= 'Master';
		$isi['sub_judul'] 	= 'Tambah Jurusan';
		$isi['kode']		= '';
		$isi['jurusan']		= '';
		$isi['singkat']		= '';
		$isi['ketua']		= '';
		$isi['nik']			= '';
		$isi['akreditasi']	= '';
		$this->load->view('tampilan_home',$isi);
	}

	public function simpan()
	{
		$this->model_sequrity->getsequrity();

		$key = $this->input->post('kode');
		$data['kd_prodi']	= $this->input->post('kode');
		$data['prodi']		= $this->input->post('jurusan');
		$data['singkat']	= $this->input->post('singkat');
		$data['ketua_prodi']= $this->input->post('ketua');
		$data['nik']		= $this->input->post('nik');
		$data['akreditasi']	= $this->input->post('akreditasi');

		$this->load->model('model_jurusan');
		$query = $this->model_jurusan->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_jurusan->getupdate($key,$data);
			$this->session->set_flashdata('info','data sukses di update');
		}
		else
		{
			$this->model_jurusan->getinsert($data);
			$this->session->set_flashdata('info','data sukses di simpan');
		}
		redirect('jurusan/tambah');
	}
	public function edit()
	{
		$this->model_sequrity->getsequrity();
		$isi['konten'] 	= 'jurusan/form_editjurusan';
		$isi['judul']		= 'master';
		$isi['sub_judul'] 	= 'edit jurusan';

		$key = $this->uri->segment(3);
		$this->db->where('kd_prodi',$key);
		$query = $this->db->get('prodi');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['kode']		= $row->kd_prodi;
				$isi['jurusan']		= $row->prodi;
				$isi['singkat']		= $row->singkat;
				$isi['ketua']		= $row->ketua_prodi;
				$isi['nik']			= $row->nik;
				$isi['akreditasi']	= $row->akreditasi;
			}
		}
		else
		{
				$isi['kode']		= '';
				$isi['jurusan']		= '';
				$isi['singkat']		= '';
				$isi['ketua']		= '';
				$isi['nik']			= '';
				$isi['akreditasi']	= '';
		}

		$this->load->view('tampilan_home',$isi);
	}

	public function delete()
	{
		$this->model_sequrity->getsequrity();
		$this->load->model('model_jurusan');

		$key = $this->uri->segment(3);
		$this->db->where('kd_prodi',$key);
		$query = $this->db->get('prodi');
		if($query->num_rows()>0)
		{
			$this->model_jurusan->getdelete($key);
		}
		redirect('jurusan');

	}

	public function pdf()
	{
		$this->load->library('cfpdf');
		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B','L');

		$pdf->Cell(10,7,'No',1,0,'C');
		$pdf->Cell(15,7,'Kode',1,0,'C');
		$pdf->Cell(40,7,'Jurusan',1,0,'C');
		$pdf->Cell(27,7,'Singkatan',1,0,'C');
		$pdf->Cell(50,7,'Ketua',1,0,'C');
		$pdf->Cell(50,7,'Nik',1,0,'C');
		$pdf->Cell(27,7,'Akreditasi',1,1,'C');

		// tampilkan dari database
		$pdf->SetFont('Arial','','L');
		$query = $this->db->get('prodi');
		$no=1;
		foreach ($query->result() as $q) 
		{
			$pdf->Cell(10,7,$no,1,0,'C');
			$pdf->Cell(15,7,$q->kd_prodi,1,0);
			$pdf->Cell(40,7,$q->prodi,1,0);
			$pdf->Cell(27,7,$q->singkat,1,0);
			$pdf->Cell(50,7,$q->ketua_prodi,1,0);
			$pdf->Cell(50,7,$q->nik,1,0);	
			$pdf->Cell(27,7,$q->akreditasi,1,1);		

			$no++;
		}

		// end
		$pdf->Output();

	}

	public function excel()
	{
		header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporantransaksi.xls");
		
		$isi['konten'] 	= 'jurusan/laporan_excel';

		$this->model_sequrity->getsequrity();
		$isi['konten'] 	= 'jurusan/lap_excel';
		$isi['judul']		= 'Master';
		$isi['sub_judul'] 	= 'Jurusan';
		$isi['data']		= $this->db->get('prodi');
		$this->load->view('jurusan/lap_excel',$isi);


	}
}