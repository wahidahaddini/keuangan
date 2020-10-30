<div class="row">
<div class="col-lg-6">
		</div>
	</div>
</form>

<br>
<div class="row">
	<div class="col-lg-12">
		<?php echo $this->session->flashdata('msg'); ?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>User Name</th>
						<th>Bidang</th>
						<th>Aktif</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
						foreach ($users as $u): ?>
					<?php 
						$bidang = $this->db->get_where('ref_bidang',array('bidang_id' => $u->bidang_id))->result();
					 ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $u->username; ?></td>
							<td><?php echo $bidang[0]->nama_bidang; ?></td>
							<td><?php echo $u->aktif; ?></td>
							<td>
								<a href="<?php echo base_url('user/edit/'.$u->user_id);?>"class="btn btn-primary btn-sm">
									<i class="fas fa-edit"></i> Edit</a><br>
								<a href="<?php echo base_url('index.php/User/hapus/'.$u->user_id); ?>" onclick="return confirm('Apa anda yakin ingin menghapus data ini ?')" class="btn btn-danger">HAPUS</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
						
			</table>
		</div>
	</div>
</div>
