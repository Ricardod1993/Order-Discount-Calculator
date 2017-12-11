<?php
	namespace Models\Site;

	class Customer
	{
		public $data;

		public function __construct($customer_id){
			// Getting the customers data
			$customers = json_decode(file_get_contents("../site/json_files/customers.json"));
			if($customers){
				//Seraching for customer by ID, if customer is found then it's stored in object variable data
				for ($i=0; $i < count($customers); $i++) { 
					if($customers[$i]->id == $customer_id){
						$this->data = $customers[$i];
					}
				}
			}
		}
	}
?>