<div class="row">
<?php echo $this->session->flashdata('msg'); ?>
	<form method="post" action="<?php echo base_url("Kegiatan/tambah"); ?>" method="post">

    <!-- <h3 class="col-lg-12">Kegiatan Bidang</h3> -->
		<div class="col-lg-12">
		
			<label>ID Kegiatan</label>
            <input type="text" class="form-control" name="kegiatan_id">
            <?= form_error('kegiatan_id', '<small class="text-danger pl-3">', '</small>') ?>
		</div>

		<div class="col-lg-12">
			<br>
			<label>Nama Bidang</label>
			<br>
			<select class="form-control" name="bidang_id">
			<option value="">pilih bidang</option>
				<?php 
					$b = $this->db->get('ref_bidang')->result();
					foreach ($b as $bid) {
						echo "<option value='".$bid->bidang_id."'>".$bid->nama_bidang."</option>";
					}
				 ?>
			</select>
		</div>

		<div class="col-lg-12">
			<br>
			<label>Nama Kegiatan</label>
            <input required type="text" class="form-control" name="nama_kegiatan" value="">
           
		</div>

		<div class="col-lg-8">
			<br>
			<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
		</div>
</div>
</form>