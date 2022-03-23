<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="" method="post">
    <label> enter order ID:</label><br/>
    <input type="text" name="order_id" placeholder="enter order id" required/>
    <br/>
    <br/>
    <button type="submit" name="submit">submit</button>
</form>

    <?php

    if (isset($_POST['order_id']) && $_POST['order_id'] != "") {
        $order_id = $_POST['order_id'];
        $url = "http://localhost/rest/api.php?order_id=".$order_id;

        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        $result = json_decode($response);

        echo "<table>";
        echo "<tr><td>ORDER ID:</td><td>$result->order_id</td></tr>";
        echo "<tr><td>Amount:</td><td> $result->amount</td></tr>";
        echo "<tr><td>Response code</td><td>$result->response_code</td></tr>";
        echo "<tr><td>Response description</td><td> $result->response_desc</td></tr>";
        echo "</table>";


    }


    ?>



</body>
</html>