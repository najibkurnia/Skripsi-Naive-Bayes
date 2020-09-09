<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Penilaian Kinerja Karyawan menggunakan Metode Naïve Bayes</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
  <link href="bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="bootstrap/pagination.css" rel="stylesheet">

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

    
    
    <!-- Modal Aksi -->
  <?php
  include 'koneksi.php';
  if(isset($_POST['simpan'])){
    // $no=$_POST['id_train'];
   
    $nama=$_POST['nama'];
    $pendidikan_terakhir=$_POST['pendidikan_terakhir'];
    $disiplin=$_POST['disiplin'];
    $teamwork=$_POST['teamwork'];
    $leadership=$_POST['leadership'];
    $kepatuhan=$_POST['kepatuhan'];
    $kejujuran=$_POST['kejujuran'];
    $inisiatif=$_POST['inisiatif'];
    $status=$_POST['hasil_status'];
    $query=mysqli_query($koneksi, "INSERT INTO data_train (nama,pendidikan_terakhir,disiplin,teamwork,leadership,kepatuhan,kejujuran, inisiatif, hasil_status) VALUES ('$nama','$pendidikan_terakhir','$disiplin','$teamwork','$leadership','$kepatuhan','$kejujuran','$inisiatif','$status')");
     if($query):
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
        echo '<meta http-equiv="Refresh" content="0; URL=dataset.php">';
      else:
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
        echo '<meta http-equiv="Refresh" content="0; URL=dataset.php">';
      endif;             
  }elseif(isset($_POST['update'])){
    $no=$_POST['id_train'];
    $nama=$_POST['nama'];
    $pendidikan_terakhir=$_POST['pendidikan_terakhir'];
    $disiplin=$_POST['disiplin'];
    $teamwork=$_POST['teamwork'];
    $leadership=$_POST['leadership'];
    $kepatuhan=$_POST['kepatuhan'];
    $kejujuran=$_POST['kejujuran'];
    $inisiatif=$_POST['inisiatif'];
    $status=$_POST['hasil_status'];
    $query=mysqli_query($koneksi, "UPDATE data_train SET nama='$nama',pendidikan_terakhir='$pendidikan_terakhir'
    ,disiplin='$disiplin',teamwork='$teamwork',leadership='$leadership',kepatuhan='$kepatuhan',kejujuran='$kejujuran'
    ,inisiatif='$inisiatif',hasil_status='$status' WHERE id_train='$no'") or die(mysql_error());
     if($query):
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
        echo '<meta http-equiv="Refresh" content="0; URL=dataset.php">';
      else:
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
        echo '<meta http-equiv="Refresh" content="0; URL=dataset.php">';
      endif;
  }elseif(isset($_POST['hapus'])){
    $no=$_POST['id_train'];
    $query=mysqli_query($koneksi,"DELETE FROM data_train WHERE id_train='$no'") or die(mysql_error());
     if($query):
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di hapus!', 'success');</script>" ;
        echo '<meta http-equiv="Refresh" content="0; URL=dataset.php">';
      else:
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
        echo '<meta http-equiv="Refresh" content="0; URL=dataset.php">';
      endif;
  }

  //insert excel
  require_once('vendor/php-excel-reader/excel_reader2.php');
  require_once('vendor/SpreadsheetReader.php');
  
  if (isset($_POST["import"]))
  {
      
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){
  
          $targetPath = 'uploads/'.$_FILES['file']['name'];
          move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
          $Reader = new SpreadsheetReader($targetPath);
          
          $sheetCount = count($Reader->sheets());
          for($i=0;$i<$sheetCount;$i++)
          {
              
              $Reader->ChangeSheet($i);
              
              foreach ($Reader as $Row)
              {
            
                  $nama = "";
                  if(isset($Row[1])) {
                      $nama = mysqli_real_escape_string($koneksi,$Row[1]);
                  }
                  
                  $pendidikan_terakhir = "";
                  if(isset($Row[2])) {
                      $pendidikan_terakhir = mysqli_real_escape_string($koneksi,$Row[2]);
                  }
                  $disiplin = "";
                  if(isset($Row[3])) {
                      $disiplin = mysqli_real_escape_string($koneksi,$Row[3]);
                  }
                  
                  $teamwork = "";
                  if(isset($Row[4])) {
                      $teamwork = mysqli_real_escape_string($koneksi,$Row[4]);
                  }
                  $leadership = "";
                  if(isset($Row[5])) {
                      $leadership = mysqli_real_escape_string($koneksi,$Row[5]);
                  }
                  
                  $kepatuhan = "";
                  if(isset($Row[6])) {
                      $kepatuhan = mysqli_real_escape_string($koneksi,$Row[6]);
                  }
                  $kejujuran = "";
                  if(isset($Row[7])) {
                      $kejujuran = mysqli_real_escape_string($koneksi,$Row[7]);
                  }

                  $inisiatif = "";
                  if(isset($Row[8])) {
                      $inisiatif = mysqli_real_escape_string($koneksi,$Row[8]);
                  }
                  
                  $status = "";
                  if(isset($Row[9])) {
                      $status = mysqli_real_escape_string($koneksi,$Row[9]);
                  }
                                   
                  if (!empty($nama) || !empty($pendidikan_terakhir) || !empty($disiplin) || !empty($teamwork) || !empty($leadership) 
                  || !empty($kepatuhan) || !empty($kejujuran) || !empty($inisiatif) || !empty($status)) {
                      
                  
                      $sql = "INSERT INTO data_train (nama, pendidikan_terakhir, disiplin, teamwork, leadership, kepatuhan, kejujuran, inisiatif, hasil_status) VALUES
                   ('".$nama."','".$pendidikan_terakhir."','".$disiplin."','".$teamwork."','".$leadership."','".$kepatuhan."','".$kejujuran."','".$inisiatif."','".$status."')";
                    if(!$koneksi->query($sql)){
                       echo $koneksi->error;
                       die();
                     }
                   //  header("location:datatesting.php");
                  }
               }
          
           }
    }
    else
    { 
          $type = "error";
          $message = "Invalid File Type. Upload Excel File.";
    }
  }
  ?>
  <!-- Tutup Modal Aksi -->

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
            <div class="card-header py-3">
            <!-- Modal Export Excel -->
            <div class="card" >
  <div class="card-body">
    <h5 class="card-title">Import dari Excel</h5>
    <h6 class="card-subtitle mb-2 text-muted">Pilih Excel</h6>
    <p class="card-text">
    Kolom A = No.
    Kolom B = Nama.
    Kolom C = Pendidikan Terakhir.
    Kolom D = Disiplin.
    Kolom E = Teamwork.
    Kolom F = Leadership.
    Kolom G = Kepatuhan.
    Kolom H = Kejujuran.
    Kolom I = Inisiatif.
    Kolom J = Status.</p>
    <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
    <input type="file" name="file"
                    id="file" accept=".xls">
                    <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
                    </form> <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
    
  </div>
