<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include "../config/Database.php";
include "../Object/Employee.php";
$database=new Database();
$db=$database->getConnection();
$emp=new Employee($db);
$emp->id=isset($_GET['id']) ? $_GET['id'] : die();
readOne($emp->id);
function readOne($id)
{
    $database=new Database();
    $db=$database->getConnection();
    $emp=new Employee($db);
    $sql="SELECT * FROM Test.Employee where ID=$id";
    $stmt=$emp->conn->prepare($sql);
    //$stmt->bindParam(1, $emp->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $emp->id=$row['ID'];
    $emp->name=$row['Name'];
    $emp->mobile_no=$row['Mobile'];
    $emp->email_id=$row['EmailId'];
    if($row>0)
    {
    $employee_arr=array(
        "Id" => $emp->id,
        "Name" => $emp->name,
        "mobile"=> $emp->mobile_no,
        "emailId"=>$emp->email_id
     
    );

echo json_encode($employee_arr);
}
else{
    echo json_encode(
        array("message" => "No products found."));
}
}
?>