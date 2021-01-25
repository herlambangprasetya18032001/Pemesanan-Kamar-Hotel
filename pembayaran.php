<?php
  require_once "../config.php";
	session_start();
	if($_SESSION['idpegawai'] == false)
	{
		header("Location: ..\index.php");
  }
  date_default_timezone_set("Asia/Jakarta");
  $now= date('Y-m-d');
  @$id=$_SESSION['idpegawai'];
  if(isset($_POST['submit']))
  {
    $idbooking = $_SESSION['id_booking'];
    $transaksi = mysqli_query($con, "INSERT INTO tbl_transaksi (id_booking,id_pegawai, tanggal) VALUES 
    ('".$idbooking."','".$id."','".$now."')");

    if($transaksi == true){
      $upstok= mysqli_query($con, "UPDATE tbl_booking SET status='inap' WHERE id='$idbooking'");
      echo "<script>alert('Pembayaran Berhasil!!!');
      window.location.href = 'admin.php';</script>";
    }else{
      echo "<script>alert('Pembayaran Gagal!!!');";
    }
  }
  

		@$getnama = mysqli_query($con, "SELECT nama FROM tbl_pegawai WHERE id='$id'");
		@$datanama = mysqli_fetch_array($getnama);
    @$nama = $datanama[0];

    $id_booking = $_GET['id'];
    $_SESSION['id_booking'] = $id_booking;
    $booking = mysqli_query($con, "SELECT tbl_booking.`id`,tbl_pelanggan.`nama`,tbl_booking.`totalbayar`,tbl_booking.`checkin`,tbl_booking.`checkout`,
    tbl_booking.`jumlah_kamar`, tbl_kamar.`nama`,
    tbl_booking.`status` FROM tbl_booking JOIN tbl_pelanggan ON tbl_booking.`id_pelanggan`= tbl_pelanggan.`id` 
    JOIN tbl_kamar ON tbl_booking.`id_kamar`= tbl_kamar.`id` WHERE tbl_booking.`id`='$id_booking'");
    $databooking = mysqli_fetch_array($booking);

 
    
?>
<script>
	function startCalc(){
	interval = setInterval("calc()",1);}
	function calc(){
	one = document.form1.tagihan.value;
	two = document.form1.bayar.value; 
	document.form1.kembalian.value = two-one;}
	function stopCalc(){
	clearInterval(interval);}
</script>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">


    <!-- Icons font CSS-->
    <link href="../admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
        <div class="sidebar-brand-text mx-3">ADMIN</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Fitur
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan Transaksi</h6>
            <a class="collapse-item" href="perhari.php">Transaksi Perhari</a>
            <a class="collapse-item" href="perbulan.php">Transaksi Perbulan</a>
          </div>
        </div>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $nama;?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
          </div>
        <div class="wrapper wrapper--w6800">
            <div class="card card-4">
                <div class="card-body">
                    <form name="form1" method="POST" action="pembayaran.php">
                        <div class="row row-space">
                            <div class="namahp">
                                <div class="input-group">
                                    <label class="label">Atas Nama</label>
									              <input class="input--style-4" name="atasnama" type="text" value="<?php echo $databooking[1];?>" readonly/>
                                </div>
                            </div>
                            <div class="namahp">
                                <div class="input-group">
                                    <label class="label">Nama Kamar</label>
									                    <input  class="input--style-4" type="text" name="kamar" size='23' value="<?php echo $databooking[6];?>" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="namahp">
                                <div class="input-group">
                                    <label class="label">Check-in</label>
									              <input class="input--style-4" name="checkin" type="text" value="<?php echo $databooking[3];?>" readonly/>
                                </div>
                            </div>
                            <div class="namahp">
                                <div class="input-group">
                                    <label class="label">Check-Out</label>
									                    <input  class="input--style-4" type="text" name="checkout" size='23' value="<?php echo $databooking[4];?>" readonly/>
                                </div>
                            </div>
                        </div><div class="row row-space">
                            <div class="namahp">
                                <div class="input-group">
                                    <label class="label">Jumlah Kamar</label>
									              <input class="input--style-4" name="jmlkamar" type="text" value="<?php echo $databooking[5];?>" readonly/>
                                </div>
                            </div>
                            <div class="namahp">
                                <div class="input-group">
                                    <label class="label">Tagihan</label>
									                    <input  class="input--style-4" type="text" name="tagihan" id="tagihan" size='23' value="<?php echo $databooking[2];?>" readonly/>
                                </div>
                            </div>
                        </div>
						<div class="row row-space">
							<div class="namahp">
                                <div class="input-group">
                                    <label class="label">Bayar</label>
									<input class="input--style-4" type="number" name="bayar" id="bayar" style="text-align:right;"  size='23' onFocus="startCalc();" onBlur="stopCalc();" />
                                </div>
                            </div>
                            <div class="namahp">
                                <div class="input-group">
                                    <label class="label">Kembalian</label>
									<input class="input--style-4" type="number" name="kembalian" id="kembalian" style="text-align:right;" value="0" size='23' readonly/>
                                </div>
                            </div>
                        </div>
						<br>
            <button class="btnn btn--radius-2 btn--green" name="submit" onclick="return confirm('Apakah Data Pembayaran Anda Sudah Benar?')">Submit</button>
                    </form>
                                  </div>
            </div>
			<br>
  
    </div>
    <!-- Jquery JS-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/datepicker/moment.min.js"></script>
    <script src="../vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="../js/global.js"></script>

         
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
    });
  </script>
</body>

</html>