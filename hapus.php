<?php
	session_start();
	if(!isset($_SESSION['login']) ){
		header("Location:index.php");
		exit;
	}  
	require 'functions.php';

	$id_hapus = $_GET['idhapusBuku'];
	if(hapus($id_hapus) > 0){
		echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'admin.php';
			</script>";
	}
	else{
		echo "<script>
			alert('data gagal dihapus!');
			document.location.href = 'admin.php';
			</script>";
	}

 ?>