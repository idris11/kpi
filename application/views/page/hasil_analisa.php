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
          <h3 class="box-title">HASIL PEMBOBOTAN KATEGORI</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
                <thead>
                <tr>
                  <th>Antar Kategori</th>
                  <th>CPNS</th>
                  <th>PNS</th>
                  <th>JABATAN ORGANISASAI</th>
                  <th>GOLONGAN & PANGKAT</th>
                  <th>PENSIUN</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>CPNS</td>
                    <?php
                    foreach ($k1->result_array() as $k1_item) {
                      # code...
                    ?>
                    <td><?php echo $k1_item['nilai_analisa_kategori']; ?></td>
                    <?php
                    }
                    ?>
                  </tr>
                  <tr>
                    <td>PNS</td>
                    <?php
                    foreach ($k2->result_array() as $k2_item) {
                      # code...
                    ?>
                    <td><?php echo $k2_item['nilai_analisa_kategori']; ?></td>
                    <?php
                    }
                    ?>
                  </tr>
                  <tr>
                    <td>JABATAN ORGANISASI</td>
                    <?php
                    foreach ($k3->result_array() as $k3_item) {
                      # code...
                    ?>
                    <td><?php echo $k3_item['nilai_analisa_kategori']; ?></td>
                    <?php
                    }
                    ?>
                  </tr>
                  <tr>
                    <td>GOLONGAN & PANGKAT</td>
                    <?php
                    foreach ($k4->result_array() as $k4_item) {
                      # code...
                    ?>
                    <td><?php echo $k4_item['nilai_analisa_kategori']; ?></td>
                    <?php
                    }
                    ?>
                  </tr>
                  <tr>
                    <td>PENSIUN</td>
                    <?php
                    foreach ($k5->result_array() as $k5_item) {
                      # code...
                    ?>
                    <td><?php echo $k5_item['nilai_analisa_kategori']; ?></td>
                    <?php
                    }
                    ?>
                  </tr>
                  <tr>
                    <td><b>Jumlah</b></td>
                    <td><b><?php foreach($sum_k1->result_array() as $result){echo $result['jumlah'];} ?></b></td>
                    <td><b><?php foreach($sum_k2->result_array() as $result){echo $result['jumlah'];} ?></b></td>
                    <td><b><?php foreach($sum_k3->result_array() as $result){echo $result['jumlah'];} ?></b></td>
                    <td><b><?php foreach($sum_k4->result_array() as $result){echo $result['jumlah'];} ?></b></td>
                    <td><b><?php foreach($sum_k5->result_array() as $result){echo $result['jumlah'];} ?></b></td>
                  </tr>
                </tbody>
            </table>

        </div>
        
        <div class="box-body">
          <table class="table table-bordered">
                <thead>
                <tr>
                  <th>Perbandingan</th>
                  <th>CPNS</th>
                  <th>PNS</th>
                  <th>JABATAN ORGANISASAI</th>
                  <th>GOLONGAN & PANGKAT</th>
                  <th>PENSIUN</th>
                  <th>BOBOT</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>CPNS</td>
                    <?php
                    foreach ($hasil_k1->result_array() as $hasil_k1_item) {
                      # code...
                    ?>
                    <td><?php echo number_format($hasil_k1_item['hasil_analisa_kategori'],3,'.',''); ?></td>
                    <?php
                    }
                    ?>
                    <td><b><?php foreach($avg_k1->result_array() as $avg_1){echo number_format($avg_1['rata'],3,'.','');} ?></b></td>
                  </tr>
                  <tr>
                    <td>PNS</td>
                    <?php
                    foreach ($hasil_k2->result_array() as $hasil_k2_item) {
                      # code...
                    ?>
                    <td><?php echo number_format($hasil_k2_item['hasil_analisa_kategori'],3,'.',''); ?></td>
                    <?php
                    }
                    ?>
                    <td><b><?php foreach($avg_k2->result_array() as $avg_2){echo number_format($avg_2['rata'],3,'.','');} ?></b></td>
                  </tr>
                  <tr>
                    <td>JABATAN ORGANISASI</td>
                    <?php
                    foreach ($hasil_k3->result_array() as $hasil_k3_item) {
                      # code...
                    ?>
                    <td><?php echo number_format($hasil_k3_item['hasil_analisa_kategori'],3,'.',''); ?></td>
                    <?php
                    }
                    ?>
                    <td><b><?php foreach($avg_k3->result_array() as $avg_3){echo number_format($avg_3['rata'],3,'.','');} ?></b></td>
                  </tr>
                  <tr>
                    <td>GOLONGAN & PANGKAT</td>
                    <?php
                    foreach ($hasil_k4->result_array() as $hasil_k4_item) {
                      # code...
                    ?>
                    <td><?php echo number_format($hasil_k4_item['hasil_analisa_kategori'],3,'.',''); ?></td>
                    <?php
                    }
                    ?>
                    <td><b><?php foreach($avg_k4->result_array() as $avg_4){echo number_format($avg_4['rata'],3,'.','');} ?></b></td>
                  </tr>
                  <tr>
                    <td>PENSIUN</td>
                    <?php
                    foreach ($hasil_k5->result_array() as $hasil_k5_item) {
                      # code...
                    ?>
                    <td><?php echo number_format($hasil_k5_item['hasil_analisa_kategori'],3,'.',''); ?></td>
                    <?php
                    }
                    ?>
                    <td><b><?php foreach($avg_k5->result_array() as $avg_5){echo number_format($avg_5['rata'],3,'.','');} ?></b></td>
                  </tr>
                  <tr>
                    <td><b>Jumlah</b></td>
                    <td><b><?php foreach($sum_hasil_k1->result_array() as $result){echo number_format($result['hasil'],3,'.','');} ?></b></td>
                    <td><b><?php foreach($sum_hasil_k2->result_array() as $result){echo number_format($result['hasil'],3,'.','');} ?></b></td>
                    <td><b><?php foreach($sum_hasil_k3->result_array() as $result){echo number_format($result['hasil'],3,'.','');} ?></b></td>
                    <td><b><?php foreach($sum_hasil_k4->result_array() as $result){echo number_format($result['hasil'],3,'.','');} ?></b></td>
                    <td><b><?php foreach($sum_hasil_k5->result_array() as $result){echo number_format($result['hasil'],3,'.','');} ?></b></td>
                    <td><b><?php foreach($sum_bobot->result_array() as $sum_bobot_item){echo number_format($sum_bobot_item['sum_bobot'],3,'.','');} ?></b></td>
                  </tr>
                </tbody>
            </table>
            
        </div>
        <!-- /.box-body -->
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