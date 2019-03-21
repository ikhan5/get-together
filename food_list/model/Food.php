<?php 

class Food
{
    public function getAllFood($dbcon)
    {
        $sql = "SELECT * FROM food.foodlist";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $food = $pdostm->fetchAll(PDO::FETCH_OBJ);

        return $food;
    }
    
    public function insertFood($name, $type, $size, $qty ,$db)
    {
        $sql = "INSERT INTO food.foodlist(food_name,food_type,food_size,food_qty) 
        values(:name,:type,:size,:qty)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':size', $size);
        $pst->bindParam(':qty', $qty);
        $count = $pst->execute();

        if($count){
            header('location: ../foodindex.php');
        }else{
            $message = 'Failed to add dishes.';
        }
        return $message;
    }
    
    public function getFoodById($id, $db){
        $sql = "SELECT * FROM food.foodlist WHERE food_id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);

        $pst->execute();

        $food =  $pst->fetch(PDO::FETCH_OBJ);

        return $food;
    }
    
    public function updateFood($id, $name, $type, $size, $qty, $db){
        $sql = "UPDATE food.foodlist
                SET food_name = :name,
                food_type = :type,
                food_size = :size,
                food_qty = :qty
                WHERE food_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':size', $size);
        $pst->bindParam(':qty', $qty);

        $count = $pst->execute();
        return $count;
    }
    
    public function deleteFood($id, $db){
        $sql = "DELETE FROM food.foodlist WHERE food_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
    }
    
}