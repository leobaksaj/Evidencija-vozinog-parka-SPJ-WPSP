<?php
include 'connection.php';

$sModalID ="";
$sVoziloID="";
$ZaposlenikID="";

if (isset($_GET['modal_id']))
{
	$sModalID = $_GET['modal_id'];	
}
if (isset($_POST['modal_id']))
{
	$sModalID = $_POST['modal_id'];	
}
if (isset($_GET['vozilo_id']))
{
	$sVoziloID = $_GET['vozilo_id'];	
}
if (isset($_GET['zaposlenik_id']))
{
	$ZaposlenikID = $_GET['zaposlenik_id'];
}
if (isset($_GET['idzaduzivanja']))
{
	$ZaduzivanjeID = $_GET['idzaduzivanja'];
}

$min = date("Y-m-d");

switch ($sModalID)
 {
	case 'azuriraj_vozilo':	
			
			$sQuery = "SELECT * FROM vozila WHERE idVozila=".$sVoziloID;
			$oRecord=$oConnection->query($sQuery);
			
			while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
			{
					$naziv= $oRow['Naziv'];
					$marka= $oRow['Marka'];
					$vrstaMotora= $oRow['Vrsta_motora'];
					$boja= $oRow['Boja'];
					$registracija= $oRow['Registracija'];
					$istekRegistracije= $oRow['Istek_registracije'];					
					$vrstaVozila= $oRow['Vrsta_vozila'];
			}
			$tabledodatak1= 
			'<select id="inptVrstamotora" class="form-control">
			<option value="'.$vrstaMotora.'">'.$vrstaMotora.'</option>	';
			if($vrstaMotora == "Diesel")
			{												
					$tabledodatak1.= '<option value="Benzin">Benzin</option>
					<option value="Hibrid">Hibrid</option>
					<option value="Electric">Electric</option>'	;					
			}
			else if($vrstaMotora == "Benzin")
			{
				$tabledodatak1.= '<option value="Diesel">Diesel</option>
					<option value="Hibrid">Hibrid</option>
					<option value="Electric">Electric</option>'	;	
			}	
			else if($vrstaMotora == "Hibrid")
			{
				$tabledodatak1.= '<option value="Benzin">Benzin</option>
					<option value="Diesel">Diesel</option>
					<option value="Electric">Electric</option>'	;	
			}
			else
			{
				$tabledodatak1.= '<option value="Benzin">Benzin</option>
					<option value="Hibrid">Hibrid</option>
					<option value="Diesel">Diesel</option>'	;	
			}
			$tabledodatak1 .='</select>';

			$tabledodatak2 = '	<select id="inptVrstavozila" class="form-control">
			<option value="'.$vrstaVozila.'">'.$vrstaVozila.'</option> ';
			if($vrstaVozila == "Automobil")
			{
				$tabledodatak2 .='<option value="Motocikl">Motocikl</option>
				<option value="Radni stroj">Radni stroj</option>
				<option value="Kamion">Kamion</option>';		
			}
			else if($vrstaVozila == "Kamion")
			{
				$tabledodatak2 .='<option value="Automobil">Automobil</option>
				<option value="Motocikl">Motocikl</option>
				<option value="Radni stroj">Radni stroj</option>';			
			}
			else if($vrstaVozila =="Motocikl")
			{
				$tabledodatak2 .='<option value="Automobil">Automobil</option>				
				<option value="Radni stroj">Radni stroj</option>
				<option value="Kamion">Kamion</option>';	
			}
			else
			{
				$tabledodatak2 .='<option value="Automobil">Automobil</option>
				<option value="Motocikl">Motocikl</option>				
				<option value="Kamion">Kamion</option>';	
			}
							
		      $tabledodatak2.= '</select>';
		echo 
			'<div class="modal-header" style="background-color:#00acac">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" style="color:white"> Ažuriraj vozilo</h4>
		</div>			
		<div class="modal-body">
			<form class="form-horizontal">
			<div class="form-group">
					<div class="col-md-8">
					<label>Naziv vozila</label>
						<input 	id="inptNaziv" data-parsley-required="true" type="text" value="'.$naziv.'" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
					<label>Marka vozila</label>
						<input 	id="inptMarka" data-parsley-required="true" type="text" value="'.$marka.'" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
					<label>Vrsta motora</label>
						<!--<input 	id="inptVrstamotora" data-parsley-required="true" type="text" value="'.$vrstaMotora.'" class="form-control" >-->
							'.$tabledodatak1.'
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						<label>Boja vozila</label>
						<input 	id="inptBoja" data-parsley-required="true" type="text" value="'.$boja.'" class="form-control">
					</div>
				</div>
					<div class="form-group">
					<div class="col-md-8">
					<label>Registracija</label>
						<input disabled id="inptRegistracija" data-parsley-required="true" type="text" value="'.$registracija.'" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						<label>Istek registracije</label>
						<input disabled id="inptIstekregistracije" data-parsley-required="true" type="text" value="'.$istekRegistracije.'" class="form-control">
					</div>
				</div>			
				<div class="form-group">
					<div class="col-md-8">
					<label>Vrsta vozila</label>
						<!--<input 	id="inptVrstavozila" data-parsley-required="true" type="text" value="'.$vrstaVozila.'" class="form-control" >-->
						'.$tabledodatak2.'
					</div>
				</div>			
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-s" onclick="ProvjeriInputeAzuriranja('.$sVoziloID.')">Spremi</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
		</div>';
			break;

	case 'azuriraj_registraciju':	
		$sQuery = "SELECT * FROM vozila WHERE idVozila=".$sVoziloID;
		$oRecord=$oConnection->query($sQuery);
		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
				$naziv= $oRow['Naziv'];
				$marka= $oRow['Marka'];
				$vrstaMotora= $oRow['Vrsta_motora'];
				$boja= $oRow['Boja'];
				$registracija= $oRow['Registracija'];
				$istekRegistracije= $oRow['Istek_registracije'];					
				$vrstaVozila= $oRow['Vrsta_vozila'];
		}
		echo 
		'<div class="modal-header" style="background-color:#00acac">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" style="color:white"> Ažuriraj registraciju</h4>
		</div>			
		<div class="modal-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-md-8">
					<label>Naziv vozila</label>
						<input disabled id="inptNaziv" data-parsley-required="true" type="text" value="'.$naziv.'" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
					<label>Marka vozila</label>
						<input disabled	id="inptMarka" data-parsley-required="true" type="text" value="'.$marka.'" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
					<label>Vrsta motora</label>
						<input disabled	id="inptVrstamotora" data-parsley-required="true" type="text" value="'.$vrstaMotora.'" class="form-control" >
					</div>
				</div>	
				<div class="form-group">
					<div class="col-md-8">
						<label>Boja vozila</label>
						<input disabled	id="inptBoja" data-parsley-required="true" type="text" value="'.$boja.'" class="form-control">
					</div>
				</div>		
				<div class="form-group">
					<div class="col-md-8">
					<label>Registracija</label>
						<input disabled data-parsley-required="true" type="text" value="'.$registracija.'" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						<form class="form-horizontal">
						<label>Novi datum registracije</label>
						<input id="inptRegistracija" type="date" class="form-control">			  
						</form>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-md-8">
						<label>Istek registracije</label>
						<input disabled id="inptIstekregistracije" data-parsley-required="true" type="text" value="'.$istekRegistracije.'" class="form-control">
					</div>
				</div>			
				<div class="form-group">
					<div class="col-md-8">
					<label>Vrsta vozila</label>
						<input disabled	id="inptVrstavozila" data-parsley-required="true" type="text" value="'.$vrstaVozila.'" class="form-control" >
					</div>
				</div>			
			</form>		
		</div>
		<br><br><br><br><br><br>
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-s" onclick="AzurirajRegistraciju('.$sVoziloID.')">Spremi</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
		</div>';
			break;
	case 'dodaj_novo_vozilo':
		echo
						'<div class="modal-header" style="background-color:#00acac">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="color:white"> Novo vozilo</h4>
			</div>			
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="form-group">
						<div class="col-md-8">
							<label>Naziv vozila</label>
							<input 	id="inptNaziv" data-parsley-required="true" type="text" placeholder="Unesite naziv vozila" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-8">
						<label>Marka vozila</label>
							<input 	id="inptMarka" data-parsley-required="true" type="text" placeholder="Npr.VW,Mercedes,Audi..."  class="form-control">
						</div>
					</div>
					<div class="form-group">						
							<div class="col-md-8">
							<label>Vrsta motora</label>
								<select id="inptVrstamotora" class="form-control">
									<option value=""></option>
									<option value="Diesel">Diesel</option>
									<option value="Benzin">Benzin</option>
									<option value="Hibrid">Hibrid</option>
									<option value="Electric">Electric</option>							
								</select>
							</div>				
					</div>			
					<div class="form-group">
						<div class="col-md-8">
						<label>Boja vozila</label>
							<input 	id="inptBoja" data-parsley-required="true" type="text" placeholder="Npr.crvena,plava..."  class="form-control">
						</div>
					</div>			
					<div class="form-group">
						<div class="col-md-8">
							<form class="form-horizontal">
							  <label>Datum registracije</label><br>
							  <input id="inptRegistracija" type="date" class="form-control">			  
							</form>
						</div>
					</div>			
					<div class="form-group">						
							<div class="col-md-8">
							<label>Vrsta vozila</label>
								<select id="inptVrstavozila" class="form-control">
									<option value=""></option>
									<option value="Automobil">Automobil</option>
									<option value="Motocikl">Motocikl</option>
									<option value="Radni stroj">Radni stroj</option>
									<option value="Kamion">Kamion</option>							
								</select>
							</div>				
					</div>			
				</div>
			<br><br><br>
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-s" id="provjeraInputa" onclick="DodajVozilo()">Spremi</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
		</div>';
		break;	

	case 'zaduzi_vozilo':
			
			$tableDodatak = '<form class="dropdown">
								<select id="inptidZaposlenika" class="form-control">';
								$oZaposlenici = array();
								$sQuery = "SELECT zaposlenici.idzaposlenici,zaposlenici.ime,zaposlenici.prezime,zaposlenici.radno_mjesto,zaposlenici.funkcija,zaposlenici.datum_rodenja
								FROM zaduzivanja,zaposlenici WHERE 
								zaposlenici.idzaposlenici NOT IN (SELECT idZaposlenik FROM zaduzivanja) OR 
								MOD((SELECT count(idZaposlenik) FROM zaduzivanja WHERE zaduzivanja.idZaposlenik = zaposlenici.idzaposlenici), 2) =0 
								GROUP BY idzaposlenici;";
								$oRecord = $oConnection->query($sQuery);
								while($oRow = $oRecord->fetch(PDO::FETCH_BOTH))
								{
									$oZaposlenik = new Zaposlenik(
									$oRow['idzaposlenici'],
									$oRow['ime'],
									$oRow['prezime'],
									$oRow['datum_rodenja'],
									$oRow['radno_mjesto'],
									$oRow['funkcija']);
									array_push($oZaposlenici,$oZaposlenik);
								}
								$tableDodatak .= '<option value=""></option>';
								foreach($oZaposlenici as $oZap)
								{
									$id = $oZap->idzaposlenici;
									$tableDodatak .= '<option value="'.$id.'">'.$oZap->ime ." ".$oZap->prezime."  Datum rođenja: ".$oZap->radno_mjesto.'</option>';

								}
							$tableDodatak .= '</select>
							</form>';							

			$sQuery = "SELECT * FROM vozila WHERE idVozila=".$sVoziloID;
			$oRecord=$oConnection->query($sQuery);
			
			while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
			{
					$naziv=$oRow['Naziv'];
					$marka=$oRow['Marka'];
					$vrstaMotora=$oRow['Vrsta_motora'];
					$boja=$oRow['Boja'];					
					$vrstaVozila=$oRow['Vrsta_vozila'];		
			}
		echo 
						'<div class="modal-header" style="background-color:#00acac">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" style="color:white"> Zaduži vozilo</h4>
		</div>			
		<div class="modal-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-md-8">
					<label>Naziv vozila</label>
						<input disabled	id="inptNaziv" data-parsley-required="true" type="text" value="'.$naziv.'" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
					<label>Marka vozila</label>
						<input disabled	id="inptMarka" data-parsley-required="true" type="text" value="'.$marka.'" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
					<label>Vrsta motora</label>
						<input disabled	id="inptVrstamotora" data-parsley-required="true" type="text" value="'.$vrstaMotora.'" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						<label>Boja vozila</label>
						<input disabled	id="inptBoja" data-parsley-required="true" type="text" value="'.$boja.'" class="form-control">
					</div>	
				</div>			
				<div class="form-group">
					<div class="col-md-8">
					<label>Vrsta vozila</label>
						<input disabled	id="inptVrstavozila" data-parsley-required="true" type="text" value="'.$vrstaVozila.'" class="form-control">
					</div>
				</div>		
				<div class="form-group">
					<div class="col-md-8">
					<label>Zaposlenik</label><br>
					'.$tableDodatak.'
						
					<!--<input 	id="inptidZaposlenika" data-parsley-required="true" type="text" value="" class="form-control">-->
					</div>
				</div>	
				<div class="form-group">
					<div class="col-md-8">
						<form class="form-horizontal">
						<label>Datum vraćanja vozila</label><br>
						<input id="inptDatumzaduzivanja" type="date" min="'.$min.'" class="form-control">			  
						</form>
					</div>
				</div>			
				<div class="container">  
				</div>			
			</div>	
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-s" onclick="ProvjeraZaduzivanja('.$sVoziloID.')">Spremi</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
		</div>';
		break;

	case 'vrati_vozilo':
		
		$sQuery = "SELECT * FROM zaduzivanja WHERE idzaduzivanja=".$ZaduzivanjeID;
		$oRecord=$oConnection->query($sQuery);
		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
				$idzaduzivanja=$oRow['idzaduzivanja'];									
				$idZaposlenik=$oRow['idZaposlenik'];
				$idVozilo=$oRow['idVozilo'];			
				$DatumZaduzivanja =$oRow['Datum'];
				//$Datumvracanja =$oRow['Datum'];
				//$datum = $oRow['Datum'];
		}
		$sQuery = "SELECT * FROM vozila WHERE idVozila=".$idVozilo;
		$oRecord=$oConnection->query($sQuery);
		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
				$naziv=$oRow['Naziv'];									
				
		}
		echo 
			'<div class="modal-header" style="background-color:#00acac">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" style="color:white"> Vrati vozilo</h4>
		</div>			
		<div class="modal-body" >
			<form class="form-horizontal">
			<div class="form-group">
					<div class="col-md-8">
					<label>Id zaduživanja</label>
						<input disabled	id="inptNaziv" data-parsley-required="true" type="text" value="'.$idzaduzivanja.'" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
					<label>Id zaposlenika</label>
						<input disabled	id="inptidZaposlenika" data-parsley-required="true" type="text" value="'.$idZaposlenik.'" class="form-control">
					</div>
				</div>							
				<div class="form-group">
					<div class="col-md-8">
					<label>Id vozila</label>
						<input disabled	id="inptidvozilo" data-parsley-required="true" type="text" value="'.$idVozilo.'" class="form-control" >

					</div>
				</div>	
				<div class="form-group">
					<div class="col-md-8">
					<label>Naziv vozila</label>
						<input disabled	id="inptnazivvozila" data-parsley-required="true" type="text" value="'.$naziv.'" class="form-control" >
						
					</div>
				</div>	
				<div class="form-group">
					<div class="col-md-8">
					<label>Datum zaduživanja</label>
						<input disabled	id="inptDatumzaduzivanja" data-parsley-required="true" type="text" value="'.$DatumZaduzivanja.'" class="form-control" >
					</div>
				</div>				
				</div>				
				<div class="form-group">
					<div class="col-md-8">
						<form class="form-horizontal">
						<label>Datum vraćanja vozila</label><br>
						<input id="inptDatumvracanja" type="date" class="form-control">			  
						</form>
					</div>
				</div>					
				<div class="container">  
			</div>			
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-s" onclick="ProvjeraVracanja('.$ZaduzivanjeID.')">Spremi</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
			</div>';
				break;

	case 'dodaj_zaposlenika':
		echo
						'<div class="modal-header" style="background-color:#00acac">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="color:white"> Novi zaposlenik</h4>
			</div>			
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="form-group">
						<div class="col-md-8">
							<label>Ime</label>
							<input 	id="inptIme" data-parsley-required="true" type="text" placeholder="Unesite ime zaposlenika" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-8">
						<label>Prezime</label>
							<input 	id="inptPrezime" data-parsley-required="true" type="text" placeholder="Unesite prezime zaposlenika"  class="form-control">
						</div>
					</div>						
					<div class="form-group">
						<div class="col-md-8">
						<label>Radno mjesto</label>
							<input 	id="inptMjesto" data-parsley-required="true" type="text" placeholder="Npr.VSMTI"  class="form-control">
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-8">
						<label>Funkcija</label>
							<input 	id="inptfunkcija" data-parsley-required="true" type="text" placeholder="Npr.asistent,predavač"  class="form-control">
						</div>
					</div>													
					<div class="form-group">
					<div class="col-md-8">
						<form class="form-horizontal">
							<label>Datum rođenja</label><br>
							<input id="inptDatum" type="date" class="form-control">			  
						</form>
					</div>
				</div>			
				</div>
			<br><br><br>
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-s" onclick="provjeraInputa()">Spremi</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
		</div>';
		break;
	case 'azuriraj_zaposlenika':
		

		$sQuery = "SELECT * FROM zaposlenici WHERE idzaposlenici=".$ZaposlenikID;
		$oRecord=$oConnection->query($sQuery);
		
		while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
		{
				$ime= $oRow['ime'];
				$prezime= $oRow['prezime'];
				$radno_mjesto= $oRow['radno_mjesto'];
				$funkcija= $oRow['funkcija'];
				$datum_rodenja= $oRow['datum_rodenja'];				
		}
		echo 
			'<div class="modal-header" style="background-color:#00acac">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" style="color:white"> Ažuriraj zaposlenika</h4>
		</div>			
		<div class="modal-body">
			<form class="form-horizontal">
			<div class="form-group">
					<div class="col-md-8">
					<label>Ime</label>
						<input 	id="inptIme" data-parsley-required="true" type="text" value="'.$ime.'" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
					<label>Prezime</label>
						<input 	id="inptPrezime" data-parsley-required="true" type="text" value="'.$prezime.'" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
					<label>Radno mjesto</label>
						<input 	id="inptRadnomjesto" data-parsley-required="true" type="text" value="'.$radno_mjesto.'" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						<label>Funkcija</label>
						<input 	id="inptfunkcija" data-parsley-required="true" type="text" value="'.$funkcija.'" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">					
						<label>Datum rođenja  <small style="color:red">*Obavezno upišite datum u obliku "01.01.2000"</small></label><br>
						<input 	id="inptDatumrodenja" data-parsley-required="true" type="text" value="'.$datum_rodenja.'" class="form-control">						
					</div>
				</div>					
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-s" onclick="provjeriInpute('.$ZaposlenikID.')">Spremi</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
		</div>';
		break;
	
	case 'obrisi_vozilo':
		echo
		'<div class="modal-header" style="background-color:#00acac">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" style="color:white"> Brisanje</h4>
		</div>			
		<div class="modal-body">		
			<p> Jeste li sigurni da želite obrisati vozilo! </p>		
		</div>					
		<div class="modal-footer">
		<button type="button" class="btn btn-success btn-s" onclick="ObrisiVozilo('.$sVoziloID.')">Obriši</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
		</div>';
		break;
	case 'obrisi_zaposlenika':
		echo
		'<div class="modal-header" style="background-color:#00acac">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" style="color:white"> Brisanje</h4>
		</div>			
		<div class="modal-body">		
			<p> Jeste li sigurni da želite obrisati zaposlenika! </p>		
		</div>					
		<div class="modal-footer">
		<button type="button" class="btn btn-success btn-s" onclick="ObrisiZaposlenika('.$ZaposlenikID.')">Obriši</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
		</div>';
		break;


	}
?>