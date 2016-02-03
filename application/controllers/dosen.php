<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('dosen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'dosen/index/';
        $config['total_rows'] = $this->dosen_model->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'dosen.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $dosen = $this->dosen_model->index_limit($config['per_page'], $start);

        $data = array(
            'dosen_data' => $dosen,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('dosen_list', $data);
    }
    
    public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'dosen/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'dosen/index/';
        }

        $config['total_rows'] = $this->dosen_model->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'dosen/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $dosen = $this->dosen_model->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'dosen_data' => $dosen,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('dosen_list', $data);
    }

    public function read($id) 
    {
        $row = $this->dosen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_dosen' => $row->kd_dosen,
		'kd_prodi' => $row->kd_prodi,
		'nidn' => $row->nidn,
		'nama_dosen' => $row->nama_dosen,
		'sex' => $row->sex,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'alamat' => $row->alamat,
		'hp' => $row->hp,
		'pendidikan' => $row->pendidikan,
		'email' => $row->email,
		'prodi' => $row->prodi,
		'password' => $row->password,
		'file_foto' => $row->file_foto,
		'tgl_insert' => $row->tgl_insert,
		'status' => $row->status,
		'tgl_update' => $row->tgl_update,
		'tgl_masuk' => $row->tgl_masuk,
	    );
            $this->load->view('dosen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dosen/create_action'),
	    'kd_dosen' => set_value('kd_dosen'),
	    'kd_prodi' => set_value('kd_prodi'),
	    'nidn' => set_value('nidn'),
	    'nama_dosen' => set_value('nama_dosen'),
	    'sex' => set_value('sex'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'alamat' => set_value('alamat'),
	    'hp' => set_value('hp'),
	    'pendidikan' => set_value('pendidikan'),
	    'email' => set_value('email'),
	    'prodi' => set_value('prodi'),
	    'password' => set_value('password'),
	    'file_foto' => set_value('file_foto'),
	    'tgl_insert' => set_value('tgl_insert'),
	    'status' => set_value('status'),
	    'tgl_update' => set_value('tgl_update'),
	    'tgl_masuk' => set_value('tgl_masuk'),
	);
        $this->load->view('dosen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_prodi' => $this->input->post('kd_prodi',TRUE),
		'nidn' => $this->input->post('nidn',TRUE),
		'nama_dosen' => $this->input->post('nama_dosen',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
		'email' => $this->input->post('email',TRUE),
		'prodi' => $this->input->post('prodi',TRUE),
		'password' => $this->input->post('password',TRUE),
		'file_foto' => $this->input->post('file_foto',TRUE),
		'tgl_insert' => $this->input->post('tgl_insert',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
		'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
	    );

            $this->dosen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dosen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->dosen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dosen/update_action'),
		'kd_dosen' => set_value('kd_dosen', $row->kd_dosen),
		'kd_prodi' => set_value('kd_prodi', $row->kd_prodi),
		'nidn' => set_value('nidn', $row->nidn),
		'nama_dosen' => set_value('nama_dosen', $row->nama_dosen),
		'sex' => set_value('sex', $row->sex),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'alamat' => set_value('alamat', $row->alamat),
		'hp' => set_value('hp', $row->hp),
		'pendidikan' => set_value('pendidikan', $row->pendidikan),
		'email' => set_value('email', $row->email),
		'prodi' => set_value('prodi', $row->prodi),
		'password' => set_value('password', $row->password),
		'file_foto' => set_value('file_foto', $row->file_foto),
		'tgl_insert' => set_value('tgl_insert', $row->tgl_insert),
		'status' => set_value('status', $row->status),
		'tgl_update' => set_value('tgl_update', $row->tgl_update),
		'tgl_masuk' => set_value('tgl_masuk', $row->tgl_masuk),
	    );
            $this->load->view('dosen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_dosen', TRUE));
        } else {
            $data = array(
		'kd_prodi' => $this->input->post('kd_prodi',TRUE),
		'nidn' => $this->input->post('nidn',TRUE),
		'nama_dosen' => $this->input->post('nama_dosen',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
		'email' => $this->input->post('email',TRUE),
		'prodi' => $this->input->post('prodi',TRUE),
		'password' => $this->input->post('password',TRUE),
		'file_foto' => $this->input->post('file_foto',TRUE),
		'tgl_insert' => $this->input->post('tgl_insert',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
		'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
	    );

            $this->dosen_model->update($this->input->post('kd_dosen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dosen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->dosen_model->get_by_id($id);

        if ($row) {
            $this->dosen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dosen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_prodi', ' ', 'trim|required');
	$this->form_validation->set_rules('nidn', ' ', 'trim|required');
	$this->form_validation->set_rules('nama_dosen', ' ', 'trim|required');
	$this->form_validation->set_rules('sex', ' ', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', ' ', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', ' ', 'trim|required');
	$this->form_validation->set_rules('alamat', ' ', 'trim|required');
	$this->form_validation->set_rules('hp', ' ', 'trim|required');
	$this->form_validation->set_rules('pendidikan', ' ', 'trim|required');
	$this->form_validation->set_rules('email', ' ', 'trim|required');
	$this->form_validation->set_rules('prodi', ' ', 'trim|required');
	$this->form_validation->set_rules('password', ' ', 'trim|required');
	$this->form_validation->set_rules('file_foto', ' ', 'trim|required');
	$this->form_validation->set_rules('tgl_insert', ' ', 'trim|required');
	$this->form_validation->set_rules('status', ' ', 'trim|required');
	$this->form_validation->set_rules('tgl_update', ' ', 'trim|required');
	$this->form_validation->set_rules('tgl_masuk', ' ', 'trim|required');

	$this->form_validation->set_rules('kd_dosen', 'kd_dosen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dosen.xls";
        $judul = "dosen";
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
	xlsWriteLabel($tablehead, $kolomhead++, "kd_prodi");
	xlsWriteLabel($tablehead, $kolomhead++, "nidn");
	xlsWriteLabel($tablehead, $kolomhead++, "nama_dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "sex");
	xlsWriteLabel($tablehead, $kolomhead++, "tempat_lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "tanggal_lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "hp");
	xlsWriteLabel($tablehead, $kolomhead++, "pendidikan");
	xlsWriteLabel($tablehead, $kolomhead++, "email");
	xlsWriteLabel($tablehead, $kolomhead++, "prodi");
	xlsWriteLabel($tablehead, $kolomhead++, "password");
	xlsWriteLabel($tablehead, $kolomhead++, "file_foto");
	xlsWriteLabel($tablehead, $kolomhead++, "tgl_insert");
	xlsWriteLabel($tablehead, $kolomhead++, "status");
	xlsWriteLabel($tablehead, $kolomhead++, "tgl_update");
	xlsWriteLabel($tablehead, $kolomhead++, "tgl_masuk");

	foreach ($this->dosen_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_prodi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nidn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sex);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->prodi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file_foto);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_insert);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_update);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=dosen.doc");

        $data = array(
            'dosen_data' => $this->dosen_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('dosen_html',$data);
    }

};

/* End of file dosen.php */
/* Location: ./application/controllers/dosen.php */