<?php
namespace App\models;
use App\core\Model;

class ImageModel extends Model
{

    public function uploadImage()
    {
        $file = $_FILES;
        $post = $_POST;
        $title = $post['title'];        
        $owner = $_SESSION['idUser'];
        
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
                $type = $file['files']['type'][$i];
 
                if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $filePath)) {
                    $errors[] = 'Ошибка загрузки файла ' . $fileName;
                    continue;
                }
            
                $sql = "INSERT INTO images (filename, title, owner, type)
                VALUES (:filename, :title, :owner, :type)";

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':filename', $fileName, \PDO::PARAM_STR);
                $stmt->bindParam(':title', $title, \PDO::PARAM_STR);
                $stmt->bindParam(':owner', $owner, \PDO::PARAM_INT);
                $stmt->bindParam(':type', $type, \PDO::PARAM_STR);
                
                if(empty($errors)){
                    $stmt->execute();
                    header("Location: /");
                }
            }        
        return $errors;
        }                
    }
    public function getImage($idImage)
    {
        $sql = "SELECT * FROM images WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $idImage, \PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $res;        
    }
   
    public function deleteImage($image)
    {
        $sql = "DELETE FROM images WHERE images.id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $image, \PDO::PARAM_INT);
        $stmt->execute();

        header("Location: /");        
    }


}