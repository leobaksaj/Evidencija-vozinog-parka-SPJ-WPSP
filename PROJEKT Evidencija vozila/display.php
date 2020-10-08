<?php
$conn= mysqli_connect("localhost","root","","bazavoznipark");

//$output = array();
$query = "SELECT zaposlenici.ime, zaposlenici.prezime, (SELECT count(idZaposlenik) FROM zaduzivanja WHERE 
zaduzivanja.idZaposlenik = zaposlenici.idzaposlenici) z FROM zaposlenici, zaduzivanja  WHERE
zaposlenici.idzaposlenici = zaduzivanja.idZaposlenik GROUP BY ime;";
$result = mysqli_query($conn,$query);
	while ($row = mysqli_fetch_array($result)) {
		$output[]=$row;
	}

echo json_encode($output);
?>