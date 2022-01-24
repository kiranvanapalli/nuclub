<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<script>

$(document).ready(function() { 



/* Enquiry Validations */

$('#news_letter').click(function(e) 
{ 
    if($('#email').val() == '')

    {
      toastr["error"]("Email Address is required!");

      e.preventDefault();

    }
});

$('#partner_btn').click(function(e) 

{
    if($('#full_name').val() == '')

    {

        toastr["error"]("Full Name is required!");

        e.preventDefault();

    }

    if($('#email').val() == '')

    {

      toastr["error"]("Email Address is required!");

      e.preventDefault();

    }

    if($('#phone_number').val() == '')

    {

      toastr["error"]("Phone number is required!");

      e.preventDefault();

    }

    if($('#message').val() == '')

    {

      toastr["error"]("Message is required!");

      e.preventDefault();

    }

    var phone_number = $('#phone_number').val(),

    intRegex = /[0-9 -()+]+$/;

  
    if($('#phone_number').val() != '')

    {

        if((!intRegex.test(phone)))

        {

            toastr["error"]("Please enter a valid phone number!");

            e.preventDefault(); 

        }

        if($('#phone_number').val().length != 10 )

        {

          toastr["error"]("Phone must be 10 numbers!");

          e.preventDefault(); 

        }

    }
});

$('#advertise_btn').click(function(e) 

{

    if($('#full_name').val() == '')

    {

        toastr["error"]("Full Name is required!");

        e.preventDefault();

    }

    if($('#email').val() == '')

    {

      toastr["error"]("Email Address is required!");

      e.preventDefault();

    }

    if($('#phone_number').val() == '')

    {

      toastr["error"]("Phone number is required!");

      e.preventDefault();

    }



    if($('#about').val() == '')

    {

      toastr["error"]("Please Select how do you hear about us");

      e.preventDefault();

    }



    if($('#message').val() == '')

    {

      toastr["error"]("Message is required!");

      e.preventDefault();

    }



    var phone_number = $('#phone_number').val(),

    intRegex = /[0-9 -()+]+$/;

    



    if($('#phone_number').val() != '')

    {

        if((!intRegex.test(phone)))

        {

            toastr["error"]("Please enter a valid phone number!");

            e.preventDefault(); 

        }



        if($('#phone_number').val().length != 10 )

        {

          toastr["error"]("Phone must be 10 numbers!");

          e.preventDefault(); 

        }

    }



});



$('#contact_btn').click(function(e) 

{

    if($('#fname').val() == '')

    {

        toastr["error"]("First Name is required!");

        e.preventDefault();

    }   



    if($('#lname').val() == '')

    {

        toastr["error"]("Last Name is required!");

        e.preventDefault();

    }



    if($('#phone_number').val() == '')

    {

      toastr["error"]("Phone number is required!");

      e.preventDefault();

    }



    if($('#email').val() == '')

    {

      toastr["error"]("Email Address is required!");

      e.preventDefault();

    }



    if($('#enq_type').val() == '')

    {

      toastr["error"]("Please Select Enquiry Type");

      e.preventDefault();

    }



    if($('#message').val() == '')

    {

      toastr["error"]("Message is required!");

      e.preventDefault();

    }



    var phone_number = $('#phone_number').val(),

    intRegex = /[0-9 -()+]+$/;



    if($('#phone_number').val() != '')

    {

        if((!intRegex.test(phone)))

        {

            toastr["error"]("Please enter a valid phone number!");

            e.preventDefault(); 

        }



        if($('#phone_number').val().length != 10 )

        {

          toastr["error"]("Phone must be 10 numbers!");

          e.preventDefault(); 

        }

    }



});
        $('#careers_btn').click(function(e)

            {
                var allowedFiles = [".doc", ".docx", ".pdf"];
                var fileUpload = $("#resume");
                var regex = new RegExp("([a-zA-Z0-9()\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");

                if ($('#full_name').val() == '')

                {

                    toastr["error"]("Full Name is required!");

                    e.preventDefault();

                }

                if ($('#email').val() == '')

                {

                    toastr["error"]("Email Address is required!");

                    e.preventDefault();

                }

                if ($('#phono_number').val() == '')

                {

                    toastr["error"]("Phone number is required!");

                    e.preventDefault();

                }

                if ($('#resume').val() == '')

                {

                    toastr["error"]("Your Resume is required!");

                    e.preventDefault();

                }
                if (!regex.test(fileUpload.val().toLowerCase())) 
                {

                    toastr["error"]("Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.");
                   
                   e.preventDefault();
                }



                var phone_number = $('#phone_number').val(),

                    intRegex = /[0-9 -()+]+$/;





                if ($('#phone_number').val() != '')

                {

                    if ((!intRegex.test(phone)))

                    {

                        toastr["error"]("Please enter a valid phone number!");

                        e.preventDefault();

                    }



                    if ($('#phone_number').val().length != 10)

                    {

                        toastr["error"]("Phone must be 10 numbers!");

                        e.preventDefault();

                    }

                }



            });


$('#lang_btn').click(function(e)

            {

                if ($('#full_name').val() == '')

                {

                    toastr["error"]("Full Name is required!");

                    e.preventDefault();

                }

                if ($('#email').val() == '')

                {

                    toastr["error"]("Email Address is required!");

                    e.preventDefault();

                }

                if ($('#phone_number').val() == '')

                {

                    toastr["error"]("Phone number is required!");

                    e.preventDefault();

                }
                if ($('#course_intersted').val() == '')

                {

                    toastr["error"]("Course Intersted is required!");

                    e.preventDefault();

                }


                if ($('#message').val() == '')

                {

                    toastr["error"]("Message is required!");

                    e.preventDefault();

                }



                var phone_number = $('#phone_number').val(),

                    intRegex = /[0-9 -()+]+$/;





                if ($('#phone_number').val() != '')

                {

                    if ((!intRegex.test(phone)))

                    {

                        toastr["error"]("Please enter a valid phone number!");

                        e.preventDefault();

                    }



                    if ($('#phone_number').val().length != 10)

                    {

                        toastr["error"]("Phone must be 10 numbers!");

                        e.preventDefault();

                    }

                }



            });
// validation of email values

function validateEmail(email) {

  var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

  if (filter.test(email)) 

  {

   return true;

  }

  else 

  {

   return false;

  }

}

$(document).ready(function(){
    $('input[name="text"]').attr('autocomplete', 'off');
    });

$(function(){

 $("#marital_status").change(function(){

  var status = this.value;
   if(status=="2")
   {
     $(".spouse-details").show();
     $(".spouse_education_details").show();
     $(".spouse_work_experience").show();
     $(".spouse_qulifications_table").show();
     $(".spouse_qualifications").show();

   }

   else
   {
     $(".spouse-details").hide();
    // $(".spouse_education_details").hide();
     $(".spouse_work_experience").hide();
     $(".spouse_qulifications_table").hide();
     $(".spouse_qualifications").hide();

   }

  });

});
$(function(){

 $("#relative_in_australia_or_canada").change(function(){

  var status = this.value;
  console.log(status);
   if(status=="yes")
   {
     $(".relative_in_australia_or_canada").show();
    

   }

   else
   {
     $(".relative_in_australia_or_canada").hide();
   

   }

  });

});$(function(){

 $("#primary_spouse_appled_for_aus_or_canada").change(function(){

  var status = this.value;
  console.log(status);
   if(status=="yes")
   {
     $(".primary_spouse_appled_for_aus_or_canada").show();   

   }

   else
   {
     $(".primary_spouse_appled_for_aus_or_canada").hide();
   

   }

  });

});

// logo

$(function(){
 // vars for clients list carousel
  // http://stackoverflow.com/questions/6759494/jquery-function-definition-in-a-carousel-script
  var $clientcarousel = $('#clients-list');
  var clients = $clientcarousel.children().length;
  var clientwidth = (clients * 220); // 140px width for each client item 
  $clientcarousel.css('width',clientwidth);
  
  var rotating = true;
  var clientspeed = 0;
  var seeclients = setInterval(rotateClients, clientspeed);
  
  $(document).on({
    mouseenter: function(){
      rotating = false; // turn off rotation when hovering
    },
    mouseleave: function(){
      rotating = true;
    }
  }, '#clients');
  
  function rotateClients() {
    if(rotating != false) {
      var $first = $('#clients-list li:first');
      $first.animate({ 'margin-left': '-220px' }, 2000, function() {
        $first.remove().css({ 'margin-left': '0px' });
        $('#clients-list li:last').after($first);
      });
    }
  }
});

   



// validation of alphanumeric values

$.fn.regexMask = function(mask) {

    $(this).keypress(function (event) {

        if (!event.charCode) return true;

        var part1 = this.value.substring(0, this.selectionStart);

        var part2 = this.value.substring(this.selectionEnd, this.value.length);

        if (!mask.test(part1 + String.fromCharCode(event.charCode) + part2))

            return false;

    });

};

//work_experience
$(document).ready(function(){
var rowIdx = 0; 
//var primary_name_of_the_examination=0;

$('#primary_add_new_work_exprience').on('click', function () 
{ 
      //console.log(primary_add_new_work_exprience);
    $('#primary_add_new_work_exprience_tbody').append('<tr id="R${++rowIdx}"> <td><input type="text" class="form-control datepicker" name="prmry_work_exp_from_dat[]" placeholder="From Date " id="prmry_work_exp_from_dat[]"></td><td><input type="text" class="form-control datepicker" name="prmry_work_exp_to_dat[]" placeholder="To Date " id="prmry_work_exp_to_dat[]"></td><td><input type="text" placeholder="Name of Organisation" name="primary_org[]" id="primary_org[]" class="form-control"></td><td><input type="text" placeholder="Designation" name="primary_designation[]" id="primary_designation[]" class="form-control"></td><td><input type="text" placeholder="Located at" name="primary_located_at[]" id="primary_located_at[]" class="form-control"></td><td><input type="text" placeholder="Brief Job Description" name="primary_brief_job_descript[]" id="primary_brief_job_descript[]" class="form-control"></td><td class="text-center"><button class="btn btn-danger remove"type="button">Remove</button></td></tr>');
});
});

$('#primary_add_new_work_exprience_tbody').on('click', '.remove', function () { 

var child = $(this).closest('tr').nextAll(); 
  child.each(function () { 
  var id = $(this).attr('id'); 
  var idx = $(this).children('.row-index').children('p'); 
  var dig = parseInt(id.substring(1)); 
  idx.html('Row ${dig - 1}');
  $(this).attr('id', 'R${dig - 1}'); 
    });
  $(this).closest('tr').remove(); 
  rowIdx--; 

});

$(document).ready(function(){
var rowIdx = 0; 

$('#spouse_add_new_work_exprience').on('click', function () 
{ 
      
    $('#spouse_add_new_work_exprience_tbody').append('<tr id="R${++rowIdx}"> <td><input type="text" class="form-control datepicker" name="spouse_work_experience_from_date" placeholder="From Date " id="spouse_work_experience_from_date"></td><td><input type="text" class="form-control datepicker" name="spouse_work_experience_to_date" placeholder="To Date " id="spouse_work_experience_to_date"></td><td><input type="text" placeholder="Name of Organisation" name="spouse_name_of_organisation" id="spouse_name_of_organisation" class="form-control"></td><td><input type="text" placeholder="Designation" name="spouse_designation" id="spouse_designation" class="form-control"></td><td><input type="text" placeholder="Located at" name="spouse_located_at" id="spouse_located_at" class="form-control"></td><td><input type="text" placeholder="Brief Job Description" name="spouse_brief_job_description" id="spouse_brief_job_description" class="form-control"></td><td class="text-center"><button class="btn btn-danger remove"type="button">Remove</button></td></tr>');
});
});

$('#spouse_add_new_work_exprience_tbody').on('click', '.remove', function () { 

var child = $(this).closest('tr').nextAll(); 
  child.each(function () { 
  var id = $(this).attr('id'); 
  var idx = $(this).children('.row-index').children('p'); 
  var dig = parseInt(id.substring(1)); 
  idx.html('Row ${dig - 1}');
  $(this).attr('id', 'R${dig - 1}'); 
    });
  $(this).closest('tr').remove(); 
  rowIdx--; 

});


$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        dots: true,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});


