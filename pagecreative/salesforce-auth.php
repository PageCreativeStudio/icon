<?php
// Salesforce Credentials
$client_id = "3MVG9f_NjrvdVIAzDS.g_xwIi.OMsIPRPOh6UTt5EHXDii.crBm6sz1QY3aJxZerzQqVIC2bCiZh7sYHLXa2D";
$client_secret = "4B20475E1C334E2A3F71CA1EC21D71C93883011040CF81364600501C72E5F7BB";
$username = "tom@pagecreative.co.uk";
$password = "wFtum3VAsT4&KTKF@D!*";  // Append Security Token if required
$security_token = "YOUR_SECURITY_TOKEN";  // Only if required
$grant_type = "password";

// Salesforce Token Request URL
$token_url = "https://login.salesforce.com/services/oauth2/token";

// Build Request Data
$post_fields = http_build_query([
    'grant_type'    => $grant_type,
    'client_id'     => $client_id,
    'client_secret' => $client_secret,
    'username'      => $username,
    'password'      => $password . $security_token
]);

// cURL request to get the access token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Decode JSON response
$token_data = json_decode($response, true);

if (isset($token_data['access_token'])) {
    echo "Access Token: " . $token_data['access_token'];
} else {
    echo "Error fetching access token: ";
    print_r($token_data);
}
?>
