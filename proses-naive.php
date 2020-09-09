<?php
include 'koneksi.php';

    $no=$_POST['id_hasil'];
    $nama=$_POST['nama'];
    $pendidikan_terakhir=$_POST['pendidikan_terakhir'];
    $disiplin=$_POST['disiplin'];
    $teamwork=$_POST['teamwork'];
    $leadership=$_POST['leadership'];
    $kepatuhan=$_POST['kepatuhan'];
    $kejujuran=$_POST['kejujuran'];
    $inisiatif=$_POST['inisiatif'];
    $hasil_status=$_POST['hasil_status'];

    $ratadisiplin = ($_POST['disiplin1'] + $_POST['disiplin2']+$_POST['disiplin3'])/3;
    if($ratadisiplin>=80){
      $hasildisiplin=">=80";
    }else if($ratadisiplin>=51){
      $hasildisiplin="51-79";
    }else{
      $hasildisiplin="<=50";
    }

    $ratateamwork = ($_POST['teamwork1'] + $_POST['teamwork2']+$_POST['teamwork3'])/3;
    if($ratateamwork>=80){
      $hasilteamwork=">=80";
    }else if($ratateamwork>=51){
      $hasilteamwork="51-79";
    }else{
      $hasilteamwork="<=50";
    }

    $rataleadership = ($_POST['leadership1'] + $_POST['leadership2']+$_POST['leadership3'])/3;
    if($rataleadership>=80){
      $hasilleadership=">=80";
    }else if($rataleadership>=51){
      $hasilleadership="51-79";
    }else{
      $hasilleadership="<=50";
    }

    $ratakepatuhan = ($_POST['kepatuhan1'] + $_POST['kepatuhan2']+$_POST['kepatuhan3'])/3;
    if($ratakepatuhan>=80){
      $hasilkepatuhan=">=80";
    }else if($ratakepatuhan>=51){
      $hasilkepatuhan="51-79";
    }else{
      $hasilkepatuhan="<=50";
    }

    $ratakejujuran = ($_POST['kejujuran1'] + $_POST['kejujuran2']+$_POST['kejujuran3'])/3;
    if($ratakejujuran>=80){
      $hasilkejujuran=">=80";
    }else if($ratakejujuran>=51){
      $hasilkejujuran="51-79";
    }else{
      $hasilkejujuran="<=50";
    }

    $ratainisiatif = ($_POST['inisiatif1'] + $_POST['inisiatif2']+$_POST['inisiatif3'])/3;
    if($ratainisiatif>=80){
      $hasilinisiatif=">=80";
    }else if($ratainisiatif>=51){
      $hasilinisiatif="51-79";
    }else{
      $hasilinisiatif="<=50";
    }
// mysqli_query($koneksi, "INSERT INTO hasil_naive (nama,pendidikan_terakhir,disiplin,teamwork,leadership,kepatuhan,kejujuran,inisiatif)
//  VALUES ('$nama','$pendidikan_terakhir','$hasildisiplin','$hasilteamwork','$hasilleadership','$hasilkepatuhan','$hasilkejujuran','$hasilinisiatif')");

        //naive_bayes

$totalbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Baik'")->num_rows;
$totalnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal'")->num_rows;
$totalkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang'")->num_rows;
$totalData = $koneksi->query("SELECT * FROM data_train")->num_rows;

 // disiplin

     //baik

 $totaldisiplinbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and disiplin ='$hasildisiplin'")->num_rows;

     //normal

 $totaldisiplinnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and disiplin ='$hasildisiplin'")->num_rows;
  
    //kurang

 $totaldisiplinkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and disiplin ='$hasildisiplin'")->num_rows;


 // teamwork

     //baik

 $totalteamworkbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and teamwork = '$hasilteamwork'")->num_rows;

     //normal

 $totalteamworknormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and teamwork ='$hasilteamwork'")->num_rows;
  
    //kurang

 $totalteamworkkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and teamwork = '$hasilteamwork'")->num_rows;

 // leadership

     //baik
     $totalleadershipbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and leadership = '$hasilleadership'")->num_rows;
     
     
     //normal

 $totalleadershipnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and leadership = '$hasilleadership'")->num_rows;
  
    //kurang

 $totalleadershipkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and  leadership ='$hasilleadership'")->num_rows;

 // kepatuhan

     //baik

 $totalkepatuhanbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and kepatuhan = '$hasilkepatuhan'")->num_rows;

     //normal

 $totalkepatuhannormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and kepatuhan ='$hasilkepatuhan'")->num_rows;
  
    //kurang

 $totalkepatuhankurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and kepatuhan ='$hasilkepatuhan'")->num_rows;

 // kejujuran

     //baik

 $totalkejujuranbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and kejujuran ='$hasilkejujuran'")->num_rows;

     //normal

 $totalkejujurannormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and kejujuran ='$hasilkejujuran'")->num_rows;
  
    //kurang

 $totalkejujurankurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and kejujuran ='$hasilkejujuran'")->num_rows;

 // inisiatif

     //baik

 $totalinisiatifbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and inisiatif ='$hasilinisiatif'")->num_rows;

     //normal

 $totalinisiatifnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and inisiatif ='$hasilinisiatif'")->num_rows;
  
    //kurang

 $totalinisiatifkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and inisiatif = '$hasilinisiatif'")->num_rows;

  
