<?php 

class Gallery
{
    public function getAllPhotos($dbcon)
    {
        $sql = "SELECT * FROM gallery ORDER BY id DESC";

        $stmt = $dbcon->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function selectPhotoById($id,$dbcon)
    {
        $sql = "SELECT * FROM gallery 
                    WHERE id = :id ";

        $stmt = $dbcon->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function deletePhoto($id, $dbcon)
    {
        $sql = "DELETE FROM gallery WHERE id = :id ";
        $stmt = $dbcon->prepare($sql);
        $stmt->bindParam(':id', $id);
        $count = $stmt->execute();

        return $count;
    }

    function selectOldImage($dbcon,$id)
    {
        $sql = "SELECT photo_name FROM gallery WHERE id = :id ";
        $stmt = $dbcon->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row)
        {
            return $result->photo_name;
        }
    }
    
}