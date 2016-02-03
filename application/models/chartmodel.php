<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of ChartModel
 *
 * @author http://roytuts.com
 */
class ChartModel extends CI_Model {

    private $performance = 'performance';

    function __construct() {
        
    }

    function get_chart_data() {
        $query = $this->db->get($this->performance);
        $results['chart_data'] = $query->result();
        $this->db->select_min('tahun');
        $this->db->limit(1);
        $query = $this->db->get($this->performance);
        $results['min_year'] = $query->row()->tahun;
        $this->db->select_max('tahun');
        $this->db->limit(1);
        $query = $this->db->get($this->performance);
        $results['max_year'] = $query->row()->tahun;
        return $results;
    }

}

/* End of file chartmodel.php */
/* Location: ./application/models/chartmodel.php */