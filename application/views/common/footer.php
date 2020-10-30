        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PT ARR 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url()."assets/" ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()."assets/" ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url()."assets/" ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url()."assets/" ?>js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url()."assets/" ?>js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url()."assets/" ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url()."assets/" ?>js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url()."assets/" ?>js/demo/chart-pie-demo.js"></script>
  <script src="<?php echo base_url()."assets/" ?>js/demo/chart-bar-demo.js"></script>
  <script src="<?php echo base_url()."assets/" ?>js/demo/datatables-demo.js"></script>
  <script src="<?php echo base_url()."assets/" ?>vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url()."assets/" ?>vendor/MDTimePicker-master/mdtimepicker.js"></script>
  <script src="<?php echo base_url()."assets/" ?>custom/js/custom.js"></script>

  

  <script>
      $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
      $("#bidang").change(function(){ // Ketika user mengganti atau memilih data id bidang
        var bidang_id = $("#bidang").val(); // buat variable dari data yang akan di pilih
        $.ajax({
        type: 'POST', // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url('index.php/Panjar/getkegiatan') ?>", // Isi dengan url/path file php yang dituju untuk menampilkan data
        data: {bidang_id : bidang_id}, // data yang akan dikirim ke file yang dituju
        cache : false,
        success: function(msg){ // Ketika proses pengiriman berhasil
          $("#kegiatan").html(msg);
        },
      });
    });
  });
  </script>

   
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
        $(document).ready( function () { 
            $('#datatable').DataTable();
        } );
    </script>
    
    <script type="text/javascript"> //autocomplete data
        $(document).ready(function(){
            $( "#title" ).autocomplete({
              source: "<?php echo site_url('Pengajuan/rekening?');?>"
            });
            $('#gu_panjar').change(function(){
                if($('#gu_panjar').val() == '2') {
                    $('#panjar').show(); 
                }else{
                    $('#panjar').hide(); 
                } 
            });
        });
    </script>

    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
   <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" /> -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
              scrollY: "300px",
              scrollX: true,
              scorollCollapse: true
            });
        } );
    </script>

    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>
    <!-- Javascript -->
      <script>
         $(function() {
            $( "#tgl_awal" ).datepicker({
                dateFormat: 'yy-mm-dd'
            });
            $( "#tgl_akhir" ).datepicker({
                dateFormat: 'yy-mm-dd'
            });
         });
      </script>
      
      <script>
        $(document).ready( function () {
            $("#bidang").change(function(){
               var bidang_id = $("#bidang").val(); 
               $.ajax({
                type: 'POST',
                url: "<?php echo base_url('index.php/DataPanjar/getkegiatan') ?>",
                data: {bidang_id: bidang_id},
                cache: false,
                success: function(msg){
                  $("#kegiatan").html(msg);
                }
               });                    
             });
        } );
    </script>

    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>