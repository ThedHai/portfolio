<?php
// Initialize cURL session
$ch = curl_init();

// Set the API endpoint URL
$api_url = "https://api.example.com/data";

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it directly
// Add other options as needed, e.g., CURLOPT_POST for POST requests, CURLOPT_POSTFIELDS for data, CURLOPT_HTTPHEADER for headers

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    // Process the API response (e.g., decode JSON)
    $data = json_decode($response);
    print_r($data);
}

// Close the cURL session
curl_close($ch);

//curling to middle
function send_to_middle($action, $data){
	
	$info = array('action'=>$action, 'data'=>$data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost:8888/Portfolio/front/test2.php");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $info);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //storing curl execution result
    $result = curl_exec($ch);
    curl_close($ch);
	
    return "----------";
    //return $result;
	
}
?>