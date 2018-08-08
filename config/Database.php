<?php
class Database
{
    private $host="localhost";
    private $db="Test";
    private $user="root";
    private $pw="bridgeit";
    public $conn;
    public function getConnection()
    {
        $this->conn=null;
    try
    {
    $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pw);
            $this->conn->exec("set names utf8");
    }
    catch (PDOException $e)
    {
        echo "Connection Error :".$e->getMessage();
    }
    return $this->conn;
}


}
?>