$(document).ready(function(){
   
  
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });
    
    
       
       /**leemos el contenido para traer el id seleccionado */
        $('.table tbody').on('click','#tareay',function(e){
          e.preventDefault();
            var cole = $(this).closest('tr');
            var id = cole.find('td:eq(0)').text();///obtengo el id de la lista
            var tareax = cole.find('td:eq(2)').text();///obtengo el id de la lista
            /**realizamos el envio del dato id al controlador */
            
});
   /* var tablaDatos = $("#datosx");
    var pendientes1 = $("#pendientes1");
    var pendientes2 = $("#pendientes2");
   
    var route = "http://192.168.1.107/ventas/public/gestiones";

    $.get(route, function(res){
        $(res).each(function (index,value){
            
            tablaDatos.append("<tr><td>"+value.UsuRegistro+"</td><td>"+value.Identificacion+"</td><td>"+value.Nombres+"</td><td>"+value.Comentario+"</td><td>"+value.Descripcion+"</td><td>"+value.FecRegistro+"</td></tr>");
            
        });
        var nFilas = $("#miTabla >tbody >tr").length;
        pendientes1.append(nFilas);
        pendientes2.append(nFilas);
            
    });*/



    


   
});