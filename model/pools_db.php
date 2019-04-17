<?php 
/* Author: Imzan Khan
 * Feature: Payments
 * Description: The Pool Class acts as the interface between the Money Pool
 *              Views and the Database. The queries in each function are prepared, binded,
 *              and executed to prevent sql injections            
 * Date Created: April 1st, 2019
 * Last Modified: April 12th, 2019
 * Recent Changes: Refactored Code, added Comments
 */
class MoneyPool
{
/* Description: Used to retrive all individual money pool
                rows from the 'money_pools' table
 * Input: Event ID
 * Output: All Money Pools from that event
*/
    public function poolsList($event_id)
    {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM money_pools where event_id = :event_id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':event_id', $event_id);
        $pst->execute();
        $payments = $pst->fetchAll(PDO::FETCH_OBJ);
        $pst->closeCursor();
        return $payments;
    }
/* Description: Used to insert a new money pool into 
                the 'money_pools' table
 * Input: Reason for the Money Pool, How much each person 
 *        needs to pay, Event ID
 * Output: Money Pool Creation confirmation
 */
    public function createPool($reason, $per_person, $event_id)
    {
        $dbcon = Database::getDb();
        $insert_query = "INSERT INTO money_pools (reason, per_person_amount, 
        event_id, amount_collected) values(:reason,:per_person,:event_id,0)";
        $pst = $dbcon->prepare($insert_query);
        $pst->bindParam(':reason', $reason);
        $pst->bindParam(':per_person', $per_person);
        $pst->bindParam(':event_id', $event_id);
        $count = $pst->execute();

        if ($count) {
            $message = 'Pool added Successful!';
        } else {
            $message = 'Pool not added...';
        }
        return $message;
    }
/* Description: Used to select a certain money pool from 
                the 'money_pool' table based on ID
 * Input: Money Pool ID
 * Output: Money Pool based on ID
 */
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
/* Description: Used to update an exisiting money pool from 
                the 'money_pools' table
 * Input: Reason for the Money Pool, How much each person 
 *        needs to pay, Money Pool ID
 * Output: Money Pool Update confirmation
 */
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
/* Description: Used to update an exisiting money pool amount
                collected from payments made to a specific pool.
 * Input: Amount being added to a pool, Pool ID
 * Output: Money Pool Update confirmation
 */
    public function updateTotal($amount, $pool_id)
    {
        $dbcon = Database::getDb();
        $update_query = "UPDATE money_pools SET amount_collected = amount_collected + :amount 
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

    public function reduceTotal($amount, $pool_id)
    {
        $dbcon = Database::getDb();
        $update_query = "UPDATE money_pools SET amount_collected = amount_collected - :amount 
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

/* Description: Used to delete an exisiting money pool
 * Input: Pool ID
 * Output: None
 */
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