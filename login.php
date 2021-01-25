<?php include 'header.php';?>
<?php
	if (isset($_POST['submit']))
	{
		require_once "config.php";
		
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = md5(mysqli_real_escape_string($con, $_POST['password']));
			
		$loginpelanggan = mysqli_query($con, "select COUNT(*) from tbl_pelanggan where binary email='$email' and password='$password'");
		$dataloginpelanggan = mysqli_fetch_array($loginpelanggan);
        $validasidataloginpelanggan = $dataloginpelanggan[0];

        $loginpegawai = mysqli_query($con, "select COUNT(*) from tbl_pegawai where binary email='$email' and password='$password'");
		$dataloginpegawai = mysqli_fetch_array($loginpegawai);
        $validasidataloginpegawai = $dataloginpegawai[0];

        $getid = mysqli_query($con, "SELECT id FROM tbl_pelanggan WHERE BINARY email='$email'");
		$idpelanggan = mysqli_fetch_array($getid);
        $id = $idpelanggan[0];
        
        $getidpegawai = mysqli_query($con, "SELECT id FROM tbl_pegawai WHERE BINARY email='$email'");
		$dataidpegawai = mysqli_fetch_array($getidpegawai);
		$idpegawai = $dataidpegawai[0];
		
		if($validasidataloginpelanggan > 0)
		{
			$_SESSION['id'] = $id;
			header("Location: index.php");
		}else if($validasidataloginpegawai >0){
            $_SESSION['idpegawai'] = $idpegawai;
			header("Location: admin/admin.php");
        }
		else
		{	
			echo '<script>alert("Email dan Password Anda Tidak Sesuai");</script>';
		}
    }
?>
<script type="text/javascript">
    function validasi()
    {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        if(email != "" && password != "")
        {
            return true;
        }
        else
        {
            if (email == "" && password == "")
            {
                alert("Username dan Password Harus Diisi!!");
                document.getElementById("email").focus();
            }
            else if (email == "")
            {
                alert("Username Harus Diisi!!");
                document.getElementById("email").focus();
            }
            else
            {
                alert("Password Harus Diisi!!");
                document.getElementById("password").focus();
            }
			return false;
        }
    }
</script>

<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/util.css">
	<link rel="stylesheet" type="text/css" href="assets/main.css">

<body id="home">
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="login.php">
					<span class="login100-form-title p-b-32">
						Masuk
					</span>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="email" name="email" id="email" autofocus/>
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" id="password" >
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" Onclick="return validasi()">
							Masuk
                        </button>
                
                        <a class="login100-form-btn" href="register.php">Daftar</a>
                    </div>
                </form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
</body>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/main.js"></script>
<!-- header -->

