<?php

/*
 * Trying to create a pay page
 */

require_once 'paynet.php';

$paynet = new paynet("email@example.com", "nNqPdDtMxoj6ZxHOcqvejQk2v3YFlTNIGeyUS1Gpq0vqxdeJDKYXAiZ6lYLGRzpyNXsFZ95q9AQHO5rrPpoqIow4niLeRbNF8gk8");


//$result = $pt->authentication();

$result = $paynet->create_pay_page(array(
    //Customer's Personal Information
    'merchant_email' => "email@example.com",
	  'secret_key' => "nNqPdDtMxoj6ZxHOcqvejQk2v3YFlTNIGeyUS1Gpq0vqxdeJDKYXAiZ6lYLGRzpyNXsFZ95q9AQHO5rrPpoqIow4niLeRbNF8gk8",
    'm_first_name' => "john",          //This will be prefilled as Credit Card First Name
    'm_last_name' => "Doe",            //This will be prefilled as Credit Card Last Name
    'm_phone_number' => "0091",
    'phone_number' => "33333333",
    'email' => "customer@gmail.com",
    
    //Customer's Billing Address (All fields are mandatory)
    //When the country is selected as USA or CANADA, the state field should contain a String of 2 characters containing the ISO state code otherwise the payments may be rejected. 
    //For other countries, the state can be a string of up to 32 characters.
    'billing_address' => "Mumbai India",
    'city' => "mumbai",
    'state' => "maharashtra",
    'postal_code' => "0091",
    'country' => "IND",
    
    //Customer's Shipping Address (All fields are mandatory)
    'address_shipping' => "Delhi India",
    'city_shipping' => "mumbai",
    'state_shipping' => "maharashtra",
    'postal_code_shipping' => "0091",
    'country_shipping' => "IND",
   
   //Product Information
    "products_per_title" => "Product1 || Product 2 || Product 4",   //Product title of the product. If multiple products then add “||” separator
    'quantity' => "1 || 1 || 1",                                    //Quantity of products. If multiple products then add “||” separator
    'unit_price' => "2 || 2 || 6",                                  //Unit price of the product. If multiple products then add “||” separator.
    "other_charges" => "91.00",                                     //Additional charges. e.g.: shipping charges, taxes, VAT, etc.
    
    'amount' => "101.00",                                          //Amount of the products and other charges, it should be equal to: amount = (sum of all products’ (unit_price * quantity)) + other_charges
    'discount'=>"1",                                                //Discount of the transaction. The Total amount of the invoice will be= amount - discount
    'currency' => "USD",                                            //Currency of the amount stated. 3 character ISO currency code 
   

    
    //Invoice Information
    'title' => "John Doe",               // Customer's Name on the invoice
    "msg_lang" => "en",                 //Language of the PayPage to be created. Invalid or blank entries will default to English.(Englsh/Arabic)
    "reference_no" => "1231231",        //Invoice reference number in your system
   
    
    //Website Information
    "site_url" => "http://www.example.com",      //The requesting website be exactly the same as the website/URL associated with your PayNet Merchant Account
    'return_url' => "http://localhost/expressv2/successredirect.php",
    "cms_with_version" => "API USING PHP",

    "paypage_info" => "1"
));

echo "FOLLOWING IS THE RESPONSE: <br />";
print_r ($result);
?>