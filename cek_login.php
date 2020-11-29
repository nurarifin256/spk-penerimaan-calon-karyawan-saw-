<?php 

	session_start();

	include 'koneksi.php';

	$username	= htmlspecialchars($_POST['username']);
	$password	= htmlspecialchars($_POST['password']);

	$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

	$cek = mysqli_num_rows($login);

	if ($cek > 0) {
		$data = mysqli_fetch_assoc($login);

		if ($data['level'] =="admin") {
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";

			header("location:halaman_admin.php");
		}
		elseif ($data['level'] =="user") {
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "user";

			header("location:halaman_user.php");
		}
		else{
			header("location:login.php?pesan=gagal");
		}
	}else{
		header("location:login.php?pesan=gagal");
	}


?>