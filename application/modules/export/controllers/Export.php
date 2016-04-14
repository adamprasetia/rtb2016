<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('export_model');
		$this->load->model('interview/callhis_model');
	}
	public function index(){
		$data['content'] = $this->load->view('export','',true);
		$this->load->view('template',$data);
	}
	public function execute(){		
		$this->form_validation->set_rules('date_from','Date From','trim');
		$this->form_validation->set_rules('date_to','Date To','trim');
		if($this->form_validation->run()===false){
			$this->session->set_flashdata('alert','<div class="alert alert-danger">'.validation_errors().'</div>');
			$data['content'] = $this->load->view('export','',true);
			$this->load->view('template',$data);			
		}else{
			ini_set('memory_limit','-1'); 
			
			require_once "../assets/phpexcel/PHPExcel.php";
			$excel = new PHPExcel();
			
			$excel->setActiveSheetIndex(0);
			$active_sheet = $excel->getActiveSheet();
			$active_sheet->setTitle('Candidate');
			
			//style
			$active_sheet->getStyle('A1:BF1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF0000');
			$active_sheet->getStyle("A1:BF1")->getFont()->getColor()->setRGB('FFFFFF');			
			$active_sheet->getStyle("A1:BF1")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$active_sheet->getStyle("A1:BZ1")->getFont()->setBold(true);
			$active_sheet->getStyle("BA")->getFont()->setBold(true);
			$active_sheet->getStyle("BB")->getFont()->setBold(true);
			$active_sheet->getStyle("BC")->getFont()->setBold(true);

			//header
			$active_sheet->setCellValue('A1', 'MOP ID');
			$active_sheet->setCellValue('B1', 'Username');
			$active_sheet->setCellValue('C1', 'Fullname');
			$active_sheet->setCellValue('D1', 'Nickname');
			$active_sheet->setCellValue('E1', 'Day of Birth');
			$active_sheet->setCellValue('F1', 'Age');
			$active_sheet->setCellValue('G1', 'Phonoe/HP');
			$active_sheet->setCellValue('H1', 'Email');
			$active_sheet->setCellValue('I1', 'Facebook');
			$active_sheet->setCellValue('J1', 'Twitter');
			$active_sheet->setCellValue('K1', 'Instagram');
			$active_sheet->setCellValue('L1', 'Pekerjaan');
			$active_sheet->setCellValue('M1', 'Bidang Pekerjaan');
			$active_sheet->setCellValue('N1', 'Brand Rokok');
			$active_sheet->setCellValue('O1', 'SIM C (Y/T)');
			$active_sheet->setCellValue('P1', 'Nomor SIM');
			$active_sheet->setCellValue('Q1', 'Masa Berlaku');
			$active_sheet->setCellValue('R1', 'Motor Besar (Y/T)');
			$active_sheet->setCellValue('S1', 'Merk Motor Besar');
			$active_sheet->setCellValue('T1', 'Masuk Rumah Sakit (Y/T)');
			$active_sheet->setCellValue('U1', 'Penyebab Sakit');
			$active_sheet->setCellValue('V1', 'Passport (Y/T)');
			$active_sheet->setCellValue('W1', 'Nama Passport');
			$active_sheet->setCellValue('X1', 'Nomor Passport');
			$active_sheet->setCellValue('Y1', 'Masa Berlaku');
			$active_sheet->setCellValue('Z1', 'Ke Barcelona (Y/T)');
			$active_sheet->setCellValue('AA1', 'Pernah Kemana Saja');
			$active_sheet->setCellValue('AB1', 'Campaign MLB (Y/T)');
			$active_sheet->setCellValue('AC1', 'Nama Campaign');
			$active_sheet->setCellValue('AD1', 'Campaign Lain (Y/T)');
			$active_sheet->setCellValue('AE1', 'Mendapatkan Hadia (Y/T)');
			$active_sheet->setCellValue('AF1', 'Nama Campaign');
			$active_sheet->setCellValue('AG1', 'INT_Q1 (MOT)');
			$active_sheet->setCellValue('AH1', 'INT_Q1 (NIG)');
			$active_sheet->setCellValue('AI1', 'INT_Q1 (TRA)');
			$active_sheet->setCellValue('AJ1', 'INT_Q2 (MOT)');
			$active_sheet->setCellValue('AK1', 'INT_Q2 (NIG)');
			$active_sheet->setCellValue('AL1', 'INT_Q2 (TRA)');
			$active_sheet->setCellValue('AM1', 'MOT_Q1');
			$active_sheet->setCellValue('AN1', 'MOT_Q2');
			$active_sheet->setCellValue('AO1', 'MOT_Q3');
			$active_sheet->setCellValue('AP1', 'MOT_Q4');
			$active_sheet->setCellValue('AQ1', 'MOT_Q5');
			$active_sheet->setCellValue('AR1', 'NIG_Q1');
			$active_sheet->setCellValue('AS1', 'NIG_Q2');
			$active_sheet->setCellValue('AT1', 'NIG_Q3');
			$active_sheet->setCellValue('AU1', 'NIG_Q4');
			$active_sheet->setCellValue('AV1', 'NIG_Q5');
			$active_sheet->setCellValue('AW1', 'TRA_Q1');
			$active_sheet->setCellValue('AX1', 'TRA_Q2');
			$active_sheet->setCellValue('AY1', 'TRA_Q3');
			$active_sheet->setCellValue('AZ1', 'TRA_Q4');
			$active_sheet->setCellValue('BA1', 'TRA_Q5');
			$active_sheet->setCellValue('BB1', 'TOTAL MOT');
			$active_sheet->setCellValue('BC1', 'TOTAL NIG');
			$active_sheet->setCellValue('BD1', 'TOTAL TRA');
			$active_sheet->setCellValue('BE1', 'Remark');
			$active_sheet->setCellValue('BF1', 'Insight');
			$active_sheet->setCellValue('BG1', 'Distribution Date');
			$active_sheet->setCellValue('BH1', 'Status');
			$active_sheet->setCellValue('BI1', 'Call History');
			
			$date_from 	= format_ymd($this->input->post('date_from'));
			$date_to 	= format_ymd($this->input->post('date_to'));

			$result 	= $this->export_model->export($date_from,$date_to)->result();
			// $result 	= array();
			$i=2;
			foreach($result as $r){
				$active_sheet->setCellValueExplicit('A'.$i, $r->mop_id);
				$active_sheet->setCellValue('B'.$i, $r->username);
				$active_sheet->setCellValue('C'.$i, $r->fullname);
				$active_sheet->setCellValue('D'.$i, $r->nickname);
				$active_sheet->setCellValue('E'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->dob)));
				$active_sheet->getStyle('E'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('F'.$i, calcutate_age($r->dob));
				$active_sheet->setCellValueExplicit('G'.$i, $r->tlp);
				$active_sheet->setCellValue('H'.$i, $r->email);
				$active_sheet->setCellValue('I'.$i, $r->fb);
				$active_sheet->setCellValue('J'.$i, $r->tw);
				$active_sheet->setCellValue('K'.$i, $r->ins);
				$active_sheet->setCellValue('L'.$i, $r->job);
				$active_sheet->setCellValue('M'.$i, $r->job_type);
				$active_sheet->setCellValue('N'.$i, $r->brand);
				$active_sheet->setCellValue('O'.$i, ($r->sim==1?'Ya':'Tidak'));
				$active_sheet->setCellValueExplicit('P'.$i, $r->sim_no);
				$active_sheet->setCellValue('Q'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->sim_exp)));
				$active_sheet->getStyle('Q'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('R'.$i, ($r->motor==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('S'.$i, $r->motor_desc);
				$active_sheet->setCellValue('T'.$i, ($r->sick==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('U'.$i, $r->sick_desc);
				$active_sheet->setCellValue('V'.$i, ($r->passport==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('W'.$i, $r->passport_name);
				$active_sheet->setCellValueExplicit('X'.$i, $r->passport_no);
				$active_sheet->setCellValue('Y'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->passport_exp)));
				$active_sheet->getStyle('Y'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('Z'.$i, ($r->barcelona==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('AA'.$i, $r->travel);
				$active_sheet->setCellValue('AB'.$i, ($r->campaign==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('AC'.$i, $r->campaign_desc);
				$active_sheet->setCellValue('AD'.$i, ($r->campaign_same==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('AE'.$i, ($r->campaign_same_price==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('AF'.$i, $r->campaign_same_name);
				$active_sheet->setCellValue('AG'.$i, ($r->i1==1?'5':'0'));
				$active_sheet->setCellValue('AH'.$i, ($r->i1==2?'5':'0'));
				$active_sheet->setCellValue('AI'.$i, ($r->i1==3?'5':'0'));
				$active_sheet->setCellValue('AJ'.$i, ($r->i2==1?'5':'0'));
				$active_sheet->setCellValue('AK'.$i, ($r->i2==2?'5':'0'));
				$active_sheet->setCellValue('AL'.$i, ($r->i2==3?'5':'0'));
				$m1 = ($r->m1==1?'3':($r->m1==2?'5':($r->m1==3?'8':'0')));
				$m2 = ($r->m2==1?'3':($r->m2==2?'5':($r->m2==3?'8':'0')));
				$m3 = ($r->m3==1?'3':($r->m3==2?'5':($r->m3==3?'8':'0')));
				$m4 = ($r->m4==1?'3':($r->m4==2?'5':($r->m4==3?'8':'0')));
				$m5 = ($r->m5==1?'3':($r->m5==2?'5':($r->m5==3?'8':'0')));
				$active_sheet->setCellValue('AM'.$i, $m1);
				$active_sheet->setCellValue('AN'.$i, $m2);
				$active_sheet->setCellValue('AO'.$i, $m3);
				$active_sheet->setCellValue('AP'.$i, $m4);
				$active_sheet->setCellValue('AQ'.$i, $m5);
				$n1 = ($r->n1==1?'3':($r->n1==2?'5':($r->n1==3?'8':'0')));
				$n2 = ($r->n2==1?'3':($r->n2==2?'5':($r->n2==3?'8':'0')));
				$n3 = ($r->n3==1?'3':($r->n3==2?'5':($r->n3==3?'8':'0')));
				$n4 = ($r->n4==1?'3':($r->n4==2?'5':($r->n4==3?'8':'0')));
				$n5 = ($r->n5==1?'3':($r->n5==2?'5':($r->n5==3?'8':'0')));
				$active_sheet->setCellValue('AR'.$i, $n1);
				$active_sheet->setCellValue('AS'.$i, $n2);
				$active_sheet->setCellValue('AT'.$i, $n3);
				$active_sheet->setCellValue('AU'.$i, $n4);
				$active_sheet->setCellValue('AV'.$i, $n5);
				$t1 = ($r->t1==1?'3':($r->t1==2?'5':($r->t1==3?'8':'0')));
				$t2 = ($r->t2==1?'3':($r->t2==2?'5':($r->t2==3?'8':'0')));
				$t3 = ($r->t3==1?'3':($r->t3==2?'5':($r->t3==3?'8':'0')));
				$t4 = ($r->t4==1?'3':($r->t4==2?'5':($r->t4==3?'8':'0')));
				$t5 = ($r->t5==1?'3':($r->t5==2?'5':($r->t5==3?'8':'0')));
				$active_sheet->setCellValue('AW'.$i, $t1);
				$active_sheet->setCellValue('AX'.$i, $t2);
				$active_sheet->setCellValue('AY'.$i, $t3);
				$active_sheet->setCellValue('AZ'.$i, $t4);
				$active_sheet->setCellValue('BA'.$i, $t5);
				$active_sheet->setCellValue('BB'.$i, ($m1+$m2+$m3+$m4+$m5));
				$active_sheet->setCellValue('BC'.$i, ($n1+$n2+$n3+$n4+$n5));
				$active_sheet->setCellValue('BD'.$i, ($t1+$t2+$t3+$t4+$t5));
				$active_sheet->setCellValue('BE'.$i, $r->remark);
				$active_sheet->setCellValue('BF'.$i, $r->overall);
				$active_sheet->setCellValue('BG'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->dist_date)));
				$active_sheet->getStyle('BG'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('BH'.$i, $r->status_name);
				$active_sheet->setCellValue('BI'.$i, $this->callhis_model->get_note($r->id));
				$i++;
			}

			$filename='RTB2016_Candidate_'.date('Ymd_His').'.xlsx';
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');
								 
			$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');  
			$objWriter->save('php://output');										
		}
	}
}
