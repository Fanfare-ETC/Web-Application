<?php
$db_name = isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : 'playbook';
$db_username = isset($_ENV['DB_USERNAME']) ? $_ENV['DB_USERNAME'] : 'root';
$db_password = isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : '';
$db_host = isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : 'localhost';
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if($conn)
{
echo "Connection success <br> <br>";
}
else {
echo "connection not success <br> <br>";
}
?>
