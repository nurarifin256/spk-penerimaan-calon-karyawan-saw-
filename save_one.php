<?php 

include "koneksi.php";

//header
$nama		= htmlspecialchars($_POST['nama']);
$ktp		= htmlspecialchars($_POST['ktp']);
$alamat		= htmlspecialchars($_POST['alamat']);
$jurusan	= htmlspecialchars($_POST['jurusan']);
$usia		= htmlspecialchars($_POST['usia']);
$tanggal	= htmlspecialchars($_POST['tanggal']);

// detail
$pilihan	= $_POST['pilihan'];
$id_soal	= $_POST['id'];
$jumlah		= $_POST['jumlah'];

if (isset($_POST['submit'])) {
	
	$score	= 0;
	$benar	= 0;
	$salah	= 0;
	$kosong	= 0;

	for ($i=0; $i <$jumlah ; $i++) { 
		
		$nomor=$id_soal[$i];

		if (empty($pilihan[$nomor])) {
			$kosong++;
		}else{
			$jawaban = $pilihan[$nomor];

			$query = mysqli_query($koneksi, "SELECT * FROM tb_soal WHERE id_soal='$nomor' AND knc_jawab='$jawaban'");

			$cek = mysqli_num_rows($query);

			if ($cek) {
				$benar++;
			}else{
				$salah++;
			}
		}
		$result = mysqli_query($koneksi, "SELECT * FROM tb_soal");
		$jumlah_soal = mysqli_num_rows($result);
		$score = 100 / $jumlah_soal * $benar;
		$hasil = number_format($score,1);

	}
}


$result = mysqli_query($koneksi, "SELECT ktp FROM c_karyawan WHERE ktp = '$ktp'");

		if (mysqli_fetch_assoc($result)) {
			echo "
				<script>
					alert('no ktp sudah terdaftar');
					location.replace('halaman_user.php');
				</script>
			";
			return false;
		}

		if (isset($_POST["submit"])) {
			$no = trim($ktp);
			if (is_numeric($no) == !TRUE) {
				echo "
				<script>
					alert('no ktp harus angka');
					location.replace('halaman_user.php');
				</script>
			";
			return false;
			}
		}

		if (isset($_POST["submit"])) {
			$no = trim($ktp);
			if (strlen($no)<>16) {
				echo "
				<script>
					alert('no ktp harus 16 digit');
					location.replace('halaman_user.php');
				</script>
			";
			return false;
			}
		}

$simpan_kary = mysqli_query($koneksi,"INSERT INTO c_karyawan(nama,ktp,alamat,pdd_jur,usia,tanggal)VALUES('$nama','$ktp','$alamat','$jurusan','$usia','$tanggal')");

$get_kode_kary = mysqli_query($koneksi,"SELECT * FROM c_karyawan ORDER BY id_karyawan DESC LIMIT 1");
while ($data = mysqli_fetch_array($get_kode_kary)){
	$kode_kary = $data["id_karyawan"];
}

$simpan_score = mysqli_query($koneksi,"INSERT INTO jawab_soal(id_karyawan,score)VALUES('$kode_kary','$score')"); 

if($simpan_score)
{
	?>
	<script type="text/javascript">
		alert("Data Berhasil Disimpan");
		location.replace('halaman_user.php');
 	</script>
	<?php
 }
?>

<!-- <table>
	<tr>
		<td>jumlah jawaban benar <?php echo $benar ?></td>
	</tr>
	<tr>
		<td>jumlah jawaban salah <?php echo $salah ?></td>
	</tr>
	<tr>
		<td>jumlah jawaban kosong <?php echo $kosong ?></td>
	</tr>
</table> -->
