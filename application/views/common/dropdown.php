<div class="dropdown no-arrow">
	<button class="btn btn-info btn-sm btn-block dropdown-toggle" type="button" id="<?php echo $id ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    		Opsi <span class="fas fa-caret-down"></span>
    </button>
    <div class="dropdown-menu" aria-labelledby="<?php echo $id ?>">
    	<?php 
    		foreach ($href as $capt => $url) {
    	?>
		   	<a class="dropdown-item" href="<?php echo $url ?>"><?php echo $capt; ?></a>
    	<?php
    		}
    	?>
    </div>
</div>
