<?php
//Tahap 1 : Menghitung Jumlah Class/Label
$tidak = mysqli_query($koneksi, "SELECT COUNT(*) AS tidak FROM data_train WHERE ket='Tidak Ada'") or die (mysql_error());
$h_tidak = mysqli_fetch_array($tidak);

$ada = mysqli_query($koneksi, "SELECT COUNT(*) AS ada FROM data_train WHERE ket='Ada'") or die (mysql_error());
$h_ada = mysqli_fetch_array($ada);
?>