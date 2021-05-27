<?php
require_once 'paynet.php';

$paynet = new paynet("email@example.com", "vZ8nRlhEg3vAsEeOWTtmgC4Uh8OAsWiXWqkNMCs2GYD9CSXzLrV130Wl9LWBHezDETrrvUtcS7luZi3KJZMN0I89t5LbjkOYefpK");
$result = $paynet->verify_payment($_POST['reference_no']);
echo "<center><h1>" . $result->result . "</h1></center>";

?>