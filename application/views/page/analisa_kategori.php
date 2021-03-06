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
          <h3 class="box-title">FORM ANALISA PEMBOBOTAN KATEGORI</h3>
        </div>   
        <div class="box-body">
			    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>kategori/proses_analisa_kategori">
            <div class="row">
              <div class="col-md-4">
                <?php
                foreach ($analisa_kategori->result_array() as $row) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?php echo $row['nama_kategori']; ?>" readonly="readonly">
                  </div>
                </div>
                <?php
                }
                ?>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="col-sm-12">
                    <?php
                    foreach ($id_kategori->result_array() as $id) {
                      # code...
                    ?>
                      <input type="hidden" name="id_analisa[]" value="<?php echo $id['id_analisa']; ?>">
                      <select class="form-control" name="nilai[]" style="margin-bottom:15px">
                      <?php
                      foreach ($nilai->result_array() as $n) {
                        # code...
                      ?>
                      <option value="<?php echo $n['nilai']; ?>"><?php echo $n['nilai']." - ".$n['keterangan'];?></option>
                      <?php
                      }
                      ?>
                      </select>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
                <div class="col-md-4">
                <?php
                for($i=1;$i<=5;$i++) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="CPNS" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="PNS" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="JABATAN ORGANISASI" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="GOLONGAN & PANGKAT" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="PENSIUN" readonly="readonly">
                  </div>
                </div>
                <?php
                }
                ?>
                </div>
              </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info">Selanjutnya</button>
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