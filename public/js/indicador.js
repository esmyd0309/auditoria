'use strict';

$(document).ready(function(){
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });

    $('#indicador').hide();
   
   /**leemos el contenido para traer el id seleccionado */
    $('.table tbody').on('click','.btnx',function(e){
        e.preventDefault();
        var cole = $(this).closest('tr');
        var id = cole.find('td:eq(0)').text();///obtengo el id de la lista
        var tareax = cole.find('td:eq(2)').text();
        var tarea = $("#tarea");
        tarea.append(tareax);
        /**realizamos el envio del dato id al controlador */
    
        
  

       

      
      
        $('#indicador').show();
    });
  

});

