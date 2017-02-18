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
          <h3 class="box-title">Daftar Pegawai</h3>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url(); ?>indikator/cari_unitkerja" method="post" class="form-horizontal"> 
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Unit Kerja</label>

              <div class="col-sm-3">
                <select class="form-control" name="unitkerja">
                <option>-- Pilih Unit Kerja --</option>
                <?php
                foreach ($unitkerja->result_array() as $row) {
                   # code...
                ?>
                <option value="<?php echo $row['kd_unitkerja']; ?>"><?php echo $row['unitkerja']; ?></option>
                <?php
                }
                ?>
                </select>
              </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info">Cari</button>
            </div>
          </form>
        </div>
      </div>
        <?php
        if (isset($id_unitkerja) || isset($nip)) {
          # code...
        ?>
      <div class="box">
        <div class="box-body">
          <form action="<?php echo base_url(); ?>indikator/cari_data_pegawai" method="post" class="form-horizontal"> 
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Pegawai</label>

              <div class="col-sm-3">
                <select class="form-control" name="nip">
                <option>-- Pilih Pegawai --</option>
                <?php
                foreach ($pegawai->result_array() as $row) {
                   # code...
                ?>
                <option value="<?php echo $row['nip']; ?>"><?php echo $row['nama']; ?></option>
                <?php
                }
                ?>
                </select>
              </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info">Cari</button>
            </div>
          </form>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>N0</th>
                  <th>ID INDIKATOR</th>
                  <th>INDIKATOR</th>
                  <th>PERIODE</th>
                  <th>BOBOT INDIKATOR</th>
                  <th>BOBOT KATEGORI</th>
                  <th>TARGET PENCAPAIAN</th>
                  <th>SKOR PENCAPAIAN</th>
                  <th>LEVEL PENCAPAIAN</th>
                  <th>TARGET AKHIR PENCAPAIAN</th>
                  <th>NILAI VALUE</th>
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
                  <td><?php echo $row['indikator']; ?></td>
                  <td><?php echo $row['target_waktu']." Bulan"; ?></td>
                  <td><?php echo number_format($row['nilai_eigenvector'],3,'.',''); ?></td>
                  <td><?php echo number_format($row['bobot_kategori'],3,'.',''); ?></td>
                  <td><?php echo $row['target_pencapaian']; ?></td>
                  <td><?php echo $row['skor_pencapaian']; ?></td>
                  <td><?php if($row['skor_pencapaian']<=55){echo "Merah";}elseif($row['skor_pencapaian'] >= 56 && $row['skor_pencapaian']<=79){echo "kuning";}elseif($row['skor_pencapaian']>=80){echo "Hijau";} ?></td>
                  <td><?php echo number_format($row['target_akhir_pencapaian'],3,'.',''); ?></td>
                  <td><?php echo number_format($row['skor_akhir_pencapaian'],3,'.',''); ?></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
      </div> 
      <?php
      }
      ?>
    
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