$(document).ready(function () {

	DohvatiVozila2();
});

function DohvatiVozila2()
{
	$.ajax(
	{
		url:'json.php?json_id=dohvati_sva_nezaduzena_vozila',
		type:'GET',
		async:false,
		success:function(oData)
		{
			var rbr =0;
			$('.table tbody').empty();
			for (var i = 0; i < oData.length; i++) 
			{
				rbr++;
				var sTr = '<tr>'+
								'<td>'+rbr+"."+'</td>'+							
								'<td>'+oData[i].Naziv+'</td>'+
								'<td>'+oData[i].Marka+'</td>'+
								'<td>'+oData[i].Vrsta_motora+'</td>'+
								'<td>'+oData[i].Boja+'</td>'+									
								'<td>'+oData[i].Vrsta_vozila+'</td>'+
								'<td>'+razlikadana(d2,parseDate(oData[i].Istek_registracije))+" dan/a"+'</td>'+
								'<td><span class="glyphicon glyphicon-circle-arrow-up" onclick="GetModal(\'modals.php?modal_id=zaduzi_vozilo&vozilo_id=' +oData[i].idVozila+ '\')" aria-hidden="true"></span></td>'+
						   '</tr>';
				$('.table tbody').append(sTr);								
			}
		}, error: function (jqXHR, error) {
			console.log(error);
		}
	})
};

var d2= new Date();

function parseDate(str) {	
    return new Date(str.substr(3, 2)+"."+str.substr(0, 2)+"."+str.substr(6,6));
}

function razlikadana(d1,d2)
{
	 var t2 = d2.getTime();
     var t1 = d1.getTime();
     return	parseInt((t2-t1)/(24*3600*1000));
}     

function ProvjeraZaduzivanja(voziloId)
{
	if(!$('#inptidZaposlenika').val() || !$('#inptDatumzaduzivanja').val())
	{
		alert('Niste popunili sva polja!');
	}	 	
	else
	{
		ZaduziVozilo(voziloId);
	}
}

function ZaduziVozilo(VoziloID) {
	 		
	
		$.ajax({
			url: 'action.php',
			type: 'POST',
			dataType: "html",
			data: {
				action_id: 'dodaj_novo_zaduzivanje',
				idZaduzivanja: 1,            
				idZaposlenik: $('#inptidZaposlenika').val(),
				idVozilo: VoziloID,
				Datum: FormatirajDatum($('#inptDatumzaduzivanja').val()),                     
				Akcija: "1"          
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

function MinDate(){
    // Date Object
    $('#inptDatumzaduzivanja').click.datepicker({ maxDate: date("m-d-Y") });
	}
