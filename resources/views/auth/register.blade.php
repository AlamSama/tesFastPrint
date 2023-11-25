<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restu Alam</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('darkpan-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('darkpan-1.0.0/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}"
        rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('darkpan-1.0.0/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('darkpan-1.0.0/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <form action="{{ route('postRegister') }}" method="POST" class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    @csrf
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary">Restu Alam</h3>
                        </a>
                        <h3>Sign Up</h3>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @endError" id="name" placeholder="example" name="name" value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @endError" id="floatingText" placeholder="example" name="username" value="{{ old('username') }}">
                        <label for="floatingText">Username</label>
                        @error('username')
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control @error('password') is-invalid @endError" id="floatingPassword" placeholder="Password" name="password" value="{{ old('password') }}">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @endError" id="floatingPasswordConfirm" placeholder="Password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        <label for="floatingPasswordConfirm">Password Confirmation</label>
                        @error('password_confirmation')
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                    <p class="text-center mb-0">Already have an Account? <a href="{{ route('login') }}">Sign In</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('darkpan-1.0.0/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('darkpan-1.0.0/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('darkpan-1.0.0/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('darkpan-1.0.0/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('darkpan-1.0.0/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('darkpan-1.0.0/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('darkpan-1.0.0/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('darkpan-1.0.0/js/main.js') }}"></script>
</body>

</html>
