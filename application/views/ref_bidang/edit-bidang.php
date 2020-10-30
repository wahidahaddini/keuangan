<?php foreach ($ref_bidang as $rb) {

} ?>
<form id="form" action="<?php echo base_url('index.php/RefBidang/update/').$rb->bidang_id?>" method="post">

	<div class="row">
		<?= $this->session->flashdata('msg'); ?>
		<div class="col-lg-6">
			
			<br>
			<label>ID Bidang</label>
			<input required type="text" name="id_bidang" class="form-control" value="<?php echo $rb->bidang_id?>" readonly>
		</div>
		<div class="col-lg-6">
				<br>
				<label>Nama Bidang</label>
				<input required type="text" class="form-control" name="nama_bidang" value="<?php echo $rb->nama_bidang; ?>">
			</div>

			<div class="col-lg-6">
			<br>
			<br>
			<?php $this->load->view("common/btn") ?>
		</script>
		</div>
	</div>
</form>