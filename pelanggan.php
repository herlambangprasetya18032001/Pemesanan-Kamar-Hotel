<?php include 'header.php';?>
<?php
    
    if (@$_GET['aksi'] == "batal")
	{
		require_once "config.php";
        @$id = $_GET['id'];
        @$jumlah = $_GET['jumlah'];
        @$id_kamar = $_GET['idkamar'];
        
        $kamar = mysqli_query($con, "SELECT tbl_kamar.`jumlah_kamar` FROM tbl_kamar WHERE id='$id_kamar'");
        $datakamar = mysqli_fetch_array($kamar);
        $sisakamar = $datakamar[0];
        $batal = mysqli_query($con, "DELETE FROM `tbl_booking` WHERE id='$id'");
        
        $sisa=$jumlah+$sisakamar;
        var_dump($sisakamar);
		if($batal == true){
            $upstok= mysqli_query($con, "UPDATE tbl_kamar SET jumlah_kamar='$sisa' WHERE id='$id_kamar'");
            echo "<script>alert('Pembatalan Berhasil!!!');
            window.location.href = 'pelanggan.php';</script>";
        }
		else{echo "<script>alert('Pembatalan Gagal!!!');
            window.location.href = 'pelanggan.php';</script>";
        }
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
<div class="">
<h3>Hai <?php echo $nama;?>, Ini Pemesanan Kamu</h3>
    <form role="form" class="wowload fadeInRight" method="POST" action="register.php">
        <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Pemesanan</th>
                        <th>Atas Nama</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Jumlah Kamar</th>
                        <th>Kebutuhan Tambahan</th>
                        <th>Email</th>
                        <th>No Tlp</th>
                        <th>Total Bayar</th>
                        <th>Statu</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php 
					 require_once "config.php";
					 $pemesanan = mysqli_query($con, "SELECT tbl_booking.`id`,tbl_booking.`id_kamar`,tbl_booking.`totalbayar`,tbl_booking.`checkin`,tbl_booking.`checkout`,
                                                tbl_booking.`jumlah_kamar`,tbl_booking.`Kebutuhan_tambahan`,tbl_booking.`email`,tbl_booking.`notlp`,
                                                tbl_booking.`status` FROM tbl_booking WHERE id_pelanggan='".$id."'");
					 $no =1;
            while ($data = mysqli_fetch_assoc($pemesanan)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>                  
                        <td><?php echo $data['id']; ?></td>
                        <td style="display:none;"><?php echo $data['id_kamar']; ?></td>  
						<td><?php echo $nama;?></td>
						<td><?php echo $data['checkin']; ?></td> 
						<td><?php echo $data['checkout']; ?></td>
						<td><?php echo $data['jumlah_kamar']; ?></td>
                        <td><?php echo $data['Kebutuhan_tambahan']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['notlp']; ?></td>
                        <td><?php echo $data['totalbayar']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td><a href="pelanggan.php?aksi=batal&id=<?php echo $data['id'];?>&jumlah=<?php echo $data['jumlah_kamar'];?>&idkamar=<?php echo $data['id_kamar'];?>"
                        onclick="return confirm('Apakah anda yakin?')">Batal</a></td>
					</tr>
					<?php               
				  }
				mysqli_free_result($pemesanan);
			  ?>
                    </tbody>
                  </table>
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