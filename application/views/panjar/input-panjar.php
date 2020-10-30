<div class="row">
	<?php echo $this->session->flashdata('msg'); ?>
	<form method="post" action="<?php echo base_url("Panjar/tambah"); ?>" method="post">
		<div class="col-lg-12">
			<label>Bidang Yang Mengajukan</label>
			<select required class="form-control" id="bidang" name="bidang_id">
			<option value="">Pilih Bidang</option>
				<?php foreach ($bidang as $b): ?>
                <option value="<?php echo $b->bidang_id ?>"><?php echo $b->nama_bidang; ?></option>
                <?php endforeach ?>
                </select>
		</div>

		<div class="col-lg-12">
			<br>
			<label>Kegiatan</label>
			<select required class="form-control" id="kegiatan" name="kegiatan_id">
			<option value="">Pilih Kegiatan</option>
			</select>
		</div>
		<div class="col-lg-12">
		<br>
			<label>Nominal</label>
			<input required type="text" class="form-control" id="nominal" name="nominal">
		</div>

		<div class="col-lg-8">
			<br>
			<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
  </div>