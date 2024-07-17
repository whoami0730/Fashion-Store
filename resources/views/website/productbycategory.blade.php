<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fashion Store | Product Page</title>
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
</head>

<body>
    @extends('website.layout')
    @section('main')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Products</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Products</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Products Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">{{ $categoryName->category_name }} Products</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4 justify-content-center">
                            @foreach ($productbycategory as $product)
                                <div class="col-md-6 col-lg-3">
                                    <div class="rounded position-relative fruite-item border border-secondary">
                                        <div class="fruite-img">
                                            @php
                                                $images = json_decode($product->image);
                                            @endphp
                                            @if (is_array($images))
                                                <a href="{{ route('product_detail', $product->id) }}">
                                                    <img src="{{ asset('storage/ProductImage/' . $images[0]) }}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </a>
                                            @else
                                                <a href="{{ route('product_detail', $product->id) }}">
                                                    <img src="{{ asset('storage/ProductImage/' . $product->image) }}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">{{ $product->category_name }}</div>
                                        <div class="p-4">
                                            <h4>{{ $product->product_name }}</h4>
                                            <p>{{ $product->description }}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">₹ {{ $product->price }}</p>
                                                <a href="{{ route('product_detail', $product->id) }}"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i>Buy
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-4">
                                    {{ $productbycategory->links('pagination::bootstrap-4') }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products End-->


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
