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
    <title>Tastimonial Page | Fashion Store</title>

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
                                <form action="category" method="post" class="form-horizontal"
                                    enctype="multipart/form-data">@csrf
                                    <div class="card-header">
                                        <h4 class=" text-secondary">Add Tastimonial</h4>
                                    </div>
                                    <div class="card-body card-block">

                                        <div class="row form-group ">
                                            <div class="col col-md-2">
                                                <label class="form-control-label">Name</label>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <input type="text" name="name"
                                                    placeholder="Enter Name..."
                                                    class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                                <span class="text-danger">
                                                    @error('name')
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
                                                <input type="file" name="image" placeholder="Enter Image..."
                                                    class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}">
                                                <span class="text-danger">
                                                    @error('image')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col col-md-2">
                                                <label class="form-control-label">City</label>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <input type="text" name="city"
                                                    placeholder="Enter City Name..."
                                                    class="form-control @error('city') is-invalid @enderror" value="{{old('city')}}">
                                                <span class="text-danger">
                                                    @error('city')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col col-md-2">
                                                <label class="form-control-label">State</label>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <input type="text" name="state"
                                                    placeholder="Enter State Name..."
                                                    class="form-control @error('state') is-invalid @enderror" value="{{old('state')}}">
                                                <span class="text-danger">
                                                    @error('state')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col col-md-2">
                                                <label class="form-control-label">Message</label>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <input type="text" name="message"
                                                    placeholder="Enter Message..."
                                                    class="form-control @error('message') is-invalid @enderror" value="{{old('message')}}">
                                                <span class="text-danger">
                                                    @error('message')
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
                    <!-- SHOW CATEGORY-->
                    <div class="table-responsive m-b-40 m-t-35">
                        <h3 class="title-5 m-b-15">Testmonial Details</h3>
                        <div class="table-data__tool">
                            <table class="table table-borderless table-data3 justify-content-center">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>message</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>

                                {{-- <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                <img src="{{ asset('/storage/CategoryImage/' . $category->image) }}"
                                                    alt="Category Image" width=100px>
                                            </td>
                                            <td class="process">Active</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('edit_category', $category->id) }}" class="item">
                                                        <button>
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('delete_category', $category->id) }}" class="item">
                                                        <button onclick=" return confirm('You Want To Delete.....')">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>



                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody> --}}
                            </table>
                        </div>
                        <!-- Pagination START -->
                        {{-- <div class="container d-flex justify-content-center">
                            <div class="">
                                {{$categories->links('pagination::bootstrap-4') }}
                            </div>
                        </div> --}}
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
