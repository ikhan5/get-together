<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Portal</title>
    <link rel="stylesheet" href="../CSS/payments.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <h1>Payment</h1>
    <form action="" name="payment">
        <div class="payment-method">
            <h2>Select payment method</h2>
            <label>
                <input type="radio" name="method" value="Credit" checked>
                <i class="far fa-credit-card"></i>
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
                <input type="tel" pattern="\d*" maxlength="19" placeholder="1111 1111 1111 1111" id="credit__number" />
            </div>
            <div class="credit__name">
                <label for="name">Cardholder Name</label>
                <input type="text" id="name" placeholder="John Doe" />
            </div>
            <div class="credit__expiration">
                <label for="expiration">Expiration Date</label>
                <input type="text" id="expiration" placeholder="MM/DD" />
            </div>
            <div class="credit__cv">
                <label for="CVV">CVV/CVC</label>
                <input type="text" id="CVV" placeholder="123" />
            </div>
            <!-- <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="sk_YOUR_SECRET_KEY">
            </script> -->
        </div>
        <div class="payment-method__paypal">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="johndoe@example.com" />
        </div>
        <div>
    </form>
</body>

</html> 