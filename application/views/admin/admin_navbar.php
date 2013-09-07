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
					<li><a href="<?php echo site_url(); ?>/admin">Admin Home</a></li>
					<li><a href="<?php echo site_url(); ?>/admin/students/">Students</a></li>
					<li><a href="<?php echo site_url(); ?>/admin/companies/">Companies</a></li>
					<li><a href="<?php echo site_url(); ?>/admin/interviews/">Interviews</a></li>
				<?php endif; ?>
			</ul>

			<?php if($this->ion_auth->user()->row() != false) : ?>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo site_url(); ?>/login/logout"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
			</ul>
			<?php endif; ?>
		</div><!--/.nav-collapse -->
	</div>
</div>