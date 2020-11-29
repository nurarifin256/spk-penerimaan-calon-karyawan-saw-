<?php 

	include "koneksi.php";

	$id_kary		= htmlspecialchars($_POST['id_karyawan']);
	$penampilan		= htmlspecialchars($_POST['penampilan']);
	$kecakapan		= htmlspecialchars($_POST['kecakapan']);
	$wawancara		= htmlspecialchars($_POST['wawancara']);

	$result = mysqli_query($koneksi, "SELECT id_karyawan FROM nila WHERE id_karyawan = '$id_kary'");

		if (mysqli_fetch_assoc($result)) {
			echo "
				<script>
					alert('nama tersebut sudah di input');
					location.replace('halaman_admin.php');
				</script>
			";
			return false;
		}


	$simpan_nilai = mysqli_query($koneksi,"INSERT INTO nila(id_karyawan,nilai_p,nilai_k,nilai_w)VALUES('$id_kary','$penampilan','$kecakapan','$wawancara')");

	if ($simpan_nilai) {
		?>
		<script type="text/javascript">
			alert("Data Berhasil Disimpan");
			location.replace('halaman_admin.php');
		</script>
		<?php
	}

 ?>