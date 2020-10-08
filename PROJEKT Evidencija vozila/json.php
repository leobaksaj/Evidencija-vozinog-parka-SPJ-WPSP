<?php
ini_set('memory_limit', '2048M');
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');
include "connection.php";

$sJsonID="";
$oJson=array();

if(isset($_GET['json_id']))
{
	$sJsonID=$_GET['json_id'];
}

switch($sJsonID)
{
	case 'dohvati_sva_vozila'://BITNOOOO!!!!
	
		$sQuery="SELECT * FROM vozila";
		$oRecord=$oConnection->query($sQuery);
		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
			$oVozilo=new Automobil(
					$oRow['idVozila'],
					$oRow['Naziv'],
					$oRow['Marka'],
					$oRow['Vrsta_motora'],
					$oRow['Boja'],
					$oRow['Registracija'],
					$oRow['Istek_registracije'],
					$oRow['Vrsta_vozila']	
				);

			array_push($oJson,$oVozilo);	
		}
		break;
		

	case 'dohvati_sve_zaposlenike':
	$sQuery="SELECT * FROM zaposlenici";
		$oRecord=$oConnection->query($sQuery);
		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
			$oZaposlenik=new Zaposlenik(
					$oRow['idzaposlenici'],
					$oRow['ime'],
					$oRow['prezime'],
					$oRow['datum_rodenja'],
					$oRow['radno_mjesto'],
					$oRow['funkcija']
										
				);

			array_push($oJson,$oZaposlenik);	
		}
	break;

	case 'dohvati_sva_nezaduzena_vozila':
	
		$sQuery="SELECT * FROM vozila WHERE  
		MOD((SELECT count(idVozilo) FROM zaduzivanja WHERE zaduzivanja.idVozilo = vozila.idVozila), 2) =0 ;";
		$oRecord=$oConnection->query($sQuery);
		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
			$oVozilo=new Automobil(
					$oRow['idVozila'],
					$oRow['Naziv'],
					$oRow['Marka'],
					$oRow['Vrsta_motora'],
					$oRow['Boja'],
					$oRow['Registracija'],
					$oRow['Istek_registracije'],
					$oRow['Vrsta_vozila']	
				);

			array_push($oJson,$oVozilo);	
		}
		break;

	case 'dohvati_sva_zaduzivanja':
	$sQuery="SELECT zaduzivanja.idzaduzivanja, vozila.Naziv, vozila.Marka, vozila.Vrsta_vozila, zaposlenici.ime, zaposlenici.prezime, zaduzivanja.Datum 
	FROM vozila, zaposlenici, zaduzivanja  WHERE
	vozila.idVozila = zaduzivanja.idVozilo AND zaposlenici.idzaposlenici = zaduzivanja.idZaposlenik  AND
	MOD((SELECT count(idZaposlenik) FROM zaduzivanja WHERE zaduzivanja.idZaposlenik = zaposlenici.idzaposlenici), 2) =1 AND 
    MOD((SELECT count(idVozilo) FROM zaduzivanja WHERE zaduzivanja.idVozilo = vozila.idVozila), 2) =1
	GROUP BY idZaposlenik;";
		$oRecord=$oConnection->query($sQuery);
		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
			$oVracanje=new Vracanje(
					$oRow['idzaduzivanja'],
					$oRow['Naziv'],
					$oRow['Marka'],
					$oRow['Vrsta_vozila'],
					$oRow['ime'],
					$oRow['prezime'],
					$oRow['Datum']										
				);
			array_push($oJson,$oVracanje);	
		}
	break;
	
}

echo json_encode($oJson);
?>
