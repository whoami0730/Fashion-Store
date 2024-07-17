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

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

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
            @if (session('update'))
            <script>
                swal({
                    icon: "success",
                    title: "New Password Created Successfully!",
                    // text: "Something went wrong!",
                    button: "Try Again",
                });
            </script>
        @endif
            @if (session('success'))
                <script>
                    swal({
                        icon: "success",
                        title: "Your Account Created Successfully.",
                        // text: "Your Account Created.",
                        button: "Ok",
                    });
                </script>
            @endif
            <div
                class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box bg-primary p-3">
                <div class="featured-image mb-3 ">
                    <img src="loginPage/image/1.png" class="img-fluid d-none d-md-block rounded img-zoom"
                        style="width: 300px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                    Fashion
                    Store</p>

            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">

                <div class="row align-items-center p-2">
                    <div class="header-text mb-4">

                        <h2>Login </h2>
                        <p>We are happy to have you back.</p>
                    </div>
                    <form action="{{ route('login') }}" method="post">@csrf
                        <div class="input-group mb-2">
                            <input type="email"
                                class="form-control form-control-lg bg-light fs-6  @error('email') is-invalid @enderror"
                                placeholder="Email address @error('email') {{ $message }} @enderror" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="input-group mb-2">
                            <input type="password"
                                class="form-control form-control-lg bg-light fs-6  @error('password') is-invalid @enderror"
                                placeholder="Password @error('password') {{ $message }} @enderror" name="password"
                                value="{{ old('password') }}">
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">

                            <div class="forgot p-1">
                                <small><a href="{{route('forgot')}}" data-bs-toggle="modal" data-bs-target="#forget">Forgot Password?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">Sign In</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Don't have account? <a href="{{ route('signup') }}">Sign Up</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
