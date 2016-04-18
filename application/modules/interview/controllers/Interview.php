<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interview extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('interview_model');
		$this->load->model('callhis_model');
	}
	public function index(){
		$offset = $this->general->get_offset();
		$limit 	= $this->general->get_limit();
		$total 	= $this->interview_model->count_all();

		$xdata['action'] = 'interview/search'.get_query_string();

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'fullname'		=> 'Fullname',
			'dob'			=> 'Day of Birth',
			'tlp'			=> 'Telephone',
			'email'			=> 'Email',
			'status_name'	=> 'Status',
			'interviewer'	=> 'Interviewer',
			'note'			=> 'Note'
		);
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('interview'.get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = 'Action';
		$this->table->set_heading($heading);
		$result = $this->interview_model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$count_call = $this->interview_model->count_call($r->id);
			$this->table->add_row(
				$i++,
				anchor('interview/phone/'.$r->id.get_query_string(),$r->fullname).($r->valid==1?' <span class="label label-success">Valid</span>':'').($r->audit==1?' <span class="label label-primary">Audit</span>':''),
				$r->dob,
				$r->tlp,
				$r->email,			
				$r->status_name,
				$r->interviewer,			
				$this->callhis_model->get_note($r->id),
				anchor('interview/phone/'.$r->id.get_query_string(),'Phone'.($count_call > 0?' <span class="label label-success">'.$count_call.' <span class="glyphicon glyphicon-earphone"></span></span>':''))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = "interview".get_query_string(null,'offset');
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('interview_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'status'=>$this->input->post('status'),
			'interviewer'=>$this->input->post('interviewer'),
			'date_from'=>$this->input->post('date_from'),
			'date_to'=>$this->input->post('date_to'),
			'valid'=>$this->input->post('valid'),
			'audit'=>$this->input->post('audit'),
			'proses'=>$this->input->post('proses')
		);
		redirect('interview'.get_query_string($data));		
	}	
	public function phone($id){
		$this->form_validation->set_rules('status','Status','trim');
		if($this->form_validation->run()===false){
			$xdata['candidate'] 	= $this->interview_model->get_candidate($id);
			$xdata['breadcrumb']	= 'interview'.get_query_string();
			$xdata['callhis']		= $this->interview_model->get_call($id);
			$xdata['action']		= 'interview/phone/'.$id.get_query_string();
			$data['content'] = $this->load->view('interview_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = array(
				'status'=>$this->input->post('status'),
				'audit'=>$this->input->post('audit'),
				'valid'=>$this->input->post('valid'),
				'called'=>$this->input->post('called'),
				'program'=>$this->input->post('program'),
				'minute'=>$this->input->post('minute'),
				'smoker'=>$this->input->post('smoker'),
				'resign'=>$this->input->post('resign'),
				'fullname'=>$this->input->post('fullname'),
				'nickname'=>$this->input->post('nickname'),
				'dob'=>$this->input->post('dob_yy').'-'.$this->input->post('dob_mm').'-'.$this->input->post('dob_dd'),
				'city'=>$this->input->post('city'),
				'tlp'=>$this->input->post('tlp'),
				'email'=>$this->input->post('email'),
				'fb'=>$this->input->post('fb'),
				'tw'=>$this->input->post('tw'),
				'ins'=>$this->input->post('ins'),
				'job'=>$this->input->post('job'),
				'job_type'=>$this->input->post('job_type'),
				'brand'=>$this->input->post('brand'),
				'sim'=>$this->input->post('sim'),
				'sim_no'=>$this->input->post('sim_no'),
				'sim_exp'=>$this->input->post('sim_exp_yy').'-'.$this->input->post('sim_exp_mm').'-'.$this->input->post('sim_exp_dd'),
				'motor'=>$this->input->post('motor'),
				'motor_desc'=>$this->input->post('motor_desc'),
				'sick'=>$this->input->post('sick'),
				'sick_desc'=>$this->input->post('sick_desc'),
				'passport'=>$this->input->post('passport'),
				'passport_name'=>$this->input->post('passport_name'),
				'passport_no'=>$this->input->post('passport_no'),
				'passport_exp'=>$this->input->post('passport_exp_yy').'-'.$this->input->post('passport_exp_mm').'-'.$this->input->post('passport_exp_dd'),
				'barcelona'=>$this->input->post('barcelona'),
				'travel'=>$this->input->post('travel'),
				'campaign'=>$this->input->post('campaign'),
				'campaign_desc'=>$this->input->post('campaign_desc'),
				'campaign_same'=>$this->input->post('campaign_same'),
				'campaign_same_price'=>$this->input->post('campaign_same_price'),
				'campaign_same_name'=>$this->input->post('campaign_same_name'),
				'hamil'=>$this->input->post('hamil'),
				'i1'=>$this->input->post('i1'),
				'i2'=>$this->input->post('i2'),
				'm1'=>$this->input->post('m1'),
				'm2'=>$this->input->post('m2'),
				'm3'=>$this->input->post('m3'),
				'm4'=>$this->input->post('m4'),
				'm5'=>$this->input->post('m5'),
				'n1'=>$this->input->post('n1'),
				'n2'=>$this->input->post('n2'),
				'n3'=>$this->input->post('n3'),
				'n4'=>$this->input->post('n4'),
				'n5'=>$this->input->post('n5'),
				't1'=>$this->input->post('t1'),
				't2'=>$this->input->post('t2'),
				't3'=>$this->input->post('t3'),
				't4'=>$this->input->post('t4'),
				't5'=>$this->input->post('t5'),
				'remark'=>$this->input->post('remark'),
				'overall'=>$this->input->post('overall'),
			);
			$this->interview_model->phone($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Data has been saved</div>');
			redirect('interview/phone/'.$id.get_query_string());			
		}
	}
	public function send_email(){
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}	
		
		$this->form_validation->set_rules('id','ID','required');
		$this->form_validation->set_rules('to','Email','required|valid_email');
		$this->form_validation->set_error_delimiters('', '');
		if($this->form_validation->run()===false){
			$data = array('status'=>'0','result'=>validation_errors());
			echo json_encode($data);
		}else{
			$id = $this->input->post('id');
			$to = $this->input->post('to');

			/*$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'adam.prasetia@gmail.com', // change it to yours
				'smtp_pass' => 'azywjidpigwvkxeg', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);*/
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'mail.adirect.web.id',
				'smtp_port' => '25',
				'smtp_timeout' => '30',
				'newline' => "\r\n",
				'smtp_user' => 'no-reply@adirect.web.id', // change it to yours
				'smtp_pass' => 'n0-reply', // change it to yours
				'mailtype' => 'html',
				'charset' => 'utf-8'
			);
			$data['candidate'] = $this->interview_model->get_candidate($id);
			$subject = '';
			if($data['candidate']->event==4){
				$subject = 'Invitation to visit Food&HotelAsia2016';
			}elseif($data['candidate']->event==5){
				$subject = 'Invitation to visit ProWine ASIA 2016';
			}elseif($data['candidate']->event==6){
				$subject = 'Invitation to visit FHA2016 and ProWine ASIA 2016';
			}

			$message = $this->load->view('email_'.$data['candidate']->event,$data,true);

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			if($data['candidate']->event==4){
				$from = 'Food&HotelAsia2016';
			}elseif($data['candidate']->event==5){
				$from = 'ProWine ASIA 2016';
			}elseif($data['candidate']->event==6){
				$from = 'FHA2016 and ProWine ASIA 2016';
			}
			$this->email->from('no-reply@adirect.web.id',$from); // change it to yours

			$this->email->to($to);// change it to yours
			$this->email->subject($subject);
			$this->email->message($message);
			if($this->email->send()){
				$this->interview_model->phone($id,array('email_status'=>'1'));
				$data = array('status'=>'1','result'=>'Email successfully sent');
			}else{
				$this->interview_model->phone($id,array('email_status'=>'2'));
				$data = array('status'=>'0','result'=>'Email fails to be sent');
			}
			echo json_encode($data);
		}
	}	
}