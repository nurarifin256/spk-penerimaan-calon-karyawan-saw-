<?php
include "koneksi.php";

session_start();

  if ($_SESSION['level']=="") {
    header("location:login.php?belum=gagal");
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
            <h2>Masukan Tanggal Tes</h2>
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-10 offset-md-1">
        <form action="list2_sa.php" method="GET">
            <div class="form-row">
              <div class="col-md-4 offset-md-2 mb-3">
                <label for="validationTooltip01">Dari</label>
                <input type="date" class="form-control" required name="tanggal_1" value="<?php echo date('Y-m-01') ?>">
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationTooltip02">Sampai</label>
                <input type="date" class="form-control" required name="tanggal_2" value="<?php echo date('Y-m-d') ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 offset-md-2">
                <button class="btn btn-primary" type="submit">Lihat</button>
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