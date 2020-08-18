 <?php 
	session_start();
	if(!isset($_SESSION['login']) ){
		header("Location:index.php");
		exit;
	} 
	require 'functions.php';

	$id_ubah = $_GET['idubahBuku'];
	$buku = query("SELECT * FROM buku WHERE idBuku = $id_ubah")[0];

	if(isset($_POST['submit_ubah'])){
		if(ubah($_POST) > 0){
			echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'admin.php';
				</script>";
		}
		else{
			echo "<script>
				alert('data gagal diubah!');
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

	<h1>Ubah Data</h1>
	<div style="width: 50%; height: auto; margin: auto;">
		<form method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $buku['id'];?>">
			<ul style="margin: auto;">
				<li>
					<label for="idb">ID Buku: </label>
					<input type="text" name="idb" id="idb" value="<?= $buku['idBuku']; ?>">
				</li>
				<br>
				<li>
					<label for="judulb">Judul Buku: </label>
					<input type="text" name="judulb" id="judulb"
					value="<?= $buku['judulBuku'];?>">
				</li>
				<br>
				<li>
					<label for="penerbitb">Penerbit Buku: </label>
					<input type="text" name="penerbitb" id="penerbitb" value="<?= $buku['penerbitBuku'];?>">
				</li>
				<br>
				<li>
					<label for="penulisb">Penulis Buku: </label>
					<input type="text" name="penulisb" id="penulisb" value="<?= $buku['penulisBuku'];?>">
				</li>
				<br>
				<li>
					<label for="halb">Halaman Buku: </label>
					<input type="text" name="halb" id="halb" value="<?= $buku['halBuku'];?>">
				</li>
				<br>
				<li>
					<label for="gambarb">Gambar Buku: </label>
					<img src="<?= $buku['gambarBuku']?>" width=40><br>
					<input type="file" name="gambarb" id="gambarb">
				</li>
				<br>
				<button class="btn-buku" type="submit" name="submit_ubah">
					Ubah buku
				</button>
			</ul>
		</form>
		<br>
	</div>
</body>
</html>