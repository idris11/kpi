<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
<section class="content-header">
      <h1>
        <h1>KPI <small>Badan Kepegawaian dan Diklat</small></h1> 
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">FORM EDIT PEGAWAI</h3>
        </div>
        <?php
        foreach ($pegawai->result_array() as $r) {
          # code...
        ?>
        <div class="box-body">
          <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>pegawai/proses_edit_pegawai">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">NIP</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="NIP" value="<?php echo $r['nip']; ?>" readonly="readonly">
                <input type="hidden" name="nip" value="<?php echo $r['nip']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $r['nama']; ?>">
              </div>
            </div>
            <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Pangkat</label>

                  <div class="col-sm-3">
                    <select class="form-control" name="pangkat">
                    <option>-- Pilih Pangkat --</option>
                    <?php
                    foreach ($pangkat->result_array() as $row) {
                      # code...
                    ?>
                    <option <?php if($row['kd_pangkat']==$r['kd_pangkat']){echo "selected";} ?> value="<?php echo $row['kd_pangkat']; ?>"><?php echo $row['pangkatgolru']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  </div>
            </div>
            <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jabatan</label>

                  <div class="col-sm-3">
                    <select class="form-control" name="jabatan">
                    <option>-- Pilih Jabatan --</option>
                    <?php
                    foreach ($jabatan->result_array() as $row) {
                      # code...
                    ?>
                    <option <?php if($row['kd_jabatan']==$r['kd_jabatan']){echo "selected";}?> value="<?php echo $row['kd_jabatan']; ?>"><?php echo $row['jabatan']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  </div>
            </div>
            <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Unit Kerja</label>

                  <div class="col-sm-3">
                    <select class="form-control" name="unitkerja">
                    <option>-- Pilih Unit Kerja --</option>
                    <?php
                    foreach ($unitkerja->result_array() as $row) {
                      # code...
                    ?>
                    <option <?php if($row['kd_unitkerja']==$r['kd_unitkerja']){echo "selected";}?> value="<?php echo $row['kd_unitkerja']; ?>"><?php echo $row['unitkerja']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  </div>
            </div>
            <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jenis Kelamin</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="jk">
                    <option>-- Pilih Jenis Kelamin --</option>
                    <option <?php if($r['jk']=="laki-laki"){echo "selected";}?> value="laki-laki">Laki-laki</option>
                    <option <?php if($r['jk']=="perempuan"){echo "selected";}?> value="perempuan">Perempuan</option>
                  </select>
                  </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Tempat Lahir</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tmpt_lahir" value="<?php echo $r['tmpt_lahir'] ?>">
              </div>
            </div>
            <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Lahir</label>

                  <div class="col-sm-3">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" data-date-format='dd-mm-yyyy' placeholder="dd-mm-yyyy" name="tgl_lahir" value="<?php echo date('d-m-Y',strtotime($r['tgl_lahir']));?>">
                    </div>
                  </div>
            </div>
            <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Agama</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="agama">
                    <option>-- Pilih Agama --</option>
                    <option <?php if($r['agama']=="islam"){echo "selected";} ?> value="islam">Islam</option>
                    <option <?php if($r['agama']=="protestan"){echo "selected";} ?> value="protestan">Protestan</option>
                    <option <?php if($r['agama']=="katolik
                    "){echo "selected";} ?> value="katolik">Katolik</option>
                    <option <?php if($r['agama']=="budha"){echo "selected";} ?> value="budha">Budha</option>
                    <option <?php if($r['agama']=="hindu"){echo "selected";} ?> value="hindu">Hindu</option>
                  </select>
                  </div>
            </div>
            <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="level">
                    <option>-- Pilih Level --</option>
                    <option <?php if($r['level']=="admin"){echo "selected";} ?> value="admin">Admin</option>
                    <option <?php if($r['level']=="pegawai"){echo "selected";} ?> value="pegawai">Pegawai</option>
                  </select>
                  </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $r['username']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $r['password']; ?>">
              </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info">Tambah</button>
            </div>
          </form>
        </div>
        <?php
        }
        ?>   
      </div>
    </section>

<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- bootstrap datepicker -->
<script>
  $('#datepicker').datepicker({
      autoclose: true
  });
</script>