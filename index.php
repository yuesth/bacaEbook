<?php 
	session_start();
	if(isset($_SESSION['login'])){
		header("Location:admin.php");
		exit;
	}  	
?> 
 <!DOCTYPE html>
 <html lang="en">
 

 <head>
 	<meta charset="UTF-8">
 	
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 	
 	<title>Halaman Login</title>	
 </head>
 

 <body>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-lg-auto">
				<h3>Log In Sistem Baca Ebook</h3>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-lg-auto">
				<form method="post">
  					<div class="form-group">
			    		<label for="exampleInputEmail1">Email address</label>
			    		<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="Username">
			    		<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  					</div>
  					<div class="form-group">
    					<label for="exampleInputPassword1">Password</label>
    					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="Password">
  					</div>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-lg-auto">
					<button type="submit" class="btn btn-primary" name="masuk">Submit</button>
				</form>
			</div>
		</div>
	</div>
 	
 	
 	<!-- <div class="cont" style="height: auto; width: 20%; padding: 8px; text-align: center; margin: auto; background-color: skyblue; border-radius: 5px;">
 		<form method="post">
	 		<label for="username">Username </label> <input type="text" name="Username" id="uname"> <br><br>
	 		<label for="password">Password </label> <input type="password" name="Password" id="pword"> <br> <br>
 			<button type="submit" name="submit" value="masuk">Submit</button>
 		</form>
 		<h5 id></h5>
 	</div> -->
	
	<?php 	
			if(isset($_POST['masuk'])){
				if (isset($_POST['Username']) && isset($_POST['Password'])){
	 	 			$_SESSION['login'] = true; 
	 	 			header("Location: admin.php");
	 	 			exit;
	 	 		}
	 	 		else{
	 	 			$error = true;
	 	 		}
	 	 	}
	?>

	


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>   	
 </body>


 </html>