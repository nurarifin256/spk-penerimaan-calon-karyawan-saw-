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
   
    <!-- awal biodata -->
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
            <h2>Biodata Diri</h2>
          </div>
        </div>
      

        <div class="row">
          <div class="col-md-10 offset-md-1">
              <form action="save_one.php" method="post">
                <div class="form-row">
                  <div class="form-group col-md-5 offset-md-1">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="ktp">No. Nik KTP </label>
                    <input type="text" class="form-control" id="ktp" name="ktp" autocomplete="off">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5 offset-md-1">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="jurusan">Pendidikan Terakhir / Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" autocomplete="off">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5 offset-md-1">
                    <label for="usia">Usia</label>
                    <input type="number" class="form-control" id="usia" name="usia" autocomplete="off">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="tanggal">Tanggal Tes</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d') ?>">
                  </div>
                </div>

                <br>

                <!-- awal soal -->
                <div class="row">
                  <div class="col-md-10 offset-md-1 text-center">
                    <h2>Soal Pilihan Ganda</h2>
                  </div>
                </div>

                <table class="table col-md-10 offset-md-1">
                  <?php  
                  $hasil = mysqli_query($koneksi, "SELECT * FROM tb_soal ");
                  $jumlah = mysqli_num_rows($hasil);
                  $urut = 0;
                  while ($row = mysqli_fetch_array($hasil)) {
                     $id = $row["id_soal"];
                     $pertanyaan = $row["soal"];
                     $pilihan_a=$row["a"];
                     $pilihan_b=$row["b"];
                     $pilihan_c=$row["c"];
                     $pilihan_d=$row["d"];
                   
                   ?>

                    <input type="hidden" name="id[]" value=<?php echo $id; ?>>
                    <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
                        <thead class="thead-dark">
                          <tr>
                                <th><?php echo $urut=$urut+1; ?></th>
                                <th><?php echo "$pertanyaan"; ?></th>
                          </tr>
                        </thead>
                      <tr>
                            <td>&nbsp;</td>
                            <td>                        
                              A.<input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> 
                              <?php echo "$pilihan_a";?>
                            </td>
                      </tr>
                      <tr>
                            <td>&nbsp;</td>
                            <td>
                              B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> 
                              <?php echo "$pilihan_b";?>
                            </td>
                      </tr>
                      <tr>
                            <td>&nbsp;</td>
                            <td>
                              
                              C.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> 
                              <?php echo "$pilihan_c";?> 
                            </td>
                      </tr>
                      <tr>
                          <td>&nbsp;</td>
                          <td>
                        D.   <input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> 
                          <?php echo "$pilihan_d";?></td>
                      </tr>
                <?php  
                }
                ?>
                <tr>
                  <td>
                    <button type="submit" class="btn btn-primary" name="submit" value="jawab">Simpan</button>
                  </td>
                </tr>
                </table>

                

                <!-- akhir soal -->
                
              </form>
        </div>
      </div>
    

    <!-- akhir biodata -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>