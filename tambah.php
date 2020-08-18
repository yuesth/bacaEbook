<?php 
	session_start();
	if(!isset($_SESSION['login']) ){
		header("Location:index.php");
		exit;
	} 
	require 'functions.php';

	if(isset($_POST['submit_tambah'])){
		if(tambah() > 0){
			echo "<script>
				alert('data berhasil!');
			</script>";
			header("Location:admin.php");
			exit;
		}
		else{
			echo "<script>
				alert('data gagal!');
			</script>";
		}
	}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah data</title>
	<style>
		.btn-buku{
			height: 40px; 
			color: white; 
			background-color: darkblue; 
			border-radius: 8px;
		}
		.btn-buku:hover{
			background-color: skyblue;
			color: black;
		}
		.brhsl, .ggl{
			display: none;
		}
	</style>
</head>
<body style="text-align: center;">

	<h1>Tambah Data</h1>
	<div style="width: 50%; height: auto; margin: auto;">
		<form method="post" enctype="multipart/form-data">
			<input type="hidden" name="id">
			<ul style="margin: auto;">
				<li>
					<label for="idb">ID Buku: </label>
					<input type="text" name="idb" id="idb" required="">
				</li>
				<br>
				<li>
					<label for="judulb">Judul Buku: </label>
					<input type="text" name="judulb" id="judulb">
				</li>
				<br>
				<li>
					<label for="penerbitb">Penerbit Buku: </label>
					<input type="text" name="penerbitb" id="penerbitb">
				</li>
				<br>
				<li>
					<label for="penulisb">Penulis Buku: </label>
					<input type="text" name="penulisb" id="penulisb">
				</li>
				<br>
				<li>
					<label for="halb">Halaman Buku: </label>
					<input type="text" name="halb" id="halb">
				</li>
				<br>
				<li>
					<label for="fileb">Upload file Buku: </label>
					<input type="file" name="fileb" id="fileb">
				</li>
				<br>
				<li>
					<label for="gambarb">Gambar Buku: </label>
					<input type="file" name="gambarb" id="gambarb">
				</li>
				<br>
				<button class="btn-buku" type="submit" name="submit_tambah">
					Submit buku
				</button>
			</ul>
		</form>
		<br>
	</div>
</body>
</html>