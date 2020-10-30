<div class="row">

<div class="col-lg-6">
		</div>
	</div>
</form>

<br>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Id Bidang</th>
						<th>Nama Bidang</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php $no = 1;
						foreach ($bidang as $rb): ?>

						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $rb->bidang_id; ?></td>
							<td><?php echo $rb->nama_bidang; ?></td>
							<td>
								<a href="<?php echo base_url().'refbidang/edit/'.$rb->bidang_id;?>"class="btn btn-primary btn-sm">
									<i class="fas fa-edit"></i> Edit</a><br>

								<a href="<?php echo base_url('index.php/RefBidang/hapus/'.$rb->bidang_id); ?>" onclick="return confirm('Apa anda yakin ingin menghapus data ini ?')" class="btn btn-danger">HAPUS</a>
						</tr>
					<?php endforeach ?>
				</tbody>
						
			</table>
		</div>
	</div>
</div>
