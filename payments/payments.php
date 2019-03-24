<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Portal</title>
    <link rel="stylesheet" href="../CSS/payments.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <p>You are paying <span id="amount-to-pay">$10</span> towards <span id="event-name">Ryan's Party</span></p>
    <form action="addPayment.php" name="payment" id="payment__form">
        <div class="payment__email">
            <input type="hidden" id="email" name="email" />
        </div>
        <div class="payment__amount">
            <input type="hidden" id="amount" name="amount" />
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
        <h2>Payment Details</h2>
        <div class="payment-method__credit">
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
            <div class="payment-method__credit">
                <input type="submit" value="Proceed to Portal" id="credit-submit" name="process__payment">
            </div>
            <!-- <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="sk_YOUR_SECRET_KEY">
            </script> -->
        </div>
        <div class="payment-method__paypal">
            <p>You will now be redirected to PayPal portal to complete the payment process</p>
            <input type="submit" value="Proceed to Portal" id="paypal-submit" name="process__payment">
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="../scripts/payments.js"></script>
</body>

</html>