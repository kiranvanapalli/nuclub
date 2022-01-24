<script>
$(document).ready(function(){

  var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';


  //  $('#reset_form').click(function(){

  //     $('.product_search_form')[0].reset();
  //     $('#from_date').val('');
  //     $('#to_date').val('');
  //     $('#Category').val('');
  //     $('#vendor').val('');

  // });


  if(($(".tranctions_list").length > 0)){
   
  var tran_dataTable =  $('.tranctions_list').DataTable({

    'searching'   : true,
    'paging'      : true,
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
            "data":function(data) {
            
              data.from_date = $('#from_date').val();
              data.to_date   = $('#to_date').val();                             
              data.customer    = $('#customer').val(); 
              data.appartment    = $('#appartment').val(); 
              data.months    = $('#months').val(); 
            },

         
           // success:function(return_data)
           //  {
           //      //console.log(return_data);
           //      $('.total_amounts').text(return_data.total_amount);
           //  }
            
        },
        
        "columnDefs":[  
                {  
                     targets: -1,  
                     "orderable":false,  
                },  
           ],  
    });

  } 



  $('#reset_tranctions').click(function(){

      $('.tranction_search_form')[0].reset();
      $('#from_date').val('');
      $('#to_date').val('');
      $('#months').val('');
      $('#customer').val('');
      $('#appartment').val('');
      

  });




  
 
});

</script>