<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

     if ( !function_exists('pr'))
     {
       function pr($data)
       {
          echo "<pre>";
    		  print_r($data);
    		  echo "<h2> In detail <h2>";
    		  var_dump($data);
    		  exit;
       }
     }
	 
	  if ( !function_exists('prnot'))
     {
       function prnot($data)
       {
          echo "<pre>";
    		  print_r($data);
    		  //echo "<h2> In detail <h2>";
    		  //var_dump($data);
       }
     }
	 
	 if ( !function_exists('current_date'))
     {
       function current_date()
       {
          return date('Y-m-d H:i:s');
		  
       }
     }

     if ( !function_exists('date_convert'))
     {
       function date_convert($originalDate)
       {
          return date("Y-m-d", strtotime($originalDate));
      
       }
     }


     if ( !function_exists('show_date_only'))
     {
         function show_date_only($date)
         {
              $createDate = new DateTime($date);
              $newdate = $createDate->format('d-m-Y');
              return $newdate;
         }
     }

       if ( !function_exists('sms_gate_way'))
      {
          function sms_gate_way($phone,$meassage)
          {
              $api_key = '3604F44F36FD71';
              $contacts = $phone;
              $from = 'SMCAKE';
              $sms_text = urlencode($meassage);
              $api_url = "http://bulksms.adnectics.com/app/smsapi/index.php?key=".$api_key."&campaign=12357&routeid=30&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
              $response = file_get_contents($api_url);
              return $response;
          }
     }  

    if (!function_exists('_file_upload'))
    {
        function _file_upload($file_data)
        {
        
            if(isset($file_data) && !empty($file_data) && is_array($file_data))
            {
              $ci =& get_instance();
              $ci->load->library('my_file_upload');
              $file = $ci->my_file_upload->file_upload($file_data);
              if(!$file['status'])
              {
                $data = array(
                  'errors' => $file['error'],
                  'status' => false,
                );
              }
              else
              {
                $data = array(
                  'data' => $file['upload_data'],
                  'status' => true,
                );
              }
            }
            else
            {
              $data = array(
                'errors' => 'Invalid file, Please check once again',
                'status' => false,
              );
            }        
            return $data;
      }
  }



    if (!function_exists('_multiple_file_upload'))
    {
      function _multiple_file_upload($file_data)
      {
      
        if(isset($file_data) && !empty($file_data) && is_array($file_data))
        {
          $ci =& get_instance();
          $ci->load->library('my_file_upload');
          $file = $ci->my_file_upload->multipe_file_upload($file_data);
          if(!$file['status'])
          {
            $data = array(
              'errors' => $file['errors'],
              'status' => false,
            );
          }
          else
          {
            $data = array(
              'data' => $file['data'],
              'status' => true,
            );
          }
        }
        else
        {
          $data = array(
            'errors' => 'Invalid file, Please check once again',
            'status' => false,
          );
        }        
        return $data;
      }
  }



  if(!function_exists('_muli_file_upload_validation'))
  {
    function _muli_file_upload_validation($data)
    {
  
      // Requierd parameters
      // $data["file_input_name"];
      // $data["max_size"];
      // $data["max_width"];
      // $data["max_height"];
      // $data["allowed_types"];


      if(isset($data) && !empty($data) && is_array($data))
      {
        $response = array(
          "status" => true,
          "message" => "Validation checked",
        );
        $cont = $_FILES[$data["file_input_name"]]["name"];

        for($i=0;$i<count($cont);$i++)
        {
          // Checks the sizes
          // if (($_FILES[$data["file_input_name"]]["size"][$i] > $data["max_size"])) { //bytes
          //   $response = array(
          //     "message" => "Image size exceeds ".convertToReadableSize($data["max_size"]),
          //     "status" => false,
          //   );
          //   //  break;
          // } 
          
          // Checks the width and heights
          if($data["max_width"] != "*" && $data["max_height"] != "*")
          {
              $image_info = getimagesize($_FILES[$data["file_input_name"]]["tmp_name"][$i]);
              $image_width = $image_info[0];
              $image_height = $image_info[1];
              
              if ($image_width > $data["max_width"] && $image_height >  $data["max_height"]) {
                $response = array(
                  "message" => "Image dimension should be within ".$data['max_width']."X".$data['max_height'],
                  "status" => false,
                );
                //  break;
              }
          }  

          // Checks the extenstions types
          $allowed_image_extension = $data["allowed_types"];
          
          // Get image file extension
          $file_extension = pathinfo($_FILES[$data["file_input_name"]]["name"][$i], PATHINFO_EXTENSION);
          if (! in_array($file_extension, $allowed_image_extension)) {
            $response = array(
              "status" => false,
              "message" => "Upload file type not allowed."
            );
          }
        }  
      }
      else
      {
        $response = array(
          "status" => false,
          "message" => "Check the data array",
        );  
      }      
      return $response;
    }   
  }

  function convertToReadableSize($size)
  {
    $base = log($size) / log(1024);
    $suffix = array("bytes", "KB", "MB", "GB", "TB");
    $f_base = floor($base);
    return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
  }   
     