<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $mahasiswa = $this->mahasiswa_model->get_all();

        $data = array(
            'mahasiswa_data' => $mahasiswa
        );

        $this->load->view('mahasiswa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->mahasiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'th_akademik' => $row->th_akademik,
		'nim' => $row->nim,
		'kd_prodi' => $row->kd_prodi,
		'nama_mhs' => $row->nama_mhs,
		'sex' => $row->sex,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'alamat' => $row->alamat,
		'kota' => $row->kota,
		'hp' => $row->hp,
		'email' => $row->email,
		'nama_ayah' => $row->nama_ayah,
		'nama_ibu' => $row->nama_ibu,
		'alamat_ortu' => $row->alamat_ortu,
		'hp_ortu' => $row->hp_ortu,
		'password' => $row->password,
		'file_foto' => $row->file_foto,
		'status' => $row->status,
		'tgl_insert' => $row->tgl_insert,
		'tgl_update' => $row->tgl_update,
	    );
            $this->load->view('mahasiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mahasiswa/create_action'),
	    'th_akademik' => set_value('th_akademik'),
	    'nim' => set_value('nim'),
	    'kd_prodi' => set_value('kd_prodi'),
	    'nama_mhs' => set_value('nama_mhs'),
	    'sex' => set_value('sex'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'alamat' => set_value('alamat'),
	    'kota' => set_value('kota'),
	    'hp' => set_value('hp'),
	    'email' => set_value('email'),
	    'nama_ayah' => set_value('nama_ayah'),
	    'nama_ibu' => set_value('nama_ibu'),
	    'alamat_ortu' => set_value('alamat_ortu'),
	    'hp_ortu' => set_value('hp_ortu'),
	    'password' => set_value('password'),
	    'file_foto' => set_value('file_foto'),
	    'status' => set_value('status'),
	    'tgl_insert' => set_value('tgl_insert'),
	    'tgl_update' => set_value('tgl_update'),
	);
        $this->load->view('mahasiswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'th_akademik' => $this->input->post('th_akademik',TRUE),
		'kd_prodi' => $this->input->post('kd_prodi',TRUE),
		'nama_mhs' => $this->input->post('nama_mhs',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'alamat_ortu' => $this->input->post('alamat_ortu',TRUE),
		'hp_ortu' => $this->input->post('hp_ortu',TRUE),
		'password' => $this->input->post('password',TRUE),
		'file_foto' => $this->input->post('file_foto',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tgl_insert' => $this->input->post('tgl_insert',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
	    );

            $this->mahasiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->mahasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mahasiswa/update_action'),
		'th_akademik' => set_value('th_akademik', $row->th_akademik),
		'nim' => set_value('nim', $row->nim),
		'kd_prodi' => set_value('kd_prodi', $row->kd_prodi),
		'nama_mhs' => set_value('nama_mhs', $row->nama_mhs),
		'sex' => set_value('sex', $row->sex),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'alamat' => set_value('alamat', $row->alamat),
		'kota' => set_value('kota', $row->kota),
		'hp' => set_value('hp', $row->hp),
		'email' => set_value('email', $row->email),
		'nama_ayah' => set_value('nama_ayah', $row->nama_ayah),
		'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
		'alamat_ortu' => set_value('alamat_ortu', $row->alamat_ortu),
		'hp_ortu' => set_value('hp_ortu', $row->hp_ortu),
		'password' => set_value('password', $row->password),
		'file_foto' => set_value('file_foto', $row->file_foto),
		'status' => set_value('status', $row->status),
		'tgl_insert' => set_value('tgl_insert', $row->tgl_insert),
		'tgl_update' => set_value('tgl_update', $row->tgl_update),
	    );
            $this->load->view('mahasiswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nim', TRUE));
        } else {
            $data = array(
		'th_akademik' => $this->input->post('th_akademik',TRUE),
		'kd_prodi' => $this->input->post('kd_prodi',TRUE),
		'nama_mhs' => $this->input->post('nama_mhs',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'alamat_ortu' => $this->input->post('alamat_ortu',TRUE),
		'hp_ortu' => $this->input->post('hp_ortu',TRUE),
		'password' => $this->input->post('password',TRUE),
		'file_foto' => $this->input->post('file_foto',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tgl_insert' => $this->input->post('tgl_insert',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
	    );

            $this->mahasiswa_model->update($this->input->post('nim', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->mahasiswa_model->get_by_id($id);

        if ($row) {
            $this->mahasiswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('th_akademik', ' ', 'trim|required');
	$this->form_validation->set_rules('kd_prodi', ' ', 'trim|required');
	$this->form_validation->set_rules('nama_mhs', ' ', 'trim|required');
	$this->form_validation->set_rules('sex', ' ', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', ' ', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', ' ', 'trim|required');
	$this->form_validation->set_rules('alamat', ' ', 'trim|required');
	$this->form_validation->set_rules('kota', ' ', 'trim|required');
	$this->form_validation->set_rules('hp', ' ', 'trim|required');
	$this->form_validation->set_rules('email', ' ', 'trim|required');
	$this->form_validation->set_rules('nama_ayah', ' ', 'trim|required');
	$this->form_validation->set_rules('nama_ibu', ' ', 'trim|required');
	$this->form_validation->set_rules('alamat_ortu', ' ', 'trim|required');
	$this->form_validation->set_rules('hp_ortu', ' ', 'trim|required');
	$this->form_validation->set_rules('password', ' ', 'trim|required');
	$this->form_validation->set_rules('file_foto', ' ', 'trim|required');
	$this->form_validation->set_rules('status', ' ', 'trim|required');
	$this->form_validation->set_rules('tgl_insert', ' ', 'trim|required');
	$this->form_validation->set_rules('tgl_update', ' ', 'trim|required');

	$this->form_validation->set_rules('nim', 'nim', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mahasiswa.xls";
        $judul = "mahasiswa";
        $tablehead = 2;
        $tablebody = 3;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        xlsWriteLabel(0, 0, $judul);

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "no");
	xlsWriteLabel($tablehead, $kolomhead++, "th_akademik");
	xlsWriteLabel($tablehead, $kolomhead++, "kd_prodi");
	xlsWriteLabel($tablehead, $kolomhead++, "nama_mhs");
	xlsWriteLabel($tablehead, $kolomhead++, "sex");
	xlsWriteLabel($tablehead, $kolomhead++, "tempat_lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "tanggal_lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "kota");
	xlsWriteLabel($tablehead, $kolomhead++, "hp");
	xlsWriteLabel($tablehead, $kolomhead++, "email");
	xlsWriteLabel($tablehead, $kolomhead++, "nama_ayah");
	xlsWriteLabel($tablehead, $kolomhead++, "nama_ibu");
	xlsWriteLabel($tablehead, $kolomhead++, "alamat_ortu");
	xlsWriteLabel($tablehead, $kolomhead++, "hp_ortu");
	xlsWriteLabel($tablehead, $kolomhead++, "password");
	xlsWriteLabel($tablehead, $kolomhead++, "file_foto");
	xlsWriteLabel($tablehead, $kolomhead++, "status");
	xlsWriteLabel($tablehead, $kolomhead++, "tgl_insert");
	xlsWriteLabel($tablehead, $kolomhead++, "tgl_update");

	foreach ($this->mahasiswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->th_akademik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_prodi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_mhs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sex);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_ortu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp_ortu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file_foto);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_insert);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_update);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=mahasiswa.doc");

        $data = array(
            'mahasiswa_data' => $this->mahasiswa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('mahasiswa_html',$data);
    }

};

/* End of file mahasiswa.php */
/* Location: ./application/controllers/mahasiswa.php */