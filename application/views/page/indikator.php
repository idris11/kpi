<section class="content-header">
      <h1>
        <h1>KPI <small>Badan Kepegawaian dan Diklat</small></h1> 
      </h1>
</section>
<section class="content">
	<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Pencarian Pegawai</h3>
    </div>
    <div class="box-body">
      <form action="<?php echo base_url(); ?>indikator/cari_user" method="post" class="form-horizontal"> 
        <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Unit Kerja</label>

              <div class="col-sm-3">
                <select class="form-control" name="unitkerja" id="unitkerja">
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
        <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Pegawai</label>

              <div class="col-sm-3">
                <select class="form-control" name="pegawai" id="pegawai">
                <option>-- Pilih Pegawai --</option>
                </select>
              </div>
        </div>
        <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Jabatan</label>

              <div class="col-sm-3">
                <select class="form-control" name="jabatan">
                <option>-- Pilih jabatan --</option>
                <?php
                foreach ($jabatan->result_array() as $value) {
                  # code...
                ?>
                <option value="<?php echo $value['kd_jabatan']; ?>"><?php echo $value['jabatan']; ?></option>
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
      if (isset($id_unitkerja) && isset($id_pegawai) && isset($id_jabatan)) {
        # code...
  ?>
  <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Form Target Indikator</h3>
      </div>
      <div class="box-body">
        
        <div class="row">
          <?php
          foreach ($pegawai->result_array() as $r) {
            # code...
          ?>
          <div class="col-md-4 col-md-offset-4">
            <table class="table table-bordered">
              <tr>
                <td colspan="2"><h4><center>INFORMASI PEGAWAI</center></h4></td>
              </tr> 
              <tr>
                <td>NIP : </td>
                <td><?php echo $r['nip']; ?></td>
                <input type="hidden" name="nip" value="<?php echo $r['nip']; ?>">
              </tr>
              <tr>
                <td>Nama : </td>
                <td><?php echo $r['nama']; ?></td>
              </tr>
              <tr>
                <td>Jabatan: </td>
                <td><?php echo $r['jabatan']; ?></td>
              </tr>
              <tr>
                <td>Unitkerja : </td>
                <td><?php echo $r['unitkerja']; ?></td>
              </tr>
            </table>
          </div>
          
          </div>
        </div>
        <div class="box-body">
         
          <form action="<?php echo base_url();?>indikator/proses_target_indikator" method="post">
          <input type="hidden" name="nip" value="<?php echo $r['nip']; ?>">
          <?php
          }
          ?>
          <table class="table table-bordered">
            <thead>
            <th style="width:5px">ID INDIKATOR</th>
            <th style="width:500px">INDIKATOR</th>
            <th style="width:5px">KETERANGAN</th>
            <th style="width:5px">TARGET OUTPUT</th>
            <th style="width:5px">TARGET KUALITAS</th>
            <th style="width:5px">TARGET WAKTU</th>
            <th style="width:15px">TARGET BIAYA</th>
            <th style="width:15px">TARGET PENCAPAIAN</th>
            </thead>
            <?php
            foreach ($indikator->result_array() as $indikator_item) {
              # code...
            ?>
            <tr>
            <td><input type="text" class="form-control" name="id_indikator[]" value="<?php echo $indikator_item['id_indikator']; ?>" readonly="readonly"></td>
            <td><input type="text" class="form-control" name="indikator[]" value="<?php echo $indikator_item['nama_indikator']; ?>" readonly="readonly"></td>
            <td>
              <select class="form-control" name="ket_output[]">
              <option value="naskah">Naskah</option>
              <option value="dokumen">Dokumen</option>
              <option value="orang">Orang</option>
              </select>
            </td>
            <td><input type="text" class="form-control" name="target_output[]"></td>
            <td><input type="text" class="form-control" name="target_kualitas[]"></td>
            <td><input type="text" class="form-control" name="target_waktu[]"></td>
            <td><input type="text" class="form-control" name="target_biaya[]"></td>
            <td><input type="text" class="form-control" name="target_pencapaian[]" value="76"></td>
            </tr>
            <?php
            }
            ?>
          </table>
          <div class="box-footer">
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" class="btn btn-info">Tambah</button>
          </div>            
          </form>
        </div>
      </div> 
  </div>
<?php
 }
?>
</section>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>/jquery.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  $("#unitkerja").change(function(){
    var unitkerja = $("#unitkerja").val();
    $.ajax({
        url: "<?php echo base_url('indikator/ambil_data');?>",
        data: "unitkerja="+unitkerja,
        cache: false,
        success: function(msg){
            $("#pegawai").html(msg);
        }
    });
  });
});

</script>