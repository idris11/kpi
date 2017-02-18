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
          <h3 class="box-title">Daftar Indikator</h3>
        </div>
        <div class="box-body">
        	<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>N0</th>
                  <th>KODE INDIKATOR</th>
                  <th>INDIKATOR</th>
                  <th>JABATAN</th>
                  <th>KATEGORI</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($indikator->result_array() as $row) {
                  # code...
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row['id_indikator']; ?></td>
                  <td><?php echo $row['nama_indikator']; ?></td>
                  <td><?php echo $row['jabatan']; ?></td>
                  <td><?php echo $row['nama_kategori']; ?></td>
                  <td>
                    <a class="btn btn-social-icon btn-bitbucket" href="<?php echo base_url(); ?>indikator/delete_indikator/<?php echo $row['id_indikator']; ?>" onClick="return konfirmasi()"><i class="fa fa-trash-o"></i></a> <a class="btn btn-social-icon btn-google" href="<?php echo base_url(); ?>indikator/edit_indikator/<?php echo $row['id_indikator']; ?>"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                <?php
                }
                ?>
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