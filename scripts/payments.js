$('input[name=method]').change(function () {
    var paymentMethod = $('input[name=method]:checked').val();
    if (paymentMethod == "PayPal") {
        $(".payment-method__paypal").show();
        $(".payment-method__credit").hide();
    } else {
        $(".payment-method__credit").show();
        $(".payment-method__paypal").hide();
    }
});