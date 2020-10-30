<form method="post" action="<?php echo base_url()."RefBidang/tambah" ?>">
<div class="row">
    <?php echo $this->session->flashdata('msg'); ?>
		<div class="col-lg-6">
		<br>
			<label>ID Bidang</label>
            <input required="" type="text" class="form-control" name="bidang_id">
            
		</div>

		<div class="col-lg-6">
			<br>
			<label>Nama Bidang</label>
            <input required="" type="text" class="form-control" name="nama_bidang" value="">
            
		</div>

		<div class="col-lg-6">
			<br>
			<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
		</div>
</div>
</form>