<div class="container">
	<div class="row" id="content">
		<div class="col-md-12">
			<h1 id="welcome-heading">Welcome <?php echo $this->ion_auth->user()->row()->first_name." ".$this->ion_auth->user()->row()->last_name; ?></h1>
			<?php $ctr = 1; ?>
			<!-- Select users.first_name as 'First Name', users.last_name as 'Last Name', companies.company_name as 'Company Name', companies.description as 'Company Descrption', companies.website as 'Company Website', companies.attachment as 'Job Descritpion', interviews.date as 'Interview Date' from users as u join interviews as i on (u.id=i.user) join companies as c on (c.id = i.company) where u.id=2; -->
			<?php if(isset($my_schedule)) : ?>
				<?php if($my_schedule->num_rows > 0) : ?>
					<h2 class="my-schedule-heading">My Schedule</h2>
					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<colgroup>
								<col span="1" style="width: 1%;">
								<col span="1" style="width: 10%;">
								<col span="1" style="width: 35%;">
								<col span="1" style="width: 10%;">
								<col span="1" style="width: 10%;">
								<col span="1" style="width: 10%;">
							</colgroup>
							<thead>
								<tr>
									<th>#</th>
									<th>Company Name</th>
									<th>Company Description</th>
									<th>Company Website</th>
									<th>Job Description</th>
									<th>Interview Date</th>
								</tr>
							</thead>


							<?php foreach ($my_schedule->result_array() as $row) : ?>
								<tr>
									<td><?php echo $ctr; ?></td>
									<td><a href="<?php echo site_url(); ?>/companies/company/<?php echo $row['Company_ID']; ?>"><?php echo $row['Company_Name']; ?></a></td>
									<td><?php echo substr($row['Company_Description'], 0, (strlen($row['Company_Description'])>150?150:strlen($row['Company_Description'])))."".(strlen($row['Company_Description'])>150?"&hellip;":""); ?></td>
									<td><a href="<?php echo $row['Company_Website']; ?>" target="_blank">Link</a></td>
									<td><a href="<?php echo $row['Job_Description']; ?>" target="_blank">Link</a></td>
									<td><?php echo $row['Interview_Date']; ?></td>
									<?php $ctr++; ?>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				<?php else : ?>
					<h2 class="my-schedule-heading">There doesn't seem to be anything here.<br />Keep checking back.</h2>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			&copy; <?php echo date('Y'); ?> <a class="btn btn-success" target="_blank" href="http://www.adityatalpade.com/">Aditya Talpade</a>
		</div>
	</div>
</div>