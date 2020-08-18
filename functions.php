

<?php 
	//Membuat kode program function.php yang berisi kumpulan method-method untuk menyambungkan request data dari user ke database dan dikirim kembali ke user interface

	//memanggil script koneksi.php
	//require 'koneksi.php';
	//membuat instance objek database pada koneksi.php
	//$db = new database();

	// //mengakses database mphp_dasar dengan host:localhost, username:root dan password:(kosong)
	$conn = mysqli_connect("localhost","root","","php_dasar");

	//function query untuk mengembalikan data query yang diminta user
	function query($query){
		global $conn;
		$datas = mysqli_query($conn, $query);
		$rows = [];		
		while($data = mysqli_fetch_assoc($datas)){
			$rows[] = $data;  
		}
		return $rows;
	}

	//function tambah untuk menambah data dari inputan user kepada database
	function tambah(){
		global $conn;
			$idb = htmlspecialchars($_POST['idb']);
			$judulb = htmlspecialchars($_POST['judulb']);
			$penerbitb = htmlspecialchars($_POST['penerbitb']);
			$penulisb = htmlspecialchars($_POST['penulisb']);
			$halb = htmlspecialchars($_POST['halb']);

			//upload gambar
			$gambarr = upload_gbr();
			if(!$gambarr){
				return false;
			}

			$filee = upload_file();
			if(!$filee){
				return false;
			}

			$queryy = "INSERT INTO buku (idBuku, judulBuku, penerbitBuku, penulisBuku, halBuku, gambarBuku, fileBuku) VALUES
			     ($idb, '$judulb', '$penerbitb', '$penulisb', $halb,'$gambarr', '$filee')";


			$datas = mysqli_query($conn,$queryy);
			$err = mysqli_error($conn);

			return mysqli_affected_rows($conn);
	}

	function upload_gbr(){
		$namaFile = $_FILES['gambarb']['name'];
		$tmpFile = $_FILES['gambarb']['tmp_name'];
		$sizeFile = $_FILES['gambarb']['size'];
		$error = $_FILES['gambarb']['error'];

		//cek apakah error
		if($error == 4){
			echo "<script>
					alert('pilih gambar dahulu!');
				</script>";
			return false;
		}

		//cek apakah yang diupload adalah gambar
		$valid = ['jpg','jpeg','png'];
		$ekstensigambar = explode('.',$namaFile);
		$ekstensigambar = strtolower(end($ekstensigambar));
		if(!in_array($ekstensigambar, $valid)){
			echo "<script>
					alert('file bukan gambar!');
				</script>";
			return false;
		}

		//cek ukuran file terlalu besar
		if($sizeFile > 1000000){
			echo "<script>
					alert('file terlalu besar!');
				</script>";
			return false;
		}

		//generate nama file
		$namafileBaru = uniqid();
		$namafileBaru .= '.'; 
		$namafileBaru .= "$ekstensigambar";

		//lolos pengecekan, file siap upload
		move_uploaded_file($tmpFile,$namafileBaru);
		return $namafileBaru;
	}

	function upload_file(){
		$namaFile = $_FILES['fileb']['name'];
		$tmpFile = $_FILES['fileb']['tmp_name'];
		$sizeFile = $_FILES['fileb']['size'];
		$error = $_FILES['fileb']['error'];

		//cek apakah error
		if($error == 4){
			echo "<script>
					alert('pilih ebook dahulu!');
				</script>";
			return false;
		}

		//cek apakah yang diupload adalah gambar
		$valid = ['pdf','doc','docx','ppt','pptx','odt','txt'];
		$ekstensigambar = explode('.',$namaFile);
		$ekstensigambar = strtolower(end($ekstensigambar));
		if(!in_array($ekstensigambar, $valid)){
			echo "<script>
					alert('file bukan file!');
				</script>";
			return false;
		}

		//cek ukuran file terlalu besar
		if($sizeFile > 1000000000){
			echo "<script>
					alert('file terlalu besar!');
				</script>";
			return false;
		}

		//generate nama file
		$namafileBaru = uniqid();
		$namafileBaru .= '.'; 
		$namafileBaru .= "$ekstensigambar";

		//lolos pengecekan, file siap upload
		move_uploaded_file($tmpFile,$namafileBaru);
		return $namafileBaru;
	}

	function hapus($idbuku){
		global $conn;

		$query = "DELETE FROM buku WHERE idBuku = $idbuku";
		$result = mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function ubah($data){
		global $conn;
			$id = $data['id'];
			$idb = htmlspecialchars($data['idb']);
			$judulb = htmlspecialchars($data['judulb']);
			$penerbitb = htmlspecialchars($data['penerbitb']);
			$penulisb = htmlspecialchars($data['penulisb']);
			$halb = htmlspecialchars($data['halb']);
			$gambarb = upload_gbr();

			$queryy = "UPDATE buku SET
			idBuku = $idb,
			judulBuku = '$judulb', 
			penerbitBuku = '$penerbitb', 
			penulisBuku = '$penulisb', 
			halBuku = $halb, 
			gambarBuku = '$gambarb' WHERE id = $id";

			$datas = mysqli_query($conn, $queryy);

			return mysqli_affected_rows($conn);
	}

	function cari($keyword){
		$query = "SELECT * FROM buku WHERE
		idBuku LIKE '%$keyword%' OR judulBuku LIKE '%$keyword%' OR 
			penerbitBuku LIKE '%$keyword%' OR
			penulisBuku LIKE '%$keyword%' OR
			halBuku LIKE '%$keyword%' OR
			gambarBuku LIKE '%$keyword%'
		";
		return query($query);
	}


 ?>