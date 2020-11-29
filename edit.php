<?php
  include "koneksi.php";

  session_start();

  if ($_SESSION['level']=="") {
    header("location:login.php?belum=gagal");
  }

  $id_karyawan = $_GET["id_karyawan"];

  // query data mahasiswa berdasarkan id
  $data = query("SELECT * FROM c_karyawan A INNER JOIN jawab_soal B ON B.id_karyawan=A.id_karyawan INNER JOIN nila C ON C.id_karyawan=A.id_karyawan WHERE A.id_karyawan = $id_karyawan")[0];
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

    <div class="container">
        <div class="row">
          <div class="col-md-10 offset-md-1 text-center">
            <h2>Edit Data</h2>
          </div>
        </div>
    </div>

    <div class="row">
          <div class="col-md-10 offset-md-1">
              <form action="update.php" method="post">
                <input type="hidden" name="id_karyawan" value="<?php echo $data["id_karyawan"]; ?>">
                <div class="form-row">
                  <div class="form-group col-md-5 offset-md-1">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data["nama"]; ?>">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="ktp">No. Nik KTP </label>
                    <input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo $data["ktp"]; ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5 offset-md-1">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data["alamat"]; ?>">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="jurusan">Pendidikan Terakhir / Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $data["pdd_jur"]; ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5 offset-md-1">
                    <label for="usia">Usia</label>
                    <input type="number" class="form-control" id="usia" name="usia" value="<?php echo $data["usia"]; ?>">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="tanggal">Tanggal Tes</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data["tanggal"]; ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5 offset-md-1">
                      <label for="nama">Score Penampilan</label>
                      <input type="text" class="form-control" id="nilai_p" name="nilai_p" value="<?php echo $data["nilai_p"]; ?>">
                    </div>
                    <div class="form-group col-md-5">
                      <label for="ktp">Score Kecakapan</label>
                      <input type="text" class="form-control" id="nilai_k" name="nilai_k" value="<?php echo $data["nilai_k"]; ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-5 offset-md-1">
                      <label for="alamat">Score Wawancara</label>
                      <input type="text" class="form-control" id="nilai_w" name="nilai_w" value="<?php echo $data["nilai_w"]; ?>">
                    </div>
                  </div>
                <div class="form-row">
                  <div class="col-md-5 offset-md-1">
                    <button class="btn btn-primary" type="submit">Ubah</button>
                  </div>
                </div>
              </form>
          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>