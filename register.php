<?php include 'header.php';?>
<?php
if(isset($_POST['submit']))
{	
    require_once "config.php";

    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $nohp = mysqli_real_escape_string($con, $_POST['nohp']);
    $noktp = mysqli_real_escape_string($con, $_POST['noktp']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));
    
    mysqli_query($con, "INSERT INTO tbl_pelanggan (nama, jenis_kelamin, no_tlp, email, password, no_ktp) VALUES 
    ('".$nama."','".$gender."','".$nohp."','".$email."','".$password."','".$noktp."')");

    echo "<script>alert('Register Berhasil!!!');
    window.location.href = 'login.php';</script>";
}
?>
<script type="text/javascript">
    function validasi()
    {
        var email = document.getElementById("email").value;
        var nama = document.getElementById("nama").value;
        var nohp = document.getElementById("nohp").value;
        var noktp = document.getElementById("noktp").value;
        var gender = document.getElementById("gender").value;
        var password = document.getElementById("password").value;

        if (email != "" && password != "" && nama != "" && nohp != "" && noktp != "" && gender != "") {
			return true;
		}else{
			alert('Anda harus mengisi data dengan lengkap !');
            return false;
		}
    }
</script>
<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-5 col-md-4">
<h3>Register</h3>
    <form role="form" class="wowload fadeInRight" method="POST" action="register.php">
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Name" name="nama" id="nama" autofocus/>
        </div>
        <div class="form-group">
            <input type="email" class="form-control"  placeholder="Email" name="email" id="email">
        </div>
        <div class="form-group">
            <input type="Phone" class="form-control"  placeholder="Phone" name="nohp" id="nohp">
        </div>        
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="No KTP" name="noktp" id="noktp">
        </div>   
        <div class="form-group">
            <input type="password" class="form-control"  placeholder="Password" name="password" id="password">
        </div> 
        <div class="form-group">
            <div class="row">
            <div class="col-xs-6">
            <select class="form-control" name="gender" id="gender">
              <option value="laki-laki">Laki-laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
            </div>        
           </div>
        </div>
        <button class="btn btn-default" name="submit" Onclick="return validasi()">Daftar</button>
    </form>    
</div>
</div>  
</div>
</div>
<!-- reservation-information -->

<!-- services -->
<div class="spacer services wowload fadeInUp">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/8.jpg" class="img-responsive" alt="slide"></div>                
                <div class="item  height-full"><img src="images/photos/9.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/10.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Rooms<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="TourCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/6.jpg" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/3.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/4.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Tour Packages<a href="gallery.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="FoodCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/1.jpg" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/2.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/5.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Food and Drinks<a href="gallery.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>
    </div>
</div>
</div>
<!-- services -->


<?php include 'footer.php';?>