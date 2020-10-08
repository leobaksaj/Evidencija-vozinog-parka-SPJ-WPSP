$(document).ready(function () {

	DohvatiVozila2();
	//console.log(parseDate(DateNow()));

});

function DohvatiVozila2()
{
	$.ajax(
	{
		url:'json.php?json_id=dohvati_sva_zaduzivanja',
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
								'<td>'+oData[i].Naziv+'</td>'+
								'<td>'+oData[i].Marka+'</td>'+
								'<td>'+oData[i].Vrsta_vozila+'</td>'+
								'<td>'+oData[i].ime+'</td>'+									
								'<td>'+oData[i].prezime+'</td>'+
								'<td>'+oData[i].Datum+'</td>'+
								//'<td>'+razlikadana(d2,parseDate(oData[i].Istek_registracije))+" dan/a"+'</td>'+
								'<td><span class="glyphicon glyphicon-circle-arrow-down" onclick="GetModal(\'modals.php?modal_id=vrati_vozilo&idzaduzivanja=' +oData[i].idzaduzivanja+ '\')" aria-hidden="true"></span></td>'+
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
	//var str = str1.parse(str1, "MM/dd/yyyy")
    //var mdy = str.split('.');
    return new Date(str.substr(3, 2)+"."+str.substr(0, 2)+"."+str.substr(6,6));
}


function razlikadana(d1,d2)
{
	 var t2 = d2.getTime();
     var t1 = d1.getTime();
     return	parseInt((t2-t1)/(24*3600*1000));
}
	  
function ProvjeraVracanja(id)
{
	if(!$('#inptDatumvracanja').val())
	{
		alert('Nista postavili datum vraćanja!');
	}
	else
	{
		VratiVozilo(id);
	}
}

function VratiVozilo(idZaduzivanja) {
	
    $.ajax({
        url: 'action.php',
        type: 'POST',
        dataType: "html",
        data: {
			action_id: 'dodaj_novo_vracanje',
			idZaduzivanja: idZaduzivanja,
			idZaposlenik: $('#inptidZaposlenika').val(),
            idVozilo:  $('#inptidvozilo').val(),            
            Datum: $('#inptDatumzaduzivanja').val(),
            Akcija: 2,
            Datum_vracanja: FormatirajDatum($('#inptDatumvracanja').val())
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

