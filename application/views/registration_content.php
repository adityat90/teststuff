<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4 col-md-offset-4 well" id="login-form-container">
				<a class="btn btn-sm btn-warning" href="<?php echo site_url(); ?>"><span class="glyphicon glyphicon-chevron-left"></span> to Sign in</a>
				<?php
				$attributes = array('class' => 'form-signin', 'id' => 'myform');

				echo form_open('login/do_registration', $attributes);
				?>

					<h1 class="form-signin-heading text-center login-headings">Sign up for <?php echo $this->config->item('site_title'); ?></h1>
					<hr />
					<label class="text-center login-headings h3" for="username" id="username-label">Username</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="" value="<?php echo set_value('username'); ?>">
					
					<label class="text-center login-headings h3" for="password" id="password-label">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="">

					<label class="text-center login-headings h3" for="repeat-password" id="repeat-password-label">Password Again</label>
					<input type="password" class="form-control" name="repeat-password" id="repeat-password" placeholder="">
					
					<label class="text-center login-headings h3" for="first-name" id="first-name-label">First Name</label>
					<input type="text" class="form-control" name="first-name" id="first-name" placeholder="" value="<?php echo set_value('first-name'); ?>">

					<label class="text-center login-headings h3" for="last-name" id="last-name-label">Last Name</label>
					<input type="text" class="form-control" name="last-name" id="last-name" placeholder="" value="<?php echo set_value('last-name'); ?>">

					<label class="text-center login-headings h3" for="email" id="email-label">Email</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="" value="<?php echo set_value('email'); ?>">


					<label class="text-center login-headings h3" for="roll-no" id="roll-no-label">Roll No.</label>
					<input type="text" class="form-control" name="roll-no" id="roll-no" placeholder="" value="<?php echo set_value('roll-no'); ?>">
					
					<?php if(validation_errors() != false || $this->ion_auth->errors() != false) :  ?>
					<div class="alert alert-dismissable alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo validation_errors(); ?>
						<?php echo str_replace('Incorrect Login', '<strong>Error:</strong> Invalid username or password', $this->ion_auth->errors()); ?>
					</div>
					<?php endif; ?>
					<button class="btn btn-lg btn-success btn-block" id="sign-up-button" type="submit" value="Submit"><span class="glyphicon glyphicon-saved"></span> Sign up</button>
				</form>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			&copy; <?php echo date('Y'); ?> <a class="btn btn-success" target="_blank" href="http://www.adityatalpade.com/">Aditya Talpade</a>
		</div>
	</div>
</div>