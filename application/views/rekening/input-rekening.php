<form method="post" action="<?php echo base_url()."Rekening/tambah_rek" ?>">
<div class="row">
		<div class="col-lg-6">
			<?php echo $this->session->flashdata('msg'); ?>
		<br>
			<label>Kode Rekening</label>
            <input required="" type="text" class="form-control" id="rekening" name="kode_rekening">
            
		</div>

		<div class="col-lg-6">
			<br>
			<label>Nama Rekening
			</label>
            <input required="" type="text" class="form-control" id="nama_rekening" name="nama_rekening" value="">
            
		</div>

		<div class="col-lg-6">
			<br>
			
			<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
		</div>
</div>
</form>