<?php
	namespace Models\Site;

	class Product
	{
		public $data;

		public function __construct($product_id){
			// Getting the customers data
			$products = json_decode(file_get_contents("../site/json_files/products.json"));
			if($products){
				//Seraching for customer by ID, if customer is found then it's stored in object variable data
				for ($i=0; $i < count($products); $i++) { 
					if($products[$i]->id == $product_id){
						$this->data = $products[$i];
					}
				}
			}
		}
	}
?>