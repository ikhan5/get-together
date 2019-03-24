<?php 
//The Payment Class acts as the interface between the Payment Views and the Database
//The queries in each function are prepared, binded, and executed to prevent sql injections
class Payment
{
    //Used to retrive all individual payment rows from the 'payments' table
    public function paymentsList($dbcon)
    {
        $sql = "SELECT * FROM payments";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $payments = $pdostm->fetchAll(PDO::FETCH_OBJ);
        $pdostm->closeCursor();
        return $payments;
    }

    //Used to insert a new payment into the 'payments' table
    public function insertPayment($db_handler, $email, $amount, $payment_method)
    {
        $insert_query = "INSERT INTO payments (email, amount, payment_method) 
        values(:email,:amount,:payment_method)";
        $pst = $db_handler->prepare($insert_query);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':amount', $amount);
        $pst->bindParam(':payment_method', $payment_method);
        $count = $pst->execute();

        if ($count) {
            $message = 'Payment Successful!';
        } else {
            $message = 'Payment Failed...';
        }
        return $message;
    }
    //Used to select a certain payment from the 'payments' table based on ID
    public function selectPayment($dbcon, $id)
    {
        $sql = "SELECT * FROM payments where payment_id=:id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        $payments = $pdostm->fetch(PDO::FETCH_OBJ);
        $pdostm->closeCursor();
        return $payments;
    }
    //Used to edit a certain payment from the 'payments' table based on ID
    public function updatePayment($db_handler, $email, $amount, $payment_method, $id)
    {
        $update_query = "UPDATE payments SET email=:email, amount=:amount, payment_method=:payment_method 
        WHERE payment_id=:id";

        $pst = $db_handler->prepare($update_query);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':email', $email);
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
    public function deletePayment($dbcon, $id)
    {
        $sql = "DELETE from payments WHERE payment_id=:payment_id;";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':payment_id', $id);
        $pdostm->execute();
        $pdostm->closeCursor();
    }
}

