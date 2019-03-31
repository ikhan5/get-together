<?php 
//The MoneyPool Class acts as the interface between the Pool Views and the Database
//The queries in each function are prepared, binded, and executed to prevent sql injections
class MoneyPool
{
    //Used to retrive all individual money pool rows from the 'money_pools' table
    public function poolsList()
    {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM money_pools";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $payments = $pdostm->fetchAll(PDO::FETCH_OBJ);
        $pdostm->closeCursor();
        return $payments;
    }
    //Used to insert a new moey pool into the 'money_pools' table
    public function createPool($reason, $per_person, $event_id)
    {
        $dbcon = Database::getDb();
        $insert_query = "INSERT INTO money_pools (reason, per_person_amount, event_id) 
        values(:reason,:per_person,:event_id)";
        $pst = $dbcon->prepare($insert_query);
        $pst->bindParam(':reason', $reason);
        $pst->bindParam(':per_person', $per_person);
        $pst->bindParam(':event_id', $event_id);
        $count = $pst->execute();

        if ($count) {
            $message = 'Pool added Successful!';
        } else {
            $message = 'Poal not added...';
        }
        return $message;
    }
    //Used to select a certain money pool from the 'money_pool' table based on ID
    public function selectPool($id)
    {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM money_pools where id=:id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        $pools = $pdostm->fetch(PDO::FETCH_OBJ);
        $pdostm->closeCursor();
        return $pools;
    }
    //Used to edit a certain money pool from the 'money_pools' table based on ID
    public function updatePool($reason, $per_person, $id)
    {
        $dbcon = Database::getDb();
        $update_query = "UPDATE money_pools SET reason=:reason, per_person_amount=:per_person 
        WHERE id=:id";

        $pst = $dbcon->prepare($update_query);
        $pst->bindParam(':reason', $reason);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':per_person', $per_person);
        $count = $pst->execute();

        if ($count) {
            $message = 'Updated Pool Successfully!';
        } else {
            $message = 'Updated Pool Failed...';
        }
        return $message;
    }

    public function updateTotal($amount, $pool_id)
    {
        $dbcon = Database::getDb();
        $update_query = "UPDATE money_pools SET amount_collected= amount_collected + :amount 
        WHERE id=:id";

        $pst = $dbcon->prepare($update_query);
        $pst->bindParam(':amount', $amount);
        $pst->bindParam(':id', $pool_id);
        $count = $pst->execute();

        if ($count) {
            $message = 'Updated Pool Successfully!';
        } else {
            $message = 'Updated Pool Failed...';
        }
        return $message;
    }

    //Used to remove a certain money pool from the 'money_pools' table based on ID
    public function deletePool($id)
    {
        $dbcon = Database::getDb();
        $sql = "DELETE from money_pools WHERE id=:id;";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        $pdostm->closeCursor();
    }

}