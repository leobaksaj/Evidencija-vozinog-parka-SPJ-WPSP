<!DOCTYPE html>
<html lang="hr">
<head>
	<title>Vozila</title>
	<meta charset="utf-8">	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
		<ul class="nav navbar-stacked">
			<a href="vozila.php" alt="Admin logo"><li><img id="img" src="img/car.png"></li></a>
			<li>
				<div id="pregledvozila">
					<button onclick="window.location.href='pregledVozila.php'" class="btn btn-primary">
						<span class="glyphicon glyphicon-eye-open"></span>
					</button>
					<label>Pregled vozila</label>					
				</div>
			</li>
			<li>
				<div id="pregledvozila">
					<button class="btn btn-warning" onclick="window.location.href='azuriranje.php'" >
						<span class="glyphicon glyphicon-wrench"></span>
					</button>
					<label>Uređivanje</label>					
				</div>
			</li>
			<li>
				<div id="pregledvozila">
					<button class="btn btn-warning" onclick="window.location.href='azurirajregistraciju.php'" >
						<span class="glyphicon glyphicon-wrench"></span>
					</button>
					<label>Ažuriraj registraciju</label>					
				</div>
			</li>
			<li>
				<div id="pregledvozila">
					<button class="btn btn-success" onclick="window.location.href='zaduzi_vozilo.php'">
						<span class="glyphicon glyphicon-pencil"></span>
					</button>
					<label>Zaduži vozilo</label>					
				</div>
			</li>
			<li>
				<div id="pregledvozila">
					<button class="btn btn-success" onclick="window.location.href='vrati_vozilo.php'">
						<span class="glyphicon glyphicon-arrow-up"></span>
					</button>
					<label>Vrati vozilo</label>					
				</div>
			</li>
			<li>
				<div id="pregledvozila">
					<button class="btn btn-info" onclick="window.location.href='statistika.php'">
						<span class="glyphicon glyphicon-list-alt"></span>
					</button>
					<label>Statistika</label>					
				</div>
			</li>
			<li>
				<div id="pregledvozila">
					<button class="btn btn-info" onclick="window.location.href='zaposlenici.php'">
						<span class="glyphicon glyphicon-list-alt"></span>
					</button>
					<label>Pregled zaposlenika</label>					
				</div>
			</li>
			<li>
				<div id="pregledvozila">
					<button class="btn btn-danger" onclick="Odjava()">
						<span class="glyphicon glyphicon-log-out"></span>
					</button>
					<label>Odjava</label>					
				</div>
			</li>								
		</ul>
		</nav>		
	</header>
	<h2 id="preglednaslov">Zaduži vozilo</h2>
	<div class="container-fluid">		
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Rbr.</th>				
					<th>Naziv</th>
					<th>Marka</th>
					<th>Vrsta motora</th>
					<th>Boja</th>					
					<th>Vrsta vozila</th>
					<th>Dani do isteka registracije</th>
					<th>Zaduži vozilo</th>
				</tr>
			</thead>
			<tbody>				
			</tbody>			
		</table>	
	</div>

	<div class="modal" id="modals" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content" ng-app="Myapp" ng-controller="Mycontroller">
	      
	    </div>
	  </div>
	</div>

<script type="text/javascript" src="js/zaduzi.js"></script>
<script type="text/javascript" src="js/globals.js"></script>
</body>
</html>