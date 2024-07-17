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
    <title>Order Information</title>

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
                    <div class="row">
                        <div class="col-md-12">
                            <aside class="profile-nav alt">
                                <section class="card">
                                    <div class="card-header user-header alt bg-dark">
                                        <div class="media">
                                            @if ($addressdetail->image)
                                                <img class="align-self-center rounded-circle mr-3"
                                                    style="width:85px; height:85px;" alt=""
                                                    src="{{ asset('storage/UserImage/' . $addressdetail->image) }}">
                                            @else
                                                <img class="align-self-center rounded-circle mr-3"
                                                    style="width:85px; height:85px;" alt=""
                                                    src="loginPage/image/hacker.png">
                                            @endif

                                            <div class="media-body">
                                                <h2 class="text-light display-6">{{ $addressdetail->name }}</h2>
                                                <p>+91 - {{ $addressdetail->phone }}</p>
                                                <p> <i class="fa fa-map-marker"></i> {{ $addressdetail->city }},
                                                    {{ $addressdetail->state }}, India</p>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                            </aside>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="title-3 m-b-10">
                                Address Detail
                            </div>
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Landmark</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Pincode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>{{ $addressdetail->fname }} {{ $addressdetail->lname }}</td>
                                            <td>{{ $addressdetail->phone }}</td>
                                            <td>
                                                <textarea cols="20" rows="3" class="text-muted border p-2" readonly>{{ $addressdetail->address }}</textarea>
                                            </td>
                                            <td>{{ $addressdetail->landmark }}</td>
                                            <td>{{ $addressdetail->city }}</td>
                                            <td>{{ $addressdetail->state }}</td>
                                            <td>{{ $addressdetail->pincode }}</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title-3 m-b-10">
                                Order Product Detail
                            </div>
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Description</th>
                                            <th>Operation</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($OrderDetail as $item)
                                            <tr>
                                                <td>{{ $item->product_name }}</td>
                                                <td>
                                                    <img src="{{ asset('/storage/ProductImage/' . $item->image) }}"
                                                        alt="Category Image" width=120px>
                                                </td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>
                                                    <textarea cols="20" rows="5" class="text-muted border p-2" readonly> {{ $item->description }}</textarea>
                                                </td>
                                                <td>
                                                    <a href="{{ route('dispatch', $item->order_id) }}">
                                                        <button class="btn btn-outline-primary">Dispatech</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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
