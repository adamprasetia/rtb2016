<section class="content-header">
	<h1>
		Report
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		<li class="active">Report</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
		<div class="box-body">
			<?php echo form_open($action,array('class'=>'form-inline'))?>
				<div class="form-group">
					Date : 
					<?php echo form_input(array('name'=>'date_from','class'=>'form-control input-tanggal','size'=>'10','value'=>$this->input->get('date_from')))?>
					<?php echo form_input(array('name'=>'date_to','class'=>'form-control input-tanggal','size'=>'10','value'=>$this->input->get('date_to')))?>
					<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>
				</div>
			<?php echo form_close()?>
		</div>
	</div>
	<div class="box box-default">
		<div class="box-header">
			<h4>Report Status</h4>
		</div>
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-bordered text-center">
					<tr>
						<th rowspan='2' style="vertical-align:middle">Total Proses</th>
						<th colspan='6'>Connect</th>
						<th rowspan='2' style="vertical-align:middle">Total Connect</th>
						<th colspan='3'>Not Connect</th>
						<th rowspan='2' style="vertical-align:middle">Total Not Connect</th>
						<th rowspan='2' style="vertical-align:middle">Total</th>
					</tr>
					<tr>
						<th>No Smokers</th>
						<th>Resign</th>
						<th>Not Participate</th>
						<th>Success</th>
						<th>Wrong Number</th>
						<th>Callback</th>
						<th>No Answer</th>
						<th>Busy</th>
						<th>Reject</th>
					</tr>
					<?php foreach ($report_status as $row): ?>
						<tr>
							<td><b><?php echo number_format($row->proses) ?></b></td>
							<td><?php echo number_format($row->no_smoker) ?></td>
							<td><?php echo number_format($row->resign) ?></td>
							<td><?php echo number_format($row->not_participate) ?></td>
							<td><?php echo number_format($row->success) ?></td>
							<td><?php echo number_format($row->wrong) ?></td>
							<td><?php echo number_format($row->callback) ?></td>
							<td><b class="label label-success"><?php echo number_format($row->total_c) ?></b></td>
							<td><?php echo number_format($row->na) ?></td>
							<td><?php echo number_format($row->bus) ?></td>
							<td><?php echo number_format($row->rej) ?></td>
							<td><b class="label label-danger"><?php echo number_format($row->total_n) ?></b></td>
							<td><b><?php echo number_format($row->total) ?></b></td>
						</tr>						
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>	
</section>