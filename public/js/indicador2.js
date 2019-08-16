'use strict';

$(document).ready(function(){
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });

 
    $('#indicador').hide();
   /**leemos el contenido para traer el id seleccionado */
    $('.table tbody').on('click','.btnx',function(e){
      
        var cole = $(this).closest('tr');
        var id = cole.find('td:eq(0)').text();///obtengo el id de la lista
        var tareax = cole.find('td:eq(2)').text();
        /**realizamos el envio del dato id al controlador */
      
        var tarea = $("#tarea3");
        tarea.append(tareax);
        /**CALIFICACIONES */
        $.ajax({
            type: 'POST',
            url: 'http://www.auditoria.damplus.net/cantpreguntasAgenteindicadores2',
            data:  { id }, 

            success: function(data) {
                        e.preventDefault();
                        var calificacion = [];
                        var agente = [];
                       
                        for (var i in data){
                        calificacion.push(data[i].calificacion);
                        agente.push(data[i].agente);
                        
                           
                       }
                       Chart.defaults.global.hover.mode = 'nearest';
               
                    
                        
                        Chart.defaults.global.defaultFontFamily = "Lato";
                        Chart.defaults.global.defaultFontSize = 18;


                        var calificacion = {
                            label: 'calificacion',
                            data: calificacion,
                            backgroundColor:   [
                              
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
                                'rgba(92, 246, 20 )',
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
                          
                        
                          
                          var planetData = {
                            labels: agente,
                            datasets: [calificacion]
                          };
                          
                          var chartOptions = {
                            
                            title:{
                                display: true,
                                text: 'Calificaciones totales',
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
                                
                                
                                    ticks: {
                                      callback: function(tick) {
                                        return tick.toString() + ' %';
                                      },
                                          beginAtZero: true,
                                    }
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



        /**CANTIDAD DE CLIENTES */

           /**CALIFICACIONES */
           $.ajax({
            type: 'POST',
            url: 'http://www.auditoria.damplus.net/cantpreguntasAgenteindicadores2',
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


                        var clientes = {
                            label: 'clientes',
                            data: clientes,
                            lineTension: 0,
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
                            datasets: [clientes]
                          };
                          
                          var chartOptions = {
                            responsive: true,
                            title:{
                                display: true,
                                text: 'Cantidad de Clientes Evaluados',
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
                                categoryPercentage: 0.6,
                                
                              }],
                              yAxes: [{
                                
                                ticks: {
                                  beginAtZero: true,
                                  
                                },
                              },
                            ],
                               
                            }
                          };

                          var ctx = $("#clientes");
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
           


    //console.log(progreso);
    var valor1 = document.querySelector("#progregoagentes");
    var tarea = $("#tarea");
    tarea.append(tareax);
    var tarea2 = $("#tarea2");
    tarea2.append(tareax);
  var agentes = $("#agentes");
  var meta = $("#meta");
    $.ajax({
      type: 'POST',
      url: 'http://www.auditoria.damplus.net/cantpreguntasAgenteindica_llamadas',
      data:  { id },
   
      success: function(data) {
    
      $(data).each(function (index,value){
      
      var calculo = value.llamadas * 100;
      var total = calculo / value.cantidad_registros;
        llamadas.append(value.llamadas);
        agentes.append(value.agentes);
        meta.append(value.cantidad_registros);
     
        valor1.style.width = total+"%";
        valor1.append(total+"%");
 
      });
    
    }
  });//fin del ajax


  $.ajax({
    type: 'POST',
    url: 'http://www.auditoria.damplus.net/cantpreguntasAgentecantpreguntasAgente',
    data:  { id }, 

    success: function(data) {
                e.preventDefault();
                var calificacion = [];
                var pregunta = [];
                var agente = [];
                for (var i in data){
                calificacion.push(data[i].calificacion);
                pregunta.push(data[i].pregunta);
                agente.push(data[i].agente);
                   
               }
               Chart.defaults.global.hover.mode = 'nearest';
       
            
                
                Chart.defaults.global.defaultFontFamily = "Lato";
                Chart.defaults.global.defaultFontSize = 18;


                var calificacion = {
                    label: 'calificacion',
                    data: calificacion,
                    backgroundColor:   [
                      
                        'rgba(30, 245, 85,0.4)',
                        'rgba(69, 143, 249,0.4)',
                        'rgba(248, 34, 0,0.4)',
                        'rgba(249, 194, 21,0.4)',
                        'rgba(21, 249, 239,0.4)',
                        'rgba(1, 51, 255,0.4)',
                        'rgba(168, 34, 244,0.4)',
                        'rgba(220, 249, 9,0.4)',
                        'rgba(244, 34, 215,0.4)',
                        'rgba(249, 9, 122,0.4)',
                        'rgba(176, 249, 9,0.4)',
                        'rgba(9, 249, 176,0.4)',
                        'rgba(220, 9, 249,0.4)',
                        'rgba(9, 246, 249,0.4)',
                        'rgba(249, 118, 9,0.4)',
                        'rgba(235, 249, 9,0.4)',
                        'rgba(74, 249, 9,0.4)',
                        'rgba(9, 71, 249,0.4)',
                        'rgba(69, 143, 249,0.4)',
                        'rgba(249, 9, 9,0.4)',
                        'rgba(9, 249, 9,0.4)',
                        'rgba(151, 9, 249,0.4)',
                        'rgba(69, 143, 249,0.4)',
                        'rgba(249, 238, 9,0.4)',
                    ],
                    borderColor: [
                        
                        'rgba(30, 245, 85)',
                        'rgba(69, 143, 249)',
                        'rgba(248, 34, 0)',
                        'rgba(249, 194, 21)',
                        'rgba(21, 249, 239)',
                        'rgba(1, 51, 255)',
                        'rgba(168, 34, 244)',
                        'rgba(220, 249, 9)',
                        'rgba(244, 34, 215)',
                        'rgba(249, 9, 122)',
                        'rgba(176, 249, 9)',
                        'rgba(9, 249, 176)',
                        'rgba(220, 9, 249)',
                        'rgba(9, 246, 249)',
                        'rgba(249, 118, 9)',
                        'rgba(235, 249, 9)',
                        'rgba(74, 249, 9)',
                        'rgba(9, 71, 249)',
                        'rgba(69, 143, 249)',
                        'rgba(249, 9, 9)',
                        'rgba(9, 249, 9)',
                        'rgba(151, 9, 249)',
                        'rgba(69, 143, 249)',
                        'rgba(249, 238, 9)',
                      
                    ],
                    borderWidth: 3,
                    
                  };
                  
                  var cleinetes = {
                      
                    label: 'agente Evaluados',
                    data: agente,
                    backgroundColor: 'rgba(99, 133, 249,0.5)',
                    
                    borderWidth: 0,
                    yAxisID: "y-axis-gravity"
                  };
                  
                  var planetData = {
                    labels: pregunta,
                    datasets: [calificacion]
                  };
                  
                  var chartOptions = {
                    responsive: false,
                        scales: {
                        xAxes: [{
                            ticks: {
                            maxRotation: 90,
                            minRotation: 90,
                            
                            }
                        }],
                        yAxes: [{
                            
                            id: "y-axis-density",
                            id: "y-axis-gravity",
                              
                                  ticks: {
                                    callback: function(tick) {
                                      return tick.toString() + ' %';
                                    },
                                    beginAtZero: true
                                  }
                        }]
                        },
                        title:{
                            display: true,
                            text: 'PROMEDIO DE PARAMETROS Y SU CUMPLIMIENTO',
                            fontSize: 25
                        },
                        legend:{
                            padding: 20,
                            position: 'right',
                            labels:{
                                fontColor: '#000'
                            }
                        },
                        layout:{
                            padding:{
                                left:50,
                                right:0,
                                bottom:0,
                                top:0
                            }
                        },
                        tooltips:{
                            enabled: true
                        },
                        plugins:{
                            datalabels:{
                                color: '#fff',
                                anchor: 'end',
                                align: 'start',
                                offset: -10,
                                borderWidth: 3,
                                borderColor: '#fff',
                                borderRadius: 25,
                                backgroundColor: (context) => {
                                    return context.dataset.backgroundColor;
                                },
                                font: {
                                    weight: 'bold',
                                    size: '10'
                                },
                                formatter: (value) => {
                                    return value + ' %';
                                }
                            }
                        },
                      
                  };

                  var ctx = $("#detalle");
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


$.ajax({
  type: 'POST',
  url: 'http://www.auditoria.damplus.net/cantpreguntasAgenteindicadores',
  data:  { id }, 

  success: function(data) {
  //console.log(data);
              var promedio = [];
              var pregunta = [];
          
              for (var i in data){
              promedio.push(data[i].promediox);
              pregunta.push(data[i].preguntax);
         
                 
             }
             Chart.defaults.global.hover.mode = 'nearest';
     
          
              
              Chart.defaults.global.defaultFontFamily = "Lato";
              Chart.defaults.global.defaultFontSize = 18;


              var promedio = {
                  label: 'promedio',
                  data: promedio,
                  backgroundColor:   [
                    
                      'rgba(30, 245, 85,0.4)',
                      'rgba(69, 143, 249,0.4)',
                      'rgba(248, 34, 0,0.4)',
                      'rgba(249, 194, 21,0.4)',
                      'rgba(21, 249, 239,0.4)',
                      'rgba(1, 51, 255,0.4)',
                      'rgba(168, 34, 244,0.4)',
                      'rgba(220, 249, 9,0.4)',
                      'rgba(244, 34, 215,0.4)',
                      'rgba(249, 9, 122,0.4)',
                      'rgba(176, 249, 9,0.4)',
                      'rgba(9, 249, 176,0.4)',
                      'rgba(220, 9, 249,0.4)',
                      'rgba(9, 246, 249,0.4)',
                      'rgba(249, 118, 9,0.4)',
                      'rgba(235, 249, 9,0.4)',
                      'rgba(74, 249, 9,0.4)',
                      'rgba(9, 71, 249,0.4)',
                      'rgba(69, 143, 249,0.4)',
                      'rgba(249, 9, 9,0.4)',
                      'rgba(9, 249, 9,0.4)',
                      'rgba(151, 9, 249,0.4)',
                      'rgba(69, 143, 249,0.4)',
                      'rgba(249, 238, 9,0.4)',
                  ],
                  borderColor: [
                      
                      'rgba(30, 245, 85)',
                      'rgba(69, 143, 249)',
                      'rgba(248, 34, 0)',
                      'rgba(249, 194, 21)',
                      'rgba(21, 249, 239)',
                      'rgba(1, 51, 255)',
                      'rgba(168, 34, 244)',
                      'rgba(220, 249, 9)',
                      'rgba(244, 34, 215)',
                      'rgba(249, 9, 122)',
                      'rgba(176, 249, 9)',
                      'rgba(9, 249, 176)',
                      'rgba(220, 9, 249)',
                      'rgba(9, 246, 249)',
                      'rgba(249, 118, 9)',
                      'rgba(235, 249, 9)',
                      'rgba(74, 249, 9)',
                      'rgba(9, 71, 249)',
                      'rgba(69, 143, 249)',
                      'rgba(249, 9, 9)',
                      'rgba(9, 249, 9)',
                      'rgba(151, 9, 249)',
                      'rgba(69, 143, 249)',
                      'rgba(249, 238, 9)',
                    
                  ],
                  borderWidth: 3,
                  
                };
                
              
                
                var planetData = {
                  labels: pregunta,
                  datasets: [promedio]
                };
                
                var chartOptions = {
                  responsive: false,
                      scales: {
                      xAxes: [{
                          ticks: {
                          maxRotation: 90,
                          minRotation: 90,
                          
                          }
                      }],
                      yAxes: [{
                         
                          id: "y-axis-density",
                          id: "y-axis-gravity",
                            
                                ticks: {
                                  callback: function(tick) {
                                    return tick.toString() + ' %';
                                  },
                                  beginAtZero: true
                                }
                      }]
                      },
                      title:{
                          display: true,
                          text: 'PROMEDIO GLOBAL POR PARAMETROS DE DIFICULTAD',
                          fontSize: 25
                      },
                      legend:{
                          padding: 20,
                          position: 'right',
                          labels:{
                              fontColor: '#000'
                          }
                      },
                      layout:{
                          padding:{
                              left:50,
                              right:0,
                              bottom:0,
                              top:0
                          }
                      },
                      tooltips:{
                          enabled: true
                      },
                      plugins:{
                          datalabels:{
                              color: '#fff',
                              anchor: 'end',
                              align: 'start',
                              offset: -10,
                              borderWidth: 3,
                              borderColor: '#fff',
                              borderRadius: 25,
                              backgroundColor: (context) => {
                                  return context.dataset.backgroundColor;
                              },
                              font: {
                                  weight: 'bold',
                                  size: '10'
                              },
                              formatter: (value) => {
                                  return value + ' %';
                              }
                          }
                      },
                    
                };

                var ctx = $("#dificulta");
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


$.ajax({
  type: 'POST',
  url: 'http://www.auditoria.damplus.net/cantpreguntasAgenteindicadores3',
  data:  { id }, 

  success: function(data) {
  //console.log(data);
              var promedio = [];
              var pregunta = [];
          
              for (var i in data){
              promedio.push(data[i].promediox);
              pregunta.push(data[i].preguntax);
         
                 
             }
             Chart.defaults.global.hover.mode = 'nearest';
     
          
              
              Chart.defaults.global.defaultFontFamily = "Lato";
              Chart.defaults.global.defaultFontSize = 18;


              var promedio = {
                  label: 'promedio',
                  data: promedio,
                  backgroundColor:   [
                    
                      'rgba(30, 245, 85,0.4)',
                      'rgba(69, 143, 249,0.4)',
                      'rgba(248, 34, 0,0.4)',
                      'rgba(249, 194, 21,0.4)',
                      'rgba(21, 249, 239,0.4)',
                      'rgba(1, 51, 255,0.4)',
                      'rgba(168, 34, 244,0.4)',
                      'rgba(220, 249, 9,0.4)',
                      'rgba(244, 34, 215,0.4)',
                      'rgba(249, 9, 122,0.4)',
                      'rgba(176, 249, 9,0.4)',
                      'rgba(9, 249, 176,0.4)',
                      'rgba(220, 9, 249,0.4)',
                      'rgba(9, 246, 249,0.4)',
                      'rgba(249, 118, 9,0.4)',
                      'rgba(235, 249, 9,0.4)',
                      'rgba(74, 249, 9,0.4)',
                      'rgba(9, 71, 249,0.4)',
                      'rgba(69, 143, 249,0.4)',
                      'rgba(249, 9, 9,0.4)',
                      'rgba(9, 249, 9,0.4)',
                      'rgba(151, 9, 249,0.4)',
                      'rgba(69, 143, 249,0.4)',
                      'rgba(249, 238, 9,0.4)',
                  ],
                  borderColor: [
                      
                      'rgba(30, 245, 85)',
                      'rgba(69, 143, 249)',
                      'rgba(248, 34, 0)',
                      'rgba(249, 194, 21)',
                      'rgba(21, 249, 239)',
                      'rgba(1, 51, 255)',
                      'rgba(168, 34, 244)',
                      'rgba(220, 249, 9)',
                      'rgba(244, 34, 215)',
                      'rgba(249, 9, 122)',
                      'rgba(176, 249, 9)',
                      'rgba(9, 249, 176)',
                      'rgba(220, 9, 249)',
                      'rgba(9, 246, 249)',
                      'rgba(249, 118, 9)',
                      'rgba(235, 249, 9)',
                      'rgba(74, 249, 9)',
                      'rgba(9, 71, 249)',
                      'rgba(69, 143, 249)',
                      'rgba(249, 9, 9)',
                      'rgba(9, 249, 9)',
                      'rgba(151, 9, 249)',
                      'rgba(69, 143, 249)',
                      'rgba(249, 238, 9)',
                    
                  ],
                  borderWidth: 3,
                  
                };
                
              
                
                var planetData = {
                  labels: pregunta,
                  datasets: [promedio]
                };
                
                var chartOptions = {
                  responsive: false,
                      scales: {
                      xAxes: [{
                          ticks: {
                          maxRotation: 90,
                          minRotation: 90,
                          
                          }
                      }],
                      yAxes: [{
                         
                        
                            
                                ticks: {
                                  callback: function(tick) {
                                    return tick.toString() + ' %';
                                  },
                                  beginAtZero: true
                                }
                      }]
                      },
                      title:{
                          display: true,
                          text: 'PROMEDIO GLOBAL POR PARAMETROS DE CUMPLIMIENTO',
                          fontSize: 25
                      },
                      legend:{
                          padding: 20,
                          position: 'right',
                          labels:{
                              fontColor: '#000'
                          }
                      },
                      layout:{
                          padding:{
                              left:50,
                              right:0,
                              bottom:0,
                              top:0
                          }
                      },
                      tooltips:{
                          enabled: true
                      },
                      plugins:{
                          datalabels:{
                              color: '#fff',
                              anchor: 'end',
                              align: 'start',
                              offset: -10,
                              borderWidth: 3,
                              borderColor: '#fff',
                              borderRadius: 25,
                              backgroundColor: (context) => {
                                  return context.dataset.backgroundColor;
                              },
                              font: {
                                  weight: 'bold',
                                  size: '10'
                              },
                              formatter: (value) => {
                                  return value + ' %';
                              }
                          }
                      },
                    
                };

                var ctx = $("#cumplimiento");
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



$('#indicador').show();
    });
  
   


  


});

