<div class="row">
            <div class="body">
            <?php echo $this->session->flashdata('success'); ?>
                <div class="col-lg-12">
                <br>
                <h3>Kode Panjar Anda</h3>
                <br>    
                <b style="font-size: 30px"><?php echo $kode; ?></b>
                <br><br>
                <a href="<?php echo base_url('index.php/Panjar/index'); ?>" class="btn btn-primary">Kembali</a>
		        </div>
            </div>
</div>