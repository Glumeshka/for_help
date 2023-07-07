<?php
namespace App\models;

use App\core\Model;

class LogonModel extends Model
{
    public function checkUser()
    {
        $currentUsername = $_POST['username'];
        $currentPassword = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = :username";   

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":username", $currentUsername, \PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetch(\PDO::FETCH_ASSOC);
        $userPass = $res["password"];
        
        if(password_verify($currentPassword, $userPass)) {
            header("Location: /");
        } else {
            return false;
        }
    }
}