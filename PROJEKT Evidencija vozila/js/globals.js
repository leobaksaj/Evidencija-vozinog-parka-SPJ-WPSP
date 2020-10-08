function GetModal(sHref){
    $('#modals').removeData('bs.modal');
    $('#modals').modal
        ({
            remote:sHref,
            show: true
        });
}






























function GetData(caseString){
    var oList=new Array();
    $.ajax(
        {
            url:'json.php?json_id='+caseString+'',
            type:'GET',
            async: false,
            success:function (oData)
            {
                oList = oData;
            }
        });
        return oList;
};

function NewPersonId(caseString){
    var aId=[];
    var list=GetData(caseString);
    for(var i=0; i<list.length;i++){
        aId.push(list[i].osoba_id);
    }
    var nId=(Math.max(...aId))+1;
    return nId;
}

function Odjava()
{
	window.location.href = "odjava.php";
}

