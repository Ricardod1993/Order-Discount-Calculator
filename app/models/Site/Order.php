<?php
	namespace Models\Site;

	class Order
	{
		public $data;

		public function __construct($order){
			$this->data = $order;
		}

		public function calculateDiscounts(){
			$customer = new Customer($this->data["customer-id"]); // Getting customer data


			$items = $this->data['items'];
			$switches_category_products_counter = 0; // Counter of category switches product, to check if has more than 5
			$tools_category_products_counter = 0; // Counter of category tools product, to check if has more than 2
			$cheapest_product_index = 0; // This will be useful to add 20% discount to the cheapest product
			$lowest_product_price = $items[0]["unit-price"]; // It will be useful inside the loop to check which loop had the lowest price
			$order_total_price = 0.00;

			//Looping through items
			for ($i=0; $i < count($items); $i++) { 
				$product = new Product($items[$i]["product-id"]); // Getting product data

				// Checking if product category is "Switches"
				if($product->data->category == 2){
					$switches_category_products_counter += $items[$i]['quantity']; // Adding the quantity of product to switches_category_products_counter
				}

				// Checking if product category is "Tools"
				if($product->data->category == 1){
					$tools_category_products_counter += $items[$i]['quantity']; // Adding the quantity of product to tools_category_products_counter
				}

				/* 
					* Checking if current unit-price is lower than previous, if it is then cheapest item will be the current and in the other loop the same comparision wiik * be made
				*/
				if($items[$i]['unit-price'] < $lowest_product_price){
					$cheapest_product_index = $i;
					$lowest_product_price = $items[$i]['unit-price'];
				}

				$order_total_price += $items[$i]['total'];
			}


			// If the number of products of category tools is equal or bigger than 2, than add a discount of 20% to the cheapest product
			if($tools_category_products_counter >= 2){
				$order_total_price -= $this->data['items'][$cheapest_product_index]['total'];

				$this->data['items'][$cheapest_product_index]['unit-price-without-discount'] = $this->data['items'][$cheapest_product_index]['unit-price'];
				$this->data['items'][$cheapest_product_index]['discount'] = ($this->data['items'][$cheapest_product_index]['unit-price'] * 0.20);
				$this->data['items'][$cheapest_product_index]['unit-price'] = $this->data['items'][$cheapest_product_index]['unit-price'] - $this->data['items'][$cheapest_product_index]['discount'];
				$this->data['items'][$cheapest_product_index]['total_without_discount'] = $this->data['items'][$cheapest_product_index]['total'];
				$this->data['items'][$cheapest_product_index]['total'] = $this->data['items'][$cheapest_product_index]['unit-price'] * $this->data['items'][$cheapest_product_index]['quantity'];

				$order_total_price += $this->data['items'][$cheapest_product_index]['total'];
			}




			/*
				* The division of the total number of products ecountered in the switches category by 5 will be equal to the total number of free products, then stored in 
				* the variable free_items
			*/
			$number_free_items = floor($switches_category_products_counter / 5);

			// Checking if the number of free items is bigger than 0, if yes add another random product item to the order
			if($number_free_items > 0){
				$this->data['items'][count($this->data['items'])] = (object) [
					'product-id' => $this->data['items'][rand(0, count($this->data['items']) - 1)]['product-id'],
					'quantity' => $number_free_items,
					'unit-price' => 0.00,
					'total' => 0.00
				];
			}



			$this->data['total'] = $order_total_price;



			// Checking if customer has spent over 1000€
			if($customer->data->revenue >= 1000){
				$this->data['total_without_discount'] = $this->data['total']; // Storing the total without discount
				$this->data['discount'] = number_format($this->data['total'] * 0.10, 2, ".", ""); // Storing the discount
				$this->data['total'] = $this->data['total'] - $this->data['discount']; // Storing the total with discount
			}




			$this->data['total'] = number_format($this->data['total'], 2, ".", "");

			return $this->data;
		}
	}
?>