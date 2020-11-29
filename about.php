<?php 

  include "koneksi.php";
  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    

    <title>Halaman User</title>
  </head>
  <body>
    

    <!-- navbar -->

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="#">User</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="halaman_user.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Hasil
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="hasil_s.php">Hasil Sementara</a>
              <a class="dropdown-item" href="lihat.php">Hasil Akhir</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Tentang Kami</a>
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
    </table>
   
    <div>
      <img src="images/about-01.jpg" width="100%" class="mt-4"> 
    </div>

    <section class="mt-2">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center">Kelompok Dua</h2>
            <div class="text-center">
              Nurarifin           : 2018804036<br>  
              Hidayatullah        : 2018804043<br>
              Pindo Alam SR       : 2018804064<br>
              M. Taufik Hidayah   : 2018804059<br>          
              Hadi Nur Iman       : 2018804008<br>
              Eka Maulana KR      : 2018804077<br>
              Faris Ashim         : 2018804015<br>  
              Dicky Nur Sidik     : 2018804054
            </div>
          </div>
        </div>
    </section>

    <section class="mt-4">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2>Kontak</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-8 offset-sm-2">
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="masukan nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="masukan email">
              </div>
              <div class="form-group">
                <label for="telepon">No. Tlp</label>
                <input type="tel" class="form-control" id="telepon" placeholder="masukan no telepon">
              </div>
              <div class="form-group">
                <label for="Pesan">Message</label>
                <textarea class="form-control" rows="10" id="pesan" placeholder="masukan pesan"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Kirim Pesan</button>
              <table>
                <tr><td>&nbsp;</td></tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>