function saveUserData(userData)
    {
      $.post('<?php echo base_url();?>saveUserData', 
      {
        
        oauth_provider:'linkedin',
        userData: JSON.stringify(userData)}, 
        function(data)
        { return true; 
        });
    }





//examination



$(document).ready(function(){
var rowIdx = 0; 
var primary_name_of_the_examination=0;

$('#primary_add_new_qulifications').on('click', function () 
{ 
      console.log(primary_name_of_the_examination);
    $('#primary_qulifications_tbody').append('<tr id="R${++rowIdx}"> <td> <input type="text" name="primary_name_exam[]" id="R${++primary_name_exam}" placeholder="Name of Examination"class= "form-control"></td><td><input type="text" name="primary_general_academic[]" id="primary_general_academic[]" placeholder="General/ Academic"class= "form-control"></td><td><input type="text" name="primary_listening_score[]" id="primary_listening_score[]" placeholder="Listening Score"class= "form-control"></td><td><input type="text" name="primary_reading_score[]" id="primary_reading_score[]" placeholder="Reading score"class= "form-control"></td><td><input type="text" name="primary_located[]" id="primary_located[]" placeholder="Located at"class= "form-control"></td><td><input type="text" name="primary_writing_Score[]" id="primary_writing_Score[]" placeholder="Writing Score"class= "form-control"></td><td><input type="text" name="primary_speaking_Score[]" id="primary_speaking_Score[]" placeholder="Speaking Score"class= "form-control"></td><td class="text-center"><button class="btn btn-danger remove"type="button">Remove</button></td></tr>');
});
});

