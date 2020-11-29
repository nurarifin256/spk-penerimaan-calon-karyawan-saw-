<?php
include "koneksi.php";

$id_karyawan	= $_POST['id_karyawan'];

$nama 			= $_POST['nama'];
$ktp			= $_POST['ktp'];
$alamat			= $_POST['alamat'];
$pdd_jur		= $_POST['jurusan'];
$usia			= $_POST['usia'];
$tanggal		= $_POST['tanggal'];

$nilai_p		= $_POST['nilai_p'];
$nilai_k		= $_POST['nilai_k'];
$nilai_w		= $_POST['nilai_w'];

// var_dump($nama);die();
$sql = mysqli_query($koneksi,"UPDATE c_karyawan SET nama='$nama', ktp='$ktp', alamat='$alamat', pdd_jur='$pdd_jur', usia='$usia', tanggal='$tanggal' WHERE id_karyawan='$id_karyawan'");


$sql2 = mysqli_query($koneksi,"UPDATE nila SET nilai_p='$nilai_p', nilai_k='$nilai_k', nilai_w='$nilai_w' WHERE id_karyawan='$id_karyawan'");

if($sql2){
	?>
	<script type="text/javascript">
		alert("data berhasil diubah");
		location.replace('hasil_sa.php');
	</script>
	<?php
	}
	else
	{
		echo "Gagal";
	}
?>