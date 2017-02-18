<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
<section class="content-header">
  <h1>KPI <small>Badan Kepegawaian dan Diklat</small></h1> 
</section>
<section class="content">
  <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">HASIL PEMBOBOTAN INDIKATOR KATEGORI PENSIUN</h3>
        </div>
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
            <th>Antar Indikator</th>
            <th>Rasio laporan persiapan kebutuhan administrasi dan teknis pemulangan pegawai pensiun</th>
            <th>Rasio pengusulan pegawai pensiun</th>
          </thead>
          <tr>
            <td>Rasio laporan persiapan kebutuhan administrasi dan teknis pemulangan pegawai pensiun</td>
            <?php
            foreach ($ik15->result_array() as $ik15_item) {
              # code...
            ?>
            <td><?php echo $ik15_item['nilai_analisa_indikator']; ?></td>
            <?php
            }
            ?>
          </tr>
          <tr>
            <td>Rasio pengusulan pegawai pensiun</td>
            <?php
            foreach ($ik16->result_array() as $ik16_item) {
              # code...
            ?>
            <td><?php echo $ik16_item['nilai_analisa_indikator']; ?></td>
            <?php
            }
            ?>
          </tr>
          <tr>
            <td><b>Jumlah</b></td>
            <?php
            foreach ($jumlah->result_array() as $jumlah_item) {
              # code...
            ?>
            <td><b><?php echo $jumlah_item['jumlah_hasil_analisa_indikator']; ?></b></td>
            <?php
            }
            ?>
          </tr>
        </table>
      </div>
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
            <th>Perbandingan Indikator</th>
            <th>Rasio laporan persiapan kebutuhan administrasi dan teknis pemulangan pegawai pensiun</th>
            <th>Rasio pengusulan pegawai pensiun</th>
            <th>Nilai Eigenvector (EV)</th>
          </thead>
          <tr>
            <td>Rasio laporan persiapan kebutuhan administrasi dan teknis pemulangan pegawai pensiun</td>
            <?php
            foreach ($hasil_ik15->result_array() as $hasil_ik15_item) {
              # code...
            ?>
            <td><?php echo $hasil_ik15_item['hasil_analisa_indikator']; ?></td>
            <?php
            }
            ?>
            <td><b><?php foreach($avg_ik15->result_array() as $avg_ik15_item){echo number_format($avg_ik15_item['rata'],3,'.','');} ?></b></td>
          </tr>
          <tr>
            <td>Rasio pengusulan pegawai pensiun</td>
            <?php
            foreach ($hasil_ik16->result_array() as $hasil_ik16_item) {
              # code...
            ?>
            <td><?php echo $hasil_ik16_item['hasil_analisa_indikator']; ?></td>
            <?php
            }
            ?>
            <td><b><?php foreach($avg_ik16->result_array() as $avg_ik16_item){echo number_format($avg_ik16_item['rata'],3,'.','');} ?></b></td>
          </tr>
        </table>
      </div> 
  </div>
</section>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });

  function konfirmasi(){
    var pilihan=confirm("Apakah Anda yakin ingin menghapus?");
    if (pilihan) {
      return true;
    }
    else{
      return false;
    }
  }
</script>