<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginPage/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets1/css/bootstrap.min.css" rel="stylesheet">
    <!---------- Sweet Alert ---------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Fashion Store | Login Page</title>

</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100  min-vw-100 "
        style="background-color: rgba(157, 147, 147, 0.827)">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-4 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->
            @if (session('error'))
                <script>
                    swal({
                        icon: "error",
                        title: "Something went wrong!",
                        // text: "Something went wrong!",
                        button: "Try Again",
                    });
                </script>
            @endif
            <div class="col-md-6 rounded-4 left-box  p-3 d-none d-md-block ps-md-5 m-auto">
                <div class="featured-image">
                    <img src="assets1/img/4707071.jpg" class="img-fluid rounded w-75">
                </div>

            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box border border-2 border-primary rounded-4">

                <div class="row align-items-center p-2 ">
                    <div class="header-text mb-4">

                        <h2>Create New Password </h2>
                    </div>
                    <form action="{{ route('create_new_password')}}" method="post">@csrf
                        <div class="input-group mb-3">
                            <input type="text"
                                class="form-control form-control-lg bg-light fs-6  @error('otp') is-invalid @enderror"
                                placeholder="Email OTP @error('otp') {{ $message }} @enderror" name="otp"
                                value="{{ old('otp') }}">
                        </div>
                        <div class="input-group mb-3">
                            <input type="email"
                                class="form-control form-control-lg bg-light fs-6  @error('email') is-invalid @enderror"
                                placeholder="Email address @error('email') {{ $message }} @enderror" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="input-group mb-4">
                            <input type="password"
                                class="form-control form-control-lg bg-light fs-6  @error('password') is-invalid @enderror"
                                placeholder="Enter New Password @error('password') {{ $message }} @enderror" name="password"
                                value="{{ old('password') }}">
                        </div>
                        <div class="input-group">
                            <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">Submit</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</body>

</html>
