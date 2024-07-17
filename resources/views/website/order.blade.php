<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fashion Store | Order Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets1/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="assets1/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets1/css/style.css" rel="stylesheet">
    <!---------- Sweet Alert ---------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    @extends('website.layout')
    @section('main')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">My Order</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Orders</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    @if (session('error'))
                        <script>
                            swal({
                                icon: "success",
                                title: "Order Placed",
                                text: "Product Order Successfully.",
                                button: "Ok",
                            });
                        </script>
                    @endif
                    @if ($Orders >= 1)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No.</th>
                                    <th scope="col">Order Date </th>
                                    <th scope="col">Payment Status</th>
                                    {{-- <th scope="col">Shipping Order</th> --}}
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_detail as $order)
                                    <tr>
                                        <td>
                                            <p class="my-2">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            {{-- <p class="my-2">{{ \Carbon\Carbon::parse($order->created_at)->format('D M Y') }}</p> --}}

                                            <p class="my-2">{{ \Carbon\Carbon::parse($order->created_at)->format('j / m / Y') }}</p>


                                        </td>
                                        @if ($order->payment_status == 'Received')
                                            <td>
                                                <p class="my-2 bg-success text-white px-2">Success</p>
                                            </td>
                                        @else
                                            <td>
                                                <p class="my-2 bg-danger text-white px-2">Failed</p>
                                            </td>
                                        @endif
                                        {{-- @if ($order->payment_status == 'Received')
                                            <td>
                                                <p class="my-2 bg-success text-white px-2">Order Shipped</p>
                                            </td>
                                        @else
                                            <td>
                                                <p class="my-2 bg-danger text-white px-2">Failed</p>
                                            </td>
                                        @endif --}}

                                        <td>
                                            <a href="{{ route('track_order', $order->order_id) }}"
                                                class="btn btn-sm border border-secondary rounded-pill px-3 my-2 text-primary">
                                                View </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h2 class="text-muted text-center">Order Is Empty !</h2>
                    @endif
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
                class="fa fa-arrow-up"></i></a>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets1/lib/easing/easing.min.js"></script>
        <script src="assets1/lib/waypoints/waypoints.min.js"></script>
        <script src="assets1/lib/lightbox/js/lightbox.min.js"></script>
        <script src="assets1/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="assets1/js/main.js"></script>
    @endsection
</body>

</html>
