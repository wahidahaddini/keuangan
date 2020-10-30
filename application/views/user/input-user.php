<div class="row">
	<?php echo $this->session->flashdata('msg'); ?>
	<form method="post" action="<?php echo base_url("user/tambah"); ?>" method="post">
		<div class="col-lg-12">
			<label>Nama Bidang</label>
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
			<label>username</label>
			<input required="" type="text" class="form-control" name="username" value="" ?>
		</div>
		<div class="col-lg-12">
		<br>
			<label>Password</label>
			<input required="" type="text" class="form-control" name="password" value="">
		</div>

		<div class="col-lg-12">
			<br>
			<label>Aktif</label>
			<select class="form-control" name="aktif">
				<option value="Yes">Y</option>
				<option value="No">N</option>
			</select>
		</div>

		<div class="col-lg-8">
			<br>
			
			<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
</div>
