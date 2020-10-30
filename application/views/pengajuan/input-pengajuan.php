<div class="row">
	<?php echo $this->session->flashdata('success'); ?>
	<form method="post" action="<?php echo base_url("Pengajuan/tambah"); ?>" method="post">

		<div class="col-lg-12">
			<label>Bidang</label>
			<input type="hidden" class="form-control" name="bidang_id" value="<?= $this->session->userdata('bidang_id');?>" readonly>
			<?php 
            	$bidang = $this->db->get_where('ref_bidang', array('bidang_id' => $this->session->userdata('bidang_id')))->result();
            ?>
				<div class="form-line">
				<input type="text" class="form-control" readonly value="<?php echo $bidang[0]->nama_bidang; ?>">
				</div>
		</div>
		<br>

		<div class="col-lg-12">
			<label for="" class="control-label">Kegiatan</label>
			<select name="kegiatan_id" class="form-control show-tick" id="">
			<?php foreach ($kegiatan as $k): ?>
				<option value="<?php echo $k->kegiatan_id ?>">
				<?php echo $k->nama_kegiatan; ?></option>
            <?php endforeach ?>
        	</select>
    	</div>
		<br>
		<div class="col-lg-12">
        <label for="" class="control-label">Kode Rekening / Nama Rekening</label>
       		<div class="form-line">
        		<input required="" type="text" id="title" class="form-control" name="kode_rekening">
    		</div>
		</div>
		<br>
        <div class="col-lg-12">
		<label for="" class="control-label">GU / PANJAR</label>
		<select id="gu_panjar" name="gu_panjar" class="form-control show-tick" id="">
    	    <?php foreach ($gu as $g): ?>
			<option value="<?php echo $g->gu_panjar_id ?>"><?php echo $g->gu_panjar_nama; ?></option>
			<?php endforeach ?>
        </select>
		</div>
		<br>
         <div id="panjar" class="col-lg-12" style="display: none;">
         <label for="" class="control-label">Pilih Kode Panjar</label>
            <select name="panjar_id" class="form-control show-tick" id="">
            <option value="0">Pilih Kode Panjar</option>
            	<?php foreach ($panjar as $p): ?>
				<option value="<?php echo $p->panjar_id ?>">
				<?php echo $p->panjar_id; ?></option>
				<?php endforeach ?>
	        </select>
			</div>
				  
			<div class="col-lg-12">
			<label for="" class="control-label">Uraian</label>
			<div class="form-line">
			<textarea required name="uraian" id="" cols="30" rows="4" class="form-control"></textarea>
		</div>
		</div>
		<br>
		<div class="col-lg-12">
		  <label for="" class="control-label">Nominal Kotor (Rp)</label>
		  <div class="form-line">
			<input required type="text" class="form-control" name="nominal_kotor">
			</div>
				</div>
				<br>
				<div class="col-lg-12">
					<label for="" class="control-label">Nominal Pajak (Rp)</label>
                    <div class="form-line">
                    <input required type="text" class="form-control" name="pajak">
				</div>
			</div>
			<br>
			<div class="col-lg-12">
			<label for="" class="control-label">Nominal Bersih (Rp)</label>
			<div class="form-line">
			<input required type="text" class="form-control" name="nominal_bersih">
		</div>
	</div>

		<div class="col-lg-8">
			<br>
			<br>
			<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
  </div>