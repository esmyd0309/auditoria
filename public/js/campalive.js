$(document).ready(function(){
	
   


   
    
    var tablaDatos = $("#live");
    var route = "http://www.auditoria.damplus.net/live";
    $.get(route, function(res){
        $(res).each(function(key,value){
            
            tablaDatos.append("<tr><td>"+value.user_group+"</td><td>"+value.campaign_id+"</td><td>"+ value.cantidad +"</td></tr>");

           
        });
        
    });

    
});


