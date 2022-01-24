<?php
class Product_filter_model extends CI_Model
{
	function fetch_filter_type($type,$table,$id)
	{
		$this->db->distinct();
		$this->db->select($type);
		$this->db->from($table);
		$this->db->where('status', '1');
		$this->db->order_by($id, 'DESC');
		return $this->db->get();
	}

	




	function make_query($year, $manufactured, $model,$product_type)
	 {
	// 	$query = "
	// 	SELECT a.*, b`.`product_type` as `product_type`, `c`.`manufactured_name` as `manufactured_name`, `d`.`year` as `year`, `d`.`year_id` as `year_id`, `c`.`manufactured_id` as `manufactured_id` FROM `tb_products` as `a` LEFT JOIN `tb_product_type` as `b` ON `a`.`product_type` = `b`.`product_type_id` LEFT JOIN `tb_manufactured` as `c` ON `a`.`manufactured` = `c`.`manufactured_id` LEFT JOIN `tb_years` as `d` ON `a`.`year` = `d`.`year_id`
		
	// 	";

			$query="SELECT a.*, b.manufactured_name ,c.product_type,d.year FROM tb_products as a
    INNER JOIN tb_manufactured as b ON b.manufactured_id = a.manufactured
    INNER JOIN tb_product_type as c ON c.product_type_id = a.product_type
    INNER JOIN tb_years as d ON d.year_id = a.year
    WHERE a.status = '1' 
    ";
		if(isset($year))
		{
			$year_filter = implode("','", $year);
			$query .= "AND d.year IN('".$year_filter."')
			";
		}
		if(isset($manufactured))
		{
			$manufactured_filter = implode("','", $manufactured);
			$query .= "
			 AND manufactured IN('".$manufactured_filter."')
			";
		}
		if(isset($model))
		{
			$model_filter = implode("','", $model);
			$query .= "
			 AND model IN('".$model_filter."')
			";
		}
		if(isset($product_type))
		{
			$product_type_filter = implode("','", $product_type);
			$query .= "
			 AND product_type IN('".$product_type_filter."')
			";
		}
		return $query;
	}

	// function fetch_data($limit, $start,$year, $manufactured, $model,$product_type)
	// {
	// 	$query = $this->make_query($year, $manufactured, $model,$product_type);

	// 	$query .= 'LIMIT'.$start.', ' . $limit;

	// 	$data = $this->db->query($query);

	// 	$output = '';
	// 	if($data->num_rows() > 0)
	// 	{
	// 		foreach($data->result_array() as $row)
	// 		{
	// 			$output .= '
	// 			<div class="col-sm-4 col-lg-3 col-md-3">
	// 				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
	// 				<img src="'.base_url().'images/'. $row['product_image'] .'" alt="" class="img-responsive" >
	// 				<p align="center"><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
	// 				<h4 style="text-align:center;" class="text-danger" >'. $row['product_price'] .'</h4>
	// 				<p>Camera : '. $row['product_camera'].' MP<br />
	// 				Brand : '. $row['product_brand'] .' <br />
	// 				RAM : '. $row['product_ram'] .' GB<br />
	// 				Storage : '. $row['product_storage'] .' GB </p>
	// 				</div>
	// 			</div>
	// 			';
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$output = '<h3>No Data Found</h3>';
	// 	}
	// 	return $output;
	// }
	function fetch_data($limit, $start,$year, $manufactured, $model,$product_type)
	{
		$query = $this->make_query($year, $manufactured, $model,$product_type);

		$query .= ' LIMIT '.$start.', ' . $limit;

		$data = $this->db->query($query);

		$output = '';
		if($data->num_rows() > 0)
		{
			foreach($data->result_array() as $row)
			{
				$output .= '
				<div class="col-lg-3">
                            <div class="car-item price-remove gray-bg text-center">
                                <div class="car-image">
                                    <img src="'.base_url().'uploads/product_images/'. $row['product_image'] .'" alt=""  class="img-fluid" >
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i>'. $row['year'] .'</li>
                                        <li><i class="fa fa-cog"></i>'. $row['model'] .'</li>
                                        <li><i class="fa fa-dashboard"></i> '. $row['product_type'] .' </li>
                                    </ul>
                                </div>
                                <div class="car-content">

                                    <a href="<?php echo base_url() ?>product_details">'. $row['engine_displacement'] .' </a>
                                    <div class="separator"></div>
                                </div>
                            </div>
                        </div>
				';
			}
		}
		else
		{
			$output = '<h3>No Data Found</h3>';
		}
		return $output;
	}

	function count_all($year, $manufactured, $model,$product_type)
	{
		$query = $this->make_query($year, $manufactured, $model,$product_type);
		$data = $this->db->query($query);
		return $data->num_rows();
	}


	

}
?>