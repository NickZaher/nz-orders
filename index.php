<?php

include 'Shopify.php';

/**
  * A sample request for Postman:
  * {"buyer_accepts_marketing":true,"cancel_reason":"customer","cancelled_at":"2013-09-25T10:30:36-04:00","cart_token":null,"checkout_token":null,"closed_at":null,"confirmed":false,"created_at":"2013-09-25T10:30:36-04:00","currency":"USD","email":"jon@doe.ca","financial_status":"voided","fulfillment_status":"pending","gateway":"bogus","id":123456,"landing_site":null,"location_id":null,"name":"#9999","note":null,"number":234,"reference":null,"referring_site":null,"source":null,"subtotal_price":"229.94","taxes_included":false,"test":true,"token":null,"total_discounts":"0.00","total_line_items_price":"229.94","total_price":"239.94","total_price_usd":null,"total_tax":"0.00","total_weight":0,"updated_at":"2013-09-25T10:30:36-04:00","user_id":null,"browser_ip":null,"landing_site_ref":null,"order_number":1234,"discount_codes":[],"note_attributes":[],"processing_method":null,"checkout_id":null,"source_name":"web","line_items":[{"fulfillment_service":"manual","fulfillment_status":null,"grams":5000,"id":null,"price":"199.99","product_id":null,"quantity":1,"requires_shipping":true,"sku":"SKU2006-001","title":"Sledgehammer","variant_id":null,"variant_title":null,"vendor":null,"name":"Sledgehammer","variant_inventory_management":null,"properties":[],"product_exists":false},{"fulfillment_service":"manual","fulfillment_status":null,"grams":500,"id":null,"price":"29.95","product_id":null,"quantity":1,"requires_shipping":true,"sku":"SKU2006-020","title":"Wire Cutter","variant_id":null,"variant_title":null,"vendor":null,"name":"Wire Cutter","variant_inventory_management":null,"properties":[],"product_exists":false}],"shipping_lines":[{"code":null,"price":"10.00","source":"shopify","title":"Generic Shipping"}],"tax_lines":[],"billing_address":{"address1":"123 Billing Street","address2":null,"city":"Billtown","company":"My Company","country":"United States","first_name":"Bob","last_name":"Biller","latitude":null,"longitude":null,"phone":"555-555-BILL","province":"Kentucky","zip":"K2P0B0","name":"Bob Biller","country_code":"US","province_code":"KY"},"shipping_address":{"address1":"123 Shipping Street","address2":null,"city":"Shippington","company":"Shipping Company","country":"United States","first_name":"Steve","last_name":"Shipper","latitude":null,"longitude":null,"phone":"555-555-SHIP","province":"Kentucky","zip":"K2P0S0","name":"Steve Shipper","country_code":"US","province_code":"KY"},"fulfillments":[],"customer":{"accepts_marketing":null,"created_at":null,"email":"john@test.com","first_name":"John","id":null,"last_name":"Smith","last_order_id":null,"multipass_identifier":null,"note":null,"orders_count":0,"state":"disabled","total_spent":"0.00","updated_at":null,"verified_email":true,"tags":"","last_order_name":null,"image_url":"//gravatar.com/avatar/5634ff13f953ebcb374ac8c349bcfcfe?default=http%3A%2F%2Fcdn.shopify.com%2Fs%2Fimages%2Fadmin%2Fcustomers%2Fcustomers_avatar_general.png"}}
  *
  * A sample URL to track the results:
  * http://requestb.in/1dsa59w1
  */

// Testing URL:
$URL = 'http://requestb.in/1i2gbnj1'; // You will need to create a new bin at
                              // http://requestb.in for testing

// Official Malloy URL:
$URL = 'https://www.malloyfulfillmentsolutions.com/TransmitOrders/FulfillmentOrderBatch.asmx?WSDL';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'));
  $shopify = new Shopify;
  $shopify->createOrder($data);
  $shopify->shipOrder($URL);
}

?>
