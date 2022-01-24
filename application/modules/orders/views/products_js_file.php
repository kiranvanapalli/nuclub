<script>
$(document).ready(function() {

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    var product_list = $('#product_table').DataTable({

        'searching': true,
        'paging': true,
        "responsive": true,
        "processing": true,
        // "serverSide": true,
        'lengthChange': true,
        // "dom": 'Bfrtip',

        "buttons": [
            'csv', 'excel', 'pdf', 'print'
        ],

        "order": [],
        "ajax": {
            "url": "<?php echo base_url('getproducts'); ?>",
            "type": "POST",
        },
        "columnDefs": [{
            targets: -1,
            "orderable": false,
        }, ],
    });
    $(document).on('submit', '#add_product', function(event) {
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
       
       

        

        $.ajax({
            url: "<?php echo base_url() ?>add_product",
            data: new FormData(this),
            method: 'POST',
            contentType: false,
            processData: false,
            success: function(data) {

                if (data) {
                    $('#add_product')[0].reset();
                    toastr["success"]("Produc Added Successfully!");
                    window.location.href = "<?php echo base_url(); ?>product_list";
                } else {
                    toastr["error"]("Product Added failed! Please try again.");
                    return false;
                }
            }
        });
    });
    $("input[name='promotion_value']").click(function() {
        if ($("#yes").is(":checked")) {
            $("#promotion_div").show();
        } else {
            $("#promotion_div").hide();
        }
    });

    $(document).on('click', '.delete_product', function(event) {
        event.preventDefault();
        var id = $(this).attr("id");
        swal({
                title: "Do you want delete this Product Data?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo base_url() . 'delete_product'?>",
                        method: "POST",
                        data: {
                            product_id: id,
                            <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'".$this->security->get_csrf_hash()."'"; ?>
                        },
                        success: function(resp) {
                            window.location.href =
                                "<?php echo base_url(); ?>product_list";
                            // product_type_table.ajax.reload();  
                        }
                    });
                }
                return false;
            });
});

    });
</script>