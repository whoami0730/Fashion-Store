<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fashion Store | Address Page</title>
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
            <h1 class="text-center text-white display-6">Update Address</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active text-white">Edit Address</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

         <!-- Checkout Page Start -->
         <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Edit Address</h1>
                <div class="row g-5">
                    <div class="col-md-12 ">
                        <form action="{{route('update_address',$address->id)}}" method="post">@csrf
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">

                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                        <input type="text" class="form-control @error('fname') is-invalid  @enderror"
                                            placeholder="First Name"
                                            name="fname" value="{{$address->fname}}">
                                        @error('fname')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                                        <input type="text" class="form-control @error('lname') is-invalid  @enderror"
                                            placeholder="Last Name"
                                            name="lname" value="{{$address->lname}}">
                                            @error('lname')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Phone<sup>*</sup></label>
                                <input type="text" class="form-control @error('phone') is-invalid  @enderror"
                                    placeholder="Phone" name="phone"
                                    value="{{$address->phone}}">
                                    @error('phone')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Address <sup>*</sup></label>
                                <input type="text" class="form-control @error('address') is-invalid  @enderror" placeholder="House Number Street Name"
                                    placeholder="Address" name="address"
                                    value="{{$address->address}}">
                                    @error('address')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Landmark<sup>*</sup></label>
                                <input type="text" class="form-control @error('landmark') is-invalid  @enderror" placeholder="House Number Street Name"
                                    placeholder="Landmark" name="landmark"
                                    value="{{$address->landmark}}">
                                    @error('landmark')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Town/City<sup>*</sup></label>
                                <input type="text" class="form-control @error('city') is-invalid  @enderror"
                                    placeholder="City" name="city"
                                    value="{{$address->city}}">
                                    @error('city')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">State<sup>*</sup></label>
                                <select class="form-control bg-white @error('state') is-invalid  @enderror" value="" name="state">
                                    <option value="{{$address->state}}">{{$address->state}}</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Puducherry">Puducherry</option>
                                </select>
                                @error('state')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Postcode/Pincode<sup>*</sup></label>
                                <input type="text" class="form-control @error('pincode') is-invalid  @enderror"
                                    placeholder="Pincode" name="pincode"
                                    value="{{$address->pincode}}">
                                    @error('pincode')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check my-3 p-0">
                                <label class="form-check-label me-2">Update an address?</label>
                                <button class="btn btn-primary btn-sm"> Update</button>
                            </div>
                        </form>

                    </div>
                    
                </div>

            </div>
        </div>
        <!-- Edit Address Page End -->

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