$('#primary_qulifications_tbody').on('click', '.remove', function () { 

var child = $(this).closest('tr').nextAll(); 
  child.each(function () { 
  var id = $(this).attr('id'); 
  var idx = $(this).children('.row-index').children('p'); 
  var dig = parseInt(id.substring(1)); 
  idx.html('Row ${dig - 1}');
  $(this).attr('id', 'R${dig - 1}'); 
    });
  $(this).closest('tr').remove(); 
  rowIdx--; 

});
$(document).ready(function(){
var rowIdx = 0; 
$('#spouse_add_new_qulifications').on('click', function () 
{ 
     
    $('#spouse_qulifications_tbody').append('<tr id="R${++rowIdx}"> <td> <input type="text" name="spouse_name_of_the_examination" id="spouse_name_of_the_examination" placeholder="Name of Examination"class= "form-control"></td><td><input type="text" name="spouse_general_academic" id="spouse_general_academic" placeholder="General/ Academic"class= "form-control"></td><td><input type="text" name="spouse_listening_score" id="spouse_listening_score" placeholder="Listening Score"class= "form-control"></td><td><input type="text" name="spouse_reading_score" id="spouse_reading_score" placeholder="Reading score"class= "form-control"></td><td><input type="text" name="spouse_located_at" id="spouse_located_at" placeholder="Located at"class= "form-control"></td><td><input type="text" name="spouse_writing_Score" id="spouse_writing_Score" placeholder="Writing Score"class= "form-control"></td><td><input type="text" name="spouse_speaking_Score" id="primary_speaking_Score" placeholder="Speaking Score"class= "form-control"></td><td class="text-center"><button class="btn btn-danger remove"type="button">Remove</button></td></tr>');
});
});




