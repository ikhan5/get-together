<?php 
/* Author: Imzan Khan
 * Feature: Payments
 * Description: The Payment Class acts as the interface between the Payment
 *              Views and the Database. The queries in each function are prepared, binded,
 *              and executed to prevent sql injections            
 * Date Created: April 1st, 2019
 * Last Modified: April 12th, 2019
 * Recent Changes: Refactored Code, added Comments
 */
class Payment
{
/* Description: Used to retrive all individual payment 
                rows from the 'payments' table
 * Input: Money Pool ID
 * Output: All payments matching that Money Pool ID
 */
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
/* Description: Get the summation of all funds 
 * Input: None
 * Output: Sum of all the funds
 */
    public function moneyCollected(){
        $dbcon = Database::getDb();
        $sql = "SELECT SUM(amount) FROM funds";
        $pst = $dbcon->prepare($sql);
        $pst->execute();
        $total = $pst->fetchAll(PDO::FETCH_OBJ);
        $pst->closeCursor();
        return $total;
    }

/* Description: Inserts a single Payment based on the Input Parameters into
                a certain Money Pool 
 * Input: Money Pool ID, Payment Amount, Payment Method, User who made the
 *        payment.
 * Output: Payment Insert Status (Was it inserted into the funds DB or not)
 */
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
/* Description: Get a single Payment based on that payment ID 
 * Input: Payment ID
 * Output: The Paymemnt matching that Payment ID
 */
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
/* Description: Updates a single Payment based on the Input Parameters 
 * Input: Payment ID, Payment Amount, Payment Method
 * Output: Payment Update Status (Was it updated in the funds DB or not)
 */
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
/* Description: Delete a payment
 * Input: Payment ID
 * Output: None
 */
    public function deletePayment($id)
    {
        $dbcon = Database::getDb();
        $sql = "DELETE from funds WHERE id=:id;";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        $pdostm->closeCursor();
    }

    /*****Events Interaction******/

/* Description: Gets all the Events Payment Pools for a specific 
                user based on User ID 
 * Input: User ID 
 * Output: All Events that have a Money Pool
 */
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
/* Description: Gets all the Events Payment Pools for a specific 
                event, and display a sum of all the payments for each of 
                the Payment Pools
 * Input: Event ID 
 * Output: All Money Pool's information, with summation of the payments
 */
    public function getPaymentStatus($event_id){
        $dbcon = Database::getDB();
        $sql = "SELECT SUM(funds.amount) as total_paid, money_pools.* 
        from money_pools LEFT join funds on funds.money_pool_id = money_pools.id
         where event_id = :event_id group by funds.money_pool_id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':event_id', $event_id);
        $pst->execute();
        $status = $pst->fetchAll(PDO::FETCH_OBJ);
        $pst->closeCursor();
        return $status;
    }
/* Description: Delete all the payments within a pool
                to remove all foreign key restraints.
 * Input: Money Pool ID
 * Output: None
 */
    public function deleteAllPaymentsInPool($pool_id){
        $dbcon = Database::getDB();
        $sql = "DELETE from funds where money_pool_id= :pool_id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(":pool_id",$pool_id);
        $pst->execute();
        $pst->closeCursor();
    }
}