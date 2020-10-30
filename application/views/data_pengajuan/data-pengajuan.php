<div class="row">
	<?php echo $this->session->flashdata('success'); ?>
	<form action="" method="get">
    <input type="hidden" name="data" value="cari">
		<div class="col-lg-12">
			<label>Tanggal Awal</label>
			<input type="text" class="form-control" id="tgl_awal" name="tgl_awal" value="<?= date("Y-m-d")?>">
		</div>
		<br>
		<div class="col-lg-12">
			<label>Tanggal Akhir</label>
			<input type="text" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?= date("Y-m-d")?>">
		</div>
		<br>

		<div class="col-lg-12">
			<label for="" class="control-label">Status Pengajuan</label>
			<select name="status" class="form-control show-tick" id="">
				<option value="S">Semua</option>
				<option value="M">Menunggu Perstujuan</option>
				<option value="Y">Disetujui</option>
				<option value="N">Ditolak</option>
        	</select>
    	</div>
		<br>

		<div class="col-lg-12">
			<?php if ($this->session->userdata('bidang_id') != 1){
				$bidang = $this->db->get('ref_bidang', array('bidang_id' => $this->session->userdata('bidang_id')))->result();
			 ?>
				<label>Bidang yang mengajukan</label>
				<input type="hidden" class="form-control" name="bidang_id" value="<?= $this->session->userdata('bidang_id');?>">
				<div class="form-line">
					<input type="text" class="form-control" value="<?php echo $bidang[0]->nama_bidang; ?>">
				</div>
			<?php }else{ ?>
				<label>Bidang yang mengajukan</label>
				<select name="bidang_id" class="form-control show-tick">
					<?php foreach ($bidang as $b): ?>
						<option value="<?php echo $b->bidang_id ?>"><?php echo $b->nama_bidang; ?></option>
					<?php endforeach ?>
				</select>
		<?php } ?>
	</div>
		<div class="col-lg-12">
			<br>
			<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Cari</button>
		</div> 
  </form>