//PROBABILITY + laplace

//disiplin

$PROBdisiplinbaik  = (($totaldisiplinbaik  ) /($totalbaik));
$PROBdisiplinnormal  = (($totaldisiplinnormal) /($totalnormal ));
$PROBdisiplinkurang  = (($totaldisiplinkurang) /($totalkurang));

//teamwork

$PROBteamworkbaik  = (($totalteamworkbaik) /($totalbaik));
$PROBteamworknormal  = (($totalteamworknormal) /($totalnormal));
$PROBteamworkkurang  = (($totalteamworkkurang) /($totalkurang));

//leadership

$PROBleadershipbaik  = (($totalleadershipbaik) /($totalbaik  ));
$PROBleadershipnormal  = (($totalleadershipnormal ) /($totalnormal  ));
$PROBleadershipkurang  = (($totalleadershipkurang ) /($totalkurang  ));

//kepatuhan

$PROBkepatuhanbaik  = (($totalkepatuhanbaik  ) /($totalbaik ));
$PROBkepatuhannormal  = (($totalkepatuhannormal  ) /($totalnormal  ));
$PROBkepatuhankurang  = (($totalkepatuhankurang  ) /($totalkurang  ));

//kejujuran

$PROBkejujuranbaik  = (($totalkejujuranbaik  ) /($totalbaik));
$PROBkejujurannormal  = (($totalkejujurannormal) /($totalnormal));
$PROBkejujurankurang  = (($totalkejujurankurang) /($totalkurang));

//inisiatif

$PROBinisiatifbaik  = (($totalinisiatifbaik ) /($totalbaik ));
$PROBinisiatifnormal  = (($totalinisiatifnormal ) /($totalnormal ));
$PROBinisiatifkurang  = (($totalinisiatifkurang ) /($totalkurang ));

//prediksi

$baik1 = $PROBdisiplinbaik * $PROBteamworkbaik* $PROBleadershipbaik  * $PROBkepatuhanbaik   * $PROBkejujuranbaik   * $PROBinisiatifbaik;

$baik =  $baik1 * ($totalbaik/$totalData);


$normal1 = $PROBdisiplinnormal   *$PROBteamworknormal  * $PROBleadershipnormal  * $PROBkepatuhannormal   * $PROBkejujurannormal   * $PROBinisiatifnormal;

$normal =  $normal1 * ($totalnormal/$totalData);


$kurang1 = $PROBdisiplinkurang * $PROBteamworkkurang* $PROBleadershipkurang  * $PROBkepatuhankurang   * $PROBkejujurankurang   * $PROBinisiatifkurang;

$kurang =  $kurang1 * ($totalkurang/$totalData);

 
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
     $query=mysqli_query($koneksi, "INSERT INTO hasil_naive VALUES ('$no','$nama','$pendidikan_terakhir','$hasildisiplin','$hasilteamwork','$hasilleadership','$hasilkepatuhan','$hasilkejujuran','$hasilinisiatif','$baik','$normal','$kurang')") or die(mysqli_error($koneksi));
      if($query):
         echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
         echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
       else:
         echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
         echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
       endif;   
header("location:tampil-naive.php");
?>