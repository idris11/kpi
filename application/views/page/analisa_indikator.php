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
    <h1>
      <h1>KPI <small>Badan Kepegawaian dan Diklat</small></h1> 
    </h1>
</section>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
          <h3 class="box-title">ANALISA PEMBOBOTAN INDIKATOR</h3>
        </div>
        <div class="box-body">
        	<form action="<?php echo base_url(); ?>indikator/cari_kategori" method="post" class="form-horizontal">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Kategori</label>
              <div class="col-sm-3">
                <select class="form-control" name="kategori">
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
                <button type="submit" class="btn btn-info">Cari</button>
            </div>
          </form> 
        </div>
	</div>
  <?php
  if (isset($post_kategori)) {
    # code...
    if ($post_kategori=='K1') {
      # code...
      ?>
      <div class="box">
        <div class="box-body">
          <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>indikator/proses_indikator_cpns">
            <div class="row">
              <div class="col-md-4">
                <?php
                foreach($k1->result_array() as $k1_item) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" rows="3" readonly="readonly"><?php echo $k1_item['nama_indikator']; ?></textarea>  
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
                    foreach ($k1->result_array() as $k1_item) {
                      # code...
                    ?>
                      <input type="hidden" name="id_analisa_indikator_k1[]" value="<?php echo $k1_item['id_analisa_indikator']; ?>">
                      <select class="form-control" name="nilai[]" style="margin-bottom:52px">
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
                foreach($ujung_k1->result_array() as $ujung_k1_item) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" rows="3" readonly="readonly"><?php echo $ujung_k1_item['nama_indikator']; ?></textarea>  
                  </div>
                </div>
                <?php
                }              
                ?>
              </div>
            </div>
            <div class="box-footer">
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" class="btn btn-info">Selanjutnya</button>
            </div>
          </form>
        </div>
      </div>
      <?php
    }
    elseif ($post_kategori=='K2') {
      # code...
    ?>
    <div class="box">
        <div class="box-body">
          <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>indikator/proses_indikator_pns">
            <div class="row">
              <div class="col-md-4">
                <?php
                foreach($k2->result_array() as $k2_item) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" rows="3" readonly="readonly"><?php echo $k2_item['nama_indikator']; ?></textarea>  
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
                    foreach ($k2->result_array() as $k2_item) {
                      # code...
                    ?>
                      <input type="hidden" name="id_analisa_indikator_k2[]" value="<?php echo $k2_item['id_analisa_indikator']; ?>">
                      <select class="form-control" name="nilai[]" style="margin-bottom:55px">
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
                foreach($ujung_k2->result_array() as $ujung_k2_item) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" rows="3" readonly="readonly"><?php echo $ujung_k2_item['nama_indikator']; ?></textarea>  
                  </div>
                </div>
                <?php
                }              
                ?>
              </div>
            </div>
            <div class="box-footer">
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" class="btn btn-info">Selanjutnya</button>
            </div>
          </form>
        </div>
      </div>  
    <?php
    }
    elseif ($post_kategori=='K3') {
      # code...
    ?>
    <div class="box">
        <div class="box-body">
          <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>indikator/proses_indikator_jabatan">
            <div class="row">
              <div class="col-md-4">
                <?php
                foreach($k3->result_array() as $k3_item) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" rows="3" readonly="readonly"><?php echo $k3_item['nama_indikator']; ?></textarea>  
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
                    foreach ($k3->result_array() as $k3_item) {
                      # code...
                    ?>
                      <input type="hidden" name="id_analisa_indikator_k3[]" value="<?php echo $k3_item['id_analisa_indikator']; ?>">
                      <select class="form-control" name="nilai[]" style="margin-bottom:55px">
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
                foreach($ujung_k3->result_array() as $ujung_k3_item) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" rows="3" readonly="readonly"><?php echo $ujung_k3_item['nama_indikator']; ?></textarea>  
                  </div>
                </div>
                <?php
                }              
                ?>
              </div>
            </div>
            <div class="box-footer">
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" class="btn btn-info">Selanjutnya</button>
            </div>
          </form>
        </div>
      </div>
    <?php
    }
    elseif ($post_kategori=='K4') {
      # code...
    ?>
    <div class="box">
        <div class="box-body">
          <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>indikator/proses_indikator_golongan">
            <div class="row">
              <div class="col-md-4">
                <?php
                foreach($k4->result_array() as $k4_item) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" rows="3" readonly="readonly"><?php echo $k4_item['nama_indikator']; ?></textarea>  
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
                    foreach ($k4->result_array() as $k4_item) {
                      # code...
                    ?>
                      <input type="hidden" name="id_analisa_indikator_k4[]" value="<?php echo $k4_item['id_analisa_indikator']; ?>">
                      <select class="form-control" name="nilai[]" style="margin-bottom:55px">
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
                foreach($ujung_k4->result_array() as $ujung_k4_item) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" rows="3" readonly="readonly"><?php echo $ujung_k4_item['nama_indikator']; ?></textarea>  
                  </div>
                </div>
                <?php
                }              
                ?>
              </div>
            </div>
            <div class="box-footer">
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" class="btn btn-info">Selanjutnya</button>
            </div>
          </form>
        </div>
      </div>
    <?php
    }
    elseif ($post_kategori=='K5') {
      # code...
    ?>
    <div class="box">
        <div class="box-body">
          <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>indikator/proses_indikator_pensiun">
            <div class="row">
              <div class="col-md-4">
                <?php
                foreach($k5->result_array() as $k5_item) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" rows="3" readonly="readonly"><?php echo $k5_item['nama_indikator']; ?></textarea>  
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
                    foreach ($k5->result_array() as $k5_item) {
                      # code...
                    ?>
                      <input type="hidden" name="id_analisa_indikator_k5[]" value="<?php echo $k5_item['id_analisa_indikator']; ?>">
                      <select class="form-control" name="nilai[]" style="margin-bottom:55px">
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
                foreach($ujung_k5->result_array() as $ujung_k5_item) { 
                  # code...
                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                  <textarea class="form-control" rows="3" readonly="readonly"><?php echo $ujung_k5_item['nama_indikator']; ?></textarea>  
                  </div>
                </div>
                <?php
                }              
                ?>
              </div>
            </div>
            <div class="box-footer">
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" class="btn btn-info">Selanjutnya</button>
            </div>
          </form>
        </div>
      </div>
    <?php
    }
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