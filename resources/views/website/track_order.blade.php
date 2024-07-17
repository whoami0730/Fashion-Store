<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fashion Store | Track Order </title>
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
<style>
    .card {
        z-index: 0;
        background-color: #f5f9fc87;
        margin-top: 60px;
        margin-bottom: 20px;
        border-radius: 10px;
    }

    .top {
        padding-top: 40px;
        padding-bottom: 40px;
        padding-left: 10% !important;
        padding-right: 10% !important;
    }

    /* #progressbar {
        margin-top: 30px;
        color: #455a64;
        margin-bottom: 30px;
        overflow: hidden;
        padding-left: 0;
    }

    #progressbar li {
        list-style-type: none;
        font-size: 13px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400;
    }

    #progressbar .stop0::before {
        font-family: Arial, Helvetica, sans-serif;
        content: '\f10c';
        color: #fff;
    }

    #progressbar li::before {
        width: 40px;
        height: 40px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        background: #c5cae9;
        border-radius: 50%;
        margin: auto;
        padding: 0;
    }

    #progressbar li::after {
        content: '';
        width: 100%;
        height: 12px;
        background-color: #c5cae9;
        position: absolute;
        top: 16px;
        left: 0;
        z-index: -1;
    }

    #progressbar li:last-child::after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        position: absolute;
        left: -50%;
    }

    #progressbar li:nth-child(2):after,
    #progressbar li:nth-child(3):after {

        left: -50%;
    }

    #progressbar li:first-child::after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        position: absolute;
        left: 50%;
    }

    #progressbar li.active::after,
    #progressbar li.active::before {
        background-color: rgb(181, 174, 160);
    }

    #progressbar li.active::before {
        content: '';
    } */

    .icon {
        width: 60px;
        height: 60px;
        margin-right: 15px;
    }

    .icon-content {
        padding-bottom: 20px;
    }

    @media screen and (max-width:992px) {
        .icon-content {
            width: 50%;
        }
    }
</style>

<body>
    @extends('website.layout')
    @section('main')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Track Order</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Track Order Detail</li>
            </ol>
        </div>
        <!-- Single Page Header End -->
        <div class="container px-1 x-md-4 py-3 mx-auto">

            <div class="card">
                {{-- <div class="d-lg-flex justify-content-between px-3 top">
                        <div class="">
                            <h5>Order Id :<span class="text-primary">RDFISDJDSJK</span></h5>
                        </div>
                        <div class=" text-sm-right">
                            <h5 class="mb-0">
                                Expected Arrival :<span class="text-primary">4 May 2024</span>
                            </h5>
                        </div>
                    </div> --}}

                @foreach ($TrackOrder as $order)
                    <!-- Product Start -->
                    <div class="container top border-bottom border-2">
                        <div class="row g-4 px-lg-5 d-flex justify-content-between">
                            <div class="col-lg-4">
                                <div class=" d-flex justify-content-center align-items-center">
                                    @php
                                        $images = json_decode($order->image);
                                    @endphp
                                    @if (is_array($images))
                                    <img src="{{ asset('storage/ProductImage/' .$images[0] ) }}"
                                    class="img-fluid rounded" alt="Image">
                                    @else
                                    <img src="{{ asset('storage/ProductImage/' . $order->image) }}"
                                    class="img-fluid rounded" alt="Image">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-8 px-lg-5">
                                <h4 class="fw-bold mb-3">{{ $order->product_name }}</h4>
                                <h5 class="fw-bold mb-3">Price : ₹ {{ $order->price }}</h5>
                                <h6 class="fw-bold mb-3">Qty : {{ $order->qty }}</h6>
                                <h6 class="fw-bold mb-3">Total Pay : ₹ {{ $order->price * $order->qty }} </h6>
                                <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="mb-4">{{ $order->description }}
                                </p>

                                <div class="input-group quantity mb-3">

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Product End -->
                {{-- <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <ul id="progressbar" class="text-center"  >
                            <li class="active stop0"></li>
                            <li class="active stop0"></li>
                            <li class="active stop0"></li>
                            <li class="active "></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="row d-flex justify-content-between top">
                    <div class="col-6 col-lg-3 d-flex justify-content-center align-items-center icon-content">
                        <img src="assets1/img/CheckList.png" alt="" class="icon">
                        <div class="d-flex flex-column">
                            <p>Order <br>Processed</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 d-flex justify-content-center align-items-center icon-content">
                        <img src="assets1/img/Delivery.png" alt="" class="icon">
                        <div class="d-flex flex-column">
                            <p>Order <br>Shipped</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 d-flex justify-content-center align-items-center icon-content">
                        <img src="assets1/img/Shipping.png" alt="" class="icon">
                        <div class="d-flex flex-column">
                            <p>Order <br>On Route</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 d-flex justify-content-center align-items-center icon-content">
                        <img src="assets1/img/home.png" alt="" class="icon">
                        <div class="d-flex flex-column">
                            <p>Order <br>Arrival</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--  Product Tracking Start -->

        <!--  Product Tracking End -->

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
