<?php 
//The Payment Class acts as the interface between the Payment Views and the Database
//The queries in each function are prepared, binded, and executed to prevent sql injections
class Payment
{
    //Used to retrive all individual payment rows from the 'payments' table
    public function paymentsList($event_id)
    {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM funds where event_id = :event_id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':event_id', $event_id);
        $pst->execute();
        $payments = $pst->fetchAll(PDO::FETCH_OBJ);
        $pst->closeCursor();
        return $payments;
    }

    //Used to insert a new payment into the 'payments' table
    public function insertPayment($event_id, $amount, $payment_method, $user_id)
    {
        $dbcon = Database::getDb();
        $sql = "INSERT INTO funds (event_id, amount, payment_method, user_id) 
        values(:event_id,:amount,:payment_method, :user_id)";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':event_id', $event_id);
        $pst->bindParam(':amount', $amount);
        $pst->bindParam(':payment_method', $payment_method);
        $pst->bindParam(':user_id', $user_id);
        $count = $pst->execute();

        if ($count) {
            $message = 'Payment Successful!';
        } else {
            $message = 'Payment Failed...';
        }
        return $message;
    }
    //Used to select a certain payment from the 'payments' table based on ID
    public function selectPayment($id)
    {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM funds where id=:id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        $payments = $pdostm->fetch(PDO::FETCH_OBJ);
        $pdostm->closeCursor();
        return $payments;
    }
    //Used to edit a certain payment from the 'payments' table based on ID
    public function updatePayment($amount, $payment_method, $id)
    {
        $dbcon = Database::getDb();
        $update_query = "UPDATE funds SET amount=:amount, payment_method=:payment_method 
        WHERE id=:id";

        $pst = $dbcon->prepare($update_query);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':amount', $amount);
        $pst->bindParam(':payment_method', $payment_method);
        $count = $pst->execute();

        if ($count) {
            $message = 'Updated Payment Successfully!';
        } else {
            $message = 'Updated Payment Failed...';
        }
        return $message;
    }
    //Used to remove a certain payment from the 'payments' table based on ID
    public function deletePayment($event_id, $id)
    {
        $dbcon = Database::getDb();
        $sql = "DELETE from funds WHERE event_id=:event_id AND id=:id;";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':event_id', $event_id);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        $pdostm->closeCursor();
    }

    /*****Events Interaction***** */
    public function getEventsWithPoolsByID($user_id){
        $dbcon = Database::getDB();
        $sql = "SELECT * from events INNER JOIN events_users on events.id = events_users.event_id
        WHERE events_users.user_id = :user_id AND events.has_fund_pool =1";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':user_id', $user_id);
        $pst->execute();
        $events = $pst->fetchAll(PDO::FETCH_OBJ);
        $pst->closeCursor();
        return $events;
    }
}