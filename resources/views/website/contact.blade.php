<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fashion Store | Contact Page</title>
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
            <h1 class="text-center text-white display-6">Contact</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active text-white">Contact</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    @if (session('success'))
                        <script>
                            swal({
                                icon: "success",
                                title: "Your Message Sent Successfully.",
                                // text: "Your Information Send.",
                                button: "Ok",
                            });
                        </script>
                    @endif
                    <div class="row g-4 ">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary ">Get In Touch</h1>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="" method="post" class="">@csrf
                                <input type="text"
                                    class="w-100 form-control border-1 @error('name')  border-danger @enderror py-3 mb-4 @error('name') is-invalid @enderror"
                                    value="@error('name') {{ $message }} @enderror" placeholder="Your Name"
                                    name="name">
                                <input type="email"
                                    class="w-100 form-control border-1 @error('email')  border-danger @enderror py-3 mb-4 @error('email')border is-invalid @enderror"
                                    value="@error('email') {{ $message }} @enderror" placeholder="Enter Your Email"
                                    name="email">
                                <input type="text"
                                    class="w-100 form-control border-1 @error('phone')  border-danger @enderror py-3 mb-4 @error('phone') is-invalid @enderror"
                                    value="@error('phone') {{ $message }} @enderror"
                                    placeholder="Enter Your Phone No." name="phone">
                                <textarea class="w-100 form-control border-1 @error('message')  border-danger @enderror mb-4 @error('message') is-invalid @enderror" rows="2" cols="10"
                                    placeholder="Your Message " name="message">@error('message'){{$message}}@enderror</textarea>
                                <button class="w-100 btn btn-primary form-control  py-3 bg-white text-primary "
                                    type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-5 mb-4">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <a href="https://goo.gl/maps/cMDMPpAB11S3ypff6">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i></a>
                                <div>
                                    <h4>Address</h4>
                                    <a href="https://goo.gl/maps/cMDMPpAB11S3ypff6">
                                    <p class="mb-2">Near Bus Stand, Jalandhar</p></a>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <a href="mailto:info@aprosoftech.com">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i></a>
                                <div>
                                    <h4>Mail Us</h4>
                                    <a href="mailto:info@aprosoftech.com">
                                    <p class="mb-2">info@aprosoftech.com</p></a>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <a href="tel:+919988449751">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i></a>
                                <div>
                                    <h4>Telephone</h4>
                                    <a href="tel:+919988449751">
                                    <p class="mb-2">+91 9988449751</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100" style="height: 400px;"
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6817.205497155068!2d75.589051!3d31.314723000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5a46aaaf0fa3%3A0x5684a2692ea91364!2sAprosoft%20Technologies%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1714552336083!5m2!1sen!2sin"
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

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
