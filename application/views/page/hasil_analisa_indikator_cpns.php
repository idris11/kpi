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
          <h3 class="box-title">HASIL PEMBOBOTAN INDIKATOR KATEGORI CPNS</h3>
        </div>
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
            <th>Antar Indikator</th>
            <th>Rasio jumlah CPNS yang diterima pada tes penerimaan CPNS</th>
            <th>Rasio pemeriksaan kelengkapan dokumen administrasi pelaksanaan sumpah PNS</th>
            <th>Rasio Jumlah CPNS yang melaksanakan sumpah PNS</th>
            <th>Rasio laporan persiapan kebutuhan  administrasi kegiatan peresmian PNS</th>
            <th>Rasio jumlah CPNS yang terpenuhi stastusnya menjadi PNS</th>
          </thead>
          <tr>
            <td>Rasio jumlah CPNS yang diterima pada tes penerimaan CPNS</td>
            <?php
            foreach ($ik1->result_array() as $ik1_item) {
              # code...
            ?>
            <td><?php echo $ik1_item['nilai_analisa_indikator']; ?></td>
            <?php
            }
            ?>
          </tr>
          <tr>
            <td>Rasio pemeriksaan kelengkapan dokumen administrasi pelaksanaan sumpah PNS</td>
            <?php
            foreach ($ik2->result_array() as $ik2_item) {
              # code...
            ?>
            <td><?php echo $ik2_item['nilai_analisa_indikator']; ?></td>
            <?php
            }
            ?>
          </tr>
          <tr>
            <td>Rasio Jumlah CPNS yang melaksanakan sumpah PNS</td>
            <?php
            foreach ($ik3->result_array() as $ik3_item) {
              # code...
            ?>
            <td><?php echo $ik3_item['nilai_analisa_indikator']; ?></td>
            <?php
            }
            ?>
          </tr>
          <tr>
            <td>Rasio laporan persiapan kebutuhan  administrasi kegiatan peresmian PNS</td>
            <?php
            foreach ($ik4->result_array() as $ik4_item) {
              # code...
            ?>
            <td><?php echo $ik4_item['nilai_analisa_indikator']; ?></td>
            <?php
            }
            ?>
          </tr>
          <tr>
            <td>Rasio jumlah CPNS yang terpenuhi stastusnya menjadi PNS</td>
            <?php
            foreach ($ik5->result_array() as $ik5_item) {
              # code...
            ?>
            <td><?php echo $ik5_item['nilai_analisa_indikator']; ?></td>
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
            <th>Rasio jumlah CPNS yang diterima pada tes penerimaan CPNS</th>
            <th>Rasio pemeriksaan kelengkapan dokumen administrasi pelaksanaan sumpah PNS</th>
            <th>Rasio Jumlah CPNS yang melaksanakan sumpah PNS</th>
            <th>Rasio laporan persiapan kebutuhan  administrasi kegiatan peresmian PNS</th>
            <th>Rasio jumlah CPNS yang terpenuhi stastusnya menjadi PNS</th>
            <th>Nilai Eigenvector (EV)</th>
          </thead>
          <tr>
            <td>Rasio jumlah CPNS yang diterima pada tes penerimaan CPNS</td>
            <?php
            foreach ($hasil_ik1->result_array() as $hasil_ik1_item) {
              # code...
            ?>
            <td><?php echo number_format($hasil_ik1_item['hasil_analisa_indikator'],3,'.',''); ?></td>
            <?php
            }
            ?>
            <td><b><?php foreach($avg_ik1->result_array() as $avg_ik1_item){echo number_format($avg_ik1_item['rata'],3,'.','');} ?></b></td>
          </tr>
          <tr>
            <td>Rasio pemeriksaan kelengkapan dokumen administrasi pelaksanaan sumpah PNS</td>
            <?php
            foreach ($hasil_ik2->result_array() as $hasil_ik2_item) {
              # code...
            ?>
            <td><?php echo number_format($hasil_ik2_item['hasil_analisa_indikator'],3,'.',''); ?></td>
            <?php
            }
            ?>
            <td><b><?php foreach($avg_ik2->result_array() as $avg_ik2_item){echo number_format($avg_ik2_item['rata'],3,'.','');} ?></b></td>
          </tr>
          <tr>
            <td>Rasio Jumlah CPNS yang melaksanakan sumpah PNS</td>
            <?php
            foreach ($hasil_ik3->result_array() as $hasil_ik3_item) {
              # code...
            ?>
            <td><?php echo number_format($hasil_ik3_item['hasil_analisa_indikator'],3,'.',''); ?></td>
            <?php
            }
            ?>
            <td><b><?php foreach($avg_ik3->result_array() as $avg_ik3_item){echo number_format($avg_ik3_item['rata'],3,'.','');} ?></b></td>
          </tr>
          <tr>
            <td>Rasio laporan persiapan kebutuhan  administrasi kegiatan peresmian PNS</td>
            <?php
            foreach ($hasil_ik4->result_array() as $hasil_ik4_item) {
              # code...
            ?>
            <td><?php echo number_format($hasil_ik4_item['hasil_analisa_indikator'],3,'.',''); ?></td>
            <?php
            }
            ?>
            <td><b><?php foreach($avg_ik4->result_array() as $avg_ik4_item){echo number_format($avg_ik4_item['rata'],3,'.','');} ?></b></td>
          </tr>
          <tr>
            <td>Rasio jumlah CPNS yang terpenuhi stastusnya menjadi PNS</td>
            <?php
            foreach ($hasil_ik5->result_array() as $hasil_ik5_item) {
              # code...
            ?>
            <td><?php echo number_format($hasil_ik5_item['hasil_analisa_indikator'],3,'.',''); ?></td>
            <?php
            }
            ?>
            <td><b><?php foreach($avg_ik5->result_array() as $avg_ik5_item){echo number_format($avg_ik5_item['rata'],3,'.','');} ?></b></td>
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