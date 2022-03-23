<?php
header("Content-Type:application/json");


$con = mysqli_connect("localhost", "admin", "", "transactions");

if (mysqli_connect_errno()) {
    echo "failed to connect" . mysqli_connect_error();
    die();
}


if (isset($_GET['order_id']) && $_GET['order_id'] != "") {
    $order_id = $_GET['order_id'];
    $result = mysqli_query($con, "SELECT * FROM `transactions` WHERE order_id=$order_id");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $amount = $row['amount'];
        $response_code = $row['response_code'];
        $response_desc = $row['response_desc'];
        response($order_id, $amount, $response_code, $response_desc);
        mysqli_close($con);


    } else {
        response("no data", "no data", 0, "no record found");
    }


} else {
    response("no data", "no data", 0, "connection error");


}
function response($order_id, $amount, $response_code, $response_desc)
{

    $response['order_id'] = $order_id;
    $response['amount'] = $amount;
    $response['response_code'] = $response_code;
    $response['response_desc'] = $response_desc;

    $json_response = json_encode($response);
    echo $json_response;

}