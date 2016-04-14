<?php $gretting = 'Selamat '.(date('G')<10?'pagi':(date('G')<15?'siang':'sore')) ?>
<section class="content-header">
	<h1>
		Interview
		<small>Phone script</small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	  <li><?php echo anchor($breadcrumb,'List')?></li>
	  <li class="active">Interview</li>
	</ol>
</section>
<section class="content">
<?php echo $this->session->flashdata('alert')?>
	<div class="row">
		<?php echo form_open($action) ?>
		<div class="col-md-8 col-sm-8">
			<div class="box">
				<div class="box-body form-inline">
					Status : 
					<?php echo form_dropdown('status',$this->interview_model->status_dropdown(),set_value('status',$candidate->status),'class="form-control"') ?>
					<div class="pull-right">
						<div class="checkbox <?php echo ($this->user_login['level']==2?'hide':'') ?>">
							<label>
								<?php echo form_checkbox(array('id'=>'valid','name'=>'valid','value'=>'1','checked'=>set_value('valid',($candidate->valid==1?true:false)))) ?>
								Valid
							</label>
						</div>
						<div class="checkbox <?php echo ($this->user_login['level']==3?'hide':'') ?>">
							<label>
								<?php echo form_checkbox(array('id'=>'audit','name'=>'audit','value'=>'1','checked'=>set_value('audit',($candidate->audit==1?true:false)))) ?>
								Audit
							</label>
						</div>
					</div>
					<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
				</div>	
			</div>	
			<div class="box">
				<div class="box-header">
					<b>Phone Script</b>
				</div>	
				<div class="box-body">
					<h3><?php echo $gretting ?>. Bisa berbicara dengan <b><?php echo $candidate->fullname ?></b> ?</h3>
				</div>	
				<div class="box-footer">
					<div class="checkbox">
						<label>
							<?php echo form_checkbox(array('id'=>'called','name'=>'called','value'=>'1','checked'=>set_value('called',($candidate->called==1?true:false)))) ?>
							Berhasil Dihubungi
						</label>
					</div>
					<p>Jika <b>"tidak ada ditempat"</b> atau <b>"sibuk"</b> : Minta waktu yang tepat untuk dihubungi kembali</p>
				</div>					
			</div>
			<div class="box box-program hide">
				<div class="box-body">
					<h3>Saya <b><?php echo $this->user_login['name'] ?></b> dari MARLBORO, yang ditugaskan untuk berbicara kepada anda terkait dengan program <b>MARLBORO RIDE to BARCELONA</b>.</h3>
					<h3>Benar Anda sedang mengikuti program <b>MARLBORO RIDE to BARCELONA</b> ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'program1','name'=>'program','value'=>'1','checked'=>($candidate->program==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'program2','name'=>'program','value'=>'2','checked'=>($candidate->program==2?true:false))) ?>
							Tidak
						</label>
					</div>				
				</div>				
			</div>
			<div class="box box-program-tidak box-danger hide">
				<div class="box-body">
					<h3>Mohon maaf sudah mengganggu waktunya, <?php echo $gretting ?></h3>
	    		</div>	
			</div>								
			<div class="box box-minute hide">
				<div class="box-body">
					<h3>Boleh minta waktunya sebentar ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'minute1','name'=>'minute','value'=>'1','checked'=>($candidate->minute==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'minute2','name'=>'minute','value'=>'2','checked'=>($candidate->minute==2?true:false))) ?>
							Tidak
						</label>
					</div>				
				</div>				
			</div>
			<div class="box box-minute-tidak hide">
				<div class="box-body">
	    			<h3>Saya minta maaf sudah menggangu waktunya. Kapan kira kira bisa dihubungi kembali ?</h3>
	    			<p>(catat tgl dan waktu untuk dihubungi)</p>
	    		</div>	
			</div>								
			<div class="box box-smoker hide">
				<div class="box-body">
					<h3><b>Selamat anda terpilih untuk masuk ke tahap seleksi lanjutan RIDE to BARCELONA.</b></h3>
					<h3>Saat ini, kami sedang mencari kandidat finalis yang tepat untuk program <b>MARLBORO RIDE to BARCELONA</b>.</h3>
					<h3>Kami harap Anda dapat menjawab beberapa pertanyaan dari kami.</h3>
					<h3>Seperti yang anda ketahui, <b>RIDE to BARCELONA</b> adalah campaign yang diperuntukkan bagi perokok dewasa. </h3>
					<h3>Apakah anda seorang perokok dewasa ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'smoker1','name'=>'smoker','value'=>'1','checked'=>($candidate->smoker==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'smoker2','name'=>'smoker','value'=>'2','checked'=>($candidate->smoker==2?true:false))) ?>
							Tidak
						</label>
					</div>				
				</div>				
			</div>
			<div class="box box-smoker-tidak box-danger hide">
				<div class="box-body">
	    			<h3>Mohon maaf sekali, dengan demikian Anda dianggap gugur dalam program ini karena program ini dikhususkan untuk perokok dewasa.</h3>
	    			<h3><?php echo $gretting ?></h3>
	    		</div>	
			</div>								
			<div class="box box-resign hide">
				<div class="box-body">
					<h3>Jawaban Anda akan menentukan apakah Anda sesuai dengan profil pemenang yang kami cari. Apabila profile Anda sesuai, maka Anda berhak untuk masuk ke Final Voting 30 besar dan berkesempatan untuk memenangkan grand prize trip ke Barcelona dan Sepeda Motor Ducatti.</h3>
					<h3>Apakah Anda bersedia untuk mengikuti proses seleksi ini ?</h3>
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'resign1','name'=>'resign','value'=>'1','checked'=>($candidate->resign==1?true:false))) ?>
							Ya
						</label>
					</div>				
					<div class="radio">
						<label>
							<?php echo form_radio(array('id'=>'resign2','name'=>'resign','value'=>'2','checked'=>($candidate->resign==2?true:false))) ?>
							Tidak
						</label>
					</div>				
				</div>				
			</div>
			<div class="box box-resign-tidak box-danger hide">
				<div class="box-body">
	    			<h3>Mohon maaf sekali, dengan demikian Anda dianggap gugur dalam program ini, karena proses ini penting dalam menentukan status Anda sebagai kandidat finalis.</h3>
	    			<h3><?php echo $gretting ?></h3>
	    		</div>	
			</div>								
			<div class="question hide">
				<div class="box box-verification">
					<div class="box-body">
						<h3>Sebelum melanjutkan ke sesi phone interview kami akan melakukan verifikasi data.</h3>
						<table class="table table-striped table-bordered">
							<tr>
								<td><label class="input-sm">Fullname</label></td>
								<td><input name="fullname" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->fullname)?$candidate->fullname:'') ?>"></td>
							</tr>
							<tr>
								<td><label class="input-sm">Nickname</label></td>
								<td><input name="nickname" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->nickname)?$candidate->nickname:'') ?>"></td>
							</tr>
							<?php 
								$date = explode("-", $candidate->dob);
							?>
							<tr class="form-inline">
								<td><label class="input-sm">Day of Birth</label></td>
								<td>
									<?php echo form_dropdown('dob_dd',get_dd(),(isset($date[2])?$date[2]:''),'class="form-control input-sm"') ?>
									<?php echo form_dropdown('dob_mm',get_mm(),(isset($date[1])?$date[1]:''),'class="form-control input-sm"') ?>
									<input name="dob_yy" class="form-control input-sm" maxlength="4" size="10" value="<?php echo (isset($date[0])?$date[0]:'') ?>">
								</td>
							</tr>
							<tr>
								<td><label class="input-sm">Phone/HP</label></td>
								<td><input name="tlp" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->tlp)?$candidate->tlp:'') ?>"></td>
							</tr>
							<tr>
								<td><label class="input-sm">Email</label></td>
								<td><input name="email" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->email)?$candidate->email:'') ?>"></td>
							</tr>
							<tr>
								<td><label class="input-sm">Facebook</label></td>
								<td><input name="fb" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->fb)?$candidate->fb:'') ?>"></td>
							</tr>
							<tr>
								<td><label class="input-sm">Twitter</label></td>
								<td><input name="tw" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->tw)?$candidate->tw:'') ?>"></td>
							</tr>
							<tr>
								<td><label class="input-sm">Instagram</label></td>
								<td><input name="ins" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->ins)?$candidate->ins:'') ?>"></td>
							</tr>
							<tr>
								<td><label class="input-sm">Pekerjaan</label></td>
								<td><input name="job" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->job)?$candidate->job:'') ?>"></td>
							</tr>
							<tr>
								<td><label class="input-sm">Bidang Pekerjaan</label></td>
								<td><input name="job_type" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->job_type)?$candidate->job_type:'') ?>"></td>
							</tr>
							<tr>
								<td><label class="input-sm">Brand Rokok</label></td>
								<td><input name="brand" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->brand)?$candidate->brand:'') ?>"></td>
							</tr>
						</table>
					</div>				
				</div>
			
				<div class="box box-sim">
					<div class="box-body">
						<h3>APAKAH ANDA MEMILIKI SIM C ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'sim1','name'=>'sim','value'=>'1','checked'=>($candidate->sim==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'sim2','name'=>'sim','value'=>'2','checked'=>($candidate->sim==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>				
					<div class="box-footer box-sim-ya hide">
						<table class="table table-striped table-bordered">
							<tr>
								<td><label class="input-sm">Nomor SIM</label></td>
								<td><input name="sim_no" maxlength="50" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->sim_no)?$candidate->sim_no:'') ?>"></td>
							</tr>
							<?php 
								$date = explode("-", $candidate->sim_exp);
								if($date[0]=='0000') $date[0] = '';
							?>
							<tr class="form-inline">
								<td><label class="input-sm">Masa Berlaku</label></td>
								<td>
									<?php echo form_dropdown('sim_exp_dd',get_dd(),(isset($date[2])?$date[2]:''),'class="form-control input-sm"') ?>
									<?php echo form_dropdown('sim_exp_mm',get_mm(),(isset($date[1])?$date[1]:''),'class="form-control input-sm"') ?>
									<input name="sim_exp_yy" class="form-control input-sm" maxlength="4" size="10" value="<?php echo (isset($date[0])?$date[0]:'') ?>">
								</td>
							</tr>
						</table>		
					</div>			
				</div>
				<div class="box box-motor">
					<div class="box-body">
						<h3>APAKAH ANDA BISA MENGENDARAI MOTOR BESAR :</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'motor1','name'=>'motor','value'=>'1','checked'=>($candidate->motor==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'motor2','name'=>'motor','value'=>'2','checked'=>($candidate->motor==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>				
					<div class="box-footer box-motor-ya hide">
						<label>MOTOR BESAR MEREK APA YANG PERNAH ANDA KENDARAI :</label>
						<input name="motor_desc" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->motor_desc)?$candidate->motor_desc:'') ?>">
					</div>			
				</div>
				<div class="box box-sick">
					<div class="box-body">
						<h3>DALAM SETAHUN TERAKHIR APAKAH ANDA PERNAH DIRAWAT DI RUMAH SAKIT :</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'sick1','name'=>'sick','value'=>'1','checked'=>($candidate->sick==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'sick2','name'=>'sick','value'=>'2','checked'=>($candidate->sick==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>				
					<div class="box-footer box-sick-ya hide">
						<label>PENYEBAB :</label>
						<input name="sick_desc" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->sick_desc)?$candidate->sick_desc:'') ?>">
					</div>			
				</div>
				<div class="box box-passport">
					<div class="box-body">
						<h3>APAKAH ANDA MEMILIKI PASSPORT :</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'passport1','name'=>'passport','value'=>'1','checked'=>($candidate->passport==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'passport2','name'=>'passport','value'=>'2','checked'=>($candidate->passport==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>				
					<div class="box-footer box-passport-ya hide">
						<table class="table table-striped table-bordered">
							<tr>
								<td><label class="input-sm">Nama Sesuai Passport</label></td>
								<td><input name="passport_name" maxlength="100" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->passport_name)?$candidate->passport_name:'') ?>"></td>
							</tr>
							<tr>
								<td><label class="input-sm">Nomor Passport</label></td>
								<td><input name="passport_no" maxlength="50" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->passport_no)?$candidate->passport_no:'') ?>"></td>
							</tr>
							<?php 
								$date = explode("-", $candidate->passport_exp);
								if($date[0]=='0000') $date[0] = '';
							?>
							<tr class="form-inline">
								<td><label class="input-sm">Masa Berlaku</label></td>
								<td>
									<?php echo form_dropdown('passport_exp_dd',get_dd(),(isset($date[2])?$date[2]:''),'class="form-control input-sm"') ?>
									<?php echo form_dropdown('passport_exp_mm',get_mm(),(isset($date[1])?$date[1]:''),'class="form-control input-sm"') ?>
									<input name="passport_exp_yy" class="form-control input-sm" maxlength="4" size="10" value="<?php echo (isset($date[0])?$date[0]:'') ?>">
								</td>
							</tr>
						</table>		
					</div>			
				</div>			
				<div class="box box-barcelona">
					<div class="box-body">
						<h3>PERNAH KE BARCELONA :</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'barcelona1','name'=>'barcelona','value'=>'1','checked'=>($candidate->barcelona==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'barcelona2','name'=>'barcelona','value'=>'2','checked'=>($candidate->barcelona==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>				
				</div>			
				<div class="box box-barcelona">
					<div class="box-body">
						<h3>ANDA PERNAH BERKUNJUNG KEMANA SAJA :</h3>
						<input name="travel" maxlength="200" autocomplete="off" class="form-control input-sm" value="<?php echo (isset($candidate->travel)?$candidate->travel:'') ?>">
					</div>				
				</div>
				<div class="box box-campaign">
					<div class="box-body">
						<h3>APAKAH ANDA SUDAH PERNAH MENGIKUTI CAMPAIGN MARLBORO SEBELUMNYA :</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'campaign1','name'=>'campaign','value'=>'1','checked'=>($candidate->campaign==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'campaign2','name'=>'campaign','value'=>'2','checked'=>($candidate->campaign==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>				
					<div class="box-footer box-campaign-ya hide">
						<label>TOLONG SEBUTKAN NAMA CAMPAIGN MARLBORO YANG SUDAH PERNAH ANDA IKUTI :</label>
						<label>(Mohon sebutkan nama campaign, waktu campaign berlangsung dan sudah sampai level mana)</label>
						<textarea name="campaign_desc" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->campaign_desc)?$candidate->campaign_desc:'') ?></textarea>
					</div>			
				</div>						
				<div class="box box-campaign-same">
					<div class="box-body">
						<h3>APAKAH ANDA PERNAH MENGIKUTI KEGIATAN SERUPA (UNDIAN BERHADIAH, KAMPANYE PRODUK BERHADIAH): </h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'campaign_same1','name'=>'campaign_same','value'=>'1','checked'=>($candidate->campaign_same==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'campaign_same2','name'=>'campaign_same','value'=>'2','checked'=>($candidate->campaign_same==2?true:false))) ?>
								Tidak
							</label>
						</div>				
					</div>				
					<div class="box-footer box-campaign-same-ya hide">
						<label>APAKAH ANDA MEMENANGKAN HADIAH DALAM PARTISIPASI ANDA ? </label>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'campaign_same_price1','name'=>'campaign_same_price','value'=>'1','checked'=>($candidate->campaign_same_price==1?true:false))) ?>
								Ya
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'campaign_same_price2','name'=>'campaign_same_price','value'=>'2','checked'=>($candidate->campaign_same_price==2?true:false))) ?>
								Tidak
							</label>
						</div>				
						<label>TOLONG SEBUTKAN NAMA PROGRAM TERSEBUT</label>
						<textarea name="campaign_same_name" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->campaign_same_name)?$candidate->campaign_same_name:'') ?></textarea>
					</div>			
				</div>						
				<div class="box">
					<div class="box-body">
						<h4>Baik, dengan demikian kita bisa melanjutkan ke tahap phone interview.</h4>
						<h4>KAMI BERITAHUKAN TERLEBIH DAHULU BAHWA SELURUH PEMBICARAAN YANG TERJADI DI TELEPON INI AKAN DIREKAM UNTUK DIJADIKAN BAHAN PERTIMBANGAN DALAM PROSES PEMILIHAN PEMENANG. DAFTAR PERTANYAAN SELEKSI PHONE INTERVIEW</h4>
						<h4>Pertanyaan-pertanyaan yang akan saya sampaikan bertujuan untuk menggali kecocokan profil Andauntuk menjadi finalis.</h4>
						<h4>Harap berikan  jawaban yang jelas dan padat.</h4>
					</div>			
				</div>						
				<div class="box">
					<div class="box-header"><h3>INTEREST PROMPT</h3></div>
					<div class="box-body">					
						<h3>1. Diantara 3 interest ini, mana yang paling lo banget ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'i11','name'=>'i1','value'=>'1','checked'=>($candidate->i1==1?true:false))) ?>
								Motorsport (Sepeda Motor, Racing, Modifikasi Motor dan Semacamnya)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'i12','name'=>'i1','value'=>'2','checked'=>($candidate->i1==2?true:false))) ?>
								Nightlife (Clubbing, Bar, Party dan Semacamnya)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'i13','name'=>'i1','value'=>'3','checked'=>($candidate->i1==3?true:false))) ?>
								Traveling (Flashpacker, Backpacker, Glam Travel dan Semacamnya)
							</label>
						</div>				
						<h3>2. Menurut lo Barcelona identik sama apa ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'i21','name'=>'i2','value'=>'1','checked'=>($candidate->i2==1?true:false))) ?>
								Motorsport/ Moto GP
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'i22','name'=>'i2','value'=>'2','checked'=>($candidate->i2==2?true:false))) ?>
								Nightlife
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'i23','name'=>'i2','value'=>'3','checked'=>($candidate->i2==3?true:false))) ?>
								Traveling / Bola / Jawaban lain selain Nightlife dan Motorsport
							</label>
						</div>				
					</div>				
				</div>						
				<div class="box">
					<div class="box-header"><h3>MOTORSPORT</h3></div>
					<div class="box-body">					
						<h3>1. Punya motor ? atau punya ketertarikan ke Dunia Motorsport?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m11','name'=>'m1','value'=>'1','checked'=>($candidate->m1==1?true:false))) ?>
								Jawaban negative (e.g Tidak punya motor, Tidak tertarik)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m12','name'=>'m1','value'=>'2','checked'=>($candidate->m1==2?true:false))) ?>
								Jawaban positive (e.g Punya motor, Tertarik, Jawaban sekedarnya)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m13','name'=>'m1','value'=>'3','checked'=>($candidate->m1==3?true:false))) ?>
								Jawaban positive (e.g Punya motor, Jawaban lebih spesifik dan menunjukkan mendalami Dunia Motor)
							</label>
						</div>				
						<h3>2. Apa yang menurut lo menarik dengan dunia Motorsport?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m21','name'=>'m2','value'=>'1','checked'=>($candidate->m2==1?true:false))) ?>
								Jawaban negative (e.g Tidak tertarik, tidak menunjukkan antusiasme)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m22','name'=>'m2','value'=>'2','checked'=>($candidate->m2==2?true:false))) ?>
								Jawaban positive (Jawaban cenderung generic dan tidak spesifik, e.g Karena keren)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m23','name'=>'m2','value'=>'3','checked'=>($candidate->m2==3?true:false))) ?>
								Jawaban positive (Jawaban spesifik, e.g Karena suka dengan adrenaline rush)
							</label>
						</div>				
						<h3>3. Lo lebih suka motor classic, trail, atau motor sport ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m31','name'=>'m3','value'=>'1','checked'=>($candidate->m3==1?true:false))) ?>
								Motor classic 
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m32','name'=>'m3','value'=>'2','checked'=>($candidate->m3==2?true:false))) ?>
								Motor trail
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m33','name'=>'m3','value'=>'3','checked'=>($candidate->m3==3?true:false))) ?>
								Motor sport
							</label>
						</div>				
						<h3>4. Sering nonton MotoGP ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m41','name'=>'m4','value'=>'1','checked'=>($candidate->m4==1?true:false))) ?>
								Jawaban negative (e.g Tidak pernah, Tidak tahu)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m42','name'=>'m4','value'=>'2','checked'=>($candidate->m4==2?true:false))) ?>
								Jawaban general (e.g Pernah 1-2 kali, Kalau sempat)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m43','name'=>'m4','value'=>'3','checked'=>($candidate->m4==3?true:false))) ?>
								Selalu menonton, Tidak pernah ketinggalan
							</label>
						</div>				
						<h3>5. Bisa sebutin nama nama pembalap moto GP yang lo tahu?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m51','name'=>'m5','value'=>'1','checked'=>($candidate->m5==1?true:false))) ?>
								Jawaban negative (e.g Tidak bias menyebutkan, Bisa menyebutkan 1)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m52','name'=>'m5','value'=>'2','checked'=>($candidate->m5==2?true:false))) ?>
								Bisa menyebutkan 2 – 5 Nama
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'m53','name'=>'m5','value'=>'3','checked'=>($candidate->m5==3?true:false))) ?>
								Bisa menyebutkan lebih dari 5 Nama
							</label>
						</div>				
					</div>				
				</div>						
				<div class="box">
					<div class="box-header"><h3>NIGHTLIFE</h3></div>
					<div class="box-body">					
						<h3>1. Lo suka ke Clubnongkrong di Bar ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n11','name'=>'n1','value'=>'1','checked'=>($candidate->n1==1?true:false))) ?>
								Jawaban negative (e.g Tidak suka clubbing / nongkrong, nggak pernah)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n12','name'=>'n1','value'=>'2','checked'=>($candidate->n1==2?true:false))) ?>
								Jawaban positif (e.g kadang-kadang, sekali, pernah tapi jarang)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n13','name'=>'n1','value'=>'3','checked'=>($candidate->n1==3?true:false))) ?>
								Jawaban positif (e.g Iya, sering, suka)
							</label>
						</div>				
						<h3>2. Seringnya clubbing / nongkrong dimana ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n21','name'=>'n2','value'=>'1','checked'=>($candidate->n2==1?true:false))) ?>
								Menyebutkan 1-2 tempat
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n22','name'=>'n2','value'=>'2','checked'=>($candidate->n2==2?true:false))) ?>
								Menyebutkan lebih dari 2-5 tempat
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n23','name'=>'n2','value'=>'3','checked'=>($candidate->n2==3?true:false))) ?>
								Menyebutkan lebih dari 5 tempat
							</label>
						</div>				
						<h3>3. Genre dance musik apa yang lo suka ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n31','name'=>'n3','value'=>'1','checked'=>($candidate->n3==1?true:false))) ?>
								Jawaban tidak sesuai (e.g Kalau clubbing tidak suka tempat music Dance)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n32','name'=>'n3','value'=>'2','checked'=>($candidate->n3==2?true:false))) ?>
								Jawaban general (e.g EDM, Electronic)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n33','name'=>'n3','value'=>'3','checked'=>($candidate->n3==3?true:false))) ?>
								Jawaban spesifik (e.g Dubstep, Downtempo, Trance, Deep House, Disco, RnB)
							</label>
						</div>				
						<h3>4. DJ/EDM Artist favorit lo siapa ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n41','name'=>'n4','value'=>'1','checked'=>($candidate->n4==1?true:false))) ?>
								Tidak bisa menyebut nama / Tidak mengikuti musik EDM
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n42','name'=>'n4','value'=>'2','checked'=>($candidate->n4==2?true:false))) ?>
								Nama yang disebutkan populer (e.g Zedd, Avicii, Calvin Harris, Skrillex, Armin van Buuren, David Guetta)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n43','name'=>'n4','value'=>'3','checked'=>($candidate->n4==3?true:false))) ?>
								Nama yang disebutkan spesifik (e.g Madeon, Aly & Fila, Fedde Le Grand) 
							</label>
						</div>				
						<h3>5. EDM Event / party apa yang terakhirlo datengin ? Kapan ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n51','name'=>'n5','value'=>'1','checked'=>($candidate->n5==1?true:false))) ?>
								Event/ party yang didatangi lebih dari 1 tahun ke belakang
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n52','name'=>'n5','value'=>'2','checked'=>($candidate->n5==2?true:false))) ?>
								Event / party yang didatangi dalam jangka waktu 5-10 bulan ke belakang
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'n53','name'=>'n5','value'=>'3','checked'=>($candidate->n5==3?true:false))) ?>
								Event/ party yang didatangi kurang lebih dalam 4 bulan ke belakang
							</label>
						</div>				
					</div>				
				</div>						
				<div class="box">
					<div class="box-header"><h3>TRAVELING</h3></div>
					<div class="box-body">					
						<h3>1. Dalam setahun lo bisa berapa kali traveling ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t11','name'=>'t1','value'=>'1','checked'=>($candidate->t1==1?true:false))) ?>
								1-2 kali paling banyak
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t12','name'=>'t1','value'=>'2','checked'=>($candidate->t1==2?true:false))) ?>
								3-4 kali setahun
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t13','name'=>'t1','value'=>'3','checked'=>($candidate->t1==3?true:false))) ?>
								Lebih dari 5 kali setahun
							</label>
						</div>				
						<h3>2. Biasanya lo kalau traveling sama siapa ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t21','name'=>'t2','value'=>'1','checked'=>($candidate->t2==1?true:false))) ?>
								Bersama keluarga
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t22','name'=>'t2','value'=>'2','checked'=>($candidate->t2==2?true:false))) ?>
								Pasangan
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t23','name'=>'t2','value'=>'3','checked'=>($candidate->t2==3?true:false))) ?>
								Sendiri / teman
							</label>
						</div>				
						<h3>3. Kenapa lo traveling ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t31','name'=>'t3','value'=>'1','checked'=>($candidate->t3==1?true:false))) ?>
								Jawaban yang diberikan kurang spesifik atau standar (e.g Ikut tur / orang tua / teman / asyik)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t32','name'=>'t3','value'=>'2','checked'=>($candidate->t3==2?true:false))) ?>
								Jawaban yang diberikan spesifik (e.g Melihat Menara Eiffel, menonton konser, melihat salju)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t33','name'=>'t3','value'=>'3','checked'=>($candidate->t3==3?true:false))) ?>
								Jawaban yang diberikan sangat spesifik (e.g Merasakan makanan local, pengalaman mirip film)
							</label>
						</div>				
						<h3>4. Saat lo traveling, agenda lo ngapain aja ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t41','name'=>'t4','value'=>'1','checked'=>($candidate->t4==1?true:false))) ?>
								Jawaban yang diberikan elaborasinya kurang (e.g Kegiatan turis pada umumnya)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t42','name'=>'t4','value'=>'2','checked'=>($candidate->t4==2?true:false))) ?>
								Jawaban yang diberikan elaborasinya cukup (e.g Ingin merasakan susasana yang beda, Ingin tahu soal negara tersebut)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t43','name'=>'t4','value'=>'3','checked'=>($candidate->t4==3?true:false))) ?>
								Jawaban yang diberikan elaborasinya dalam (e.g Merasakan menjadi penduduk setempat)
							</label>
						</div>				
						<h3>5. Destinasi traveling paling jauh yang pernah lo datangi dimana ?</h3>
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t51','name'=>'t5','value'=>'1','checked'=>($candidate->t5==1?true:false))) ?>
								Jawaban tempat turis (e.g Bali, Lombok, Singapura, Malaysia, Thailand)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t52','name'=>'t5','value'=>'2','checked'=>($candidate->t5==2?true:false))) ?>
								Jawaban tempat turis yang cukup jauh (e.g Jepang, China, Eropa, Amerika Serikat, Australia, New Zealand)
							</label>
						</div>				
						<div class="radio">
							<label>
								<?php echo form_radio(array('id'=>'t53','name'=>'t5','value'=>'3','checked'=>($candidate->t5==3?true:false))) ?>
								Jawaban tempat turis yang spesifik dan jauh (e.g Spanyol, Norwegia, Islandia, Raja Ampat, Kanada)
							</label>
						</div>				
					</div>				
				</div>						
				<div class="box">
					<div class="box-body">
						<h3>Demikian pertanyaan dari kami. </h3>
						<h3>Atas nama Marlboro, saya mengucapkan terima kasih atas waktu dan informasi yang telahAnda berikandan partisipasi Anda dalam mengikuti program MARLBORO RIDE to BARCELONA. Semoga kita bisa bertemu nanti di Denpasar dan semoga berhasil!</h3>

						<h3><?php echo $gretting ?></h3>
					</div>			
				</div>									
				<div class="box">
					<div class="box-body">
						<label>REMARKS (2-3 SENTENCES IN ENGLISH)</label>
						<textarea name="remark" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->remark)?$candidate->remark:'') ?></textarea>
					</div>			
				</div>									
				<div class="box">
					<div class="box-body">
						<label>OVERALL INSIGHTS (SENTENCES IN ENGLISH)</label>
						<textarea name="overall" rows="5" autocomplete="off" class="form-control input-sm"><?php echo (isset($candidate->overall)?$candidate->overall:'') ?></textarea>
					</div>			
				</div>		
			</div>								
		</div>
		<?php echo form_close() ?>
		<div class="col-md-4 col-sm-4">
			<div class="box">
				<div class="box-header">
					<b>Interviewer</b>
				</div>	
				<div class="box-header">
					<td><?php echo $candidate->interviewer ?></td>
				</div>	
			</div>			
			<div class="box callhis-wrap">
				<div class="box-header">
					<b>Call History</b>
				</div>	
				<div class="box-body box-callhis">
					<table class="table table-responsive">
						<tr>
							<th>No</th>
							<th>Date</th>
							<th>Remark</th>
							<th>Action</th>
						</tr>	
						<?php $i=1; ?>
						<?php foreach ($callhis as $row): ?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $row->date ?></td>
							<td data-id="<?php echo $row->id ?>" class="btn-callhis-update"><?php echo $row->status ?></td>
							<td><button type="button" class="btn btn-danger btn-xs btn-callhis-delete" value="<?php echo $row->id ?>">Delete</button></td>
						</tr>							
						<?php endforeach ?>
					</table>
				</div>	
				<div class="box-footer">
					<button type="button" class="btn btn-success btn-xs btn-callhis" value="Answer">Answer</button>
					<button type="button" class="btn btn-warning btn-xs btn-callhis" value="No Answer">No Answer</button>
					<button type="button" class="btn btn-default btn-xs btn-callhis" value="Busy">Busy</button>
					<button type="button" class="btn btn-danger btn-xs btn-callhis" value="Reject">Reject</button>
				</div>	
				<div class="box-footer">
					<input id="note" type="text" name="note" maxlength="100" class="form-control" placeholder="note..." autocomplete="off">
				</div>	
			</div>	
			<div class="box callhis-form hide">
				<div class="box-header">
					<b>Update Call History</b>
				</div>	
				<div class="box-body">
					<input type="hidden" name="id" id="callhis-id" value="5">
					<div class="form-group">
						<?php echo form_label('Date','date',array('class'=>'control-label'))?>
						<?php echo form_input(array('id'=>'callhis-date','name'=>'date','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('date',''),'required'=>'required'))?>
					</div>
					<div class="form-group">
						<?php echo form_label('Status','status',array('class'=>'control-label'))?>
						<?php echo form_input(array('id'=>'callhis-status','name'=>'status','class'=>'form-control input-sm','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('status',''),'required'=>'required'))?>
					</div>
				</div>	
				<div class="box-footer">
					<button type="button" class="btn btn-success btn-xs btn-callhis-save-update">Save</button>
					<button type="button" class="btn btn-default btn-xs btn-callhis-cancel-update">Cancel</button>
				</div>	
			</div>
		</div>
	</div>	
</section>
<script type="text/javascript" src="<?php echo base_url('assets/js/interview.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#note').keyup(function(e){
	    if(e.keyCode == 13 && $(this).val() != ''){	        
			$.ajax({
				url:'<?php echo base_url() ?>index.php/interview/callhis/create',
				type:'post',
				data:{
					status:$(this).val(),
					candidate:'<?php echo $candidate->id ?>'
				},
				success:function(str){
					$('.box-callhis').html(str);							
				}
			});
			$(this).val('');
	    }else{
			console.log('Note is Emptry');
	    }
	});

	$('.btn-callhis').click(function(){
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/create',
			type:'post',
			data:{
				status:$(this).attr('value'),
				candidate:'<?php echo $candidate->id ?>'
			},
			success:function(str){
				$('.box-callhis').html(str);
			}
		});
	});
	$('body').on('click','.btn-callhis-save-update',function(){
		$('.callhis-form').addClass('hide');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/update',
			type:'post',
			data:{
				id:$('#callhis-id').val(),
				date:$('#callhis-date').val(),
				status:$('#callhis-status').val(),
				candidate:'<?php echo $candidate->id ?>'
			},
			success:function(str){
				$('.box-callhis').html(str);
			}
		});				
		$('.callhis-wrap').removeClass('hide');		
	});	
	$('body').on('click','.btn-callhis-cancel-update',function(){
		$('.callhis-form').addClass('hide');
		$.ajax({
			url:'<?php echo base_url() ?>index.php/interview/callhis/get/<?php echo $candidate->id ?>',
			type:'post',
			success:function(str){
				$('.box-callhis').html(str);
			}
		});				
		$('.callhis-wrap').removeClass('hide');
	});	
	
	<?php if ($this->user_login['level']<>3): ?>
		$('body').on('click','.btn-callhis-update',function(){
			var date = $(this).parent().children().eq(1).html();
			var status = $(this).parent().children().eq(2).html();
			$('#callhis-id').val($(this).attr('data-id'));
			$('#callhis-date').val(date);
			$('#callhis-status').val(status);
			$('.callhis-form').removeClass('hide');
			$('.callhis-wrap').addClass('hide');
		});		
	<?php endif ?>

	$('body').on('click','.btn-callhis-delete',function(){
		if(confirm('You sure ?')){
			$.ajax({
				url:'<?php echo base_url() ?>index.php/interview/callhis/delete',
				type:'post',
				data:{
					id:$(this).attr('value'),
					candidate:'<?php echo $candidate->id ?>'
				},
				success:function(str){
					$('.box-callhis').html(str);
				}
			});				
		}
	});	
});
</script>