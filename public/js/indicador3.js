'use strict';

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
        var valor1 = document.querySelector("#progregoagentes");
        var tarea = $("#tarea");
        tarea.append(tareax);
        var tarea2 = $("#tarea2");
        tarea2.append(tareax);
      var agentes = $("#agentes");
      var meta = $("#meta");
        $.ajax({
          type: 'POST',
          url: 'http://auditoria.damplus.net/indica_llamadas',
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
        url: 'http://auditoria.damplus.net/cantpreguntasAgente',
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
                                ticks: {
                                beginAtZero: true
                                },
                                id: "y-axis-density",
                                id: "y-axis-gravity",
                                  
                                      ticks: {
                                        callback: function(tick) {
                                          return tick.toString() + ' %';
                                        }
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
      url: 'http://auditoria.damplus.net/indicadores',
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
                              beginAtZero: true
                              },
                              id: "y-axis-density",
                              id: "y-axis-gravity",
                                
                                    ticks: {
                                      callback: function(tick) {
                                        return tick.toString() + ' %';
                                      }
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


    });//fin de la funcion de onclick
  
    
});//fin del redy


