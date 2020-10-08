<!DOCTYPE html>
<html lang="hr" ng-app="Myapp">
<head>
	<title>Vozila</title>
	<meta charset="utf-8">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.4-build.3588/angular.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.4-build.3588/angular.min.js"></script>	
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

	<div class="container-fluid" ng-controller="brZaduzivanja">	
		<h3 class="naslov1">Broj zaduživanja po zaposleniku </h3>	
		<table class="table table-striped" id="table1">
			<thead>
				<tr>
					<th>Rbr.</th>				
					<th>Ime</th>
					<th>Prezime</th>
					<th>Broj zaduživanja</th>				
				</tr>
			</thead>
			<tbody ng-repeat="emp in oData">	
			<td>{{ $index +1 }}</td>	
			<td>{{ emp.ime }}</td>
    		<td>{{ emp.prezime }}</td>		
			<td>{{ emp.z }}</td>	
			</tbody>			
		</table>	
	</div>

	<div class="container-fluid" ng-controller="Prosjekzaduzivanja">
		<h3 class="naslov1">Prosjek korištenja vozila po zaposleniku </h3>			
		<table class="table table-striped" id="table1">
			<thead>
				<tr>
					<th>Rbr.</th>				
					<th>Ime</th>
					<th>Prezime</th>
					<th>Prosjek korištenja vozila</th>				
				</tr>
			</thead>
			<tbody ng-repeat="emp in oData1">	
			<td>{{ $index +1 }} </td>
			<td>{{ emp.ime }} </td>
    		<td>{{ emp.prezime }} </td>		
			<td>{{ emp.z }} </td>	
			</tbody>		
		</table>	
	</div>

	<div class="modal" id="modals" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      
	    </div>
	  </div>
	</div>

<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/globals.js"></script>
</body>
</html>