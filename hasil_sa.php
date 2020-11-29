<?php 
	include "koneksi.php";

	session_start();

	if ($_SESSION['level']=="") {
		header("location:login.php?belum=gagal");
	}


  $jumlahDataPerhalaman = 5;

  $jumlahData = count(query("SELECT * FROM c_karyawan"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);


  $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
  $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;


  $mahasiswa = query("SELECT * FROM c_karyawan A INNER JOIN jawab_soal B ON B.id_karyawan=A.id_karyawan INNER JOIN nila C ON C.id_karyawan=A.id_karyawan ORDER BY A.nama ASC LIMIT $awalData, $jumlahDataPerhalaman");


  if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);

    // var_dump($mahasiswa);
    // exit();
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Halaman Hasil S</title>
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
              <a class="dropdown-item" href="hasil_s.php">Hasil Sementara</a>
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
          <h2>Hasil Sementara</h2>
        </div>
     </div>

    <form action="" method="post">
      <div class="row">
          <div class="col-md-12 mt-3">
            <div class="input-group mb-3">
              <input type="text" class="form-control input-keyword" name="keyword" placeholder="Masukan Pencarian" autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-primary search-button" type="submit" name="cari">Search</button>
                </div>
            </div>
          </div>
      </div>
    </form>
           
        <table class="table col-md-12">
          <thead class="thead-dark">
            <tr>
              <th  scope="col">No</th>
              <th  scope="col">Nama</th>
              <th  scope="col">Nik KTP</th>
              <th  scope="col">Tanggal Tes</th>
              <th  scope="col">N Psikotest</th>
              <th  scope="col">N Penampilan</th>
              <th  scope="col">N Kecakapan</th>
              <th  scope="col">N Wawancara</th>
              <th  scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $mhs ) : ?>

            <tr>
              <td><?= $i; ?></td>
              <td><?php echo $mhs["nama"]; ?></td>
              <td><?php echo $mhs["ktp"]; ?></td>
              <td><?php echo $mhs["tanggal"]; ?></td>
              <td><?php echo $mhs["score"]; ?></td>
              <td><?php echo $mhs["nilai_p"]; ?></td>
              <td><?php echo $mhs["nilai_k"]; ?></td>
              <td><?php echo $mhs["nilai_w"]; ?></td>
              <td>
                <a href="edit.php?id_karyawan=<?php echo $mhs["id_karyawan"] ?>" class="btn btn-success">Edit</a>
                <a href="hapus.php?id_karyawan=<?php echo $mhs["id_karyawan"] ?>" class="btn btn-danger">Hapus</a>
              </td>
          </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
          </tbody>
        </table>

        <div class="container">
          <div class="row">
            <div class="col-auto mr-auto">
              <a href="lihat2.php" class="btn btn-primary">Lihat Hasil Akhir</a>
            </div>
            <div class="col-auto">
              <nav aria-label="...">
                <ul class="pagination">           
                    <li class="page-item">
                      <?php if($halamanAktif > 1) : ?>
                        <a class="page-link" href="?halaman=<?php echo $halamanAktif - 1 ?>">Previous</a>
                      <?php endif; ?>
                      </li>
                      <?php for ($i=1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                      <li class="page-item active"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                      <?php else : ?>
                      <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                      <?php endif; ?>
                      <?php endfor; ?>

                      <li class="page-item">

                       <?php if($halamanAktif < $jumlahHalaman) : ?>
                        <a class="page-link" href="?halaman=<?php echo $halamanAktif + 1 ?>">Next</a>
                      <?php endif; ?>
                    </li>
                </ul>
              </nav>
            </div>
          </div>

  
    
    <!-- akhir container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>