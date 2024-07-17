<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginPage/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets1/css/bootstrap.min.css" rel="stylesheet">  

    <title>Fashion Store | Payment Page</title>

</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100  min-vw-100 "
        style="background-color: rgba(157, 147, 147, 0.827)">

        <!----------------------- Login Container -------------------------->

        <div class="row  d-flex justify-content-center align-items-center " style="width: 400px; height:400px;">

            <!-------------------- ------  Box ---------------------------->
            <div class="col-md-8 right-box  bg-white border rounded-5 p-3 shadow">

                <div class="header-text m-4 ">
                    <h2 class="text-center p-4 border border-primary rounded">Payment</h2>
                    <h6 class="text-center p-2">Price : {{ number_format($razorpayOrder->amount / 100, 2) }} </h6>
                    <h6 class="text-center p-2">Order Id : {{ $orderId }} </h6>


                </div>
                <div class="d-flex justify-content-center align-items-center m-4">
                    <button class="btn btn-primary px-5 py-2" id="rzp-button1">Pay</button>
                </div>

            </div>


        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var urls = "{{ route('success') }}"
        var options = {
            "key": "rzp_test_UChtUdks4NuG7j",
            "amount": "{{ $razorpayOrder->amount }}",
            "currency": "INR",
            "name": "Fashion Store",
            "description": "Test Transaction",
            "image": "{{asset('loginPage/image/hacker.png')}}",
            "order_id": "{{ $razorpayOrder->id }}",
            "handler": function(response) {
                window.location.href = urls + '?payment_id=' + response.razorpay_payment_id + '&orderId=' +
                {{ $orderId }};
            },
            "prefill": {
                "name": "",
                "email": "",
                "contact": ""
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            alert("Payment Failed");
            window.location.href = "{{ route('checkout') }}";
        });
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
</body>

</html>
