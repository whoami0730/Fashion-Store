<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fashion Store | Profile Page</title>
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
            <h1 class="text-center text-white display-6">My Profile</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-lg-5">
                @if (session('success'))
                    <script>
                        swal({
                            icon: "success",
                            title: "Your Account Updated.",
                            // text: "",
                            button: "Ok",
                        });
                    </script>
                @endif
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center  ">
                        <div class=" d-flex justify-content-between position-relative border rounded">
                            @if ($data->image)
                                <img src="{{ asset('storage/UserImage/' . $data->image) }}" class="img-fluid rounded"
                                    alt="Image">
                            @else
                                <img src="loginPage/image/hacker.png" class="img-fluid rounded" alt="Image">
                            @endif
                            <div class="edit position-absolute top-0 end-0 pt-1 pe-1">
                                <button class="btn btn-md rounded-circle bg-transparent border border-primary "><i
                                        class="fa fa-pen text-primary" data-bs-toggle="modal"
                                        data-bs-target="#editProfile"></i></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-7 ms-lg-5">
                        <div class="row mb-4 ">
                            <div class="col-12">
                                <h4 class="text-muted text-center text-md-start">Hi {{ $data->name }}</h4>
                                <h5 class="text-muted text-center  text-md-start">+91-{{ $data->phone }}</h5>
                                <h5 class="text-muted text-center  text-md-start ">{{ $data->email }}</h5>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="row g-4 row-cols-2 justify-content-center">
                                <div class="col-6">
                                    <a href="{{ route('order') }}">
                                        <button
                                            class="btn btn-outline-primary w-100 border border-primary rounded px-2 py-3 py-lg-4">My
                                            Order</button>
                                    </a>
                                </div>
                                <div class="col-6">
                                    {{-- <a href=""> --}}
                                    <button
                                        class="btn btn-outline-primary w-100 border border-muted rounded px-2 py-3 py-lg-4 disabled">Saved
                                        item</button>
                                    {{-- </a> --}}
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('address') }}">
                                        <button
                                            class="btn btn-outline-primary w-100 border border-primary rounded px-2 py-3 py-lg-4">My
                                            Address</button>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('cart') }}">
                                        <button
                                            class="btn btn-outline-primary w-100 border border-primary rounded px-2 py-3 py-lg-4">My
                                            Cart</button>
                                    </a>
                                </div>

                            </div>

                        </div>
                        <div class="">
                            <div class="row ">
                                <div class="col">

                                    <button
                                        class="btn btn-secondary w-100 border border-secondary rounded px-2 py-2 py-lg-3 text-muted"
                                        data-bs-toggle="modal" data-bs-target="#editProfile">Edit
                                        Profile</button>

                                </div>
                                <div class="col">
                                    <a href="{{ route('logout_user') }}">
                                        <button
                                            class="btn btn-secondary w-100 border border-secondary rounded px-2 py-2 py-lg-3 text-muted">Logout
                                        </button>
                                    </a>
                                </div>
                            </div>

                            <!-- Modal Profile Start -->
                            <div class="modal fade" id="editProfile">
                                <div class="modal-dialog">
                                    <div class="modal-content mt-5">
                                        <div class="modal-body ">

                                            <!-- Your edit form goes here -->
                                            <form method="POST" action="{{ route('user_update', $data->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="my-3 text-primary fs-3 text-center text-uppercase fw-bold">Edit
                                                    Profile</div>
                                                <div class="my-3">Name</div>
                                                <div class="input-group">
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $data->name }}">
                                                </div>
                                                <div class="my-3">Email</div>
                                                <div class="input-group">
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ $data->email }}">
                                                </div>
                                                <div class="my-3">Phone</div>
                                                <div class="input-group">
                                                    <input type="text" name="phone" class="form-control"
                                                        value="{{ $data->phone }}">
                                                </div>
                                                <div class="my-3">

                                                    @if ($data->image)
                                                        <img src="{{ asset('storage/UserImage/' . $data->image) }}"
                                                            alt="Profile Image" class="img-thumbnail" width="120px">
                                                    @else
                                                        <img src="loginPage/image/hacker.png" alt="Profile Image"
                                                            class="img-thumbnail" width="120px">
                                                    @endif
                                                </div>

                                                <div class="input-group">
                                                    <input type="file" name="image" class="form-control">
                                                </div>

                                        </div>
                                        <button value="submit" class="btn btn-primary text-white ">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Profile End -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Single Product End -->

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
