// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

$(document).ready(function() {
  $('#rilisSK').DataTable({
    dom: 'lBfrtip',
    buttons: [
      // 'copy', 'csv', 'excel', 'pdf', 'print'      
      {
        extend: 'excel',
        exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ]
        }
      },
      // {
      //   extend: 'pdf',
      //   exportOptions: {
      //     columns: [ 0, 1, 2, 3, 4 ]
      //   }
      // }
    ],
  });
  $('.buttons-excel').detach().prependTo('.container')  
  $('.buttons-pdf').detach().prependTo('.container')  
});

$(document).ready(function() {
  $('#pengajuan').DataTable({
    dom: 'lBfrtip',
    buttons: [      
      {
        extend: 'pdf',
        messageTop: text1+'\n\n'+text2+'\n'+text3,        
        exportOptions: {
          // columns: [ 0, 1, 2, 3, 4 ]
        }
      },
    ],
  });
  $('.buttons-excel').detach().prependTo('.container')
  $('.buttons-pdf').detach().prependTo('.container')
});
