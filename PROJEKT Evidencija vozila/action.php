<?php
include 'connection.php';

$sActionID="";
if (isset($_POST['action_id']))
{
	$sActionID=$_POST['action_id'];
}
if (isset($_GET['action_id']))
{
	$sActionID=$_GET['action_id'];
}

switch ($sActionID) 
{
	case 'azuriraj_vozilo':
		$sQuery ="UPDATE vozila SET Naziv=:Naziv, Marka=:Marka, Vrsta_motora=:Vrsta_motora, Boja=:Boja, Registracija=:Registracija, Istek_registracije=:Istek_registracije, Vrsta_vozila=:Vrsta_vozila WHERE idVozila=:idVozila";
		$oStatement = $oConnection->prepare($sQuery);
		$oData = array(
			'Naziv'=>$_POST['Naziv'],
			'Marka'=>$_POST['Marka'],
			'Vrsta_motora'=>$_POST['Vrsta_motora'],
			'Boja'=>$_POST['Boja'],
			'Registracija'=>$_POST['Registracija'],
			'Istek_registracije'=>$_POST['Istek_registracije'],
			'Vrsta_vozila'=>$_POST['Vrsta_vozila'],
			'idVozila'=> $_POST['idVozila']
		);
		try {
			$oStatement=$oConnection->prepare($sQuery);
			$oStatement->execute($oData);
		} catch (PDOException $error) {
			echo $error;
		} 
		break;

	case 'obrisi_vozilo':
		$sQuery ="DELETE FROM vozila WHERE idVozila=:idVozila";
		$oStatement =$oConnection->prepare($sQuery);
		$oData = array(
			'idVozila'=>$_POST['idVozila']
		);
		$oStatement->execute($oData);
		break;

	case 'dodaj_novo_vozilo':
		$sQuery= "INSERT INTO vozila (Naziv,Marka,Vrsta_motora,Boja,Registracija,Istek_registracije,Vrsta_vozila) VALUES (:Naziv,:Marka,:Vrsta_motora,:Boja,:Registracija,:Istek_registracije,:Vrsta_vozila)";
		$oStatement = $oConnection->prepare($sQuery);
		$oData=array(
			'Naziv' => $_POST['Naziv'],
			'Marka' => $_POST['Marka'],
			'Vrsta_motora' => $_POST['Vrsta_motora'],
			'Boja' => $_POST['Boja'],
			'Registracija' => $_POST['Registracija'],
			'Istek_registracije' => $_POST['Istek_registracije'],
			'Vrsta_vozila' => $_POST['Vrsta_vozila']
		);
		try 
		{
			$oStatement=$oConnection->prepare($sQuery);
			$oStatement->execute($oData);
		} catch (PDOException $error) 
		{
			echo $error;
			echo 0;
		}
		break;

	case 'dodaj_novo_zaduzivanje':
		$sQuery= "INSERT INTO zaduzivanja (idZaposlenik, idVozilo, Datum, Akcija) VALUES (:idZaposlenik, :idVozilo,  :Datum, :Akcija)";
		$oStatement = $oConnection->prepare($sQuery);
		$oData=array(
			//'idzaduzivanja'=> $_POST['idzaduzivanja'],
			'idZaposlenik' => $_POST['idZaposlenik'],
			'idVozilo' => $_POST['idVozilo'],
			'Datum' => $_POST['Datum'],
			'Akcija' => $_POST['Akcija']					
		);
		try 
		{
			$oStatement=$oConnection->prepare($sQuery);
			$oStatement->execute($oData);
			echo 1;
			
		} catch (PDOException $error) 
		{
			echo $error;
			echo 0;
		}
		break;

	case 'azuriraj_registraciju':
		$sQuery ="UPDATE vozila SET Naziv=:Naziv, Marka=:Marka, Vrsta_motora=:Vrsta_motora, Boja=:Boja, Registracija=:Registracija, Istek_registracije=:Istek_registracije, Vrsta_vozila=:Vrsta_vozila WHERE idVozila=:idVozila";
		$oStatement = $oConnection->prepare($sQuery);
		$oData = array(
			'Naziv'=>$_POST['Naziv'],
			'Marka'=>$_POST['Marka'],
			'Vrsta_motora'=>$_POST['Vrsta_motora'],
			'Boja'=>$_POST['Boja'],
			'Registracija'=>$_POST['Registracija'],
			'Istek_registracije'=>$_POST['Istek_registracije'],
			'Vrsta_vozila'=>$_POST['Vrsta_vozila'],
			'idVozila'=> $_POST['idVozila']
		);
		try {
			$oStatement=$oConnection->prepare($sQuery);
			$oStatement->execute($oData);
		} catch (PDOException $error) {
			echo $error;
		} 
		break;

	case 'dodaj_novo_vracanje':
		$sQuery= "INSERT INTO zaduzivanja (/*idzaduzivanja, */idZaposlenik, idVozilo, Datum, Akcija, Datum_vracanja) VALUES (/*:idzaduzivanja,*/ :idZaposlenik, :idVozilo,  :Datum, :Akcija, :Datum_vracanja)";
		$oStatement = $oConnection->prepare($sQuery);
		$oData=array(
			//'idzaduzivanja'=> $_POST['idzaduzivanja'],
			'idZaposlenik' => $_POST['idZaposlenik'],
			'idVozilo' => $_POST['idVozilo'],
			'Datum' => $_POST['Datum'],
			'Akcija' => $_POST['Akcija'],
			'Datum_vracanja' => $_POST['Datum_vracanja']			
		);
		try 
		{
			$oStatement=$oConnection->prepare($sQuery);
			$oStatement->execute($oData);
			echo 1;
			
		} catch (PDOException $error) 
		{
			echo $error;
			echo 0;
		}
		break;


	case 'dodaj_zaposlenika':
		$sQuery= "INSERT INTO zaposlenici (ime,prezime,radno_mjesto,funkcija,datum_rodenja) VALUES (:ime,:prezime,:radno_mjesto,:funkcija,:datum_rodenja)";
		$oStatement = $oConnection->prepare($sQuery);
		$oData=array(
			'ime' => $_POST['ime'],
			'prezime' => $_POST['prezime'],
			'radno_mjesto' => $_POST['radno_mjesto'],
			'funkcija' => $_POST['funkcija'],
			'datum_rodenja' => $_POST['datum_rodenja']
		);
		try 
		{
			$oStatement=$oConnection->prepare($sQuery);
			$oStatement->execute($oData);
		} catch (PDOException $error) 
		{
			echo $error;
			echo 0;
		}
		break;

	case 'obrisi_zaposlenika':
		$sQuery ="DELETE FROM zaposlenici WHERE idzaposlenici=:idzaposlenici";
		$oStatement =$oConnection->prepare($sQuery);
		$oData = array(
			'idzaposlenici'=>$_POST['idzaposlenici']
		);
		$oStatement->execute($oData);
		break;

	case 'azuriraj_zaposlenike':
		$sQuery ="UPDATE zaposlenici SET idzaposlenici=:idzaposlenici, ime=:ime, prezime=:prezime, radno_mjesto=:radno_mjesto, funkcija=:funkcija, datum_rodenja=:datum_rodenja WHERE idzaposlenici=:idzaposlenici";
		$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
			'idzaposlenici'=>$_POST['idzaposlenici'],
			'ime'=>$_POST['ime'],
			'prezime'=>$_POST['prezime'],
			'radno_mjesto'=>$_POST['radno_mjesto'],
			'funkcija'=>$_POST['funkcija'],
			'datum_rodenja'=>$_POST['datum_rodenja']					
			);
		try {
			$oStatement=$oConnection->prepare($sQuery);
			$oStatement->execute($oData);
		} catch (PDOException $error) {
			echo $error;
		} 
		break;
}

?>