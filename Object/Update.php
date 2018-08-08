<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
//header('Content-Type: application/json');
include "../config/Database.php";
include "../Object/Employee.php";
$database=new Database();
$db=$database->getConnection();
$id=isset($_GET['id']) ? $_GET['id'] : die();
$emp=new Employee($db);
$data = json_decode(file_get_contents("input.json"),true);
$k=$data[0]['name'];
$emp->name =$k;
$emp->mobile_no = $data[0]['mobile'];
$emp->email_id = $data[0]['email'];

$emp->update($id);
?>