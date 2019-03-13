<?php 

class Drink
{
    public function getAllDrinks($dbcon)
    {
        $sql = "SELECT * FROM userrsvp.drinklist";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $drinks= $pdostm->fetchAll(PDO::FETCH_OBJ);

        return $drinks;
    }
    
    public function insertDrink($name, $type, $size, $qty ,$db)
    {
        $sql = "INSERT INTO userrsvp.drinklist(drink_name,drink_type,drink_size, drink_qty) 
        values(:name,:type,:size,:qty)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':size', $size);
        $pst->bindParam(':qty', $qty);
        $count = $pst->execute();

        if($count){
            header('location: ../drinks_index.php');
        }else{
            $message = 'Failed to add drinks.';
        }
        return $message;
    }
    
    public function getDrinkById($id, $db){
        $sql = "SELECT * FROM userrsvp.drinklist WHERE drink_id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);

        $pst->execute();

        $drink =  $pst->fetch(PDO::FETCH_OBJ);

        return $drink;
    }
    
    public function updateDrink($id, $name, $type, $size, $qty, $db){
        $sql = "UPDATE userrsvp.drinklist
                SET drink_name = :name,
                drink_type = :type,
                drink_size = :size,
                drink_qty = :qty
                WHERE drink_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':size', $size);
        $pst->bindParam(':qty', $qty);

        $count = $pst->execute();
        return $count;
    }
    
    public function deleteDrink($id, $db){
        $sql = "DELETE FROM userrsvp.drinklist WHERE drink_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
    }
    
}