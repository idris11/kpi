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
          <h3 class="box-title">FORM TAMBAH MASTER INDIKATOR</h3>
        </div>   
        <div class="box-body">
			    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>indikator/proses_tambah_indikator">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Kode Indikator</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="Kode Indikator" name="id_indikator">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Indikator</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Indikator" name="indikator">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Jabatan</label>

              <div class="col-sm-3">
                <select class="form-control" name="id_jabatan">
                <option>-- Pilih Jabatan --</option>
                <?php
                foreach ($jabatan->result_array() as $row) {
                   # code...
                ?>
                <option value="<?php echo $row['kd_jabatan']; ?>"><?php echo $row['jabatan']; ?></option>
                <?php
                }
                ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Kategori</label>

              <div class="col-sm-3">
                <select class="form-control" name="id_kategori">
                <option>-- Pilih Kategori --</option>
                <?php
                foreach ($kategori->result_array() as $row) {
                   # code...
                ?>
                <option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['nama_kategori']; ?></option>
                <?php
                }
                ?>
                </select>
              </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info">Tambah</button>
            </div>
          </form>
        </div>
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