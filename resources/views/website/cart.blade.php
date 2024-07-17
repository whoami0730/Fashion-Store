<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fashion Store | Cart Page</title>
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
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                @if (session('remove'))
                    <script>
                        swal({
                            icon: "success",
                            title: "Product Removed Successfully.",
                            // text: "",
                            button: "Ok",
                        });
                    </script>
                @endif
                @if (session('error'))
                    <script>
                        swal({
                            icon: "error",
                            title: "Cart Item Cannot Less",
                            // text: "",
                            button: "Ok",
                        });
                    </script>
                @endif

                @if ($count >= 1)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                @php
                                                    $images = json_decode($product->image);
                                                @endphp
                                                @if (is_array($images))
                                                    <img src="{{ asset('storage/ProductImage/' . $images[0]) }}"
                                                        class="img-fluid me-5 rounded-circle"
                                                        style="width: 80px; height: 80px;" alt="">
                                                @else
                                                    <img src="{{ asset('storage/ProductImage/' . $product->image) }}"
                                                        class="img-fluid me-5 rounded-circle"
                                                        style="width: 80px; height: 80px;" alt="">
                                                @endif
                                            </div>
                                        </th>
                                        <td>
                                            <p class="mb-0 mt-4">{{ $product->product_name }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 mt-4">₹ {{ $product->price }}</p>
                                        </td>
                                        <td>
                                            <form action="{{ route('update_cart_item', $product->cart_id) }} ">
                                                <div class="input-group quantity mt-4" style="width: 100px;">
                                                    <div class="input-group-btn">
                                                        <input type="submit" name="action" value="-"
                                                            class="btn rounded-circle bg-light border">

                                                    </div>

                                                    <input type="text"
                                                        class="
                                                        form-control form-control-sm text-center border-0"
                                                        value="{{ $product->qty }}" min="1">

                                                    <input type="hidden"
                                                        class="form-control form-control-sm text-center border-0"
                                                        value="{{ $product->price }}" name="price">

                                                    <div class="input-group-btn">

                                                        <input type="submit" name="action" value="+"
                                                            class="btn  rounded-circle bg-light border">

                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <p class="mb-0 mt-4">₹ {{ $product->total }}</p>
                                        </td>
                                        <td>
                                            <a href="{{ route('delete_cart', $product->product_id) }}">
                                                <button class="btn btn-md rounded-circle bg-light border mt-4"
                                                    onclick=" return confirm('Do You Really Want To Remove From Cart?')">
                                                    <i class="fa fa-times text-danger"></i>
                                                </button>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="mt-5">
                        <input type="text" class="border-0 border-bottom border-top rounded me-4 py-3 px-3 mb-4"
                            placeholder="Coupon Code">
                        <button class="btn border-secondary rounded-pill pX-4 py-3 text-primary" type="button">Apply
                            Coupon</button>
                    </div> --}}

                    <div class="row g-4 justify-content-end mt-lg-5">
                        <div class="col-8"></div>
                        <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                            <div class="bg-light rounded">
                                <div class="p-4">
                                    <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="mb-0 me-4">Subtotal:</h5>
                                        <p class="mb-0">₹ {{ $subTotal }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="mb-0 me-4">Delivery:</h5>
                                        <p class="mb-0">₹ {{ $delivery }}</p>
                                    </div>
                                </div>
                                <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                    <h5 class="mb-0 ps-4 me-4">Total</h5>
                                    <p class="mb-0 pe-4">₹ {{ $netTotal }}</p>
                                </div>
                                <a href="{{ 'checkout' }}">
                                    <button
                                        class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                                        type="button">Proceed To Checkout</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <h2 class="text-muted text-center">Cart Is Empty !</h2>
                @endif
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
