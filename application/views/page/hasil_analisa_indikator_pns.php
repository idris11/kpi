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
          <h3 class="box-title">HASIL PEMBOBOTAN INDIKATOR KATEGORI PNS</h3>
        </div>
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
            <th>Antar Indikator</th>
            <th>Rasio tersusunnya naskah formasi PNS</th>
            <th>Rasio laporan penerbitan surat pemberitahuan kenaikan gaji berkala</th>
            <th>Rasio PNS yang dimutasi ke dalam dan ke luar Pemerintahan Kab. Ogan Ilir</th>
          </thead>
          <tr>
            <td>Rasio tersusunnya naskah formasi PNS</td>
            <?php
            foreach ($ik6->result_array() as $ik6_item) {
              # code...
            ?>
            <td><?php echo $ik6_item['nilai_analisa_indikator']; ?></td>
            <?php
            }
            ?>
          </tr>
          <tr>
            <td>Rasio laporan penerbitan surat pemberitahuan kenaikan gaji berkala</td>
            <?php
            foreach ($ik7->result_array() as $ik7_item) {
              # code...
            ?>
            <td><?php echo $ik7_item['nilai_analisa_indikator']; ?></td>
            <?php
            }
            ?>
          </tr>
          <tr>
            <td>Rasio PNS yang dimutasi ke dalam dan ke luar Pemerintahan Kab. Ogan Ilir</td>
            <?php
            foreach ($ik8->result_array() as $ik8_item) {
              # code...
            ?>
            <td><?php echo $ik8_item['nilai_analisa_indikator']; ?></td>
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
            <th>Rasio tersusunnya naskah formasi PNS</th>
            <th>Rasio laporan penerbitan surat pemberitahuan kenaikan gaji berkala</th>
            <th>Rasio PNS yang dimutasi ke dalam dan ke luar Pemerintahan Kab. Ogan Ilir</th>
            <th>Nilai Eigenvector (EV)</th>
          <tr>
            <td>Rasio tersusunnya naskah formasi PNS</td>
            <?php
            foreach ($hasil_ik6->result_array() as $hasil_ik6_item) {
              # code...
            ?>
            <td><?php echo number_format($hasil_ik6_item['hasil_analisa_indikator'],3,'.',''); ?></td>
            <?php
            }
            ?>
            <td><b><?php foreach($avg_ik6->result_array() as $avg_ik6_item){echo number_format($avg_ik6_item['rata'],3,'.','');} ?></b></td>
          </tr>
          <tr>
            <td>Rasio laporan penerbitan surat pemberitahuan kenaikan gaji berkala</td>
            <?php
            foreach ($hasil_ik7->result_array() as $hasil_ik7_item) {
              # code...
            ?>
            <td><?php echo number_format($hasil_ik7_item['hasil_analisa_indikator'],3,'.',''); ?></td>
            <?php
            }
            ?>
            <td><b><?php foreach($avg_ik7->result_array() as $avg_ik7_item){echo number_format($avg_ik7_item['rata'],3,'.','');} ?></b></td>
          </tr>
          <tr>
            <td>Rasio PNS yang dimutasi ke dalam dan ke luar Pemerintahan Kab. Ogan Ilir</td>
            <?php
            foreach ($hasil_ik8->result_array() as $hasil_ik8_item) {
              # code...
            ?>
            <td><?php echo number_format($hasil_ik8_item['hasil_analisa_indikator'],3,'.',''); ?></td>
            <?php
            }
            ?>
            <td><b><?php foreach($avg_ik8->result_array() as $avg_ik8_item){echo number_format($avg_ik8_item['rata'],3,'.','');} ?></b></td>
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