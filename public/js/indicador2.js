'use strict';

$(document).ready(function(){
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });

    
   
   /**leemos el contenido para traer el id seleccionado */
    $('.table tbody').on('click','.btnx',function(e){
    
        var cole = $(this).closest('tr');
        var id = cole.find('td:eq(0)').text();///obtengo el id de la lista
        var tareax = cole.find('td:eq(2)').text();
        /**realizamos el envio del dato id al controlador */
        var tarea = $("#tarea3");
        tarea.append(tareax);
        $.ajax({
            type: 'POST',
            url: 'http://192.168.1.107/auditoria/public/indicadores2',
            data:  { id }, 

            success: function(data) {
                        e.preventDefault();
                        var calificacion = [];
                        var agente = [];
                        var clientes = [];
                        for (var i in data){
                        calificacion.push(data[i].calificacion);
                        agente.push(data[i].agente);
                        clientes.push(data[i].clientes);
                           
                       }
                       Chart.defaults.global.hover.mode = 'nearest';
               
                    
                        
                        Chart.defaults.global.defaultFontFamily = "Lato";
                        Chart.defaults.global.defaultFontSize = 18;


                        var calificacion = {
                            label: 'calificacion',
                            data: calificacion,
                            backgroundColor:   [
                              
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                                'rgba(69, 143, 249,0.8)',
                            ],
                            borderColor: [
                                
                                
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                                'rgba(42, 36, 28)',
                            ],
                            borderWidth: 3,
                            
                          };
                          
                          var cleinetes = {
                              
                            label: 'Clientes Evaluados',
                            data: clientes,
                            backgroundColor: 'rgba(99, 133, 249,0.5)',
                            
                            borderWidth: 0,
                            yAxisID: "y-axis-gravity"
                          };
                          
                          var planetData = {
                            labels: agente,
                            datasets: [calificacion, cleinetes]
                          };
                          
                          var chartOptions = {
                            responsive: true,
                            title:{
                                display: true,
                                text: 'Calificaciones',
                                fontSize: 25
                            },
                            legend:{
                                padding: 20,
                                position: 'right',
                                labels:{
                                    fontColor: '#000'
                                }
                            }, 
                            scales: {
                              xAxes: [{
                                barPercentage: 1,
                                categoryPercentage: 0.6
                              }],
                              yAxes: [{
                                id: "y-axis-density",
                                
                                    ticks: {
                                      callback: function(tick) {
                                        return tick.toString() + ' %';
                                      }
                                    }
                              }, {
                                id: "y-axis-gravity"
                              }]
                            }
                          };

                          var ctx = $("#mycanvasage2");
                          var barChart = new Chart(ctx, {
                            type: 'bar',
                            data: planetData,
                            options: chartOptions,
                            
                            
                          });
                       
                    },
                    error: function(data){
                        console.log(data);
                    }
                  
          
        });
      
      
/** grafico de detalle preguntas positivas */
       
           
    });
  





});

