<?php
	$hostDB = "localhost";
	$userDB = "root";
	$passDB = "";
	$namaDB = "hotel";

	$con = mysqli_connect($hostDB,$userDB, $passDB, $namaDB);
	if (!$con)
	{
		die("Koneksi gagal: ".mysqli_connect_error());
	}
?>