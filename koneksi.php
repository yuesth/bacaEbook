<?php 
 
 class database{
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "php_dasar";
 
	function __construct($query){
		 $connec = mysqli_connect($this->host, $this->uname, $this->pass);
		 $datas = mysql_select_db($this->db, $query);
	} 

	function cek_errorconnec($query){
		if(mysqli_query($connec,$query) ==false){
			echo "database tidak terhubung";
		}
	}

	function query($query){
		global $conn;
		$datas = mysqli_query($conn, $query);
		$rows = [];		
		while($data = mysqli_fetch_assoc($datas)){
			$rows[] = $data;  
		}
		return $rows;
	}
} 
 
?>