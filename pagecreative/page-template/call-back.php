<?php
/**
 *    Template Name: Callback
 */

get_header(); ?>

<?php 
function test_fetch_salesforce_products() {
    // Call the function that fetches products from Salesforce
    $products = fetch_salesforce_products();
    
    // Output the results for verification
    echo '<pre>';
    print_r($products);  // Display the raw response from Salesforce
    echo '</pre>';
}
add_shortcode('test_salesforce_products', 'test_fetch_salesforce_products');

echo get_option('salesforce_access_token');

;?>



<?php get_footer(); ?>