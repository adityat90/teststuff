<div class="navbar navbar-inverse navbar-fixed-top navbar-admin">
	<div class="container">
		<div class="navbar-header">
			<?php if($this->ion_auth->user()->row() != false) : ?>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="glyphicon glyphicon-th" id="collapsed-menu-button"></span>
				</button>
			<?php endif; ?>
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $this->config->item('site_title'); ?></a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php if($this->ion_auth->user()->row() != false) : ?>
					<li><a href="<?php echo site_url(); ?>/companies/">Companies</a></li>
					<?php if($this->ion_auth->in_group('admin')) : ?>
							<li><button class="btn btn-success navbar-btn" onclick="location.href='<?php echo site_url()."/admin/"; ?>';">Admin Dashboard</button></li>
					<?php endif; ?>
				<?php endif; ?>
			</ul>

			<?php if($this->ion_auth->user()->row() != false) : ?>

			<?php
			$attributes = array('class' => 'navbar-form navbar-left');

			echo form_open('companies/search/', $attributes);
			?>
				<div class="form-group">
					<input type="text" class="form-control" name="company_name" id="company_name" placeholder="Search by company">
				</div>
			</form>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo site_url(); ?>/login/logout"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
			</ul>
			<?php endif; ?>
		</div><!--/.nav-collapse -->
	</div>
</div>