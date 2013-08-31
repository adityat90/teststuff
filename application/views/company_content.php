<div class="container">
	<div class="row" id="content">
		<div class="col-md-12">
			<h1 id="welcome-heading">Welcome <?php echo $this->ion_auth->user()->row()->first_name." ".$this->ion_auth->user()->row()->last_name; ?></h1>
			<?php $ctr = 1; ?>
			<!-- Select users.first_name as 'First Name', users.last_name as 'Last Name', companies.company_name as 'Company Name', companies.description as 'Company Descrption', companies.website as 'Company Website', companies.attachment as 'Job Descritpion', interviews.date as 'Interview Date' from users as u join interviews as i on (u.id=i.user) join companies as c on (c.id = i.company) where u.id=2; -->
			<?php if(isset($company_schedule) && isset($company_name)) : ?>
				<?php if($company_schedule->num_rows > 0) : ?>
					<?php if($company_name->num_rows == 1): ?>
						<?php foreach ($company_name->result_array() as $row) : ?>
							<div class="row">
								<h2 class="col-md-6 my-schedule-heading"><?php echo $row['company_name']; ?></h2>
								<h3 class="col-md-6 my-schedule-heading"><a href="<?php echo $row['website']; ?>" target="_blank">Company Website</a></h3>
							</div>
							<div class="row">
								<p class="col-md-6"><?php echo $row['description']; ?></p>
								<h3 class="col-md-6 my-schedule-heading"><a href="<?php echo $row['attachment']; ?>" target="_blank">Job Description</a></h3>
							</div>
						<?php endforeach; ?>
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<colgroup>
									<col span="1" style="width: 1%;">
									<col span="1" style="width: 10%;">
									<col span="1" style="width: 10%;">
									<col span="1" style="width: 10%;">
									<col span="1" style="width: 10%;">
									<col span="1" style="width: 10%;">
								</colgroup>
								<thead>
									<tr>
										<th>#</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Interview Date</th>
									</tr>
								</thead>


								<?php foreach ($company_schedule->result_array() as $row) : ?>
									<tr>
										<td><?php echo $ctr; ?></td>
										<td><?php echo $row['First_Name']; ?></td>
										<td><?php echo $row['Last_Name']; ?></td>
										<td><?php echo $row['Interview_Date']; ?></td>
										<?php $ctr++; ?>
									</tr>
								<?php endforeach; ?>
							</table>
						</div>
					<?php endif; ?>
				<?php else : ?>
					<h2 class="my-schedule-heading">There doesn't seem to be anything here.<br />Keep checking back.</h2>
				<?php endif; ?>
			<?php elseif(isset($company_details)) : ?>
				
				<div class="row">
					<div class="col-md-12">
						<?php if($company_details->num_rows > 0): ?>
							<h2 class="my-schedule-heading">All Companies</h2>
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<colgroup>
										<col span="1" style="width: 1%;">
										<col span="1" style="width: 15%;">
										<col span="1" style="width: 55%;">
										<col span="1" style="width: 15%;">
										<col span="1" style="width: 15%;">
									</colgroup>
									<thead>
										<tr>
											<th>#</th>
											<th>Company Name</th>
											<th>Company Description</th>
											<th>Company Website</th>
											<th>Job Description</th>
										</tr>
									</thead>
								<?php $ctr = 1; ?>
							<?php foreach($company_details->result_array() as $row): ?>
								<tr>
									<td><?php echo $ctr; ?></td>
									<td><a href="<?php echo site_url(); ?>/companies/company/<?php echo $row['id']; ?>"><?php echo $row['company_name']; ?></a></td>
									<td><?php echo substr($row['description'], 0, (strlen($row['description'])>150?150:strlen($row['description'])))."".(strlen($row['description'])>150?"&hellip;":""); ?></td>
									<td><a href="<?php echo $row['website']; ?>" target="_blank">Link</a></td>
									<td><a href="<?php echo $row['attachment']; ?>" target="_blank">Link</a></td>
									<?php $ctr++; ?>
								</tr>
							<?php endforeach; ?>
						</table>
						<?php else: ?>
							<h2 class="my-schedule-heading">There doesn't seem to be anything here.<br />Keep checking back.</h2>
						<?php endif; ?>
					</div>
				</div>
			<?php else : ?>
				<h2 class="my-schedule-heading">There doesn't seem to be anything here.<br />Keep checking back.</h2>
			<?php endif; ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			&copy; <?php echo date('Y'); ?> <a class="btn btn-success" target="_blank" href="http://www.adityatalpade.com/">Aditya Talpade</a>
		</div>
	</div>
</div>