</div>
            <!-- Modal Tambah -->
            <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm' data-toggle="modal" data-target="#myModal"><span aria-hidden="true"></span>Tambah Data</button>
              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST" role="form">
                        <div class="form-group">
                          <?php
                          include "koneksi.php";
                          $amil1 = mysqli_query($koneksi, "SELECT count(*) AS hasil FROM data_train") or die(mysql_error());
                          $no = mysqli_fetch_array($amil1);
                          $noBaru = $no['hasil'] + 1;
                          ?>
                          <!--<label for="no_train">No Train</label>
                          <input type="text" name="no_train" class="form-control" value="<--?php echo $noBaru; ?>" readonly=""> -->
                        </div>
                        <div class="form-group">
                          <label for="nama">Nama</label><br>
                          <input type="text" name="nama" />
                        </div>
                        <div class="form-group">
                          <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                          <select class="form-control" name="pendidikan_terakhir">
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="S1">Strata 1</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="disiplin">Disiplin</label>
                          <select class="form-control" name="disiplin">
                            <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="teamwork">Teamwork</label>
                          <select class="form-control" name="teamwork">
                          <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="leadership">Leadership</label>
                          <select class="form-control" name="leadership">
                          <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="kepatuhan">Kepatuhan</label>
                          <select class="form-control" name="kepatuhan">
                           <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="kejujuran">Kejujuran</label>
                          <select class="form-control" name="kejujuran">
                            <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="inisiatif">Inisiatif</label>
                          <select class="form-control" name="inisiatif">
                            <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="hasil_status">Status</label>
                          <select class="form-control" name="hasil_status">
                            <option value="Baik">Baik</option>
                            <option value="Normal">Normal</option>
                            <option value="Kurang">Kurang</option>
                          </select>
                        </div>
                        <div class="modal-footer">
                           <button type="reset" name="simpan" class="btn btn-primary">Reset</button>
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="submit" name="simpan" class="btn btn-primary">Tambah Data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Tutup Modal Tambah -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Disiplin</th>
                    <th>Teamwork</th>
                    <th>Leadership</th>
                    <th>Kepatuhan</th>
                    <th>Kejujuran</th>
                    <th>Inisiatif</th>
                    <th>Status</th>
                  </tr>
                  <?php
                  include 'koneksi.php';
                  $page = (isset($_GET['page']))? $_GET['page'] : 1;
                  $limit = 12;
                  $limit_start = ($page - 1) * $limit;
                  $sql = mysqli_query($koneksi, "SELECT * FROM data_train LIMIT ".$limit_start.",".$limit);
                  $no = $limit_start + 1;
                  while($data = mysqli_fetch_array($sql)){
                  ?>
                  <tbody>
                    <tr>
                      <td><?= $data['id_train'] ?></td>
                      <td><?= $data['nama'] ?></td>
                      <td><?= $data['pendidikan_terakhir'] ?></td>
                      <td><?= $data['disiplin'] ?></td>
                      <td><?= $data['teamwork'] ?></td>
                      <td><?= $data['leadership'] ?></td>
                      <td><?= $data['kepatuhan'] ?></td>
                      <td><?= $data['kejujuran'] ?></td>
                      <td><?= $data['inisiatif'] ?></td>
                      <td><?= $data['hasil_status'] ?></td>

                      <!-- aksi modal tombol edit -->
                      <td class="align-middle text-center">
                      <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' data-toggle="modal" data-target="#my<?php echo $data['id_train'];?>"><span aria-hidden="true"></span>Edit</button>
                      <div class="modal fade" id="my<?php echo $data['id_train'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                      <div class="modal-body">
                      <form action="" method="POST" role="form">
                        <div class="phAnimate">
                        <label for="id_train">No ID</label> 
                          <input name="id_train" class="form-control" placeholder="Input Id" value="<?php echo $data['id_train']; ?>" readonly="">
                        </div>
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" name="nama" />
                        </div>
                        <div class="phAnimate">
                          <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                          <select class="form-control" name="pendidikan_terakhir" value="<?php echo $data['pendidikan_terakhir']; ?>">
                          <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="S1">Strata 1</option>                          
                          </select>
                        </div>
                        <div class="phAnimate">
                          <label for="disiplin">Disiplin</label>
                          <select class="form-control" name="disiplin">
                            <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="phAnimate">
                          <label for="teamwork">Teamwork</label>
                          <select class="form-control" name="teamwork">
                            <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                        </select
                        </div>
                        <div class="phAnimate">
                          <label for="leadership">Leadership</label>
                          <select class="form-control" name="leadership">
                            <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="phAnimate">
                          <label for="kepatuhan">Kepatuhan</label>
                          <select class="form-control" name="kepatuhan">
                            <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="phAnimate">
                          <label for="kejujuran">Kejujuran</label>
                          <select class="form-control" name="kejujuran">
                            <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="phAnimate">
                          <label for="inisiatif">Inisiatif</label>
                          <select class="form-control" name="inisiatif">
                            <option value=">= 80">>= 80</option>
                            <option value="51-79">51-79</option>
                            <option value="<= 50"><= 50</option>
                          </select>
                        </div>
                        <div class="phAnimate">
                          <label for="hasil_status">Status</label>
                          <select class="form-control" name="hasil_status">
                            <option value="Baik">Baik</option>
                            <option value="Normal">Normal</option>
                            <option value="Kurang">Kurang</option>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button type="reset" class="btn btn-default" data-dismiss="modal">Reset</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" name="update" class="btn btn-primary">Edit Data</button>
                        </div>
                      </form>
                      </div>
                      </div>
                      </div>
                      </div>
                      <td>
                      <!--tutup tombol edit -->

                      <!-- tombol Hapus -->
                      <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-success shadow-sm'data-toggle="modal" data-target="#myy<?php echo $data['id_train']; ?>"><span aria-hidden="true"></span>Hapus</button>
                      <div class="modal fade" id="myy<?php echo $data['id_train'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="POST" role="form">
                          <div class="phAnimate">
                            <label for="id_train">No ID</label>
                            <input name="id_train" class="form-control" value="<?php echo $data['id_train']; ?>" readonly="">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class=" btn btn-primary btn-danger" name="hapus">Hapus Data</button>
                          </div>
                        </form>
                      </div>
                      </div>
                      </div>
                      </div> 
                      <!-- Tutup tombol Hapus -->
                    </tr>
                    <?php } ?>
                  </tbody>
              </table>
             </div>
             <hr>
             <ul class="pagination">
              <?php
              if($page == 1){
              ?>
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
              <?php
              }else{
                $link_prev = ($page > 1)? $page - 1 : 1;
              ?>
                <li><a href="dataset.php?page=1">First</a></li>
                <li><a href="dataset.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
              <?php
              }
              ?>
              <?php
              include 'koneksi.php';
              $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM data_train");
              $get_jumlah = mysqli_fetch_array($sql2);
              
              $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);
              $jumlah_number = 3;
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
              
              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' class="active"' : '';
              ?>
                <li<?php echo $link_active; ?>><a href="dataset.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php
              }
              ?>
              <?php
              if($page == $jumlah_page){
              ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
                <li class="disabled"><a href="#">Last</a></li>
              <?php
              }else{
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
              ?>
                <li><a href="dataset.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                <li><a href="dataset.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
              <?php
              }
              ?>
            </ul>
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
