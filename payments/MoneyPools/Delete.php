<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: When the 'Delete' link is clicked on the pool_list page
 *              the Delete page is directed to, and allows the user to remove a pool's info
 *              from the 'pools' table based on the row ID passed by the pool_list form      
 * Date Created: March 26th, 2019
 * Last Modified: April 15th, 2019
 * Last Modified: April 16th, 2019
 * Recent Changes: Added URL variable
 */
require_once 'header.php';

if (isset($_POST['delete'])) {
    $p = new MoneyPool();
    $pool_id = $_POST['id'];
    $pool = $p->selectPool($pool_id);
}

if (isset($_POST['delete_pool'])) {
    $pool_id = $_POST['pool_id'];

    $pay = new Payment();
    $pay->deleteAllPaymentsInPool($pool_id);

    $p = new MoneyPool();
    $p->deletePool($pool_id);
    
    header("Location: pool_list.php?eid=$event_id");
    exit;
}
if (isset($_POST['cancel'])) {
    header("Location: pool_list.php?eid=$event_id");
    exit;
}
?>
<!-- Form for deleting a payment  -->
<div class="payments_container">
    <a href="pool_list.php?eid=<?=$event_id?>">
        <i class="fas fa-arrow-left"> Back to Pools</i>
    </a>
    <form method="post" action="">
        <h2 class="payments_heading-style2">Are you sure you want to Delete this Pool?</h2>
        <input type="hidden" name="pool_id" value="<?= $pool->id; ?>" />
        <div id="pool_info">
            <div class="pool-detail">
                <label for="reason">Reason:</label>
                <span id="reason">
                    <?=htmlspecialchars($pool->reason) ?></span>
            </div>
            <div class="pool-detail">
                <label for="amount">Amount Collected:</label>
                <span id="amount">
                    $
                    <?=htmlspecialchars($pool->amount_collected) ?></span>
            </div>
            <div class="pool-detail">
                <label for="payment-method">Goal:</label>
                <span id="payment-method">
                    <?=htmlspecialchars($pool->per_person_amount) ?></span>
            </div>
        </div>
        <input class="btn1" type="submit" name="delete_pool" value="Delete">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</div>

<?php
    include "../footer.php";
?>