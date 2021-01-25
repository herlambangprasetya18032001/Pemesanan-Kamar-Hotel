<?php
  require_once "../config.php";
	session_start();
          @$id = $_GET['id'];
          var_dump($id);
          $upstok= mysqli_query($con, "UPDATE tbl_booking SET status='selesai' WHERE id='$id'");
          if($upstok == true){
          echo "<script>alert('Checkout Berhasil!!!');
            window.location.href = 'admin.php';</script>";}