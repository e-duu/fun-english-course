
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> PayPal Checkout Integration | Client Demo </title>
</head>

<body>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AQyuDo4zlYjzWRDR9Qml4fd9xqx36ytYwAJ3DGSgQsR7mjN4vnX0QhDHqbHppR2xCZW56SFyIcPmMpjK&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return fetch('api/payment/spp/create/', {
                    method: 'post',
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    return orderData.id;
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return fetch('api/payment/spp/capture/', {
                    method: 'post',
                    body:JSON.stringify({
                        orderId:data.orderID,
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                    if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                        return actions.restart();
                    }

                    if (errorDetail) {
                        var msg = 'Maaf, transaksi Anda tidak dapat diproses.';
                        if(errorDetail.description) msg += '\n\n' + errorDetail.description;
                        if(orderData.debug_id) msg += ' ('+ orderData.debug_id +')';
                        return alert(msg);
                    }

                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>'
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>

</html>
