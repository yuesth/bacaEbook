<?php
	session_start();
	if(!isset($_SESSION['login']) ){
		header("Location:index.php");
		exit;
	}

	require "functions.php";
	
	$bukus = query("SELECT * FROM buku");

	if(isset($_POST["btn_cari"])){
		$hasil = cari($_POST["cari"]);
		$bukus = $hasil;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Selamat datang di Sistem E-book</title>
	<style>
		.btn_add{
			height: 40px; 
			color: white; 
			background-color: #23db38; 
			border-radius: 8px;
			margin-left: 15px;
		}
		.btn_add:hover{
			background-color: lightgreen;
			color: black;
		}
		.btn_all{
			height: 40px; 
			color: white; 
			background-color: #42e2f4; 
			border-radius: 8px;
			margin-left: 10px;
		}
		.btn_all:hover{
			background-color: lightblue;
			color: black;
		}
		.bodi{
			margin: auto; width: 1024px; text-align: center;
		}
		.tambah, .viewall{
			float: left; margin-bottom: 10px;
		}
		.cari{
			width: 50%; height: auto;
		}
	</style>
</head>
<body>
	<a href="logout.php">Logout</a>
	<div class="bodi">
		<h1>Selamat datang di sistem Baca E-book</h1>
		
		<div class="tambah">
			<a href="tambah.php">
				<button type="submit" name="btn_add" value="masuk" class="btn_add">+ Tambah Buku</button>
			</a>
		</div>
		<div class="viewall">
			<a href="admin.php">
				<button type="submit" name="btn_all" value="masuk" class="btn_all">
				Tampilkan semua data
				</button>
			</a>
		</div>
		<br>
		<div class="cari">
			<form method="post">
				<input type="text" name="cari" id="cari" placeholder="cari data disini" style=" width: 80%; height: auto; display: inline;" autofocus autocomplete="off">
				<button type="submit" name="btn_cari" class="btn_cari" value="carii" style="display: inline;">Cari</button>
			</form>
		</div>
		<br>
		<table border="2" cellpadding="4" cellspacing="0" style="border-radius: 5px;">
				<td style="font-weight: bold;">
					Aksi
				</td>	
				<td style="font-weight: bold;">
					ID Ebook
				</td>
				<td style="font-weight: bold;">
					Judul Ebook
				</td>
				<td style="font-weight: bold;">
					Penerbit Ebook
				</td>
				<td style="font-weight: bold;">
					Penulis Ebook
				</td>
				<td style="font-weight: bold;">
					Halaman Ebook
				</td>
				<td style="font-weight: bold;">
					Gambar Ebook
				</td>
			<?php foreach ($bukus as $buku) { ?>	
			<tr>
				<td>
					<a href="ubah.php?idubahBuku= <?= $buku['idBuku'];?>">Ubah</a> | 
					<a href="hapus.php?idhapusBuku= <?= $buku['idBuku'];?>" onclick="return confirm('yakin?');" >Hapus</a>
				</td>
				<td>
					<?= $buku['idBuku']; ?>
				</td>
				<td>
					<?= $buku['judulBuku']?>
				</td>
				<td>
					<?= $buku['penerbitBuku']?>
				</td>
				<td>
					<?= $buku['penulisBuku']?>
				</td>
				<td>
					<?= $buku['halBuku']?>
				</td>
				<td>
					<img src="<?= $buku['gambarBuku']?>" style="display: block;">
					<a href="<?= $buku['fileBuku']?>">Baca</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
	
	<!-- <h1 class="h1">Selamat datang, <?php 
	echo $_POST["Username"]; ?> </h1> -->

	<!-- <?php foreach ($biodatas as $biodata) : 
		echo '<a href="bio.php?nama='.$biodata['nama'].'&nim='.$biodata['nim'].'&prodi='.$biodata['prodi'].'>
			<div class="boxprofile">
				<img src='.$biodata['ava'].'>
				<h3>'.$biodata['nama'].'</h3>	
			</div>
		</a>';
	endforeach; ?> -->
</body>
</html>