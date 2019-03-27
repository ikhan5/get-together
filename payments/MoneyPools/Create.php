<?php
// When the '+ Create a Money Pool' link is clicked on the pool_list page
// the Create page is directed to, and allows the user to insert a new money pool
// into the 'money_pools' table 
require_once 'header.php';

// $event_id = $_SESSION['event_id'];

$event_id =1;

if (isset($_POST['addpool'])) {
    $reason = $_POST['reason'];
    $per_person = $_POST['per_person'];
    $event_id = $_POST['event_id'];

    $p = new MoneyPool();
    $pool = $p->createPool($reason, $per_person, $event_id);
    header("Location: pool_list.php");
    exit;
}
?>
<div class="container">
    <!-- Form for creating a new money pool  -->
    <h2>Create a new Money Pool</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="reason">Purpose of the Pool:</label>
            <input type="text" name="reason" required />
        </div>
        <div class="form-group">
            <label for="per_person">How much does each person need to pay?: </label>
            <input type="number" name="per_person" id="budget" min="1" value="1" step=".01" required /> <br />
        </div>
        <div class="form-group">
            <input type="hidden" value='<?=htmlspecialchars($event_id)?>' name='event_id'>
        </div> <br />
        <input class="btn2" type="submit" name="addpool" value="Create Pool">
    </form>
</div>