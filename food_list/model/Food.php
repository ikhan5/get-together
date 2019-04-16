<?php 

class Food
{
    public function getAllFood($dbcon)
    {
        $sql = "SELECT * FROM foodlist";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $food = $pdostm->fetchAll(PDO::FETCH_OBJ);

        return $food;
    }
    
    public function insertFood($event_id, $name, $type, $size, $qty ,$db)
    {
        $sql = "INSERT INTO foodlist(event_id,food_name,food_type,food_size,food_qty) 
        values(:event_id,:name,:type,:size,:qty)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':event_id', $event_id);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':size', $size);
        $pst->bindParam(':qty', $qty);
        $count = $pst->execute();

        if($count){
            header('location: foodindex.php?eid='.$event_id);
        }else{
            $message = 'Failed to add dishes.';
        }
        return $message;
    }
    
    public function getFoodById($id, $event_id, $db){
        $sql = "SELECT * FROM foodlist WHERE food_id = :id AND event_id = :event_id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':event_id', $event_id);
        $pst->execute();

        $food =  $pst->fetch(PDO::FETCH_OBJ);

        return $food;
    }
    
    public function updateFood($id, $event_id, $name, $type, $size, $qty, $db){
        $sql = "UPDATE foodlist
                SET food_name = :name,
                food_type = :type,
                food_size = :size,
                food_qty = :qty
                WHERE food_id = :id 
                AND event_id = :event_id"
                ;
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':event_id', $event_id);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':size', $size);
        $pst->bindParam(':qty', $qty);

        $count = $pst->execute();
        return $count;
    }
    
    public function deleteFood($id, $db){
        $sql = "DELETE FROM foodlist WHERE food_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
    }
    
}