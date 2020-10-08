$(document).ready(function ()
{
	UcitajZaposlenike();	
});

function UcitajZaposlenike()
{
	$.ajax(
	{
		url:'json.php?json_id=dohvati_sve_zaposlenike',
		type:'GET',
		success:function (oData)
		{
			var rbr=0;
			$('.table tbody').empty();
			for(var i=0; i<oData.length; i++)
			{
				rbr++;
				var sTr = 	'<tr>'+
								//'<td>'+oData[i].idzaposlenici+'</td>'+
								'<td>'+rbr+"."+'</td>'+
								'<td>'+oData[i].ime+'</td>'+
								'<td>'+oData[i].prezime+'</td>'+
								'<td>'+oData[i].datum_rodenja+'</td>'+
								'<td>'+oData[i].radno_mjesto+'</td>'+
								'<td>'+oData[i].funkcija+'</td>'+														
								'<td><span class="glyphicon glyphicon-pencil" onclick="GetModal(\'modals.php?modal_id=azuriraj_zaposlenika&zaposlenik_id='+oData[i].idzaposlenici+'\')" aria-hidden="true"></span></td>'+
								'<td><span class="glyphicon glyphicon-trash" onclick="GetModal(\'modals.php?modal_id=obrisi_zaposlenika&zaposlenik_id='+oData[i].idzaposlenici+'\')" aria-hidden="true"></span></td>'+
							'</tr>';
				$('.table tbody').append(sTr);		
			}
		}
	})
};

function provjeraInputa()
{
	if(!$('#inptIme').val() || !$('#inptPrezime').val() || !$('#inptMjesto').val() || !$('#inptfunkcija').val() || !$('#inptDatum').val())
    {
       alert('Niste popunili sva polja!');
    }
    else
    {
        DodajZaposlenika();
    }
}


function DodajZaposlenika()
{	
		$.ajax({
	    url: 'action.php',
	    type: 'POST',
	    dataType: "html",
	    data:
	    {
			action_id:'dodaj_zaposlenika',			
			ime: $('#inptIme').val(),
			prezime: $('#inptPrezime').val(),
			radno_mjesto: $('#inptMjesto').val(),
			funkcija: $('#inptfunkcija').val(),
			datum_rodenja: FormatirajDatum($('#inptDatum').val())
	    },
	    success: function (oData)
	    {
			$("#modals").modal('hide');
			UcitajZaposlenike();
	    },
	    error: function (XMLHttpRequest, textStatus, exception) {
	        console.log("Ajax failure\n");
	    },
	    async: true
		});
}

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

function ObrisiZaposlenika(ZaposlenikID) {
	$.ajax({
	   url: 'action.php',
	   type: 'POST',
	   dataType: "html",
	   data: {
		   action_id: 'obrisi_zaposlenika',
		   idzaposlenici: ZaposlenikID,                  
	   },
	   success: function(oData) {
		   $("#modals").modal('hide');
		   UcitajZaposlenike();
		   console.log("Proslo");
	   },
	   error: function(XMLHttpRequest, textStatus, exception) {
		   console.log("Ajax failure\n");
	   },
	   async: true
   });
}

function provjeriInpute(id)
{
	var str = $('#inptDatumrodenja').val();
	if(provjeriinputeufunkciji() == false)
	{
		alert('Niste popunili sva polja!');	
	}
	else{
		if(str.match("([0-9]{2}).([0-9]{2}).([0-9]{4})") && str.length == 10)
		{
			AzurirajZaposlenika(id);
		}
		else
		{
			alert('Krivi format datuma!!');			
		}
	}	
}

function AzurirajZaposlenika(ZaposlenikID)
{	
	$.ajax({
	    url: 'action.php',
	    type: 'POST',
	    dataType: "html",
	    data:
	    {
			action_id:'azuriraj_zaposlenike',
			idzaposlenici: ZaposlenikID,
			ime: $('#inptIme').val(),
			prezime: $('#inptPrezime').val(),
			radno_mjesto: $('#inptRadnomjesto').val(),
			funkcija: $('#inptfunkcija').val(),
			datum_rodenja: $('#inptDatumrodenja').val()
	    },
	    success: function (oData)
	    {
			$("#modals").modal('hide');
			UcitajZaposlenike();
			console.log("Proslo");
	    },
	    error: function (XMLHttpRequest, textStatus, exception) {
	        console.log("Ajax failure\n");
	    },
	    async: true
	});
}

function provjeriinputeufunkciji()
{
	var con;
	if(!$('#inptIme').val() || !$('#inptPrezime').val() || !$('#inptRadnomjesto').val() || !$('#inptfunkcija').val() ||
	 !$('#inptDatumrodenja').val())
	{
		con = false;
	
	}
	else
	{
		con = true;
	}
	return con;
}
