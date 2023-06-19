$(document).ready(function(){
  $('a[data-confirm]').click(function(ev){
    var href = $(this).attr('href');
    if(!$('#confirm-delete').length){
      $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR CADASTRO<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body">Tem certez que deseja excluir o cadastro permanentemente?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Excluir</a></div></div></div></div>');
    }
    $('#dataConfirmOk').attr('href', href);
    $('#confirm-delete').modal({shown:true});
    return false;
  });
});


window.onload = () => {
  'use-strict';

  if('serviceworker' in navigator){
    navigator.serviceworker
        .register('sw.js');
  }
}

/* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ],
      datasets: [{
        data: [
          15339,
          21345,
          18483,
          24003,
          23489,
          24092,
          12034
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
})()
