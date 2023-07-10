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
        $idUser = $res['id'];
        
        if(password_verify($currentPassword, $userPass)) {
            $_SESSION['user'] = $currentUsername;
            $_SESSION['idUser'] = $idUser;
            header("Location: /");
        } else {            
            return false;
        }
    }
}