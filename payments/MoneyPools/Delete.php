<?php
// When the 'Delete' link is clicked on the pool_list page
// the Delete page is directed to, and allows the user to remove a pool's info
// from the 'pools' table based on the row ID passed by the pool_list form
require_once 'header.php';

if (isset($_POST['delete'])) {
    $p = new MoneyPool();
    $pool_id = $_POST['id'];
    $pool = $p->selectPool($pool_id);
}

if (isset($_POST['delete_pool'])) {
    $p = new MoneyPool();
    $pool_id = $_POST['pool_id'];
    $p->deletePool($pool_id);
    header("Location: pool_list.php");
    exit;
}
if (isset($_POST['cancel'])) {
    header("Location: pool_list.php");
    exit;
}
?>
<!-- Form for deleting a payment  -->
<div class="container">
    <form method="post" action="">
        <h2>Are you sure you want to Delete this Payment?</h2>
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
                <label for="payment-method">Amount Per Person:</label>
                <span id="payment-method">
                    <?=htmlspecialchars($pool->per_person_amount) ?></span>
            </div>
        </div>
        <input type="submit" name="delete_pool" value="Delete">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</div>