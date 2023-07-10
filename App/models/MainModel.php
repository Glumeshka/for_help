<?php
namespace App\models;
use App\core\Model;

class MainModel extends Model
{
    public function getGallery()
    {
        $sql = "SELECT * FROM images";   
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchall(\PDO::FETCH_ASSOC);

        return $res; 
    }
}