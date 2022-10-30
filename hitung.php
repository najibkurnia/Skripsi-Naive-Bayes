<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Penilaian kinerja karyawan menggunakan Metode Naïve Bayes</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
  <link href="bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Semantic here -->
  <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/semantic.min.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="utama.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>


     
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Admin</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="dataset.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Training</span></a>
      </li>
      <div class="sidebar-heading">
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="hitung.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Hitung Naive</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="hasil.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Hasil Naive</span></a>
      </li>

<!--
      <div class="sidebar-heading">
        Laporan
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="laporan.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan Naive</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                </br>
                </br>
                <!-- Style custom -->
                <style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Perhitungan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    </head>table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
    }

    td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
    </style>
<?php
  include 'koneksi.php';
  if(isset($_POST['simpan'])){
    $no=$_POST['id_hasil'];
    $umur=$_POST['nama'];
    $jk=$_POST['pendidikan_terakhir'];
    $disiplin=$_POST['disiplin'];
    $teamwork=$_POST['teamwork'];
    $leadership=$_POST['leadership'];
    $kepatuhan=$_POST['kepatuhan'];
    $kejujuran=$_POST['kejujuran'];
    $inisiatif=$_POST['inisiatif'];

//         //naive_bayes

// $totalbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Baik'")->num_rows;
// $totalnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal'")->num_rows;
// $totalkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang'")->num_rows;
// $totalData = $koneksi->query("SELECT * FROM data_train")->num_rows;

//  // disiplin

//      //baik

//  $totaldisiplinbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and disiplin = '$disiplin'")->num_rows;

//      //normal

//  $totaldisiplinnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and disiplin = '$disiplin'")->num_rows;
  
//     //kurang

//  $totaldisiplinkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and disiplin = '$disiplin'")->num_rows;


//  // teamwork

//      //baik

//  $totalteamworkbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and teamwork = '$teamwork'")->num_rows;

//      //normal

//  $totalteamworknormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and teamwork = '$teamwork'")->num_rows;
  
//     //kurang

//  $totalteamworkkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and teamwork = '$teamwork'")->num_rows;

//  // leadership

//      //baik

//  $totalleadershipbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and leadership = '$leadership'")->num_rows;

//      //normal

//  $totalleadershipnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and leadership = '$leadership'")->num_rows;
  
//     //kurang

//  $totalleadershipkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and leadership = '$leadership'")->num_rows;

//  // kepatuhan

//      //baik

//  $totalkepatuhanbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and kepatuhan = '$kepatuhan'")->num_rows;

//      //normal

//  $totalkepatuhannormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and kepatuhan = '$kepatuhan'")->num_rows;
  
//     //kurang

//  $totalkepatuhankurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and kepatuhan = '$kepatuhan'")->num_rows;

//  // kejujuran

//      //baik

//  $totalkejujuranbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and kejujuran = '$kejujuran'")->num_rows;

//      //normal

//  $totalkejujurannormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and kejujuran = '$kejujuran'")->num_rows;
  
//     //kurang

//  $totalkejujurankurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and kejujuran = '$kejujuran'")->num_rows;

//  // inisiatif

//      //baik

//  $totalinisiatifbaik = $koneksi->query("SELECT * FROM data_train WHERE hasil_status ='Baik' and inisiatif = '$inisiatif'")->num_rows;

//      //normal

//  $totalinisiatifnormal = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Normal' and inisiatif = '$inisiatif'")->num_rows;
  
//     //kurang

//  $totalinisiatifkurang = $koneksi->query("SELECT * FROM data_train WHERE hasil_status='Kurang' and inisiatif = '$inisiatif'")->num_rows;

  
// //PROBABILITY + laplace

// //disiplin

// $PROBdisiplinbaik  = (($totaldisiplinbaik  + 1) /($totalbaik  + 3));
// $PROBdisiplinnormal  = (($totaldisiplinnormal  + 1) /($totalnormal  + 3));
// $PROBdisiplinkurang  = (($totaldisiplinkurang  + 1) /($totalkurang  + 3));

// //teamwork

// $PROBteamworkbaik  = (($totalteamworkbaik  + 1) /($totalbaik  + 3));
// $PROBteamworknormal  = (($totalteamworknormal  + 1) /($totalnormal  + 3));
// $PROBteamworkkurang  = (($totalteamworkkurang  + 1) /($totalkurang  + 3));

// //leadership

// $PROBleadershipbaik  = (($totalleadershipbaik  + 1) /($totalbaik  + 3));
// $PROBleadershipnormal  = (($totalleadershipnormal  + 1) /($totalnormal  + 3));
// $PROBleadershipkurang  = (($totalleadershipkurang  + 1) /($totalkurang  + 3));

// //kepatuhan

// $PROBkepatuhanbaik  = (($totalkepatuhanbaik  + 1) /($totalbaik  + 3));
// $PROBkepatuhannormal  = (($totalkepatuhannormal  + 1) /($totalnormal  + 3));
// $PROBkepatuhankurang  = (($totalkepatuhankurang  + 1) /($totalkurang  + 3));

// //kejujuran

// $PROBkejujuranbaik  = (($totalkejujuranbaik  + 1) /($totalbaik  + 3));
// $PROBkejujurannormal  = (($totalkejujurannormal  + 1) /($totalnormal  + 3));
// $PROBkejujurankurang  = (($totalkejujurankurang  + 1) /($totalkurang  + 3));

// //inisiatif

// $PROBinisiatifbaik  = (($totalinisiatifbaik  + 1) /($totalbaik  + 3));
// $PROBinisiatifnormal  = (($totalinisiatifnormal  + 1) /($totalnormal  + 3));
// $PROBinisiatifkurang  = (($totalinisiatifkurang  + 1) /($totalkurang  + 3));

// //prediksi

// $baik1 = $PROBdisiplinbaik * $PROBteamworkbaik* $PROBleadershipbaik  * $PROBkepatuhanbaik   * $PROBkejujuranbaik   * $PROBinisiatifbaik;

// $baik = number_format((float) $baik1 * ($totalbaik/$totalData), 5, '.', '');


// $normal1 = $PROBdisiplinnormal   *$PROBteamworknormal  * $PROBleadershipnormal  * $PROBkepatuhannormal   * $PROBkejujurannormal   * $PROBinisiatifnormal;

// $normal = number_format((float) $normal1 * ($totalnormal/$totalData), 5, '.', '');


// $kurang1 = $PROBdisiplinkurang * $PROBteamworkkurang* $PROBleadershipkurang  * $PROBkepatuhankurang   * $PROBkejujurankurang   * $PROBinisiatifkurang;

// $kurang = number_format((float) $kurang1 * ($totalkurang/$totalData), 5, '.', '');



// //membandingkan

// if($ada >= $sehat){
// $ketp = "Ada";
// $bobot = $ada;
// }
// else{
// $ketp = "Tidak Ada";
// $bobot = $sehat;
// }

// //confusion matrix

// if($ket == "Tidak Ada" && $ketp == "Tidak Ada"){
// $cm = "TP";
// }
// elseif($ket == "Tidak Ada" && $ketp == "Ada"){
// $cm = "FN";
// }
// elseif($ket == "Ada" && $ketp == "Tidak Ada"){
// $cm = "FP";
// }
// elseif($ket == "Ada" && $ketp == "Ada"){
// $cm = "TN";
// }
//INSERT
    $query=mysqli_query($koneksi, "INSERT INTO hasil_naive VALUES ('$no','$nama','$pendidikan_terakhir','$disiplin','$teamwork','$leadership','$kapatuhan','$kejujuran','$inisiatif')") or die(mysqli_error($koneksi));
     if($query):
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
        echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
      else:
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
        echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
      endif;             
  } ?>
    <table>
      <form action="proses-naive.php" method="post">
      
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <br><input type="text"placeholder="Nama lengkap" name="nama" />
                        </div>

                        <div class="form-group">
                          <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                          <select class="form-control" name="pendidikan_terakhir">
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="S1">Strata 1</option>
                          </select>
                        </div>
                        <input type="hidden" name="id_hasil" value="<?= date('dmY') ?>">
                        <div class="form-group">
                          <label for="disiplin">Disiplin</label>
                              <br><input type="number" name="disiplin1" />
                              <br><input type="number" name="disiplin2" />
                              <br><input type="number" name="disiplin3" />
                       </div>
        
                        <div class="form-group">
                          <label for="teamwork">Teamwork</label>
                              <br><input type="number" name="teamwork1" />
                              <br><input type="number" name="teamwork2" />
                              <br><input type="number" name="teamwork3" />
                        </div>

                        <div class="form-group">
                          <label for="leadership">Leadership</label>
                              <br><input type="number" name="leadership1" />
                              <br><input type="number" name="leadership2" />
                              <br><input type="number" name="leadership3" />
                        </div>

                        <div class="form-group">
                          <label for="kepatuhan">Kepatuhan</label>                     
                              <br><input type="number" name="kepatuhan1" />
                              <br><input type="number" name="kepatuhan2" />
                              <br><input type="number" name="kepatuhan3" />
                        </div>
        
                        <div class="form-group">
                          <label for="kejujuran">Kejujuran</label>
                              <br><input type="number" name="kejujuran1" />
                              <br><input type="number" name="kejujuran2" />
                              <br><input type="number" name="kejujuran3" />
                        </div>
                        <div class="form-group">
                          <label for="inisiatif">Inisiatif</label>
                              <br><input type="number" name="inisiatif1" />
                              <br><input type="number" name="inisiatif2" />
                              <br><input type="number" name="inisiatif3" />
                        </div>
                        <div class="modal-footer">
                           <button type="submit" name="simpan" class="btn btn-primary">Proses</button>
                        </div>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah kamu yakin ingin Keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="bootstrap/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="bootstrap/js/demo/datatables-demo.js"></script>



</body>

</html>
