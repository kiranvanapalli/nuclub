<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_file_upload {

    protected  $ci;
	public function __construct() /* use a constructor, as you can't directly call a function*/
	{
	  $this->ci =& get_instance();
	}

   public function do_upload($data)
   {	
		$img_name       = $data['img_name'];
		$img_path       = $data['img_path'];
		$img_size       = $data['max_size'];
		$img_height     = $data['max_height'];
		$img_width      = $data['max_width'];
		$allowed_types  = $data['allowed_types'];

	    if(!empty($img_name))
        {
			$config = array(
			'upload_path' => $img_path,
			'allowed_types' => $allowed_types,
			'overwrite' => TRUE,
			'max_size' => $img_size, 
			'max_height' => $img_height,
			'max_width' =>  $img_width,
			'encrypt_name' => TRUE
			);

		    $this->ci->upload->initialize($config);
			if($this->ci->upload->do_upload($img_name))
			{
			  return array('message' => $this->ci->upload->data());
			}
			else
			{
			  return array('error' => $this->ci->upload->display_errors()); 
			}            
       }
       else
       {
       	 return false;
       }

    }



    public function file_uploads($img_data)
    {
        /*create img required details size,path*/
        
        $img_data = array(
            'img_name' => $img_data['img_name'],
            'img_path' => $img_data['img_path'],
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size' => '*',
            'max_height' => '*',
            'max_width' => '*'
        );

        /*This is the file upload Custom library file*/
        //$this->load->library('my_file_upload');
        $file     = $this->do_upload($img_data);
        //echo FCPATH.$img_data['img_path'].$file['message']['file_name'];exit;

        //print_r($file);
        if(isset($file['message']['file_name']) && !empty($file['message']['file_name']) && file_exists(FCPATH.$img_data['img_path'].'/'.$file['message']['file_name']))
        {
            $filename = preg_replace("/[^A-Za-z0-9\_\-\.]/",'',basename($file['message']['file_name']));
            $filename = $filename;   
        }
        else
        {
            $filename = '';   
        }

        return $filename;


    }

    public function file_upload($data)
    {
        /* Below parameters are required to upload a image */

            // $config['upload_path']   = $data['upload_path'];
            // $config['allowed_types'] = implode("|",$data['allowed_types']);
            // $config['max_size']      = $data['max_size'];
            // $config['max_width']     = $data['max_width'];
            // $config['max_height']    = $data['max_height'];
            $config = $this->ci->upload->initialize($this->set_upload_options($data));
            $this->ci->load->library('upload', $config);
            if ( !$this->ci->upload->do_upload($data['file_input_name']))
            {
                $res = array(
                    'error' => $this->ci->upload->display_errors(),
                    'status' => false
                );                      
            }
            else
            {
                $uploaded_data = $this->ci->upload->data(); 
                $res = array('upload_data' => $this->ci->upload->data(),'status'=>true);                                              
            }
            return $res;
    }


    public function multipe_file_upload($data)
    {
        /* Below parameters are required to upload a image */
            // $data['userfile'];
            // $data['upload_path'];
            // $data['allowed_types'];
            // $data['max_size'];
            // $data['max_width'];
            // $data['max_height'];
            // $data['is_has_thumbnail'];
            // $data['thumbnail_new_path'];
            // $data['thumbnail_width'];
            // $data['thumbnail_height'];
            $this->ci->load->library('upload');

            $res = array(); $error = false;
            $file_name = $_FILES[$data['file_input_name']]['name'];
            $files = $_FILES;
            if (isset($file_name) && !empty($file_name)) 
            {
               $file_count  = count($file_name);
               for($i = 0; $i < $file_count; $i++)
               {    
                    $_FILES['file']['name']     = $files[$data['file_input_name']]['name'][$i];
                    $_FILES['file']['type']     = $files[$data['file_input_name']]['type'][$i];
                    $_FILES['file']['tmp_name'] = $files[$data['file_input_name']]['tmp_name'][$i];
                    $_FILES['file']['error']    = $files[$data['file_input_name']]['error'][$i];
                    $_FILES['file']['size']     = $files[$data['file_input_name']]['size'][$i];
                    
                    $this->ci->upload->initialize($this->set_upload_options($data));
                    if ( !$this->ci->upload->do_upload('file'))
                    {
                        $res[$i]     = array(
                            'error' => $this->ci->upload->display_errors(),
                            'status' => false
                        );
                        $error = true;                      
                    }
                    else
                    {
                        $res[$i] = $this->ci->upload->data();
                        // $thumbnail = null;
                        // if(isset($data['is_has_thumbnail']))
                        // {
                        //     $thumbnail = $this->_create_thumbnail($res[$i]['full_path'],$data);
                        // }
                    }
               }
            }

            if($error)
            {
                $response = array(
                    "status"=>false,
                    "errors"=>$res,
                );
            }
            else
            {
                $response = array(
                    "status"=>true,
                    "data"=>$res,
                ); 
            }
             
            
                
        return $response;
    }

    private function set_upload_options($data)
    {   
        //upload an image options
        $config = array();
        $config['upload_path']   = $data['upload_path'];
        $config['allowed_types'] = implode("|",$data['allowed_types']);
        $config['max_size']      = $data['max_size'];
        $config['max_width']     = $data['max_width'];
        $config['max_height']    = $data['max_height'];
        $config['overwrite']     = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name']  = TRUE;
        return $config;
    }
   

}