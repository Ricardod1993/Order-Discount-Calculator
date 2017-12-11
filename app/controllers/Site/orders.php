<?php
	namespace Controllers\Site;

	//Models
	use Models\Site\Order as Order;

	class Orders
	{
		
		public function calculate_discount()
		{
			if(!empty($_POST)){
				$order = new Order($_POST);
				$order_with_discounts = $order->calculateDiscounts();

				echo json_encode($order_with_discounts, true);
			}
		}
	}
?>