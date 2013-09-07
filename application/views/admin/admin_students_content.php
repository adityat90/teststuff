<div class="container">
	<div class="row" id="content">
		<div class="col-md-12">
			<h2 class="top-stats-headings">All Students</h2>
			<?php if($student_details != false): ?>
				<pre><?php print_r($student_details->result_array()); ?></pre>
			<?php endif;?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			&copy; <?php echo date('Y'); ?> <a class="btn btn-success" target="_blank" href="http://www.adityatalpade.com/">Aditya Talpade</a>
		</div>
	</div>
</div>