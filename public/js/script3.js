$(document).ready(function(){
	
});
    console.log("fino");
    var tablaDatos = $("#datos");
    var route = "http://192.168.1.107/auditoria/public/padres/listas";
    $.get(route, function(res){
        $(res).each(function(key,value){
         
            tablaDatos.append("<tr><td>"+value.cedula+"</td><td>"+value.nombres+"</td><td><button  value="+ value.nombres +" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal' type='text' > Editar</button></td></tr>");

           
        });
        
    });

    function Mostrar(btn){
       console.log(btn);
    }




