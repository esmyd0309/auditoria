$(document).ready(function(){
	

    
    var tablaDatos = $("#auditor");
    var route = "http://auditoria.damplus.net/auditores";
    $.get(route, function(res){
        $(res).each(function(key,value){
     /**gestiones de los auditores del dia */
            tablaDatos.append("&nbsp;<span class='badge badge-primary'</span>"+value.NAME+"&nbsp; <span class='badge badge-light'>"+value.cantidad+"</span>&nbsp;");

           
        });
        
    });

    function Mostrar(btn){
       console.log(btn);
    }

});


