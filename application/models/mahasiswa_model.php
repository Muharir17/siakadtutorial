<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    public $table = 'mahasiswa';
    public $id = 'nim';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit
    function index_limit($limit, $start = 0) {
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('nim', $keyword);
	$this->db->or_like('th_akademik', $keyword);
	$this->db->or_like('kd_prodi', $keyword);
	$this->db->or_like('nama_mhs', $keyword);
	$this->db->or_like('sex', $keyword);
	$this->db->or_like('tempat_lahir', $keyword);
	$this->db->or_like('tanggal_lahir', $keyword);
	$this->db->or_like('alamat', $keyword);
	$this->db->or_like('kota', $keyword);
	$this->db->or_like('hp', $keyword);
	$this->db->or_like('email', $keyword);
	$this->db->or_like('nama_ayah', $keyword);
	$this->db->or_like('nama_ibu', $keyword);
	$this->db->or_like('alamat_ortu', $keyword);
	$this->db->or_like('hp_ortu', $keyword);
	$this->db->or_like('password', $keyword);
	$this->db->or_like('file_foto', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('tgl_insert', $keyword);
	$this->db->or_like('tgl_update', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nim', $keyword);
	$this->db->or_like('th_akademik', $keyword);
	$this->db->or_like('kd_prodi', $keyword);
	$this->db->or_like('nama_mhs', $keyword);
	$this->db->or_like('sex', $keyword);
	$this->db->or_like('tempat_lahir', $keyword);
	$this->db->or_like('tanggal_lahir', $keyword);
	$this->db->or_like('alamat', $keyword);
	$this->db->or_like('kota', $keyword);
	$this->db->or_like('hp', $keyword);
	$this->db->or_like('email', $keyword);
	$this->db->or_like('nama_ayah', $keyword);
	$this->db->or_like('nama_ibu', $keyword);
	$this->db->or_like('alamat_ortu', $keyword);
	$this->db->or_like('hp_ortu', $keyword);
	$this->db->or_like('password', $keyword);
	$this->db->or_like('file_foto', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('tgl_insert', $keyword);
	$this->db->or_like('tgl_update', $keyword);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file mahasiswa_model.php */
/* Location: ./application/models/mahasiswa_model.php */