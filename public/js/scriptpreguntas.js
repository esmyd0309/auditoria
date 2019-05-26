$(document).ready(function(){
    $('#alert').hide();

   $('.btn-delete').click(function(e){
         e.preventDefault();//verificar si esta deacuerdo
       if (! confirm("¿Estás seguro de Eliminar?")) {
           return false;
       }

       var row = $(this).parents('tr');
       var form = $(this).parents('form');
       var url = form.attr('action');

       $('#alert').show();

       $.post(url, form.serialize(), function(result){
            row.fadeOut();
            $('#preguntas-total').html(result.total);
            $('#alert').html(result.message);
       }).fail(function(){
        $('#alert').html('Algo salio mal!!');
       });

   }); 
});