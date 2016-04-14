<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_model extends CI_Model {
	function export($date_from,$date_to){
		$this->db->select('A.*,B.name as status_name');
		$this->db->from('candidate A');
		$this->db->join('candidate_status B','A.status = B.id','left');
		if($date_from <> '0000-00-00' && $date_to <> '0000-00-00'){
			$this->db->where('A.dist_date >=',$date_from);
			$this->db->where('A.dist_date <=',$date_to);
		}	
		return $this->db->get();
	}
}