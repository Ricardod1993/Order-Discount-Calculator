<?php
	namespace Controllers\Site;

	//Models
	use Models\Site\Order as Order;

	class Test
	{
		
		public function index()
		{
			// Example 1
			$post = [
			    'id' => 1,
			    'customer-id' => 1,
			    'items' => [
			    	[
			    		'product-id' => 'B102',
			    		'quantity' => 10,
			    		'unit-price' => 4.99,
			    		'total' => 49.90
			    	]
			    ],
			    'total' => 49.90
			];



			// Example 2
			/*$post = [
			    'id' => 2,
			    'customer-id' => 2,
			    'items' => [
			    	[
			    		'product-id' => 'B102',
			    		'quantity' => 5,
			    		'unit-price' => 4.99,
			    		'total' => 24.95
			    	]
			    ],
			    'total' => 24.95
			];*/



			// Example 3
			/*$post = [
			    'id' => 3,
			    'customer-id' => 3,
			    'items' => [
			    	[
			    		'product-id' => 'A101',
			    		'quantity' => 2,
			    		'unit-price' => 9.75,
			    		'total' => 19.50
			    	],
			    	[
			    		'product-id' => 'A102',
			    		'quantity' => 1,
			    		'unit-price' => 49.50,
			    		'total' => 49.50
			    	]
			    ],
			    'total' => 69.00
			];*/

			$ch = curl_init('http://orders_discount_calulator.dev/orders/calculate_discount');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

			// execute!
			$response = curl_exec($ch);

			// close the connection, release resources used
			curl_close($ch);

			print_r(json_decode($response));
		}
	}
?>