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

    <title>Halaman Admin</title>
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
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
    		<div class="col">
	    		<form action="save_two.php" method="post">
	    			<div class="form-inline">
	  
		    				<label class="my-1 mr-2" for="ktp">Nama :</label>
							  <select class="custom-select my-1 mr-sm-2" id="ktp" name="id_karyawan" onchange="get_nik(this)">
							    <option selected>Pilih Nama Calon Karyawan</option>
							    <?php
								$nama = mysqli_query($koneksi,"SELECT * FROM c_karyawan");
								$jsArray = "var prdName = new Array();\n";
								while ($data=mysqli_fetch_array($nama)) { ?>
									<option value="<?php echo $data['id_karyawan'] ?>"><?php echo $data['nama'] ?></option>


                <?php }
                
                
								; ?>
							  </select>
						

						 <label class="my-1 mr-2" for="inlineFormCustomSelectPref" padding-left="10">No Nik :</label>  	
						 <input type="text" class="form-control" id="nik" name="nik" readonly>			
	    			</div>
	    			<br>
	    			<div class="form-row">
	                  <div class="form-group col-md-12">
	                    <label for="nama">Penampilan</label>
	                    <input type="text" class="form-control" id="nama" name="penampilan" placeholder="Masukan Nilai Penampilan 10-100" autocomplete="off">
	                  </div>
	                </div>
	                <div class="form-row">
	                  <div class="form-group col-md-12">
	                    <label for="nama">Kecakapan</label>
	                    <input type="text" class="form-control" id="nama" name="kecakapan" placeholder="Masukan Nilai Kecakapan 10-100" autocomplete="off">
	                  </div>
	                </div>
	                <div class="form-row">
	                  <div class="form-group col-md-12">
	                    <label for="nama">Wawancara</label>
	                    <input type="text" class="form-control" id="nama" name="wawancara" placeholder="Masukan Nilai Wawancara 10-100" autocomplete="off">
	                  </div>
	                </div>
	                <button type="submit" class="btn btn-primary">Simpan</button>			
	    		</form>
    		</div>
    	</div>
    </div>

    <!-- akhir container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	<?php echo $jsArray; ?>
    	function nik(x){
              document.getElementById('ktp').value = prdName[x].ktp;  
            };


            function get_nik()
            {
              ktp = $("#ktp").val();

              $.ajax({
                url : "proses-ajax.php",
                type : "POST",
                data : {ktp : ktp},
                success : function(data)
                {
                  hasil = JSON.parse(data);
                  $("#nik").val(hasil.ktp);
                }

              })
            }
    </script>
  </body>
</html>