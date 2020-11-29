<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname	  = "recruitment";
	
	$koneksi = mysqli_connect($hostname,$username,$password,$dbname);
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	else
	{
		// echo "berhasil";
	}

	function query($query){
		global $koneksi;
		$result = mysqli_query($koneksi, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
				$rows[] = $row;
			}
		return $rows;
	}

	function cari($keyword) {
    $query = "SELECT * FROM c_karyawan A INNER JOIN jawab_soal B ON B.id_karyawan=A.id_karyawan INNER JOIN nila C ON C.id_karyawan=A.id_karyawan 
          WHERE
         nama LIKE '%$keyword%' OR
         ktp LIKE '%$keyword%' OR
         tanggal LIKE '%$keyword%' OR
         pdd_jur LIKE '%$keyword%' OR
         alamat LIKE '%$keyword%'
         ORDER BY A.nama ASC
        ";
    return query($query);
  }
	 
?>