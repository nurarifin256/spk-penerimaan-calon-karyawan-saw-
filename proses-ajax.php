<?php
include 'koneksi.php';
$ktp = $_POST["ktp"];

$get_qty = mysqli_query($koneksi,"SELECT A.ktp from c_karyawan A where A.id_karyawan='$ktp'");
while ($data=mysqli_fetch_array($get_qty)) { 
		$ktp_res = $data["ktp"];
}

$data_res = array(
	"ktp" => $ktp_res,
);

echo json_encode($data_res);

?>