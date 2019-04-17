<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: When the '+ Create a Money Pool' link is clicked on 
 *              the pool_list page the Create page is directed to, 
 *              and allows the user to insert a new money pool
 *              into the 'money_pools' table  
 * Date Created: March 26th, 2019
 * Last Modified: April 16th, 2019
 * Recent Changes: Added URL variable
*/
require_once 'header.php';
    if (isset($_POST['addpool'])) {
        $reason = $_POST['reason'];
        $per_person = $_POST['per_person'];
        $event_id = $_POST['event_id'];

        $p = new MoneyPool();
        $pool = $p->createPool($reason, $per_person, $event_id);

        header("Location: pool_list.php?eid=$event_id");
        exit;
    }

?>
<div class="payments_container">
    <!-- Form for creating a new money pool  -->
    <a href="pool_list.php?eid=<?=$event_id?>">
        <i class="fas fa-arrow-left"> Back to Pools</i>
    </a>
    <h2 class="heading-style">Create a new Money Pool</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="reason">Purpose of the Pool:</label>
            <input type="text" name="reason" required />
        </div>
        <div class="form-group">
            <label for="per_person">What's you goal for this Pool?: </label>
            <input type="number" name="per_person" id="budget" min="1" value="1" step=".01" required /> <br />
        </div>
        <div class="form-group">
            <input type="hidden" value='<?=htmlspecialchars($event_id)?>' name='event_id'>
        </div> <br />
        <input class="btn2" type="submit" name="addpool" value="Create Pool">
    </form>
</div>

<?php
    include "../footer.php";
?>