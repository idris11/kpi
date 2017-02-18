<?php
echo "<option>-- Pilih Pegawai --</option>";
foreach($pegawai->result_array() as $p){
	?>
    <option value="<?php echo $p['nip'];?>"><?php echo $p['nama'];?></option>
	<?php
}
?>
