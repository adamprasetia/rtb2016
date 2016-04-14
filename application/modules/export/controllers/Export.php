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
			$active_sheet->getStyle("A1:BZ1")->getFont()->setBold(true);
			$active_sheet->getStyle("AG")->getFont()->setBold(true);
			$active_sheet->getStyle("AM")->getFont()->setBold(true);
			$active_sheet->getStyle("AS")->getFont()->setBold(true);
			$active_sheet->getStyle("AY")->getFont()->setBold(true);
			$active_sheet->getStyle("AZ")->getFont()->setBold(true);

			//header
			$active_sheet->setCellValue('A1', 'No');
			$active_sheet->setCellValue('B1', 'Fullname');
			$active_sheet->setCellValue('C1', 'Nickname');
			$active_sheet->setCellValue('D1', 'Day of Birth');
			$active_sheet->setCellValue('E1', 'Phonoe/HP');
			$active_sheet->setCellValue('F1', 'Email');
			$active_sheet->setCellValue('G1', 'Facebook');
			$active_sheet->setCellValue('H1', 'Twitter');
			$active_sheet->setCellValue('I1', 'Instagram');
			$active_sheet->setCellValue('J1', 'Pekerjaan');
			$active_sheet->setCellValue('K1', 'Bidang Pekerjaan');
			$active_sheet->setCellValue('L1', 'Brand Rokok');
			$active_sheet->setCellValue('M1', 'Memiliki SIM');
			$active_sheet->setCellValue('N1', 'Nomor SIM');
			$active_sheet->setCellValue('O1', 'Masa Berlaku SIM');
			$active_sheet->setCellValue('P1', 'Bisa Motor Besar');
			$active_sheet->setCellValue('Q1', 'Merk Motor Besar');
			$active_sheet->setCellValue('R1', 'Pernah Sakit');
			$active_sheet->setCellValue('S1', 'Penyebab Sakit');
			$active_sheet->setCellValue('T1', 'Memiliki PASSPORT');
			$active_sheet->setCellValue('U1', 'Nama Sesuai PASSPORT');
			$active_sheet->setCellValue('V1', 'Nomor PASSPORT');
			$active_sheet->setCellValue('W1', 'Masa Berlaku PASSPORT');
			$active_sheet->setCellValue('X1', 'Pernah Ke Barcelona');
			$active_sheet->setCellValue('Y1', 'Pernah Ke Mana Saja');
			$active_sheet->setCellValue('Z1', 'Pernah Ikut Campaign Marlboro');
			$active_sheet->setCellValue('AA1', 'Nama Campaign Marlboro');
			$active_sheet->setCellValue('AB1', 'Pernah Ikut Campaign Serupa');
			$active_sheet->setCellValue('AC1', 'Menang Hadiah Campaign Serupa');
			$active_sheet->setCellValue('AD1', 'Nama Campaign Serupa');
			$active_sheet->setCellValue('AE1', 'INTEREST PROMPT 1');
			$active_sheet->setCellValue('AF1', 'INTEREST PROMPT 2');
			$active_sheet->setCellValue('AG1', 'INTEREST PROMPT TOTAL');
			$active_sheet->setCellValue('AH1', 'MOTORSPORT 1');
			$active_sheet->setCellValue('AI1', 'MOTORSPORT 2');
			$active_sheet->setCellValue('AJ1', 'MOTORSPORT 3');
			$active_sheet->setCellValue('AK1', 'MOTORSPORT 4');
			$active_sheet->setCellValue('AL1', 'MOTORSPORT 5');
			$active_sheet->setCellValue('AM1', 'MOTORSPORT TOTAL');
			$active_sheet->setCellValue('AN1', 'NIGHTLIFE 1');
			$active_sheet->setCellValue('AO1', 'NIGHTLIFE 2');
			$active_sheet->setCellValue('AP1', 'NIGHTLIFE 3');
			$active_sheet->setCellValue('AQ1', 'NIGHTLIFE 4');
			$active_sheet->setCellValue('AR1', 'NIGHTLIFE 5');
			$active_sheet->setCellValue('AS1', 'NIGHTLIFE TOTAL');
			$active_sheet->setCellValue('AT1', 'TRAVELING 1');
			$active_sheet->setCellValue('AU1', 'TRAVELING 2');
			$active_sheet->setCellValue('AV1', 'TRAVELING 3');
			$active_sheet->setCellValue('AW1', 'TRAVELING 4');
			$active_sheet->setCellValue('AX1', 'TRAVELING 5');
			$active_sheet->setCellValue('AY1', 'TRAVELING TOTAL');
			$active_sheet->setCellValue('AZ1', 'TOTAL SCORE');
			$active_sheet->setCellValue('BA1', 'REMARK');
			$active_sheet->setCellValue('BB1', 'OVERALL');
			$active_sheet->setCellValue('BC1', 'Distribution Date');
			$active_sheet->setCellValue('BD1', 'Status');
			$active_sheet->setCellValue('BE1', 'Call History');
			
			$date_from 	= format_ymd($this->input->post('date_from'));
			$date_to 	= format_ymd($this->input->post('date_to'));

			$result 	= $this->export_model->export($date_from,$date_to)->result();
			$i=2;
			foreach($result as $r){
				$active_sheet->setCellValue('A'.$i, $i-1);
				$active_sheet->setCellValue('B'.$i, $r->fullname);
				$active_sheet->setCellValue('C'.$i, $r->nickname);
				$active_sheet->setCellValue('D'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->dob)));
				$active_sheet->getStyle('D'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValueExplicit('E'.$i, $r->tlp);
				$active_sheet->setCellValue('F'.$i, $r->email);
				$active_sheet->setCellValue('G'.$i, $r->fb);
				$active_sheet->setCellValue('H'.$i, $r->tw);
				$active_sheet->setCellValue('I'.$i, $r->ins);
				$active_sheet->setCellValue('J'.$i, $r->job);
				$active_sheet->setCellValue('K'.$i, $r->job_type);
				$active_sheet->setCellValue('L'.$i, $r->brand);
				$active_sheet->setCellValue('M'.$i, ($r->sim==1?'Ya':'Tidak'));
				$active_sheet->setCellValueExplicit('N'.$i, $r->sim_no);
				$active_sheet->setCellValue('O'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->sim_exp)));
				$active_sheet->getStyle('O'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('P'.$i, ($r->motor==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('Q'.$i, $r->motor_desc);
				$active_sheet->setCellValue('R'.$i, ($r->sick==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('S'.$i, $r->sick_desc);
				$active_sheet->setCellValue('T'.$i, ($r->passport==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('U'.$i, $r->passport_name);
				$active_sheet->setCellValueExplicit('V'.$i, $r->passport_no);
				$active_sheet->setCellValue('W'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->passport_exp)));
				$active_sheet->getStyle('W'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('X'.$i, ($r->barcelona==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('Y'.$i, $r->travel);
				$active_sheet->setCellValue('Z'.$i, ($r->campaign==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('AA'.$i, $r->campaign_desc);
				$active_sheet->setCellValue('AB'.$i, ($r->campaign_same==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('AC'.$i, ($r->campaign_same_price==1?'Ya':'Tidak'));
				$active_sheet->setCellValue('AD'.$i, $r->campaign_same_name);
				$i1 = ($r->i1<>0?'5':'0');
				$i2 = ($r->i2<>0?'5':'0');
				$active_sheet->setCellValue('AE'.$i, $i1);
				$active_sheet->setCellValue('AF'.$i, $i2);
				$active_sheet->setCellValue('AG'.$i, ($i1+$i2));				
				$m1 = ($r->m1==1?'3':($r->m1==2?'5':($r->m1==3?'8':'0')));
				$m2 = ($r->m2==1?'3':($r->m2==2?'5':($r->m2==3?'8':'0')));
				$m3 = ($r->m3==1?'3':($r->m3==2?'5':($r->m3==3?'8':'0')));
				$m4 = ($r->m4==1?'3':($r->m4==2?'5':($r->m4==3?'8':'0')));
				$m5 = ($r->m5==1?'3':($r->m5==2?'5':($r->m5==3?'8':'0')));
				$active_sheet->setCellValue('AH'.$i, $m1);
				$active_sheet->setCellValue('AI'.$i, $m2);
				$active_sheet->setCellValue('AJ'.$i, $m3);
				$active_sheet->setCellValue('AK'.$i, $m4);
				$active_sheet->setCellValue('AL'.$i, $m5);
				$active_sheet->setCellValue('AM'.$i, ($m1+$m2+$m3+$m4+$m5));
				$n1 = ($r->n1==1?'3':($r->n1==2?'5':($r->n1==3?'8':'0')));
				$n2 = ($r->n2==1?'3':($r->n2==2?'5':($r->n2==3?'8':'0')));
				$n3 = ($r->n3==1?'3':($r->n3==2?'5':($r->n3==3?'8':'0')));
				$n4 = ($r->n4==1?'3':($r->n4==2?'5':($r->n4==3?'8':'0')));
				$n5 = ($r->n5==1?'3':($r->n5==2?'5':($r->n5==3?'8':'0')));
				$active_sheet->setCellValue('AN'.$i, $n1);
				$active_sheet->setCellValue('AO'.$i, $n2);
				$active_sheet->setCellValue('AP'.$i, $n3);
				$active_sheet->setCellValue('AQ'.$i, $n4);
				$active_sheet->setCellValue('AR'.$i, $n5);
				$active_sheet->setCellValue('AS'.$i, ($n1+$n2+$n3+$n4+$n5));
				$t1 = ($r->t1==1?'3':($r->t1==2?'5':($r->t1==3?'8':'0')));
				$t2 = ($r->t2==1?'3':($r->t2==2?'5':($r->t2==3?'8':'0')));
				$t3 = ($r->t3==1?'3':($r->t3==2?'5':($r->t3==3?'8':'0')));
				$t4 = ($r->t4==1?'3':($r->t4==2?'5':($r->t4==3?'8':'0')));
				$t5 = ($r->t5==1?'3':($r->t5==2?'5':($r->t5==3?'8':'0')));
				$active_sheet->setCellValue('AT'.$i, $t1);
				$active_sheet->setCellValue('AU'.$i, $t2);
				$active_sheet->setCellValue('AV'.$i, $t3);
				$active_sheet->setCellValue('AW'.$i, $t4);
				$active_sheet->setCellValue('AX'.$i, $t5);
				$active_sheet->setCellValue('AY'.$i, ($t1+$t2+$t3+$t4+$t5));
				$active_sheet->setCellValue('AZ'.$i, ($i1+$i2)+($m1+$m2+$m3+$m4+$m5)+($n1+$n2+$n3+$n4+$n5)+($t1+$t2+$t3+$t4+$t5));
				$active_sheet->setCellValue('BA'.$i, $r->remark);
				$active_sheet->setCellValue('BB'.$i, $r->overall);
				$active_sheet->setCellValue('BC'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->dist_date)));
				$active_sheet->getStyle('BC'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('BD'.$i, $r->status_name);
				$active_sheet->setCellValue('BE'.$i, $this->callhis_model->get_note($r->id));
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
