<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: When the 'Edit' link is clicked on the payment_list page
 *              the Edit page is directed to, and allows the user to edit a payment's info
 *              from the 'payments' table based on the row ID passed by the payment_list form     
 * Date Created: March 26th, 2019
 * Last Modified: April 16th, 2019
 * Recent Changes: Added URL variable
 */
require_once 'header.php';

if (isset($_POST['edit'])) {
    $db_handler = Database::getDB();
    $p = new MoneyPool();
    $pool_id = $_POST['id'];
    $pool = $p->selectPool($pool_id);
}

if (isset($_POST['editpool'])) {
    $p = new MoneyPool();
    $reason = $_POST['reason'];
    $per_person = $_POST['per_person'];
    $pool_id = $_POST['payment_id'];
    $p->updatePool($reason, $per_person, $pool_id);
    header("Location: pool_list.php?eid=$event_id");
    exit;
}
?>
<!-- Form for editting a payment -->
<div class="payments_container">
    <a href="pool_list.php?eid=<?=$event_id?>">
        <i class="fas fa-arrow-left"> Back to Pools</i>
    </a>
    <h2 class="payments_heading-style2">Editting Pool: </h2>
    <form method="post" action="">
        <input type="hidden" name="payment_id" value="<?= $pool->id; ?>" />
        <label for="reason">Purpose of the Pool: </label>
        <input type="text" name="reason" value='<?= $pool->reason ?>' required /> <br />
        <label for="per_person">How much are you trying to raise $</label>
        <input type="number" name="per_person" id="per_person" min="1" step=".01"
            value='<?= $pool->per_person_amount ?>' required />
        <br />
        <input class="btn2" type="submit" name="editpool" value="Update Pool">
    </form>
</div>

<?php
    include "../footer.php";
?>