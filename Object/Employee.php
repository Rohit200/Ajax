<?php
class Employee
{
public $conn;
Private $table_name="Employee";
public $id;
public $name;
public $mobile_no;
public $email_id;
public function __construct($db)
{
    $this->conn=$db;
}

public function delete($id)
{
    $sql="DELETE FROM Test.Employee WHERE ID=$id";
    $stmt = $this->conn->prepare($sql);
      if($stmt->execute()){
        echo "Data deleted sucessfully \n";
      }
      else
      echo "Something wrong \n";
     
}
public function update($id)
{
 
        // update query
        $query = "UPDATE Test.Employee SET Name='$this->name' WHERE ID=$id";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute the query
        if($stmt->execute()){
            echo "Updated \n";
        }
     else 
     echo "Not update \n";
    
}
}
?>