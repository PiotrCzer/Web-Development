<div class="usercount">
	<h4>Users</h4>
	<div class="inner">
		<?php
		$user_count = user_count();
		$suffix = ($user_count != 1) ? 's' : '';
		?>
		We currently have <b><?php echo user_count(); ?></b> registered user<?php echo $suffix; ?>.
	</div>
</div>