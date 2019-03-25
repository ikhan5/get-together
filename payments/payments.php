<?php
    require_once "startSession.php";
    include "header.php";
    $user_id = $_SESSION['user_id'];
    if($_POST['id']){
        $event_id = $_POST['id'];
    }
?>

<p>You are paying <span id="amount-to-pay">$10</span> towards <span id="event-name">Ryan's Party</span></p>
<form action="addPayment.php" name="payment" id="payment__form" method="POST">
    <div class="payment__event">
        <input type="hidden" name="event_id" value="<?=$event_id?>" />
    </div>
    <div class="payment__user">
        <input type="hidden" name="user_id" value="<?=$user_id?>" />
    </div>
    <div class="payment__amount">
        <input type="hidden" id="amount" name="amount" value="$10" />
    </div>
    <div class="payment-method">
        <h2>Select payment method</h2>
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
    </div>
    <div class="payment-method__credit">
        <h2>Payment Details</h2>
        <div class="credit__info">
            <div class="credit__number">
                <label for="number">Credit Card Number</label>
                <input type="tel" pattern="\d*" maxlength="16" placeholder="1111111111111111" id="credit__number" />
            </div>
            <div class="credit__name">
                <label for="name">Cardholder Name</label>
                <input type="text" id="name" placeholder="John Doe" />
            </div>
            <div class="row">
                <div class="credit__expiration">
                    <label for="expiration">Expiration Date</label>
                    <input type="text" id="expiration" placeholder="MMDD" maxlength="4" />
                </div>
                <div class="credit__cv">
                    <label for="security">Security Code</label>
                    <input type="text" id="security" placeholder="123" maxlength="4" />
                </div>
            </div>
        </div>
        <input type="submit" value="Proceed to Portal" id="credit-submit" name="process__payment">
        <!-- <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="sk_YOUR_SECRET_KEY">
            </script> -->
    </div>
    <div class="payment-method__paypal">
        <h2>Payment Details</h2>
        <p>You will now be redirected to PayPal portal to complete the payment process</p>
        <input type="submit" value="Proceed to Portal" id="paypal-submit" name="process__payment">
    </div>
</form>

<?php
    include "footer.php";
?>