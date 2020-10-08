$(document).ready(function ()
{
	DohvatiVozila();
});

function DohvatiVozila()
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
						   '</tr>';
				$('.table tbody').append(sTr);	
				//console.log(oData[i].naziv)						
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