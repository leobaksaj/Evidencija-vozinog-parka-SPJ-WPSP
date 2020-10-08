<!DOCTYPE html>
<html lang="hr">
<head>
	<meta charset="utf-8">
	<title>Vozni park VSMTI</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

	<div class="loginbox">
		<form id="formPrijava" action="autentifikacija.php" method="POST">
			<h1><b>Login</b></h1>
			<div class="form-group">				
				<div><input class="form-control" type="text"  name="korisnickoime" placeholder="Korisnicko ime "></div>				
			</div>
			<div class="form-group">				
				<div><input class="form-control" type="password" id="loz" name="lozinka" placeholder="Lozinka" ></div>				
			</div>
			<div class="modal-footer">
				<button id="loginButton" type="submit" class="btn btn-success">Prijava</button>
			</div>			
		</form>
	</div>
	<script src="js/globals.js"></script>
</body>
</html>