<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: Allows the users to make a payment towards a certain 
 *              Money Pool     
 * Date Created: March 26th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
*/

include "header.php";
$user_id = $_SESSION['userid'];
if(isset($_POST['payment'])){
    $pool_id= $_POST['id'];
}else{
    header("Location: paymentsStatus.php?eid=$event_id");
}
    
$p = new MoneyPool();
$pool = $p->selectPool($pool_id);
?>
<form action="addPayment.php" name="payment" id="payment__form" method="POST">
    <div class="payment__event">
        <input type="hidden" name="pool_id" value="<?=$pool->id?>" />
    </div>
    <div class="payment__user">
        <input type="hidden" name="user_id" value="<?=$user_id?>" />
    </div>
    <div class="payment__event">
        <input type="hidden" name="event_id" value="<?=$event_id?>" />
    </div>
    <div class="payment-method">
        <h2 class='heading-style'>Select payment method</h2>
        <label>
            <input type="radio" name="method" value="Credit" checked>
            <i class="fab fa-cc-amex"></i>
            <i class="fab fa-cc-visa"></i>
            <i class="fab fa-cc-mastercard"></i>
        </label>
        <label>
            <input type="radio" name="method" value="PayPal">
            <i class="fab fa-cc-paypal"></i>
        </label>
        <h2 class='heading-style2'>You are paying:</h2>
        <div>
            <span id="amount-to-pay">$ <input pattern="\d*" type="text" id="amount" name="amount" maxLength="6"
                    required='true'></span><span id="event-name">towards
                <?=$pool->reason?></span>
        </div>
    </div>
    <div class="payment-method__credit">
        <a href="paymentsStatus.php?eid=<?=$event_id?>">
            <i class="fas fa-arrow-left"> Back to Pools</i>
        </a>
        <h2 class='heading-style3'>Payment Details</h2>
        <div class="credit__info">
            <div class="credit__number">
                <label for="number">Credit Card Number</label>
                <input type="tel" pattern="\d*" maxlength="16" placeholder="1111111111111111" id="credit__number"
                    required='true' />
            </div>
            <div class="credit__name">
                <label for="name">Cardholder Name</label>
                <input type="text" id="credit__name" placeholder="John Doe" required='true' />
            </div>
            <div class="row payments_row">
                <div class="credit__expiration">
                    <label for="expiration">Expiration Date</label>
                    <input type="text" id="credit__expiration" placeholder="MMYY" maxlength="4" required='true'
                        pattern="\d*" />
                </div>
                <div class="credit__cv">
                    <label for="security">Security Code</label>
                    <input type="text" id="credit__security" placeholder="123" maxlength="4" required='true'
                        pattern="\d*" />
                </div>
            </div>
        </div>
        <input class='btn1' type="submit" value="Proceed to Portal" id="credit-submit" name="process__payment">
        <!-- <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="sk_YOUR_SECRET_KEY">
            </script> -->
    </div>
    <div class="payment-method__paypal">
        <a href="paymentsStatus.php?eid=<?=$event_id?>">
            <i class="fas fa-arrow-left"> Back to Pools</i>
        </a>
        <h2 class='payments_heading-style3'>Payment Details</h2>
        <p>You will now be redirected to PayPal portal to complete the payment process</p>
        <input class='btn1' type="submit" value="Proceed to Portal" id="paypal-submit" name="process__payment">
    </div>
</form>

<script>
    //Removes Credit Card Validation when the PayPal option is selected
    $("input[type='submit']").click(function () {
        var radioValue = $("input[name='method']:checked").val();
        if (radioValue == 'PayPal') {
            $("[id^='credit__']").prop("required", false);
        }
    });
</script>

<?php
    include "footer.php";
?>