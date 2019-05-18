<?php 

class Gallery
{
    public function selectPhotoById($id,$dbcon,$eid)
    {
        $sql = "SELECT * FROM gallery WHERE id = :id AND event_id = :eid";

        $stmt = $dbcon->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':eid', $eid);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function deletePhoto($id,$dbcon,$eid)
    {
        $sql = "DELETE FROM gallery WHERE id = :id AND event_id = :eid";
        $stmt = $dbcon->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':eid', $eid);
        $count = $stmt->execute();

        return $count;
    }
    
}