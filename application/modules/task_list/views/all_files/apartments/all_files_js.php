<script>
$(document).ready(function(){

  var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

  if(($(".product_list").length > 0)){
   
  var product_dataTable =  $('.product_list').DataTable({

    'searching'   : true,
    'paging'      : true,
    "responsive": true,
    //"processing": true,
    //"serverSide": true,
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
           "url": "<?php echo base_url('all-apartments'); ?>",
            "type": "POST",
              "data":function(data) {
              // data.from_date = $('#from_date').val();
              // data.to_date = $('#to_date').val();               
              // data.category = $('#Category').val();               
              // data.vendor = $('#vendor').val(); 

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

  $(document).on('click', '.all_delete', function(){

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
                  setTimeout(function(){ location.reload(); }, 2000);
                  //dataTable.draw();
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




 
});

</script>