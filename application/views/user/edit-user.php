<?php foreach ($users as $u) {

} ?>
<form id="form" action="<?php echo base_url('index.php/User/update/').$u->user_id ?>" method="post">

	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('msg'); ?>
			<br>
			<label>Bidang</label>
			<input type="text" name="id_bidang" class="form-control" value="<?php echo $u->bidang_id?>" readonly>
		</div>
		<div class="col-lg-6">
				<br>
				<label>username</label>
				<input required=""> type="text" class="form-control" name="username" value="<?php echo $u->username; ?>">
			</div>

			<!-- <div class="col-lg-6">
				<br>
					<label for="new_password1">Password Lama</label>
					<input type="password" class="form-control" id="password" name="password" value="">
					
				</div> -->

				<div class="col-lg-6">
				<br>
					<label for="new_password1">Password Baru</label>
					<input type="password" class="form-control" id="password1" name="password1" value="">
					
				</div>

				<div class="col-lg-6">
					<br>
					<label for="new_password2">Konfirmasi Password</label>
					<input type="password" class="form-control" id="password2" name="password2" value="">
					
				</div>

			<div class="col-lg-6">
			<br>
			<br>
			<button type="reset" class="btn btn-primary btn-danger"><i class="fas fa-reset">
			</i> Reset</button>
			<button type="button" onclick="proses()" class="btn btn-primary btn-sm">
			<i class="fas fa-save" ></i>Simpan</button>
		</script>
		</div>
	</div>
</form>
<script type="text/javascript">
	function proses() {
	 var pass = $("#password1").val();
	 var pass2 = $("#password2").val();
	 if (pass == '') {
	 	$("#form").submit();
	 }else{
	 	if (pass == pass2) {
		 	 $("#form").submit();
			 }else{
			 	$("#password2").css("background-color","red");
			 }
	 	}
	 
	}
</script>