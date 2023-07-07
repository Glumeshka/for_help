<?php
namespace App\models;
use App\core\Model;

class ImageModel extends Model
{
    public function getImage()
    {

    }

    public function uploadImage()
    {
        $file = $_FILES;
        $post = $_POST;       
        // $fileName = $file['files'];
        $title = $post['title'];        
        $owner = $post['owner'];
        $type = $file['type'];
        $errors = [];
 
        if (!empty($_FILES)) {
            for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
                $fileName = $_FILES['files']['name'][$i];
                if ($_FILES['files']['size'][$i] > MAX_FILE_SIZE) {
                    $errors[] = 'Недопустимый размер файла ' . $fileName;
                    continue;
                }
 
                if (!in_array($_FILES['files']['type'][$i], ALLOWED_TYPES)) {
                    $errors[] = 'Недопустимый формат файла ' . $fileName;
                    continue;
                }
 
                $filePath = UPLOAD_DIR . '/' . basename($fileName);
 
                if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $filePath)) {
                    $errors[] = 'Ошибка загрузки файла ' . $fileName;
                    continue;
                }
            
                $sql = "INSERT INTO images (filename, title, owner, type)
                VALUES (:filename, :title, :owner, :type)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':filename', $fileName, \PDO::PARAM_STR);
                $stmt->bindParam(':title', $$title, \PDO::PARAM_STR);
                $stmt->bindParam(':owner', $owner, \PDO::PARAM_INT);
                $stmt->bindParam(':type', $type, \PDO::PARAM_STR);
                
                if(empty($errors)){
                    $stmt->execute();
                }
            }
        }                
    }
        
    public function deleteImage()
    {

    }
}    

       

 
        

        
    //     $sql = "INSERT INTO users (id, username, email, password, date, token, role)
    //             VALUES (:id, :username, :email, :password, :date, :token, :role)";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
    //     $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
    //     $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
    //     $stmt->bindParam(':password', $password, \PDO::PARAM_STR);
    //     $stmt->bindParam(':date', $date, \PDO::PARAM_STR);
    //     $stmt->bindParam(':token', $token, \PDO::PARAM_STR);
    //     $stmt->bindParam(':role', $role, \PDO::PARAM_STR);

    //     if(password_verify($password2, $password)) {
    //         $stmt->execute();
    //         header("Location: /");
    //     } else {
    //         echo '1';
    //         return false;
    //     }
    
