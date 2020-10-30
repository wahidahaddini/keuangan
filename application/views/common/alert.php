<?php 
	$arr = array(
		"success" => "fa-check-circle",
	);
?>
<div class="card border-left-<?php echo $alert." text-".$alert ?> shadow">
	<div class="card-body">
		<span class="fas <?php echo $arr[$alert] ?>"></span>
		&nbsp;
		<b><?php echo ucwords($msg) ?></b>
	</div>
</div>