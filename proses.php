<?php
include 'koneksi.php';

    $no=$_POST['id_hasil'];
    $umur=$_POST['nama'];
    $jk=$_POST['pendidikan_terakhir'];
    $disiplin=$_POST['disiplin'];
    $teamwork=$_POST['teamwork'];
    $leadership=$_POST['leadership'];
    $kepatuhan=$_POST['kepatuhan'];
    $kejujuran=$_POST['kejujuran'];
    $inisiatif=$_POST['inisiatif'];

        //naive_bayes

$totalbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Baik'")->num_rows;
$totalnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal'")->num_rows;
$totalkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang'")->num_rows;
$totalData = $koneksi->query("SELECT * FROM data_train")->num_rows;

 // disiplin

     //baik

 $totaldisiplinbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and disiplin = '$disiplin'")->num_rows;

     //normal

 $totaldisiplinnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and disiplin = '$disiplin'")->num_rows;
  
    //kurang

 $totaldisiplinkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and disiplin = '$disiplin'")->num_rows;


 // teamwork

     //baik

 $totalteamworkbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and teamwork = '$teamwork'")->num_rows;

     //normal

 $totalteamworknormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and teamwork = '$teamwork'")->num_rows;
  
    //kurang

 $totalteamworkkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and teamwork = '$teamwork'")->num_rows;

 // leadership

     //baik

 $totalleadershipbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and leadership = '$leadership'")->num_rows;

     //normal

 $totalleadershipnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and leadership = '$leadership'")->num_rows;
  
    //kurang

 $totalleadershipkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and leadership = '$leadership'")->num_rows;

 // kepatuhan

     //baik

 $totalkepatuhanbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and kepatuhan = '$kepatuhan'")->num_rows;

     //normal

 $totalkepatuhannormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and kepatuhan = '$kepatuhan'")->num_rows;
  
    //kurang

 $totalkepatuhankurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and kepatuhan = '$kepatuhan'")->num_rows;

 // kejujuran

     //baik

 $totalkejujuranbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and kejujuran = '$kejujuran'")->num_rows;

     //normal

 $totalkejujurannormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and kejujuran = '$kejujuran'")->num_rows;
  
    //kurang

 $totalkejujurankurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and kejujuran = '$kejujuran'")->num_rows;

 // inisiatif

     //baik

 $totalinisiatifbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and inisiatif = '$inisiatif'")->num_rows;

     //normal

 $totalinisiatifnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and inisiatif = '$inisiatif'")->num_rows;
  
    //kurang

 $totalinisiatifkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and inisiatif = '$inisiatif'")->num_rows;

  
//PROBABILITY + laplace

//disiplin

$PROBdisiplinbaik  = (($totaldisiplinbaik  + 1) /($totalbaik  + 3));
$PROBdisiplinnormal  = (($totaldisiplinnormal  + 1) /($totalnormal  + 3));
$PROBdisiplinkurang  = (($totaldisiplinkurang  + 1) /($totalkurang  + 3));

//teamwork

$PROBteamworkbaik  = (($totalteamworkbaik  + 1) /($totalbaik  + 3));
$PROBteamworknormal  = (($totalteamworknormal  + 1) /($totalnormal  + 3));
$PROBteamworkkurang  = (($totalteamworkkurang  + 1) /($totalkurang  + 3));

//leadership

$PROBleadershipbaik  = (($totalleadershipbaik  + 1) /($totalbaik  + 3));
$PROBleadershipnormal  = (($totalleadershipnormal  + 1) /($totalnormal  + 3));
$PROBleadershipkurang  = (($totalleadershipkurang  + 1) /($totalkurang  + 3));

//kepatuhan

$PROBkepatuhanbaik  = (($totalkepatuhanbaik  + 1) /($totalbaik  + 3));
$PROBkepatuhannormal  = (($totalkepatuhannormal  + 1) /($totalnormal  + 3));
$PROBkepatuhankurang  = (($totalkepatuhankurang  + 1) /($totalkurang  + 3));

//kejujuran

$PROBkejujuranbaik  = (($totalkejujuranbaik  + 1) /($totalbaik  + 3));
$PROBkejujurannormal  = (($totalkejujurannormal  + 1) /($totalnormal  + 3));
$PROBkejujurankurang  = (($totalkejujurankurang  + 1) /($totalkurang  + 3));

//inisiatif

$PROBinisiatifbaik  = (($totalinisiatifbaik  + 1) /($totalbaik  + 3));
$PROBinisiatifnormal  = (($totalinisiatifnormal  + 1) /($totalnormal  + 3));
$PROBinisiatifkurang  = (($totalinisiatifkurang  + 1) /($totalkurang  + 3));

//prediksi

$baik1 = $PROBdisiplinbaik * $PROBteamworkbaik* $PROBleadershipbaik  * $PROBkepatuhanbaik   * $PROBkejujuranbaik   * $PROBinisiatifbaik;

$baik = number_format((float) $baik1 * ($totalbaik/$totalData), 5, '.', '');


$normal1 = $PROBdisiplinnormal   *$PROBteamworknormal  * $PROBleadershipnormal  * $PROBkepatuhannormal   * $PROBkejujurannormal   * $PROBinisiatifnormal;

$normal = number_format((float) $normal1 * ($totalnormal/$totalData), 5, '.', '');


$kurang1 = $PROBdisiplinkurang * $PROBteamworkkurang* $PROBleadershipkurang  * $PROBkepatuhankurang   * $PROBkejujurankurang   * $PROBinisiatifkurang;

$kurang = number_format((float) $kurang1 * ($totalkurang/$totalData), 5, '.', '');


//membandingkan

//if($ada >= $sehat){
//$ketp = "Ada";
//$bobot = $ada;
//}
//else{
//$ketp = "Tidak Ada";
//$bobot = $sehat;
//}

//confusion matrix

//if($ket == "Tidak Ada" && $ketp == "Tidak Ada"){
//$cm = "TP";
//}
//elseif($ket == "Tidak Ada" && $ketp == "Ada"){
//$cm = "FN";
//}
//elseif($ket == "Ada" && $ketp == "Tidak Ada"){
//$cm = "FP";
//}
//elseif($ket == "Ada" && $ketp == "Ada"){
//$cm = "TN";
//}
//INSERT
    $query=mysqli_query($koneksi, "INSERT INTO hasil_naive VALUES ('$umur','$jk','$nyeri','$darah','$koles','$gula','$elektro','$jantung','$angina','$oldpeak','$segmen','$pembulu','$thalas','$sehat','$ada')") or die(mysqli_error($koneksi));
     if($query):
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
        echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
      else:
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
        echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
      endif;             

  header("location:tampil-naive.php");
  ?>