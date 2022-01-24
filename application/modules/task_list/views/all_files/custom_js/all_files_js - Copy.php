<script>
$(document).ready(function(){

  var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

 if(($("#example").length > 0)){
   
  var vendor_dataTable =  $('#example').DataTable({

    // 'searching'   : true,
    // 'paging'      : true,
     //"responsive": true,
     //"processing": true,
     "serverSide": true,
     //'lengthChange': true,
     //'ordering'    : true,
    // 'info'        : true,
    //  'autoWidth'   : true,
    //"dom": 'Bfrtip',

    "buttons": [
        'excel', 'pdf', 'print'
    ],

    "order": [],
        "ajax": {
           "url": "<?php echo base_url('all-vendors'); ?>",
            "type": "POST",
        
        },
        "columnDefs":[  
                {  
                     targets: -1,  
                     "orderable":false,  
                },  
           ],  
    });

  } 





  if(($(".farmer_list").length > 0)){
   
  var farmer_dataTable =  $('.farmer_list').DataTable({

    'searching'   : true,
    'paging'      : true,
    "responsive": true,
    "processing": true,
    "serverSide": true,
    'lengthChange': true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true,
    //"dom": 'Bfrtip',

    "buttons": [
       'csv', 'excel', 'pdf', 'print'
    ],

    "order": [],
        "ajax": {
           "url": "<?php echo base_url('all-farmers'); ?>",
            "type": "POST",
            //   "data":function(data) {
            //   data.from_date = $('#from_date').val();
            //   data.to_date = $('#to_date').val();               
            // },
        },
        "columnDefs":[  
                {  
                     targets: -1,  
                     "orderable":false,  
                },  
           ],  
    });

  } 


  if(($(".product_list").length > 0)){
   
  var product_dataTable =  $('.product_list').DataTable({

    'searching'   : true,
    'paging'      : true,
    "responsive": true,
    "processing": true,
    "serverSide": true,
    'lengthChange': true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true,
    //"dom": 'Bfrtip',

    "buttons": [
       'csv', 'excel', 'pdf', 'print'
    ],

    "order": [],
        "ajax": {
           "url": "<?php echo base_url('all-products'); ?>",
            "type": "POST",
              "data":function(data) {
              data.from_date = $('#from_date').val();
              data.to_date = $('#to_date').val();               
              data.category = $('#Category').val();               
              data.vendor = $('#vendor').val();               
            },
        },
        "columnDefs":[  
                {  
                     targets: -1,  
                     "orderable":false,  
                },  
           ],  
    });

  } 



   $('#reset_form').click(function(){

      $('.product_search_form')[0].reset();
      $('#from_date').val('');
      $('#to_date').val('');
      $('#Category').val('');
      $('#vendor').val('');
      

  });



   if(($(".tranctions_list").length > 0)){
   
  var tran_dataTable =  $('.tranctions_list').DataTable({

    'searching'   : true,
    //'paging'      : true,
    "responsive": true,
    "processing": true,
    //"serverSide": true,
    'lengthChange': true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true,
    "dom": 'Bfrtip',

    "buttons": [
      'excel', 'pdf', 'print'
    ],

    "order": [],
        "ajax": {
           "url": "<?php echo base_url('all-tranctions'); ?>",
            "type": "POST",
            'dataType': "json",
            'async': false,
            'global': false,
              "data":function(data) {

                //alert(data.data);
                // console.log(data.recordsTotal);

                // var json = data;
                // var obj = JSON.parse(json);
                // console.log(obj.recordsTotal);
                // var parsed_result = JSON.parse(data);
                // alert(parsed_result);
                

                //$('.total_amount').html('<button style="background: #40b435; color: white;"  type="button" class="btn btn-block btn-lg" > Rs 70000 /- </button>');

              data.from_date = $('#from_date').val();
              data.to_date = $('#to_date').val();               
              data.category = $('#Category').val();               
              data.vendor = $('#vendor').val();               
            },
        },
        "columnDefs":[  
                {  
                     targets: -1,  
                     "orderable":false,  
                },  
           ],  
    });

  } 



  $(document).on('click', '.all_delete', function(){

    var dataTable = $(this).data("ajax_table");


    if(dataTable == "vendor_dataTable")
    {
       dataTable = vendor_dataTable;
    }
    else if(dataTable == "farmer_dataTable")
    {
        dataTable =  farmer_dataTable;
    }
    else if(dataTable == "product_dataTable")
    {
       dataTable = product_dataTable;
    }   
    

    if (confirm("Are you sure?")) {

      var id = $(this).attr("id");
      var table = $(this).data("table");
      var delete_id = $(this).data("column");
     
      $.ajax({
       url:"<?php echo base_url() . 'all-delete'?>",
       method:"POST",
       data:{id:id,table:table,delete_id:delete_id,<?php echo $this->security->get_csrf_token_name(); ?> : <?php echo "'".$this->security->get_csrf_hash()."'"; ?>},
          success:function(data)
          {
              if(data)
              {
                  toastr["success"]("Delete Successfully!"); 
                  //setTimeout(function(){ location.reload(); }, 2000);
                  dataTable.draw();
              }
              else
              {
                  toastr["error"]("Delete failed! Please try again.");
                  return false;
              } 
          }
      })
   }

});




  $(document).on('click', '.delete_all', function(){

    var dataTable = $(this).data("ajax_table");


    if(dataTable == "product_dataTable")
    {
       dataTable = product_dataTable;
    }
    else if(dataTable == "farmer_dataTable")
    {
        dataTable =  farmer_dataTable;
    }

    if (confirm("Are you sure?")) {

      var id = $(this).attr("id");
      var table = $(this).data("table");
      var delete_id = $(this).data("column");
     
      $.ajax({
       url:"<?php echo base_url() . 'delete-all'?>",
       method:"POST",
       data:{id:id,table:table,delete_id:delete_id,<?php echo $this->security->get_csrf_token_name(); ?> : <?php echo "'".$this->security->get_csrf_hash()."'"; ?>},
          success:function(data)
          {
              if(data)
              {
                  toastr["success"]("Delete Successfully!"); 
                  //setTimeout(function(){ location.reload(); }, 2000);
                  dataTable.draw();
              }
              else
              {
                  toastr["error"]("Delete failed! Please try again.");
                  return false;
              } 
          }
      })
   }

});





   $('#reset_tranctions').click(function(){

      $('.tranction_search_form')[0].reset();
      $('#from_date').val('');
      $('#to_date').val('');
      $('#vendor').val('');
      

  });

minutaNoPresentada.tablaMinutasNoPresentadas = $("#TablaMinutasNoPresentadas")
        .DataTable(
          {
              ajax: {
                  url: minutaAjax.configuracion.URLSERVICE + "escriturasPresentadas/consultaMinutasNoPresentadas",
                  timeout: minutaAjax.configuracion.TIMEOUT,
                  type: "POST",
                  dataType: "json",
                  data: function ( d ) {
                      d.columns[1].search.value = $('#anioEscritura').val();
                      d.columns[2].search.value = $('#numeroEscritura').val();
                      return JSON.stringify(d);
                   },
                   beforeSend: function (request) {
                       request.setRequestHeader("token", minutaAjax.getToken());
                   },                  
                  contentType: minutaAjax.configuracion.CONTENTTYPE,
                  error: function (xhr, error, thrown) {                
                       
                      minutaAjax.error(xhr, error, thrown);
                      $('#TablaMinutasNoPresentadas_processing').hide();                          
                       
                  }
              },              
              serverSide: true,
              searching: true,
              dom: "ltip",
              processing: true,
              deferRender: true,
              fnServerParams: function (aoData) {
 
                  aoData.cuit = $('#formPresentar').find('input[name="cuit"]').val();
                  aoData.anio = $('#formPresentar').find('input[name="anio"]').val();   
                  aoData.numero = $('#formPresentar').find('input[name="numero"]').val();           
              },      
              order: [[ 1, "asc" ]],
            columnDefs: columnDefs,
            
        select: {
            style: 'single'
        },
        pagingType: 'full'
    });
 
 
$('.filter-button').click(function (e) {
        minutaNoPresentada.tablaMinutasNoPresentadas.draw();
    });


  
 
});

</script>