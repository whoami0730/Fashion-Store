<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fashion Store | Checkout Page</title>
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
            <h1 class="text-center text-white display-6">Checkout</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Checkout</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Enter Address</h1>
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        @if (session('success'))
                            <script>
                                swal({
                                    icon: "success",
                                    title: "Address Created successfully.",
                                    // text: "",
                                    button: "Ok",
                                });
                            </script>
                        @endif
                        @if (session('delete'))
                            <script>
                                swal({
                                    icon: "success",
                                    title: "Address Deleted successfully.",
                                    // text: "Address Deleted successfully.",
                                    button: "Ok",
                                });
                            </script>
                        @endif
                        @if (session('error'))
                            <script>
                                swal({
                                    icon: "error",
                                    title: "Create And Select Address",
                                    // text: "",
                                    button: "Try Again",
                                });
                            </script>
                        @endif
                        <form action="{{ route('create_address') }}" method="post">@csrf
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">

                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                        <input type="text" class="form-control @error('fname') is-invalid  @enderror"
                                            placeholder="First Name" name="fname" value="{{ old('fname') }}">
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
                                            placeholder="Last Name" name="lname" value="{{ old('lname') }}">
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
                                    placeholder="Phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Address <sup>*</sup></label>
                                <input type="text" class="form-control @error('address') is-invalid  @enderror"
                                    placeholder="House Number Street Name" placeholder="Address" name="address"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Landmark<sup>*</sup></label>
                                <input type="text" class="form-control @error('landmark') is-invalid  @enderror"
                                    placeholder="House Number Street Name" placeholder="Landmark" name="landmark"
                                    value="{{ old('landmark') }}">
                                @error('landmark')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Town/City<sup>*</sup></label>
                                <input type="text" class="form-control @error('city') is-invalid  @enderror"
                                    placeholder="City" name="city" value="{{ old('city') }}">
                                @error('city')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">State<sup>*</sup></label>
                                <select class="form-control bg-white @error('state') is-invalid  @enderror"
                                    value="{{ old('state') }}" name="state">
                                    <option value="">Select State</option>
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
                                    placeholder="Pincode" name="pincode" value="{{ old('pincode') }}">
                                @error('pincode')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check my-3 p-0">
                                <label class="form-check-label me-2" for="Account-1">Create an address?</label>
                                <button class="btn btn-primary btn-sm"> Create</button>
                            </div>
                        </form>

                    </div>

                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart_detail as $data)
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    @php
                                                        $images = json_decode($data->image);
                                                    @endphp
                                                    @if (is_array($images))
                                                        <img src="{{ asset('/storage/ProductImage/' . $images[0]) }}"
                                                            class="img-fluid rounded-circle"
                                                            style="width: 90px; height: 90px;" alt="">
                                                    @else
                                                        <img src="{{ asset('/storage/ProductImage/' . $data->image) }}"
                                                            class="img-fluid rounded-circle"
                                                            style="width: 90px; height: 90px;" alt="">
                                                    @endif
                                                </div>
                                            </th>
                                            <td class="py-5">{{ $data->product_name }}</td>
                                            <td class="py-5">₹ {{ $data->price }}</td>
                                            <td class="py-5">{{ $data->qty }}</td>
                                            <td class="py-5">₹ {{ $data->price }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="col">Total Pay</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">₹ {{ $netTotal }}</th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                        <div
                            class="row g-4 text-center align-items-center justify-content-center border-bottom py-2 mt-lg-3">
                            <form action="{{ route('makeOrder') }}" method="post">@csrf
                                <div class="col-12">
                                    <h4 class="text-start mb-3 text-primary">Select Addres</h4>
                                    @foreach ($addresses as $address)
                                        <div class="form-check text-start my-3">

                                            <input type="hidden" name="price" value="{{ $netTotal }}">
                                            <input type="radio" class="form-check-input bg-secondary border-0"
                                                id="Transfer-1" name="address_id" value="{{ $address->address_id }}">
                                            @error('address_id')
                                                <script>
                                                    swal({
                                                        icon: "error",
                                                        title: "Please Select Address !",
                                                        // text: "Select Addres !",
                                                        button: "Try Again",
                                                    });
                                                </script>
                                            @enderror
                                            <div class="d-flex justify-content-between">
                                                <h6>Address {{ $loop->iteration }}</h6>
                                            </div>
                                            <div class="w-100 row">
                                                <div class="col-4">
                                                    <label class="form-check-label d-inline-block w-25"
                                                        for="Transfer-1">Name<sup>*</sup></label>
                                                </div>
                                                <div class="col-8">
                                                    <label class="form-check-label"
                                                        for="Transfer-1">{{ $address->fname }}
                                                        {{ $address->lname }}</label>
                                                </div>

                                            </div>
                                            <div class="w-100 row">
                                                <div class="col-4">
                                                    <label class="form-check-label d-inline-block w-25"
                                                        for="Transfer-1">Phone<sup>*</sup></label>
                                                </div>
                                                <div class="col-8">
                                                    <label class="form-check-label"
                                                        for="Transfer-1">{{ $address->phone }}</label>
                                                </div>

                                            </div>
                                            <div class="w-100 row">
                                                <div class="col-4">
                                                    <label class="form-check-label d-inline-block w-25"
                                                        for="Transfer-1">Address<sup>*</sup></label>
                                                </div>
                                                <div class="col-8">
                                                    <label class="form-check-label"
                                                        for="Transfer-1">{{ $address->address }}
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                    @endforeach
                                    @if ($address_count >= 1)
                                        <button
                                            class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Order</button>
                                </div>
                            @else
                                <button
                                    class="btn border border-2 border-secondary py-3 px-4 text-uppercase w-100 text-muted disabled">Order</button>
                        </div>
                        @endif
                        </form>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <!-- Checkout Page End -->

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