</div>
		<br>


  <!-- setelah klik cari -->

  <?php 
  	error_reporting(0);//gak ada error
  	if($_GET['data'] == 'cari'):
  ?>
  		<div class="col-lg-12">
  			<?php 
  			if($_GET['data2'] == 'verify') {
  				$objek = array('status' => $this->input->get('status'));
  				$where = array('pengajuan_id' => $this->input->get('id'));
  			$this->db->update('data_pengajuan', $objek, $where);
  			}
  		?>
  		<?php 
  		if ($_GET[status] == 'S') {
  		 	$sql="SELECT * FROM data_pengajuan 
  		 			left join ref_bidang on data_pengajuan.bidang_id = ref_bidang.bidang_id 
  		 			left join kode_rekening on data_pengajuan.kode_rekening = kode_rekening.kode_rekening 
  		 			left join gu_panjar on data_pengajuan.gu_panjar = gu_panjar.gu_panjar_id 
  		 			left join ref_kegiatan on data_pengajuan.kegiatan_id = ref_kegiatan.kegiatan_id 
  		 			where (tanggal >= '$_GET[tgl_awal]' and tanggal <= '$_GET[tgl_akhir]') and data_pengajuan.bidang_id = '$_GET[bidang_id]'"; 
        }else{
        $sql="SELECT * FROM data_pengajuan 
        		left join ref_bidang on data_pengajuan.bidang_id = ref_bidang.bidang_id 
        		left join kode_rekening on data_pengajuan.kode_rekening = kode_rekening.kode_rekening 
        		left join gu_panjar on data_pengajuan.gu_panjar = gu_panjar.gu_panjar_id 
        		left join ref_kegiatan on data_pengajuan.kegiatan_id = ref_kegiatan.kegiatan_id 
        		where (tanggal >= '$_GET[tgl_awal]' and tanggal <= '$_GET[tgl_akhir]') and status = '$_GET[status]' and data_pengajuan.bidang_id = '$_GET[bidang_id]'"; 
        } 
        $query = $this->db->query($sql)->result();
  		 	$no = 1;
  		  ?>
  		  <table class="table table-bordered table-hover table-responsive" id="datatable">
  		  	<thead>
  		  		<tr>
  		  			<th>No</th>
  		  			<th>Tanggal Pengajuan</th>
  		  			<th>Bidang yang mengajukan</th>
  		  			<th>Kegiatan</th>
  		  			<th>GU / Panjar</th>
  		  			<th>Kode Rekening Belanja</th>
  		  			<th>Nama Rekening Belanja</th>
  		  			<th>Uraian</th>
  		  			<th>Nominal Kotor</th>
  		  			<th>Pajak</th>
  		  			<th>Nominal Bersih</th>
  		  			<th>Status</th>
  		  			<th>Aksi</th>
  		  		</tr>
  		  	</thead>
  		  	<tbody>
  		  		<?php foreach ($query as $q): ?> 
  		  			<tr>
  		  				<td><?= $no++; ?></td>
  		  				<td><?= $q->tanggal; ?></td>
  		  				<td><?= $q->nama_bidang; ?></td>
  		  				<td><?= $q->nama_kegiatan; ?></td>
  		  				<td><?= $q->gu_panjar_nama; ?></td>
  		  				<td><?= $q->kode_rekening; ?></td>
  		  				<td><?= $q->nama_rekening; ?></td>
  		  				<td><?= $q->uraian; ?></td>
  		  				<td>Rp. <?php echo number_format($q->nominal_kotor,2,',','.'); ?></td>
                        <td>Rp. <?php echo number_format($q->pajak,2,',','.'); ?></td>
                      	<td>Rp. <?php echo number_format($q->nominal_bersih,2,',','.'); ?></td>
                        <td>
                        	<?php 
                            	if ($q->status == 'M') {
                            		echo "Menunggu Persetujuan";
                            	}elseif ($q->status == 'Y') {
                            		echo "Disetujui";
                            	}else{
                            		echo "Ditolak";
                            	}
                            ?>
                        </td>
                        <td>
                            <?php if ($this->session->userdata('bidang_id')): ?>
	                            <?php if ($q->status == 'M') { ?>
	                            	<a href="?data=cari&tgl_awal=
		                            	<?php echo $_GET[tgl_awal]; ?>&tgl_akhir=
		                            	<?php echo $_GET[tgl_akhir]; ?>&status=
		                            	<?php echo $_GET[status]; ?>&bidang_id=
		                            	<?php echo $_GET[bidang_id]; ?>&data2=verify&status=N&id=
		                            	<?php echo $q->pengajuan_id; ?>"
	                            	onclick="return confirm('Apa anda akan menolak pengajuan ini ?')"
	                            	class="btn btn-danger">Tolak
	                            	</a>

	                                <a href="?data=cari&tgl_awal=
	                                	<?php echo $_GET[tgl_awal]; ?>&tgl_akhir=
	                                	<?php echo $_GET[tgl_akhir]; ?>&status=
	                                	<?php echo $_GET[status]; ?>&bidang_id=
	                                	<?php echo $_GET[bidang_id]; ?>&data2=verify&status=Y&id=
	                                	<?php echo $q->pengajuan_id; ?>"
	                                onclick="return confirm('Apa anda akan menyetujui pengajuan ini ?')"
	                                class="btn btn-success">Setujui
	                            	</a> 

	                            <?php   }elseif ($q->status == 'Y') { ?>
	                                <a href="?data=cari&tgl_awal=
	                                	<?php echo $_GET[tgl_awal]; ?>&tgl_akhir=
	                                	<?php echo $_GET[tgl_akhir]; ?>&status=
	                                	<?php echo $_GET[status]; ?>&bidang_id=
	                                	<?php echo $_GET[bidang_id]; ?>&data2=verify&status=N&id=
	                                	<?php echo $q->pengajuan_id; ?>"
	                                	onclick="return confirm('Apa anda akan menolak pengajuan ini ?')"
	                                	class="btn btn-danger">Tolak
	                                </a>
	                            <?php   }else{ ?>
	                                <a href="?data=cari&tgl_awal=
	                                <?php echo $_GET[tgl_awal]; ?>&tgl_akhir=
	                                <?php echo $_GET[tgl_akhir]; ?>&status=
	                                <?php echo $_GET[status]; ?>&bidang_id=
	                                <?php echo $_GET[bidang_id]; ?>&data2=verify&status=Y&id=
	                                <?php echo $q->pengajuan_id; ?>"
	                                onclick="return confirm('Apa anda akan menyetujui pengajuan ini ?')"
	                                class="btn btn-success">Setujui
	                            	</a> 
	                            <?php } ?>                             
                            	<?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
  		<?php endif ?>