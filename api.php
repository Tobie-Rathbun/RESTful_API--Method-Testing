<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->item)) {
    $response = array(
        "status" => "success",
        "message" => "Item created successfully.",
        "item" => $data->item
    );
    http_response_code(201);
    // Save the item to the items.txt file
    $file = fopen("items.txt", "a");
    fwrite($file, $data->item . "\n");
    fclose($file);
} else {
    $response = array(
        "status" => "error",
        "message" => "Unable to create item. Data is incomplete.",
        "received_data" => $data // Add this line to log the received data
    );
    http_response_code(400);
}

echo json_encode($response);
?>
