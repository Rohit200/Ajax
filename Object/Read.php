<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "../config/Database.php";
include "../Object/Employee.php";

$database=new Database();
$db=$database->getConnection();
$emp=new Employee($db);
$stmt=read();
$num=$stmt->rowCount();
if($num>0)
{
    $employee_arr=array();
    $employee_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $employee_item=array(
            "Id" => $row['ID'],
            "Name" => $row['Name'],
            "mobile"=> $row['Mobile'],
            "emailId"=>$row['EmailId']
         
        );
 
        array_push($employee_arr["records"], $employee_item);
    }
 
    echo json_encode($employee_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
} 

function read()
{
    $database=new Database();
    $db=$database->getConnection();
    $emp=new Employee($db);
    $sql="SELECT * FROM Test.Employee";
    $stmt=$emp->conn->prepare($sql);
    $stmt->execute();
    return $stmt;
}
?>