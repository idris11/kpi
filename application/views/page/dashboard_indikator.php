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
        <form action="<?php echo base_url(); ?>indikator/cari_unit_kerja" method="post" class="form-horizontal"> 
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
      <form action="<?php echo base_url(); ?>indikator/cari_pegawai" method="post" class="form-horizontal"> 
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Daftar Pegawai</label>

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
      <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
    </div>
</div>
<?php
}
?>
</section>











<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script> 
<script type="text/javascript">
$(document).ready(function() {  
   var chart = {
      zoomType: 'xy'
   };
   var subtitle = {
      text: 'Badan Kepegawaian dan Diklat'   
   };
   var title = {
      text: 'KPI'   
   };
   var xAxis = {
      categories: [<?php foreach($indikator->result_array() as $row) echo "'".$row['id_indikator']."',"; ?>],
      crosshair: true
   };
   var yAxis= [{ // Primary yAxis
      labels: {
         format: '{value}',
         style: {
            color: Highcharts.getOptions().colors[2]
         }
      },
      title: {
         text: '',
         style: {
            color: Highcharts.getOptions().colors[2]
         }
      },
      opposite: true
   }, { // Secondary yAxis
      title: {
         text: '',
         style: {
            color: Highcharts.getOptions().colors[0]
         }
      },
      labels: {
         format: '{value}',
         style: {
            color: Highcharts.getOptions().colors[0]
         }
      }      
   }, { // Tertiary yAxis
      gridLineWidth: 0,
      title: {
         text: '',
         style: {
            color: Highcharts.getOptions().colors[1]
         }
      },
      labels: {
         format: '{value}',
         style: {
            color: Highcharts.getOptions().colors[1]
         }
      },
      opposite:true  
   }];
   var tooltip = {
      shared: true
   };
   var legend = {
      layout: 'vertical',
      align: 'left',
      x: 120,
      verticalAlign: 'top',
      y: 100,
      floating: true,
      backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
   };
   var series= [{
         name: 'Skor Akhir Pencapaian',
            type: 'column',
            yAxis: 1,
            data: [<?php foreach($indikator->result_array() as $row) echo number_format($row['skor_akhir_pencapaian']).","; ?>],
            
         },
         {
         name: 'Target Akhir Pencapaian',
            type: 'column',
            yAxis: 1,
            data: [<?php foreach($indikator->result_array() as $row) echo number_format($row['target_akhir_pencapaian']).","; ?>],
          
         },
         {
            name: 'Skor Akhir Pencapaian',
            type: 'spline',
            data: [<?php foreach($indikator->result_array() as $row) echo number_format($row['skor_akhir_pencapaian']).","; ?>],
            
        },
         {
            name: 'Target Akhir Pencapaian',
            type: 'spline',
            data: [<?php foreach($indikator->result_array() as $row) echo number_format($row['target_akhir_pencapaian']).","; ?>],
           
        }
   ];     
      
   var json = {};   
   json.chart = chart;   
   json.title = title;
   json.subtitle = subtitle;      
   json.xAxis = xAxis;
   json.yAxis = yAxis;
   json.tooltip = tooltip;  
   json.legend = legend;  
   json.series = series;
   $('#container').highcharts(json);  
});
</script>