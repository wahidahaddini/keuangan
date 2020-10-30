    <?php 
      $start = isset($_GET['per_page']) ? $_GET['per_page'] + 1 : 1;
      $end = $start + ($limit - 1); 
    ?>
    <b>Data ke <?php echo $count[0]['ttl']==0 ? 0 : $start; 
    echo " - ".$no." dari total ". $count[0]['ttl'] ?> data</b>