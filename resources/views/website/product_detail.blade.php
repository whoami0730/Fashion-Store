<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fashion Store | Product Information Page</title>
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
            <h1 class="text-center text-white display-6">Product Detail</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Single Product Detail</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                @if (session('success'))
                    <script>
                        swal({
                            icon: "success",
                            title: "Product Added To Cart.",
                            // text: "Product Add To Cart.",
                            button: "Ok",
                        });
                    </script>
                @endif
                <div class="row g-4 mb-5">
                    {{-- <div class="col-lg-8 col-xl-9">
                        <div class="row g-4 px-lg-5">
                            <div class="col-lg-5">
                                <div class=" d-flex flex-column justify-content-center position-relative overflow-hidden">
                                    @php
                                        $images = json_decode($productdetail->image);
                                    @endphp
                                    @if (is_array($images))
                                        <img src="{{ asset('storage/ProductImage/' . $images[0]) }}"
                                            class="img-fluid rounded border border-secondary rounded" alt="Image" id="mainImage">
                                        <div class="d-flex flex-column align-items-end  w-75 p-2 position-absolute end-0  top-0  ">

                                            @foreach ($images as $image)
                                                @if ($loop->index >= 1)
                                                    <div class=" w-25 mb-2 border border-secondary rounded" >
                                                        <img src="{{ asset('storage/ProductImage/' . $image) }}"
                                                            class="img-fluid rounded smallImage" alt="Image">
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    @else
                                        <img src="{{ asset('storage/ProductImage/' . $productdetail->image) }}"
                                            class="img-fluid rounded" alt="Image">
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <form action="{{ route('addtocart') }}" method="post" class="">@csrf
                                    <h4 class="fw-bold mb-3">{{ $productdetail->product_name }}</h4>
                                    <p class="mb-3">Category: {{ $productdetail->category_name }}</p>
                                    <h5 class="fw-bold mb-3">₹ {{ $productdetail->price }}</h5>
                                    <div class="d-flex mb-4">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="mb-4">{{ $productdetail->description }}</p>

                                    <div class="input-group quantity mb-3">
                                        

                                        <input type="hidden" name="product_id" value="{{ $productdetail->product_id }}">
                                        <input type="hidden" name="price" value="{{ $productdetail->price }}">
                                        <input type="hidden" class="form-control form-control-sm text-center border-0"
                                            value="1" name="qty">
                                    </div>
                                    <button class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary "><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i>Add to cart</button>

                                </form>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4 px-lg-5">
                            <div class="col-lg-6 ">
                                <div class="w-100 d-flex justify-content-center align-items-start">
                                    @php
                                        $images = json_decode($productdetail->image);
                                    @endphp
                                    @if (is_array($images))
                                        <div class="w-75">
                                            <img src="{{ asset('storage/ProductImage/' . $images[0]) }}"
                                                class="img-fluid rounded border border-secondary rounded p-0" alt="Image"
                                                id="mainImage">
                                        </div>
                                        <div class="w-25 px-2 overflow-auto" style="height: 300px">
                                            @foreach ($images as $image)
                                                @if ($loop->index >= 1)
                                                    <div class="mb-2 border border-secondary rounded">
                                                        <img src="{{ asset('storage/ProductImage/' . $image) }}"
                                                            class="img-fluid rounded smallImage" alt="Image">
                                                    </div>
                                                @endif
                                            @endforeach


                                        </div>
                                    @else
                                        <img src="{{ asset('storage/ProductImage/' . $productdetail->image) }}"
                                            class="img-fluid rounded" alt="Image">
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <form action="{{ route('addtocart') }}" method="post" class="">@csrf
                                    <h4 class="fw-bold mb-3">{{ $productdetail->product_name }}</h4>
                                    <p class="mb-3">Category: {{ $productdetail->category_name }}</p>
                                    <h5 class="fw-bold mb-3">₹ {{ $productdetail->price }}</h5>
                                    <div class="d-flex mb-4">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="mb-4">{{ $productdetail->description }}</p>

                                    <div class="input-group quantity mb-3">


                                        <input type="hidden" name="product_id" value="{{ $productdetail->product_id }}">
                                        <input type="hidden" name="price" value="{{ $productdetail->price }}">
                                        <input type="hidden" class="form-control form-control-sm text-center border-0"
                                            value="1" name="qty">
                                    </div>
                                    <button class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary "><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i>Add to cart</button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <h4>Categories</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        @foreach ($categories as $category)
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="{{ route('productbycategory', $category->category_id) }}"><i
                                                            class="fas fa-apple-alt me-2"></i>{{ $category->category_name }}</a>
                                                    <span>(3)</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Banner Section Start-->
                    <div class="col-12">
                        <div class="container-fluid banner bg-secondary my-5">
                            <div class="container py-5">
                                <div class="row g-4 align-items-center">
                                    <div class="col-lg-6">
                                        <div class="py-4">
                                            <h1 class="display-3 text-white">Latest Products</h1>
                                            <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                                            <p class="mb-4 text-dark">The generated Lorem Ipsum is therefore always
                                                free from repetition injected humour, or non-characteristic words
                                                etc.</p>
                                            {{-- <a href="#"
                                                class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        {{-- <div class="position-relative ">
                                            <img src="assets1/img/baner-1.png" class="img-fluid w-100 rounded"
                                                alt=" ">
                                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                                                style="width: 140px; height: 140px; top: 0; left: 0;">
                                                <h1 style="font-size: 100px;">1</h1>
                                                <div class="d-flex flex-column">
                                                    <span class="h2 mb-0">50$</span>
                                                    <span class="h4 text-muted mb-0">kg</span>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Banner Section End -->
                </div>

                <h1 class="fw-bold mb-0">Related products</h1>
                <div class="vesitable mt-3">
                    <div class="owl-carousel vegetable-carousel justify-content-center">
                        @foreach ($related_product as $related)
                            <div class="border border-primary rounded position-relative vesitable-item">
                                <div class="vesitable-img">
                                    @php
                                        $images = json_decode($related->image);
                                    @endphp
                                    @if (is_array($images))
                                        <a href="{{ route('product_detail', $related->id) }}">
                                            <img src="{{ asset('storage/ProductImage/' . $images[0]) }}"
                                                class="img-fluid w-100 rounded-top" alt="">
                                        </a>
                                    @else
                                        <a href="{{ route('product_detail', $related->id) }}">
                                            <img src="{{ asset('storage/ProductImage/' . $related->image) }}"
                                                class="img-fluid w-100 rounded-top" alt="">
                                        </a>
                                    @endif
                                </div>
                                <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                    style="top: 10px; right: 10px;">{{ $related->category_name }}</div>
                                <div class="p-4 pb-0 rounded-bottom">
                                    <h4>{{ $related->product_name }}</h4>
                                    <p>{{ $related->description }}
                                    </p>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold">₹ {{ $related->price }}</p>
                                        <a href="{{ route('product_detail', $related->id) }}"
                                            class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary"></i> Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
                class="fa fa-arrow-up"></i></a>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var mainImage = document.getElementById('mainImage');
                var smallImages = document.querySelectorAll('.smallImage');

                smallImages.forEach(function(smallImage) {
                    smallImage.addEventListener('click', function() {
                        var OldImage = mainImage.src;
                        mainImage.src = smallImage.src;
                        smallImage.src = OldImage;

                    });
                });
            });
        </script>
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
