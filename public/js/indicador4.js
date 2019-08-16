'use strict';
  //tabla con los detalles
$(document).ready(function(){
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });


   
   /**leemos el contenido para traer el id seleccionado */
    $('.table tbody').on('click','.btnx',function(e){
      e.preventDefault();
        var cole = $(this).closest('tr');
        var id = cole.find('td:eq(0)').text();///obtengo el id de la lista
        var tareax = cole.find('td:eq(2)').text();///obtengo el id de la lista
        /**realizamos el envio del dato id al controlador */
    
   
       
        //console.log(progreso);
        var tablaDatos = $("#datos2");
        var tarea4 = $("#tarea4");
        tarea4.append(tareax);
    
        $.ajax({
          type: 'POST',
          url: 'http://www.auditoria.damplus.net/cantpreguntasAgentecantpreguntasAgente',
          data:  { id },
         
          success: function(data) {
           
            $(data).each(function (index,value){
            tablaDatos.append("<tr><td>"+value.pregunta+"</td><td>"+value.calificacion+"%"+"</td></tr>");
            });
        
        }
      });//fin del ajaz
     

       //console.log(progreso);
       var agentedetalle = $("#agentedetalle");
     
       var tarea5 = $("#tarea5");
       tarea5.append(tareax);
   
       $.ajax({
         type: 'POST',
         url: 'http://www.auditoria.damplus.net/cantpreguntasAgentedetalleagente',
         data:  { id },
        
         success: function(data) {
       
           $(data).each(function (index,value){
            agentedetalle.append("<tr><td>"+value.cedula+"</td><td>"+value.estado+"</td><td>"+value.agente+"</td><td>"+value.grupo+"</td><td>"+value.calificacion+"%"+"</td><td>   <audio controls  loop  preload class='containerPlayer'> <source src= "+value.grabacion+" type='audio/mp3'> </audio></td></tr>");
        
           });
       
       }
     });//fin del ajaz


    });//fin de la funcion de onclick
  
    
});//fin del redy


