$(document).ready(function () {

    DohvatiVozila2();	   
});

function DohvatiVozila2()
{
	$.ajax(
	{
		url:'json.php?json_id=dohvati_sva_vozila',
		type:'GET',		
		success:function(oData)
		{
			var rbr =0;
			$('.table tbody').empty();
			for (var i = 0; i < oData.length; i++) 
			{
				rbr++;
				var sTr = '<tr>'+
								'<td>'+rbr+"."+'</td>'+
								//'<td>'+oData[i].idVozila+'</td>'+
								'<td>'+oData[i].Naziv+'</td>'+
								'<td>'+oData[i].Marka+'</td>'+
								'<td>'+oData[i].Vrsta_motora+'</td>'+
								'<td>'+oData[i].Boja+'</td>'+								
								'<td>'+oData[i].Registracija+'</td>'+
								'<td>'+oData[i].Istek_registracije+'</td>'+
								'<td>'+oData[i].Vrsta_vozila+'</td>'+
								'<td>'+razlikadana(d2,parseDate(oData[i].Istek_registracije))+" dan/a"+'</td>'+
								'<td><span class="glyphicon glyphicon-pencil" onclick="GetModal(\'modals.php?modal_id=azuriraj_vozilo&vozilo_id=' +oData[i].idVozila+ '\')" aria-hidden="true"></span></td>'+
								'<td><span class="glyphicon glyphicon-trash" onclick="GetModal(\'modals.php?modal_id=obrisi_vozilo&vozilo_id='+oData[i].idVozila+'\')" aria-hidden="true"></span></td>'+
						   '</tr>';
				$('.table tbody').append(sTr);								
			}
		}, error: function (jqXHR, error) {
			console.log(error);
		}
	})
};
var d2= new Date();

/*
pretvara u MM-DD-YYYY
*/
function parseDate(str) {
    return new Date(str.substr(3, 2)+"."+str.substr(0, 2)+"."+str.substr(6,6));
}


function razlikadana(d1,d2)
{
     var t2 = d2.getTime();
     var t1 = d1.getTime();
     return parseInt((t2-t1)/(24*3600*1000));
}
function ProvjeriInputeAzuriranja(id)
{
    if(!$('#inptNaziv').val() || !$('#inptMarka').val() || !$('#inptVrstamotora').val() || !$('#inptBoja').val() || !$('#inptRegistracija').val()
    || !$('#inptVrstavozila').val())
    {
       alert('Niste popunili sva polja!');
    }
    else
    {
        AzurirajVozilo(id);
    }
}

function AzurirajVozilo(VoziloID) {    
    $.ajax({
        url: 'action.php',
        type: 'POST',
        dataType: "html",
        data: {
            action_id: 'azuriraj_vozilo',
            idVozila: VoziloID,
            Naziv: $('#inptNaziv').val(),
            Marka: $('#inptMarka').val(),
            Vrsta_motora: $('#inptVrstamotora').val(),
            Boja: $('#inptBoja').val(),
            Registracija: $('#inptRegistracija').val(),
            Istek_registracije: $('#inptIstekregistracije').val(),
            Vrsta_vozila: $('#inptVrstavozila').val()         
        },
        success: function(oData) {
            $("#modals").modal('hide');
            DohvatiVozila2();
            console.log("Proslo");
        },
        error: function(XMLHttpRequest, textStatus, exception) {
            console.log("Ajax failure\n");

        },
        async: true
    });
}
  
/*
Pretvara YYYY-MM-DD u DD.MM.YYY
*/
function FormatirajDatum(datum) {
    datum = new Date(datum);
    var godina = datum.getFullYear();
    var mjesec = datum.getMonth() + 1;
    var dan = datum.getDate();
    mjesec = mjesec < 10 ? "0" + mjesec : mjesec;
    dan = dan < 10 ? "0" + dan : dan;
    datum = dan + "." + mjesec + "." + godina;
    return datum;
}

function IstekRegistracije()
{
     var vrsta = $('#inptVrstavozila').val();
     var datumRegistracije = $('#inptRegistracija').val();
     datumRegistracije = new Date(datumRegistracije);
     var dodaj;
     switch (vrsta){
        case "Automobil":
            dodaj = 1;
            break;
        case "Kamion":
        dodaj = 1;
        break;
        case "Motocikl":
            dodaj = 2;
            break;
        case "Radni stroj":
            dodaj = 3;
            break;

     }
     istekRegistracije = datumRegistracije.getTime() + 365 * dodaj * 86400000;
     istekRegistracije = new Date(istekRegistracije);
     istekRegistracije = istekRegistracije.toISOString().substr(0, 10);
     return FormatirajDatum(istekRegistracije);
}


function ObrisiVozilo(VoziloID) {
	 $.ajax({
        url: 'action.php',
        type: 'POST',
        dataType: "html",
        data: {
            action_id: 'obrisi_vozilo',
            idVozila: VoziloID,                  
        },
        success: function(oData) {
            $("#modals").modal('hide');
            DohvatiVozila2();
            console.log("Proslo");
        },
        error: function(XMLHttpRequest, textStatus, exception) {
            console.log("Ajax failure\n");
        },
        async: true
    });
}

function DodajVozilo()
{
    if(!$('#inptNaziv').val() || !$('#inptMarka').val() || !$('#inptVrstamotora').val() || !$('#inptBoja').val() || !$('#inptRegistracija').val()
    || !$('#inptVrstavozila').val())
    {
       alert('Niste popunili sva polja!');
    }
   
	 $.ajax({
        url: 'action.php',
        type: 'POST',
        dataType: "html",
        data: {                    
            action_id: 'dodaj_novo_vozilo',
            idVozila: NewPersonId('dohvati_sva_vozila'),
            Naziv: $('#inptNaziv').val(),
            Marka: $('#inptMarka').val(),
            Vrsta_motora: $('#inptVrstamotora').val(),
            Boja: $('#inptBoja').val(),
            Registracija: FormatirajDatum($('#inptRegistracija').val()),
            Istek_registracije: IstekRegistracije(),
            Vrsta_vozila: $('#inptVrstavozila').val()         
        },
        success: function(oData) {
            $("#modals").modal('hide');
            DohvatiVozila2();
            console.log("Proslo");
        },
        error: function(XMLHttpRequest, textStatus, exception) {            
            console.log("Ajax failure\n");
        },
        async: true
    });
}

