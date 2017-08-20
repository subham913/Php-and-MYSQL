<?php
require("password.php");

$connect = mysqli_connect("localhost",  "root",  "abcd1234", "register");

$username =$_POST["username"];
$password = $_POST["password"];

$statement = mysqli_prepare($connect, "SELECT * FROM user WHERE username = ?");
mysqli_stmt_bind_param($statement,"s", $username);
mysqli_stmt_execute($statement);
mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $colUserID, $colName, $colAge, $colUsername, $colPassword);

$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)){
$response["success"] = true;
$response["name"] = $name;
$response["age"] = $age;
$response["usename"] = $username;
$response["password"] = $password;
}
echo json_encode($response);
?>
