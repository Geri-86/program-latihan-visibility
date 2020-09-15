<?php
//muhamad geri ramdan
class produk{
  public $namamakanan, 
         $merk;
         protected $diskon;
         private $harga;

  public function getCetak(){
    return "$this->namamakanan $this->merk  (Rp $this->harga)";
  }
  public function __construct($namamakanan="nama barang", $merk="merk", $harga=0, $beratroti="berat roti", $kapasitas="kapasitas"){
    $this->namamaknan = $namamakanan;
    $this->merk=$merk;
    $this->harga=$harga;
    $this->beratroti=$beratroti;
    $this->kapasitas=$kapasitas;
  }

    public function cetakInfo(){
        $str="{$this->namamakanan}, {$this->getCetak()}";
        return $str;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
}

class makanan extends produk{
    public $beratroti;
    public function __construct($namamakanan, $merk, $harga, $beratroti){
        parent::__construct($namamakanan, $merk, $harga);
        $this->beratroti=$beratroti;
    }
    public function cetakInfo(){
        $str="makanan: ".parent::getCetak()." | berat roti: {$this->beratroti}";
        return $str;
    }
    public function setDiskon($diskon){
        $this->diskon=$diskon;
    }
}

class alatmakan extends produk{
    public $kapasitas;
    public function __construct($namamakanan, $merk, $harga, $kapasitas){
        parent::__construct($namamakanan, $merk, $harga);
        $this->kapasitas=$kapasitas;
    }
    public function cetakInfo(){
        $str="alat makan:  ".parent::getCetak()." | Kapasitas: {$this->kapasitas}";
        return $str;
    }
}

$produk1 = new makanan("roti","shandwich",10000,"40 gram");
$produk2 = new alatmakan("tempat makan","tupperware",150000,"500mill");


echo $produk1->cetakInfo();
echo "<br>";
echo $produk2->cetakInfo();
echo "<br>";
echo "<hr>";
$produk1->setDiskon(20);
echo $produk1->getHarga();