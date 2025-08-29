<!DOCTYPE html>
<html>
<head>
    <title>Processing Payment</title>
</head>
<body>
    <h3>Redirecting to Cashfree...</h3>

    <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>
    <script>
        const cashfree = Cashfree({
            mode: "sandbox" // change to "production" for live
        });

        cashfree.redirectToCheckout({
            paymentSessionId: "{{ $payment_session_id }}"
        });
    </script>
</body>
</html>