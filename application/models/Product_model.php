<?php

class Product_model extends CI_Model
{

    public function get_product_manufactured()
    {
          return $this->db->select('*')->from('tb_manufactured')->get();
         // return $this->db->distinct()->select('tb_products.manufactured as manufactured_id, tb_manufactured.manufactured_name as manufactured_name')
         // ->from('tb_products')
         // ->join('tb_manufactured', 'tb_products.manufactured = tb_manufactured.manufactured_name')->get();
    }

    public function get_product_type()
    {
        return $this->db->select('*')->from('tb_product_type')->get();
    } 
    public function get_product_years()
    {
         // return $this->db->distinct()->select('year')->from('tb_products')->get();
        return $this->db->distinct()->select('tb_products.year as year, tb_years.year as year_name')
         ->from('tb_products')
         ->join('tb_years', 'tb_products.year = tb_years.year_id')->get();
    }  
    public function get_product_model()
    {
        // return $this->db->distinct()->select('model_name')->from('tb_products')->get();
         return $this->db->distinct()->select('tb_products.model as model, tb_models.model_name as model_name')
         ->from('tb_products')
         ->join('tb_models', 'tb_products.model = tb_models.model_id')->get();
    } 
    

 function fetch_filter_type($type)
 {
    $this->db->distinct();
    $this->db->select($type);
    $this->db->from('tb_products');
    $this->db->where('status', '1');
    return $this->db->get();
 }

 public function fetch_query($manufactured, $product_type, $product_years, $product_model)
 {
    $query = "SELECT p.*, b.manufactured_name,c.year,d.product_type,e.model_name FROM tb_products as p
    INNER JOIN tb_manufactured as b ON b.manufactured_id = p.manufactured INNER JOIN tb_years as c ON c.year_id = p.year INNER JOIN tb_product_type as d ON d.product_type_id = p.product_type INNER JOIN tb_models as e ON e.model_id = p.model
    WHERE p.status = '1' 
    ";


    if(isset($manufactured))
    {
       $manufactured_filter = implode("','", $manufactured);
       $query .= "AND p.manufactured IN('".$manufactured_filter."')";
    }

    if(isset($product_type))
    {
       $product_type_filter = implode("','", $product_type);
       $query .= "AND p.product_type IN('".$product_type_filter."')";

    }
    if(isset($product_years))
    {
       $product_years_filter = implode("','", $product_years);
       $query .= "AND p.year IN('".$product_years_filter."')";
      
    }
    if(isset($product_model))
    {
       $product_model_filter = implode("','", $product_model);
       $query .= "AND p.model IN('".$product_model_filter."')";
    }
    // echo $query;
    return $query;


 }

  public function count_all_product($manufactured, $product_type, $product_years, $product_model)
  {
      $query = $this->fetch_query($manufactured, $product_type, $product_years, $product_model);

      $data = $this->db->query($query);
      return $data->num_rows();
     
  }

  public function fetch_product_list_model($limit, $start, $manufactured, $product_type, $product_years, $product_model)
  {
      $query = $this->fetch_query($manufactured, $product_type, $product_years, $product_model);

      $query .= ' LIMIT '.$start.', ' . $limit;

     
      $data = $this->db->query($query);

      // echo $this->db->last_query();

      $output = '';
      if($data->num_rows() > 0)
      {
         foreach($data->result_array() as $row)
         {

            if(strlen($row['product_name']) > 30 ){
              $title = substr($row['product_name'], 0,30).'...';
            }
            else{
              $title = substr($row['product_name'], 0,30);
            }

            $output .= '
            <div class="col-lg-3">
                            <div class="car-item price-remove gray-bg text-center">
                                <div class="car-image">
                                    <img src="'.base_url().'uploads/product_images/'. $row['product_image'] .'" alt=""  class="img-fluid" >
                                </div>
                                <div class="car-content">

                                     <a href= "'.base_url().'get_single_product?id='.$row['product_id'].'"<br>'.$row['manufactured_name'].'<span>'.$row['engine_displacement'] .'</span></a>
                                     <div class="separator"></div>
                                     <div class="car-lists">
                                            <ul class="list-inline">
                                                <li><i class="fa fa-registered"></i>'. $row['year'] .'</li>
                                                <li><i class="fa fa-cog"></i>'.  $row['model_name'] .'</li>
                                                <li><i class="fa fa-dashboard"></i> '. $row['product_type'] .' </li>
                                            </ul>
                                        </div>


                                    
                                </div>
                            </div>
                        </div>';
         }
      }
      else
      {
          $output = '<div class="col-sm-3"></div><div class="col-sm-6"><img src="'.base_url().'images/empty.png" style="width: 100%; margin-top: 100px;"></div>';
      }
      return $output;

   }
}

?>
