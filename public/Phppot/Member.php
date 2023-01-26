<?php
namespace Phppot;

use \Phppot\DataSource;

class Member
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }

    function getMemberById($memberId)
    {
        $query = "select * from users inner join credentials c on users.userid = c.userid WHERE c.userid = ?";
        $paramType = "i";
        $paramArray = array($memberId);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        
        return $memberResult;
    }
    
    public function processLogin($username, $password) {
        $query = "select * from users inner join credentials c on users.userid = c.userid WHERE c.userid = ? OR users.xname = ?";
        $paramType = "ss";
        $paramArray = array($username, $username);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        if(!empty($memberResult)) {
            $hashedPassword = $memberResult[0]["passwd"];
            // $hashedPassword = hash($hashedPassword);
           // if (password_verify($password, $hashedPassword)) {
              if ($password == $hashedPassword) {
                $_SESSION["userId"] = $memberResult[0]["userid"];
                return true;
            }else{
                  $_SESSION["userId"] = "";
              }
        }
        return false;
    }
}
