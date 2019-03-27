<?php 
//The Payment Class acts as the interface between the Payment Views and the Database
//The queries in each function are prepared, binded, and executed to prevent sql injections
class Payment
{
    //Used to retrive all individual payment rows from the 'payments' table
    public function paymentsList($pool_id)
    {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM funds where money_pool_id = :id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $pool_id);
        $pst->execute();
        $payments = $pst->fetchAll(PDO::FETCH_OBJ);
        $pst->closeCursor();
        return $payments;
    }

    public function moneyCollected(){
        $dbcon = Database::getDb();
        $sql = "SELECT SUM(amount) FROM funds";
        $pst = $dbcon->prepare($sql);
        $pst->execute();
        $total = $pst->fetchAll(PDO::FETCH_OBJ);
        $pst->closeCursor();
        return $total;
    }

    //Used to insert a new payment into the 'payments' table
    public function insertPayment($pool_id, $amount, $payment_method, $user_id)
    {
        $dbcon = Database::getDb();
        $sql = "INSERT INTO funds (money_pool_id, amount, payment_method, user_id) 
        values(:pool_id,:amount,:payment_method, :user_id)";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':pool_id', $pool_id);
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
        $payment = $pdostm->fetch(PDO::FETCH_OBJ);
        $pdostm->closeCursor();
        return $payment;
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
    public function deletePayment($money_pool_id, $id)
    {
        $dbcon = Database::getDb();
        $sql = "DELETE from funds WHERE money_pool_id=:pool_id AND id=:id;";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':pool_id', $money_pool_id);
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

    public function getPaymentStatus($user_id){
        $dbcon = Database::getDB();
        $sql = "SELECT SUM(funds.amount) as total_paid, money_pools.* from money_pools inner join funds on funds.money_pool_id = money_pools.id where funds.user_id = :user_id group by funds.money_pool_id ";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':user_id', $user_id);
        $pst->execute();
        $status = $pst->fetchAll(PDO::FETCH_OBJ);
        $pst->closeCursor();
        return $status;
    }
}