<script>
$(document).ready(function() {

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $(document).on('submit', '#edit_product_form', function(event) {
        event.preventDefault();

       var promotion_radio = $('input[type=radio][name=promotion_value]:checked').val();

       console.log(promotion_radio);

        if ($('#product_type').val() == '') {
            toastr["error"]("Please Select Product Type");
            return false;
        }
        if ($('#product_name').val() == '') {
            toastr["error"]("Please Enter Product Name");
            return false;
        }
        if ($('#manufactured').val() == '') {
            toastr["error"]("Please Select Manufactured");
            return false;
        }
        if ($('#year').val() == '') {
            toastr["error"]("Please Select Year");
            return false;
        }
        if ($('#model').val() == '') {
            toastr["error"]("Please Enter Model");
            return false;
        }
        if ($('#engine_displacement').val() == '') {
            toastr["error"]("Please Enter Engine Displacement");
            return false;
        }
        if ($('#price').val() == '') {
            toastr["error"]("Please Enter Product Price");
            return false;
        }
        if($('input[type=radio][name=promotion_value]:checked').length == 0) {
        toastr["error"]("Please select Promotions Yes or No!");
        return false;
       }

       if(promotion_radio == 'yes')
       {
           if($('#promotions_name').val() == '')
           {
            toastr["error"]("Please select Promotions");
            return false;
           }
       }
        
        // if($('.promotion_value').val() == 'yes')
        // {
        //     if($('#promotions').val() == '')
        //     {
        //         toastr["error"]("Please Enter Product Price");
        //         return false;
        //     }
        // }

        

        $.ajax({  
             url:"<?php echo base_url() ?>update_product",  
             method:'POST',  
             data:new FormData(this),
             contentType:false,  
             processData:false, 
             dataType:'JSON',
             success:function(data)  
             {  
              console.log(data);
                if(data.status == 'success')
                {
                    
                    toastr["success"]("Product Updated Successfully!");
                    window.location.href = "<?php echo base_url(); ?>product_list";
                }
                else
                {
                      toastr["error"]("Product updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });;
    });
    $("input[name='promotion_value']").click(function() {
        if ($("#yes").is(":checked")) {
            $("#promotion_div").show();
            
        } else {
            $("#promotion_div").hide();
            $("#promotions_name").val('');
        }
    });
});
</script>