<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Edit Product</title>

    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
        media="all">
    <link href="assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    @extends('admin.layout')
    @section('main')
        <!-- MAIN CONTENT-->
        <div class="main-content ">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <form action="{{ route('update_product', $product->id) }}" method="post"
                                    class="form-horizontal" enctype="multipart/form-data">@csrf
                                    <div class="card-header">
                                        <h4 class=" text-secondary">Edit Product</h4>
                                    </div>
                                    <div class="card-body card-block">

                                        <div class="row form-group ">
                                            <div class="col col-md-2">
                                                <label class="form-control-label">Name</label>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <input type="text" name="product_name"
                                                    value="{{ $product->product_name }}"
                                                    placeholder="Enter Category Name..."
                                                    class="form-control @error('product_name') is-invalid @enderror">
                                                <span class="text-danger">
                                                    @error('product_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-2">
                                                <label class="form-control-label">Image</label>
                                            </div>

                                            <div class="col-12 col-md-10">
                                                <div class="pb-3">
                                                    @php
                                                        $images = json_decode($product->image);
                                                    @endphp
                                                    @if (is_array($images))
                                                        @foreach ($images as $img)
                                                            <img src="{{ asset('/storage/ProductImage/' . $img) }}"
                                                                alt="Product Image" width=90px class="mb-1">
                                                        @endforeach
                                                    @else
                                                        <img src="{{ asset('/storage/ProductImage/' . $product->image) }}"
                                                            alt="Product Image" width=120px>
                                                    @endif

                                                </div>
                                                <input type="file" multiple name="image[]" 
                                                    class="form-control @error('image') is-invalid @enderror">
                                                <span class="text-danger">
                                                    @error('image')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col col-md-2">
                                                <label class="form-control-label">Price</label>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <input type="text" name="price" value="{{ $product->price }}"
                                                    placeholder="Enter Product Price..."
                                                    class="form-control @error('price') is-invalid @enderror">
                                                <span class="text-danger">
                                                    @error('price')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col col-md-2">
                                                <label class="form-control-label">Quantity</label>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <input type="text" name="quantity" value="{{ $product->quantity }}"
                                                    placeholder="Enter Product Quantity..."
                                                    class="form-control @error('quantity') is-invalid @enderror">
                                                <span class="text-danger">
                                                    @error('quantity')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col col-md-2">
                                                <label class="form-control-label">Description</label>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <input type="text" name="description"
                                                    value="{{ $product->description }}"
                                                    placeholder="Enter Product Description..."
                                                    class="form-control @error('description') is-invalid @enderror">
                                                <span class="text-danger">
                                                    @error('description')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button value="submit" class="btn btn-outline-secondary ">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END MAIN CONTENT-->

        <!-- Jquery JS-->
        <script src="assets/vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="assets/vendor/slick/slick.min.js"></script>
        <script src="assets/vendor/wow/wow.min.js"></script>
        <script src="assets/vendor/animsition/animsition.min.js"></script>
        <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="assets/vendor/counter-up/jquery.counterup.min.js"></script>
        <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
        <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="assets/vendor/select2/select2.min.js"></script>

        <!-- Main JS-->
        <script src="assets/js/main.js"></script>
    @endsection
</body>

</html>
<!-- end document-->
