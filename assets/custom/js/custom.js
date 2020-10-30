$(document).ready(function () {
	$('.time-24').mdtimepicker({format: 'hh:mm'}) //Initializes the time picker	
	
	var base_url = "http://localhost/projek-kelompok/msc/"
	
	$(".datepicker").datepicker({
		format : "yyyy-mm-dd",
	}).datepicker("setDate", new Date());
	
	$(".getId").click(function(e){
		e.preventDefault()
		var thisModal = $(this).data("modal");
		var target = $(this).data("target")
		var thisVal = $(this).data("value")
		$(target+" option").remove()
		$(target).append("<option>"+thisVal+"</option>")
		$(thisModal).modal("hide")
	});

	var x = 1;
    $(".addField").click(function(e){
		e.preventDefault();
        if(x < 5){
			$(".place").append("<div class='row' id='place"+x+"'><div class='col-lg-6'><br><input type='file' name='lampiran"+x+"' class='form-control'></div><div class='col-lg-5'><br><input type='text' name='caption[]' class='form-control'></div><div class='col-lg-1'><br><a href='' class='btn btn-danger btn-sm remove' data-id='#place"+x+"'>Hapus</a></div></div>")
			x++;
			$(".remove").click(function(e){
				e.preventDefault()
				var id = $(this).data("id")
				$(id).remove()
				x--
			})
		}
	});

	    var m = 1;
        $(".addMapel").click(function(e){
			e.preventDefault();
			var key = $(this).data("key")
			$.ajax({
				url : "http://localhost/projek-kelompok/msc/nilai_siswa/show_mapel"
			})
       });	

	if($("#chadir").length==1){
		var hadir = parseInt($("#chadir").html());
		var tidakHadir = 0;
	}

	$(".tidak-hadir a").click(function(e){
		e.preventDefault()
		var key = $(this).data("key")
		var capt = $(this).data("capt")
		var bg = $(this).data("class")
		var btnBg = $("#tidak-hadir"+key).attr("data-bg")
		if($("#badge"+key+" h5 b").length==0){
			$("#badge"+key).html("<h5><b></b></h5>")
		}
		$("#badge"+key+" h5 b").attr("class","")
		$("#badge"+key+" h5 b").addClass("badge bg-"+bg+" text-white")
		$("#badge"+key+" h5 b").html(capt)
		$("#hadir"+key).removeClass("btn-success")
		$("#hadir"+key).addClass("btn-default")
		$("#check"+key).empty()
		$("#tidak-hadir"+key).removeClass(btnBg)
		$("#tidak-hadir"+key).addClass("btn-"+bg)
		$("#tidak-hadir"+key).attr("data-bg","btn-"+bg)
		$("#absen"+key).val(capt)
		hadir--
		tidakHadir++
		$("#chadir").html(hadir)
		$("#ctidak-hadir").html(tidakHadir)
	})
	
	$(".hadir").click(function(e){
		e.preventDefault()
		var key = $(this).data("key")
		var removeBg = $("#tidak-hadir"+key).attr("data-bg")
		$(this).removeClass("btn-default")
		$(this).addClass("btn-success")
		$("#tidak-hadir"+key).removeClass(removeBg)
		$("#tidak-hadir"+key).addClass("btn-default")
		$("#tidak-hadir"+key).attr("data-bg","btn-default")
		$("#badge"+key).empty()
		$("#check"+key).empty()
		$("#check"+key).html("<i class='fas fa-check-circle text-success'></i>")
		$("#absen"+key).val("Hadir")
		hadir++
		tidakHadir--
		$("#chadir").html(hadir)
		$("#ctidak-hadir").html(tidakHadir)
	})
	
	$('#id_kepala').change(function () {
		$('#basic-addon1').html($('#id_kepala').val());
	});
	
	$('#kode_induk').change(function () {
		$('#basic-addon2').html($('#kode_induk').val());
	});

	if ($('#id_kepala').val() != '') {
		$('#basic-addon1').html($('#id_kepala').val());
	}

	if ($('#kode_induk').val() != '') {
		$('#basic-addon2').html($('#kode_induk').val());
	}

	$('#id_kategorisp').change(function () {
		$('#basic-addon3').html('SP-' + $('#id_kategorisp option:selected').html() + '-');
	});

	if ($('#id_kategorisp').val() != '') {
		$('#basic-addon3').html('SP-' + $('#id_kategorisp option:selected').html() + '-');
	}

	$('.coba').click(function(e) {
		e.preventDefault();
		$.ajax({
			url:'load_functions',
			dataType:"JSON",
			success:function(params) {
				console.log(params);
				for (let index = 0; index < params.mapel.length; index++) {
					// const element = array[index];
						$('.hai').append(params.mapel[index]['mata_pelajaran']+`<br>`)
						
					}
				}
			})
	})
	
	function cicilan_ke(){
		var kode_siswa = $("#kode_siswa").val()
		var tahun = $("#tahun").val()
		$.ajax({
			url		: base_url+'keuangan/cicilan/cek_cicilan_ke',
			type	: "post",
			data	: {
				"kode_siswa" : kode_siswa,
				"tahun" : tahun
			},
			success	: function(respone){
				$("#cicilan_ke").val(respone.cicilan_ke)
				$("#kekurangan").val(respone.kekurangan)
			}
		})

	}

	$("#kode_siswa").change(function(){
		cicilan_ke()
	})
	$("#tahun").change(function(){
		cicilan_ke()
	})
	
	// $("#nominal").keyup(function(){
	// 	var kode_siswa = $("#kode_siswa").val()
	// 	var  = $("#tahun").val()
	// 	var nominal = $("#nominal").val()
	// 	$.ajax({
	// 		url		: base_url+'keuangan/cicilan/nyicil',
	// 		type	: "post",
	// 		data	: {
	// 					"nominal" : nominal
	// 				  },
	// 		success	: function(respone){

	// 		}
	// 	})
	// })

	function spp_bayar() {
		var jumlah_bulan = $("#jumlah_bulan").val()
		$.ajax({
			url		: base_url+"keuangan/spp/spp_bayar",
			type	: "post",
			data	: { "jumlah_bulan" : jumlah_bulan },
			success	: function(respone) {
				$("#total").val(respone)	
			}
		})
	}

	$("#jumlah_bulan").change(function(){
		spp_bayar()
	})

	// var rupiah = document.getElementById('biaya_spp');
	// rupiah.addEventListener('keyup', function(e){
	// 	// tambahkan 'Rp.' pada saat form di ketik
	// 	// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
	// 	rupiah.value = formatRupiah(this.value);
	// });

	// function formatRupiah(angka, prefix){
	// 	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	// 	split   		= number_string.split(','),
	// 	sisa     		= split[0].length % 3,
	// 	rupiah     		= split[0].substr(0, sisa),
	// 	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

	// 	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	// 	if(ribuan){
	// 		separator = sisa ? '.' : '';
	// 		rupiah += separator + ribuan.join('.');
	// 	}

	// 	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	// 	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	// }

	$("#group_spp").change(function(){
		var kode_group = $("#group_spp").val();
		// return alert(kode_group)
		$.ajax({
			url		: base_url+"keuangan/spp/ambil_siswa",
			type	: "post",
			data	: { "kode_group" : kode_group},
			success	: function(response){
				$("#siswa_spp option").remove();
				$("#siswa_spp").append(response)
			}
		})
	})
	

});
