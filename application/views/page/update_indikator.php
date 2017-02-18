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
      <form action="<?php echo base_url(); ?>indikator/cari_update" method="post" class="form-horizontal">
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
        <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info">Cari</button>
            </div>
      </form>      
    </div>
  </div>
  <?php
      if (isset($id_unitkerja) && isset($id_pegawai)) {
        # code...
  ?>
  <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Form Target Indikator</h3>
      </div>
      <div class="box-body">
        <form action="<?php echo base_url();?>indikator/proses_update_indikator" method="post">
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
          <?php
          }
          ?>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <thead>
            <th>INDIKATOR</th>
            <th style="width:5px">TARGET OUTPUT</th>
            <th style="width:5px">REALISASI OUTPUT</th>
            <th style="width:5px">TARGET KUALITAS</th>
            <th style="width:5px">REALISASI KUALITAS</th>
            <th style="width:5px">TARGET WAKTU</th>
            <th style="width:5px">REALISASI WAKTU</th>
            <th style="width:100px">TARGET BIAYA</th>
            <th style="width:5px">REALISASI BIAYA</th>
            <th style="width:5px">TARGER PENCAPAIAN</th>
            <th style="width:5px">HAPUS?</th>  
            </thead>
            
          
          <?php
          foreach ($indikator->result_array() as $i) {
            # code...
          ?>
          <tr>
            <td><textarea class="form-control" cols="20" rows="2" readonly="readonly"><?php echo $i['indikator']; ?></textarea></td>
            <input type="hidden" name="kd_indikator[]" value="<?php echo $i['kd_indikator']; ?>">
            <td><input type="text" class="form-control" name="target_output[]" value="<?php echo $i['target_output']; ?>" ></td>
            <td><input type="text" class="form-control" name="realisasi_output[]" value="<?php echo $i['realisasi_output']; ?>"></td>
            <td><input type="text" class="form-control" name="target_kualitas[]"  value="<?php echo $i['target_kualitas']; ?>" ></td>
            <td><input type="text" class="form-control" name="realisasi_kualitas[]" value="<?php echo $i['realisasi_kualitas']; ?>"></td>
            <td><input type="text" class="form-control" name="target_waktu[]"  value="<?php echo $i['target_waktu']; ?>" ></td>
            <td><input type="text" class="form-control" name="realisasi_waktu[]" value="<?php echo $i['realisasi_waktu']; ?>"></td>
            <td><input type="text" class="form-control" name="target_biaya[]"  value="<?php echo $i['target_biaya']; ?>" ></td>
            <td><input type="text" class="form-control" name="realisasi_biaya[]" value="<?php echo $i['realisasi_biaya']; ?>"></td>
            <td><input type="text" class="form-control" name="target_pencapaian[]"  value="<?php echo $i['target_pencapaian']; ?>" ></td>
            <td><a class="btn btn-social-icon btn-bitbucket" href="<?php echo base_url(); ?>indikator/delete/<?php echo $i['kd_indikator']; ?>" onClick="delenquiry(<?php echo $i['kd_indikator'];?>)"><i class="fa fa-trash-o"></i></a></td>
          </tr>
          <?php
          }
          ?>
          
        </table>
          <div class="box-footer">
              <button type="reset" class="btn btn-default">Reset</button>
              <button type="submit" class="btn btn-info">Update</button>
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

$(function () {
    $("#example1").DataTable();
  });

function delenquiry(id) {
    if (confirm("Are you sure?")) {
        $.ajax({
            url: base_url + 'indikator/delete',
            type: 'post',
            data: "id="+id,
            success: function () {
                alert('ajax success');
            },
            error: function () {
                alert('ajax failure');
            }
        });
    } else {
        alert(id + " not deleted");
    }
}
</script>