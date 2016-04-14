<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {
	public function status(){
		$this->db->select('
			sum(if(A.status=0,1,0)) as proses,
			sum(if(A.status=11,1,0)) as no_smoker,
			sum(if(A.status=12,1,0)) as resign,
			sum(if(A.status=13,1,0)) as not_participate,
			sum(if(A.status=14,1,0)) as success,
			sum(if(A.status=15,1,0)) as wrong,
			sum(if(A.status=16,1,0)) as callback,
			sum(if(A.status in (11,12,13,14,15,16),1,0)) as total_c,
			sum(if(A.status=21,1,0)) as na,
			sum(if(A.status=22,1,0)) as bus,
			sum(if(A.status=23,1,0)) as rej,
			sum(if(A.status in (21,22,23),1,0)) as total_n,
			sum(if(A.id is not null,1,0)) as total
		');
		$this->db->from('candidate A');		
		if($this->input->get('date_from') <> '' && $this->input->get('date_to') <> ''){
			$this->db->where('A.dist_date >=',format_ymd($this->input->get('date_from')));
			$this->db->where('A.dist_date <=',format_ymd($this->input->get('date_to')));
		}		
		return $this->db->get()->result();
	}
}