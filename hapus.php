<?php
include "koneksi.php";

$id_karyawan = $_GET['id_karyawan'];

// var_dump($nama);die();

$hapus = mysqli_query($koneksi,"DELETE FROM c_karyawan where id_karyawan='$id_karyawan'");

$hapus2 = mysqli_query($koneksi,"DELETE FROM jawab_soal where id_karyawan='$id_karyawan'");

$hapus3 = mysqli_query($koneksi,"DELETE FROM nila where id_karyawan='$id_karyawan'");

if($hapus3){
	?>
	<script type="text/javascript">
		alert("data berhasil dihapus");
		location.replace('hasil_sa.php');
	</script>
	<?php
	}
	else
	{
		echo "Gagal";
	}
?>