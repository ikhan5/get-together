<?php 

class Drink
{
    public function getAllDrinks($dbcon,$eid)
    {
        $sql = "SELECT * FROM drinklist WHERE event_id = :eid";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':eid', $eid);
        $pst->execute();
        $drinks= $pst->fetchAll(PDO::FETCH_OBJ);

        return $drinks;
    }
    
    public function insertDrink($name,$type,$size,$qty,$eid,$db)
    {
        $sql = "INSERT INTO drinklist(drink_name,drink_type,drink_size,drink_qty,event_id) 
        values(:name,:type,:size,:qty,:eid)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':size', $size);
        $pst->bindParam(':qty', $qty);
        $pst->bindParam(':eid', $eid);
        $count = $pst->execute();

        if($count){
            header("location: ../drinks/?eid='$eid'");
        }else{
            $message = 'Failed to add drinks.';
        }
        return $message;
    }
    
    public function getDrinkById($id, $db){
        $sql = "SELECT * FROM drinklist WHERE drink_id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);

        $pst->execute();

        $drink =  $pst->fetch(PDO::FETCH_OBJ);

        return $drink;
    }
    
    public function updateDrink($id, $name, $type, $size, $qty, $db){
        $sql = "UPDATE drinklist
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
        $sql = "DELETE FROM drinklist WHERE drink_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
    }
    
    //recommended drinks
    public function getAllRecDrinks($dbcon)
    {
        $sql = "SELECT * FROM recdrinklist";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $recdrinks= $pdostm->fetchAll(PDO::FETCH_OBJ);

        return $recdrinks;
    }
    
    public function getRecDrinkById($id, $db){
        $sql = "SELECT * FROM recdrinklist WHERE recdrink_id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);

        $pst->execute();

        $drink =  $pst->fetch(PDO::FETCH_OBJ);

        return $drink;
    }
    
    // later for API
    /*public function insertRecDrink($name, $type, $size, $qty ,$db)
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
            $message = 'Failed to add recommended drinks.';
        }
        return $message;
    } */
    
}