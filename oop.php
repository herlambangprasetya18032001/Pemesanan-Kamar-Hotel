<?php 

class Introduction{
    
    protected $harga; 
    protected $fasilitas;
    public $intro;  
    function __construct($intro,$fasilitas,$harga){
        $this->intro = $intro;
        $this->fasilitas = $fasilitas;
        $this->harga = $harga;
    }

    
    function cek(){
        return '<script>alert(" cek masuk ")</script>';
    }


    function tampil(){
        return "Room dengan harga : $this->harga , fasilitasnya sebagai berikut : $fasilitas";
    }
}


class StandardRoom extends Introduction {
    private $standard; 
    function __construct($standard){
        $this->standard = $standard;
    }


    function khususStandard(){
        return " $this->standard  jenis tipe yang di sukai banyak kalangan remaja";
    }


    public function tampilStandard(){
     echo '<script>alert(" SEPERTI NAMANYA JENIS KAMAR STANDARD ROOM ADALAH TIPE KAMAR HOTEL YANG PALING DASAR PADA HOTEL")</script>';
    }
}

class SuperiorRoom extends Introduction {
    private $view; 

    function __construct($view){
        $this->view = $view;
    }

     
   public function superior(){
      return '<script>alert(" PADA DASARNYA SUPERRIORROOM ADALAH TIPE KAMAR YANG SEDIKIT LEBIH BAIK DARI IIPE STANDARD ROOM")</script>';
    }
}


class DeluxeRoom extends Introduction {
   
  
    public function deluxeRoom(){
      return '<script>alert(" DI ATAS TIPE KAMAR HOTEL SUPERIOR ROOM ADALAH DELUXE ROOM KAMAR INI TENTU MEMILIKI KAMAR YANG LEBIH BESAR")</script>';
    }
}

class JuniorRoom extends Introduction {
    private $junior;
    private $suiteroom; 


      
    function __construct($junior,$suiteroom){
        $this->junior = $junior;
        $this->suit = $suiteroom;

    }
      
    function room(){
        return " $this->suit adalah kamar termewah kedua";
    }

    public function outputRoom(){
      return '<script>alert(" SEPERTI NAMANYA JENIS KAMAR STANDARD ROOM ADALAH TIPE KAMAR HOTEL YANG PALING DASAR PADA HOTEL")</script>';
    }
}

class SingleRoom extends Introduction {
    private $interior; 
    private $fix;
    private $termahal;

    function __construct($interior,$fix,$termahal){
        $this->interior = $interior;
        $this->fix = $fix;
        $this->mahal= $termahal;

    }
   
    function interirorSigleRoon(){
        return "$this->interior jenis tipe yang termahal dan $this->fix dengan biaya $this->mahal";
    }
 
   public  function single(){
      return '<script>alert(" SIGLE ROOM ADALAH TIPE KAMAR HOTEL YANG PALING UMUM . TIPE KAMAR HOTEL INI TERDIRI DARI SATU SINGLE BED , SOFA, DAN KAMAR MANDI , UKURAN KAMARNYA JUGA TIDAK TERLALU BESAR")</script>';
    }
}




?>