<?php if($this->session->flashdata('success')) {  ?>
<script type="text/javascript">
toastr.success("<?php echo $this->session->flashdata('success'); ?>", "", {
"closeButton": "true",
"progressBar": "true",
"positionClass": "toast-top-right",
 "timeOut": "5000",
 "extendedTimeOut": "1000"  
});
</script> 
<?php  } if($this->session->flashdata('error')){ ?>
<script type="text/javascript">
toastr.error("<?php echo $this->session->flashdata('error');?>", "", {
"closeButton": "true",
"progressBar": "true",
"positionClass": "toast-top-right"
});
</script> 
<?php } ?>  
 
<script type="text/javascript">       
    <?php 
        $err = validation_errors('', ',');
        $error_msg = explode(',',$err);                    
        if(isset($error_msg, $err) && !empty($error_msg) && (count($error_msg) > 0)  ){           
            foreach($error_msg as $error){
                if($error != ""){
    ?>          
    toaster("<?php echo trim(str_replace("<p>","",$error)); ?>");      
<?php } } } ?> 

function toaster(err_msg)
{
    if(err_msg){
        toastr.error(err_msg, "", {
         "closeButton": "true",
         "progressBar": "true"
     }); 
    }
    
}  
