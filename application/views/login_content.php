<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4 col-md-offset-4 well" id="login-form-container">
				<?php
				$attributes = array('class' => 'form-signin', 'id' => 'myform');

				echo form_open('login/do_login', $attributes);
				?>

					<h1 class="form-signin-heading text-center login-headings">Sign in to <?php echo $this->config->item('site_title'); ?></h1>
					<hr />
					<label class="text-center login-headings h3" for="username" id="username-label">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="" value="<?php echo set_value('username'); ?>" autofocus>
					<label class="text-center login-headings h3" for="password" id="password-label">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="">
					<label class="checkbox">
						<input type="checkbox" name="rememberme" value="rememberme"> Remember me
					</label>
					<?php if(validation_errors() != false || $this->ion_auth->errors() != false) :  ?>
					<div class="alert alert-dismissable alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo validation_errors(); ?>
						<?php echo str_replace('Incorrect Login', '<strong>Error:</strong> Invalid username or password', $this->ion_auth->errors()); ?>
					</div>
					<?php endif; ?>
					<button class="btn btn-lg btn-success btn-block" type="submit" value="Submit"><span class="glyphicon glyphicon-user"></span> Sign in</button>
					<a href="<?php echo site_url()."/login/registration"; ?>" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-saved"></span> Sign up</a>
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