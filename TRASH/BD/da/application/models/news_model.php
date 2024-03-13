<?php
class News_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    public function get_news($airport_id = FALSE){
        if ($airport_id === FALSE){
            $query = $this->db->get('airport');
            return $query->result_array();
        }
        $query = $this->db->get_where('airport', array('airport_id' => $airport_id));
        return $query->row_array();
    }
    public function set_news() {
        $this->load->helper('url');
        $slug = url_title($this->input->post('airport'), 'dash', TRUE);
        $data = array(
        'airport_name' => $this->input->post('airport_name'),
        // 'slug' => $slug,
        'location' => $this->input->post('location') );
        return $this->db->insert('airport', $data);
    }
}