$(document).ready(function(){
	

    
    var tablaDatos = $("#datos");
    var route = "http://www.auditoria.damplus.net/padres/listas";
    $.get(route, function(res){
        $(res).each(function(key,value){
            
            tablaDatos.append("<tr><td>"+value.cedula+"</td><td>"+value.nombres+"</td><td><button  value="+ value.cedula +" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'  > Editar</button></td></tr>");

           
        });
        
    });

    function Mostrar(btn){
       console.log(btn);
    }

});


