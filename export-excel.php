<html>
<head>
	<title>Penilaian Kinerja Karyawan menggunakan Metode Naïve Bayes</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Hasil Perhitungan Naive.xls");
	?>
 
	<center>
		<h1>Hasil Perhitungan Naive Bayes Classifiecation <br/></h1>
	</center>
 
	<table border="1">
		<tr>
            <th rowspan="2">ID</th>
			<th rowspan="2">Nama</th>
            <th rowspan="2">Pendidikan Terakhir</th>
            <th rowspan="2">Disiplin</th>
            <th rowspan="2">Teamwork</th>
            <th rowspan="2">Leadership</th>
            <th rowspan="2">Kepatuhan</th>
            <th rowspan="2">Kejujuran</th>
            <th rowspan="2">Inisiatif</th>
            <th colspan="3">Nilai</th>
            <th rowspan="2">Hasil Status</th>
        </tr>
        <tr>
            <th>Baik</th>
            <th>Normal</th>
            <th>Kurang</th>

        </tr>
        <?php
        include 'koneksi.php';
        $ambil = mysqli_query($koneksi, "SELECT * FROM hasil_naive");
        while($data = mysqli_fetch_array($ambil)){
        ?>
        <tr>
        	<td><?= $data['id_hasil'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['pendidikan_terakhir'] ?></td>
            <td><?= $data['disiplin'] ?></td>
            <td><?= $data['teamwork'] ?></td>
            <td><?= $data['leadership'] ?></td>
            <td><?= $data['kepatuhan'] ?></td>
            <td><?= $data['kejujuran'] ?></td>
            <td><?= $data['inisiatif'] ?></td>
            <td><?= $data['hasil_baik'] ?></td>
            <td><?= $data['hasil_normal'] ?></td>
            <td><?= $data['hasil_kurang'] ?></td>

            <?php
                      $ket="Kurang";
                      if($data['hasil_baik'] > $data['hasil_normal']){
                        $ket = 'Baik';
                      }elseif($data['hasil_normal'] > $data['hasil_kurang']){
                        $ket = "Normal";
                      } ?>
                      <td><button type="button" class="btn btn-danger"><span aria-hidden="true"></span><?= $ket ?></button></td>
                
            <?php } ?>
        </tr>     
	</table>
</body>
</html>