$('#spouse_qulifications_tbody').on('click', '.remove', function () { 

var child = $(this).closest('tr').nextAll(); 
child.each(function () { 
  var id = $(this).attr('id'); 
  var idx = $(this).children('.row-index').children('p'); 
  var dig = parseInt(id.substring(1)); 
  idx.html('Row ${dig - 1}');
  $(this).attr('id', 'R${dig - 1}'); 
    });
  $(this).closest('tr').remove(); 
  rowIdx--; 
});


$(document).ready(function(){
var rowIdx = 0; 
$('#spouse_add_new_education').on('click', function () 
{ 
     
    $('#spouse_education_tbody').append(`<tr id="R${++rowIdx}">
                                        <td>
                                            <select name="education[]" id="education[]" class="form-control">
                                                <option value="">Select</option>
                                                <option value="Secondary">Secondary</option>
                                                <option value="Higher Secondary">Higher Secondary</option>
                                                <option value="Certificate">Certificate</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="Bachelor">Bachelor</option>
                                                <option value="PG Diploma">PG Diploma</option>
                                                <option value="Master">Master</option>
                                                <option value="Doctorate">Doctorate</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control datepicker" name="education_from_date[]" placeholder="From Date " id="education_from_date[]">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control datepicker" name="educat_to_date[]" placeholder="To Date " id="educat_to_date[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="institute_university[]" placeholder="Institute/ University" id="institute_university[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="city_country[]" placeholder="City, Country " id="city_country[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="type_of_certificate[]" placeholder="Type of Certificate Issued " id="type_of_certificate[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="filed_of_study[]" placeholder="Field of Study" id="filed_of_study[]">
                                        </td>
                                        <td class="text-center"><button class="btn btn-danger remove"type="button">Remove</button></td>
                                    </tr>`);
});
});




