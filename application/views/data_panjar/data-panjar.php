<div class="row">
	<?php echo $this->session->flashdata('msg'); ?>
	<form method="get" action="">
		<input type="hidden" name="act" value="cari">
		<div class="col-lg-12">
			<label>Tanggal Awal</label>
			<input type="text" class="form-control" name="tgl_awal" id="tgl_awal" value="<?php echo date("Y-m-d") ?>">
		</div>
		<br>
		<div class="col-lg-12">
			<label>Tanggal Akhir</label>
			<input type="text" class="form-control" name="tgl_akhir" id="tgl_akhir" value="<?php echo date("Y-m-d") ?>">
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

  <?php error_reporting(0); if ($_GET['act'] == 'cari'):
                                ?>
                                    <div class="col-md-12">
                                        <?php 
                                            $sql="SELECT * FROM panjar left join ref_bidang on panjar.bidang_id = ref_bidang.bidang_id left join ref_kegiatan on panjar.kegiatan_id = ref_kegiatan.kegiatan_id where (tanggal_panjar >= '$_GET[tgl_awal]' and tanggal_panjar <= '$_GET[tgl_akhir]')  and panjar.bidang_id = '$_GET[bidang_id]'"; 
                                            $query = $this->db->query($sql)->result();
                                            $no=1;
                                         ?>
                                        <table class="table table-bordered" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Panjar</th>
                                                    <th>Bidang yang mengajukan</th>
                                                    <th>Kegiatan</th>
                                                    <th>Nominal Panjar</th>
                                                    <th>Nominal yang sudah di SPJ kan</th>
                                                    <th>Sisa Panjar</th>
                                                    <th>Status</th>
                                                    <th>Lihat Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $spj = 0;
                                                foreach ($query as $q){
                                                    $w = array(
                                                        'panjar_id' => $q->panjar_id,
                                                        'status' => 'Y'
                                                    );
                                                    $get_spj = $this->db->get_where('data_pengajuan', $w)->result();
                                                    $get_sp = $this->db->get_where('data_pengajuan', array('panjar_id' => $q->panjar_id,))->result();
                                                    if (count($get_spj) > 0) {
                                                        foreach ($get_spj as $get) {
                                                            $spj = $spj + $get->nominal_bersih;
                                                        }
                                                    }else{
                                                        $spj =0;
                                                    }
                                                    $sisa = $q->nominal - $spj;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $q->tanggal_panjar ?></td>
                                                        <td><?php echo $q->nama_bidang; ?></td>
                                                        <td><?php echo $q->nama_kegiatan; ?></td>
                                                        <td>Rp. <?php echo number_format($q->nominal,2,',','.'); ?></td>
                                                        <td>Rp. <?php echo number_format($spj,2,',','.'); ?></td>
                                                        <td>Rp. <?php echo number_format($sisa,2,',','.'); ?></td>
                                                        <td>
                                                            <?php 
                                                                if ($q->status_lunas == 'Y') {
                                                                    echo "Lunas";
                                                                }else{
                                                                    echo "Belum Lunas";
                                                                }
                                                             ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if (count($get_sp) > 0) {
                                                                    if ($q->status_lunas != 'Y') {
                                                             ?>
                                                             <a target="_blank" href="<?php echo base_url('index.php/DataPanjar/lihat/'.$q->panjar_id); ?>" class="btn btn-info">Lihat</a>
                                                            <?php } } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php endif ?>