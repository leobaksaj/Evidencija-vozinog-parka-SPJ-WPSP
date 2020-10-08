<?php
include 'connection.php';

$sQuery = '';
 if(isset($_POST['korisnickoime']) && isset($_POST['lozinka']))
 {
 	$sQuery = 'SELECT * FROM admin WHERE korisnicko_ime ="'.$_POST['korisnickoime'].'" AND lozinka="'.$_POST['lozinka'].'"';
 }
 /*else if(isset($_POST['lozinka']))
 {
 echo "Hello ".$_POST['username'];
 }*/
 else
 {
 	header("Location:pocetna.php");
 }

$oStatement = $oConnection->query($sQuery);
$oData = $oStatement->fetch(PDO::FETCH_ASSOC);
//echo($oData);

if (!empty($oData['korisnicko_ime']) && !empty($_POST['lozinka']))
{
	header("Location: vozila.php");
}
else
{
	header("Location: pocetna.php");
}
?>