$('#spouse_education_tbody').on('click', '.remove', function () { 

var child = $(this).closest('tr').nextAll(); 
child.each(function () { 
  var id = $(this).attr('id'); 
  var idx = $(this).children('.row-index').children('p'); 
  var dig = parseInt(id.substring(1)); 
  idx.html('Row ${dig - 1}');
  $(this).attr('id', 'R${dig - 1}'); 
    });
  $(this).closest('tr').remove(); 
  rowIdx--; 
});

  toastr.options = {

  "closeButton": true,

  "debug": false,

  "newestOnTop": false,

  "progressBar": true,

  "positionClass": "toast-top-right",

  "preventDuplicates": false,

  "onclick": null,

  "showDuration": "100000",

  "hideDuration": "100000",

  "timeOut": "10000",

  "extendedTimeOut": "10000",

  "showEasing": "swing",

  "hideEasing": "linear",

  "showMethod": "fadeIn",

  "hideMethod": "fadeOut"

  }

});


  
/*$.ajax({
                url:"<?php echo base_url(); ?>search_study",                
                success:function(dat){
                  console.log(dat);
                  autocomplete(document.getElementById("myInput"), dat);
                  
                }     
      });*/

</script>
<script type="text/javascript">
    function check_login(){
   toastr["error"]("Please login");
}

  function add_likes(id,th){
     var CSRF_T = $('#CSRF_TOKEN').val();
var loggedid=$('#logged_id').val();
  // alert(loggedid);
   
   if(loggedid){ 
   
        
     $.ajax({
            type: "POST",
            url: "<?=base_url()?>frontend_side/frontend/add_likes/",
            cache: false,
            data: {
            id: id,
            },
           success: function(response) {                  
                 //alert(response);
                 if (response=='Liked'){
                   toastr["success"]("Added Wishlist");
                  // $(th).addClass('likedcls'); 
                 } else if (response=='Unliked'){ 
                  toastr["warning"]("Removed Wishlist");
                //$(th).find(".like-icon").removeClass("likedcls"); 
                 }                   
            },
            fail: function (error) {
                  alert(error);
            }
      }); 
   }else if(typeof loggedid === 'undefined' || loggedid === null){
      toastr["error"]("Please login");
      window.location.href = "<?=base_url()?>";
   }          
   }
  
</script>