<?php
  include "koneksi.php";

  session_start();

    if ($_SESSION['level']=="") {
      header("location:login.php?belum=gagal");
    }


  $tgl_1 		= $_GET["tanggal_1"];
  $tgl_2 		= $_GET["tanggal_2"];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Halaman Hasil Akhir</title>
  </head>
  <body>
    
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Admin</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="halaman_admin.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Hasil
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="hasil_sa.php">Hasil Sementara</a>
              <a class="dropdown-item" href="lihat2.php">Hasil Akhir</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about2.php">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>        
        </ul>
      </div>
    </nav>

    <!-- akhir navbar -->

    <table>
      <tr>
        <td>&nbsp;</td>        
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
    
    <!-- container -->
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Hasil Akhir</h2>
        </div>
     </div>

           
        <table class="table col-md-12">
          <thead class="thead-dark">
            <tr>
              <th  scope="col">No</th>
              <th  scope="col">Nama</th>
              <th  scope="col">Score Tes Tulis</th>
              <th  scope="col">Score Penampilan</th>
              <th  scope="col">Score Kecakapan</th>
              <th  scope="col">Score Wawancara</th>
              <th  scope="col">Total</th>
              <th  scope="col">Keterangan</th>
            </tr>
          </thead>
          <?php
$no=0;
$sql = mysqli_query($koneksi,"SELECT A4.nama,A3.* FROM (
    SELECT A2.*,(A2.nilai_ujian_res+A2.nilai_pen_res+A2.nilai_kec_res+A2.nilai_wwc_res) AS TOTAL FROM (
        SELECT A1.id_karyawan,
        ((A1.score/A1.nilai_ujian)*35)/100 as nilai_ujian_res,
        ((A1.nilai_p/A1.nilai_penampilan)*15)/100 as nilai_pen_res,
        ((A1.nilai_k/A1.nilai_kecakapan)*20)/100 as nilai_kec_res,
        ((A1.nilai_w/A1.nilai_wawancara)*30)/100 as nilai_wwc_res
        FROM (
            SELECT X.*,Z.score,(SELECT MAX(score) as score FROM jawab_soal AS A) AS nilai_ujian,
             (SELECT  max(nilai_p) as nilai_p from nila as B) as nilai_penampilan,
             (SELECT  max(nilai_k) as nilai_k from nila as B) as nilai_kecakapan,
             (SELECT  max(nilai_w) as nilai_w from nila as B) as nilai_wawancara
            from nila X
            INNER JOIN jawab_soal Z on Z.id_karyawan=X.id_karyawan
        ) A1 GROUP by A1.id_karyawan    
    ) A2
) A3
inner join c_karyawan A4 on A4.id_karyawan=A3.id_karyawan
WHERE A4.tanggal BETWEEN '$tgl_1' AND '$tgl_2'
ORDER BY A3.TOTAL DESC");
while ($data=mysqli_fetch_array($sql)) {
	$no++;
	@$total = $data["TOTAL"];

	if($total >= 2)
	{
		$keterangan = "lulus";
	}
	else
	{
		$keterangan = "Tidak Lulus";
	}

	// $keterangan = ($total >= 2) ? "lulus" : "tidak lulus";
	?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $data["nama"] ?></td>
		<td><?php echo number_format($data["nilai_ujian_res"],3) ?></td>
		<td><?php echo number_format($data["nilai_pen_res"],3) ?></td>
		<td><?php echo number_format($data["nilai_kec_res"],3) ?></td>
		<td><?php echo number_format($data["nilai_wwc_res"],3) ?></td>
		<td><?php echo number_format($data["TOTAL"],3) ?></td>
		<td><?php echo $keterangan ?></td>
	</tr> <?php
}
 	
	 ?>

        </table>

        

  
    
    <!-- akhir container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
		