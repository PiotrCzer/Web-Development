<div id="usercount">
	<div class="inner">
		<?php
		$user_count = user_count();
		$suffix = ($user_count != 1) ? 's' : '';
		?>
		<b><?php echo user_count(); ?></b> Registered TrendMasher<?php echo $suffix; ?>.
	</div>
</div>