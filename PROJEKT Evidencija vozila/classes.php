<?php
class Configuration
{
	public $host="localhost";
	public $dbName="bazavoznipark";
	public $username="root";
	public $password="";	
}

class Osoba
{
	public $ime="N/A";
	public $prezime="N/A";	
	
}

class Zaposlenik extends Osoba
{
	public $idzaposlenici= "N/A";
	public $radno_mjesto = "N/A";
 	public $funkcija ="N/A";
 	public $datum_rodenja="N/A";

	public function __construct($idzaposlenici=null,$ime=null,$prezime=null,$radno_mjesto=null,$funkcija=null,$datum_rodenja=null)
	{
		
		if($idzaposlenici) $this->idzaposlenici=$idzaposlenici;
		if($ime) $this->ime=$ime;
		if($prezime) $this->prezime=$prezime;		
		if($radno_mjesto) $this->radno_mjesto=$radno_mjesto;
		if($funkcija) $this->funkcija=$funkcija;
		if($datum_rodenja) $this->datum_rodenja=$datum_rodenja;
	}
}

class Vozilo
{
	public $idVozila="N/A";
	public $Naziv="N/A";
	public $Marka="N/A";
	public $Vrsta_motora="N/A";
	public $Boja="N/A";
	
	public function __construct($idVozila=NULL,$Naziv=NULL,$Marka=NULL,$Vrsta_motora=NULL,$Boja=NULL)
	{
		if($idVozila) $this->idVozila =$idVozila;
		if($Naziv) $this->Naziv =$Naziv;
		if($Marka) $this->Marka =$Marka;
		if($Vrsta_motora) $this->Vrsta_motora =$Vrsta_motora;
		if($Boja) $this->Boja = $Boja;		
	}
}

class Automobil extends Vozilo
{	
	public $Registracija="N/A";
	public $Istek_registracije="N/A";
	public $Vrsta_vozila="N/A";
	
	public function __construct(
		$idVozila=NULL,$Naziv=NULL,$Marka=NULL,$Vrsta_motora=NULL,$Boja=NULL,$Registracija=NULL,$Istek_registracije=NULL,$Vrsta_vozila=NULL
	)
	{
		parent::__construct($idVozila,$Naziv,$Marka,$Vrsta_motora,$Boja);
		if($Registracija) $this->Registracija=$Registracija;
		if($Istek_registracije) $this->Istek_registracije=$Istek_registracije;
		if($Vrsta_vozila) $this->Vrsta_vozila=$Vrsta_vozila;	
	}
}

class Motocikl extends Vozilo
{
	public $Registracija="N/A";
	public $Istek_registracije="N/A";
	public $Vrsta_vozila="N/A";
	
	public function __construct(
		$idVozila=NULL,$Naziv=NULL,$Marka=NULL,$Vrsta_motora=NULL,$Boja=NULL,$Registracija=NULL,$Istek_registracije=NULL,$Vrsta_vozila=NULL
	)
	{
		parent::__construct($idVozila,$Naziv,$Marka,$Vrsta_motora,$Boja);
		if($Registracija) $this->Registracija=$Registracija;
		if($Istek_registracije) $this->Istek_registracije=$Istek_registracije;
		if($Vrsta_vozila) $this->Vrsta_vozila=$Vrsta_vozila;	
	}
}
class Radni_stroj extends Vozilo
{
	public $Registracija="N/A";
	public $Istek_registracije="N/A";
	public $Vrsta_vozila="N/A";
	
	public function __construct(
		$idVozila=NULL,$Naziv=NULL,$Marka=NULL,$Vrsta_motora=NULL,$Boja=NULL,$Registracija=NULL,$Istek_registracije=NULL,$Vrsta_vozila=NULL
	)
	{
		parent::__construct($idVozila,$Naziv,$Marka,$Vrsta_motora,$Boja);
		if($Registracija) $this->Registracija=$Registracija;
		if($Istek_registracije) $this->Istek_registracije=$Istek_registracije;
		if($Vrsta_vozila) $this->Vrsta_vozila=$Vrsta_vozila;	
	}
}
class Kamion extends Vozilo
{
	public $Registracija="N/A";
	public $Istek_registracije="N/A";
	public $Vrsta_vozila="N/A";
	
	public function __construct(
		$idVozila=NULL,$Naziv=NULL,$Marka=NULL,$Vrsta_motora=NULL,$Boja=NULL,$Registracija=NULL,$Istek_registracije=NULL,$Vrsta_vozila=NULL
	)
	{
		parent::__construct($idVozila,$Naziv,$Marka,$Vrsta_motora,$Boja);
		if($Registracija) $this->Registracija=$Registracija;
		if($Istek_registracije) $this->Istek_registracije=$Istek_registracije;
		if($Vrsta_vozila) $this->Vrsta_vozila=$Vrsta_vozila;	
	}
}

class Zaduzivanje
{
	public $idzaduzivanja;
	public $idZaposlenika;
	public $idVozilo;
	public $Datum;
	public $Akcija;
	public $Datum_vracanja;

	public function __construct($idzaduzivanja=null,$idZaposlenika=null,$idVozilo=null,$Datum=null,$Akcija=null,$Datum_vracanja=null)
	{
		if ($idzaduzivanja) $this->idzaduzivanja=$idzaduzivanja;
		if ($idZaposlenika) $this->idZaposlenika=$idZaposlenika;
		if ($idVozilo) $this->idVozilo=$idVozilo;
		if ($Datum) $this->Datum=$Datum;
		if ($Akcija) $this->Akcija=$Akcija;
		if ($Datum_vracanja) $this->Datum_vracanja = $Datum_vracanja;
	}
}

class Vracanje
{
	public $idzaduzivanja;
	public $Naziv;
	public $Marka;
	public $Vrsta_vozila;
	public $ime;
	public $prezime;
	public $Datum;
	public function __construct($idzaduzivanja=null,$Naziv=null,$Marka=null,$Vrsta_vozila=null,$ime=null,$prezime=null, $Datum=null)
	{
		if ($idzaduzivanja) $this->idzaduzivanja=$idzaduzivanja;
		if ($Naziv) $this->Naziv=$Naziv;
		if ($Marka) $this->Marka=$Marka;
		if ($Vrsta_vozila) $this->Vrsta_vozila=$Vrsta_vozila;
		if ($ime) $this->ime=$ime;
		if ($prezime) $this->prezime = $prezime;
		if ($Datum) $this->Datum = $Datum;
	}
}

?>