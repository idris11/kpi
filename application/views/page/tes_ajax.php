<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Form Dinamis</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/');?>/jquery.js"></script>
</head>
<body>
<form id="id_form" action="<?php echo base_url(); ?>indikator/proses_tes" method="post">
<table width="1067" height="48" border="1">
    <tr>
      <td rowspan="2" bgcolor="#999999"><div align="center"><span class="style5"></span></div></td>
      <td rowspan="2" bgcolor="#999999"><div align="center"></div></td>
      <td rowspan="2" bgcolor="#999999"><div align="center"></div></td>
      <td colspan="2" rowspan="2" bgcolor="#999999"><div align="center"><span class="style5">INDIKATOR</span></div></td>
      <td colspan="7" bgcolor="#999999"><div align="center"><span class="style5">TARGET</span></div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#999999"><div align="center"><span class="style5">KUANT/OUTPUT</span></div>        <div align="center"></div></td>
      <td width="94" bgcolor="#999999"><div align="center"><span class="style5">KUAL/MUTU</span></div></td>
      <td colspan="2" bgcolor="#999999"><div align="center"><span class="style5">WAKTU</span></div></td>
      <td width="133" bgcolor="#999999"><div align="center"><span class="style5">BIAYA</span></div></td>
      <td width="133" bgcolor="#999999"><div align="center"><span class="style5">KATEGORI</span></div></td>
    </tr>
<tbody id="container">
<!-- nanti rows nya muncul di sini -->
    </tbody>
</table>

<br>
  <script type="text/javascript">
  $(document).ready(function() {
            var count = 0;

            $("#add_btn").click(function(){
                    count += 1;
                $('#container').append(
                            '<tr class="records">'
              + '<td></td>'
             + '<td></td>'
             + '<td></td>'
             + '<td colspan="2"><span class="style7"><input class="input-sm" size="35" id="indikator' + count + '" name="indikator[]" type="text"></span></td>'
             + '<td width="112"><span class="style7"><input class="input-sm" size="15" id="target_output' + count + '" name="target_output[]" type="text"></span></td>'
             + '<td width="106"><span class="style7"><select input class="input-sm" size="1" id="ket_output' + count + '" name="ket_output[]"><option>-- Pilih Keterangan --</option><option value="orang">Orang</option><option value="naskah">Naskah</option><option value="dokumen">Dokumen</option></select></span></td>'
             + '<td><span class="style7"><input class="input-sm" size="15" id="target_kualitas' + count + '" name="target_kualitas[]" type="text" value="100"></span></td>'
             + '<td width="105"><span class="style7"><input class="input-sm" size="10" id="target_waktu' + count + '" name="target_waktu[]" type="text"></span></td>'
             + '<td width="107"><span class="style7"><input class="input-sm" size="1" id="ket_wkt_' + count + '" name="ket_wkt_' + count + '" type="text" value="Bln" readonly="readonly"></span></td>'
             + '<td width="108"><span class="style7"><input class="input-sm" size="20" id="target_biaya' + count + '" name="target_biaya[]" type="text"></span></td>'
             + '<td width="108"><select input class="input-sm" size="1" id="kategori' + count + '" name="kategori[]"><option>-- Pilih Kategori --</option><option value="1">CPNS</option><option value="2">PNS</option><option value="3">JABATAN</option><option value="4">GOLONGAN & PANGKAT</option><option value="5">PENSIUN</option></select></td>'
                         + '<td><a class="remove_item" href="" >Hapus</a></td>'
                    );
                });

                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });
  </script>
<div align="left"><input type="button" name="add_btn" value=" Tambah Tugas Jabatan " id="add_btn"> <input type="submit" name=submit value=" Simpan "></div>
</form>

</body>
</html>