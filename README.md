#### Installation
- Create a Virtual Host on your local server (Wamp, Mamp, Xampp, etc...)
- Run the app on your browser and it's ready to be used


#### Notes
- I've created a controller for testing purposes which is in the following path "/app/controllers/Site/test.php";
- In the test controller, I'm using curl to post data to the API;
- Copy the code in the method index of the controller test, and try it from another server;
- If needed, change the url where the service is hosted in the file of the test controller in line 67, function curl_init();
- In the test controller there are 3 arrays which are commented. Uncomment them one at the time and see the results;
- The explanation of each example are in the section "Examples";


#### Examples
- **Example 1**: In this example, 10 products of the category "Switches ID(2)" were bought, and as it is written in the rules, if a customer buys five products of this category he gets a sixth for free. To do this, all the products of category "Switches" must be counted, which will be 10 for this example, so in order to get the total of free items the calculation should be 10/5 that is equal to 2, then the customer has the right to have 2 items for free. For the purpose of this test, the free product is a random one from the order. The free items will be in the last item of the array.

- **Example 2**: To understand this example, please check the file of the following path: "/site/json_files/customers.json". This file contains all the possible customers. Note that the customer associated to this order (customer-id: 2) has already spent more than 1000€ so he has the right to have 10% discount in the whole order. As you can see two values were added to the array, "total_without_discount" and "discount", it's easier to understand the calculation if this values are visible. See also that the discount was applied to the total amount of the order. As in the first example, one free item was added to the order, because the customer bought five items of the category "Switches" so he gets a sixth for free.

- **Example 3**: In this example, 3 products of the category "Tools (ID: 1)"  were bought and if the customer buys more than 2 products of this category he gets 20% in the cheapest product, which is in the first item (unit price 9.75€). In order to understand the calculation the values "unit-price-without-discount", "discount" and "total_without_discount" were added and again, the discount was applied to the total amount of the item.
