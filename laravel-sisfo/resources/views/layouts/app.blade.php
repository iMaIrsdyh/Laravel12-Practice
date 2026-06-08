<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sisfo - Login</title>

    <!-- Font Awesome -->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}"
          rel="stylesheet"
          type="text/css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- SB Admin CSS -->
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}"
          rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="card-body p-0">

                    <div class="row">

                        <div class="col-lg-12 text-center">

                            <div class="p-5">

                                <div class="text-center">

                                    <h1 class="h4 text-gray-900 mb-4">
                                        Halaman Login
                                    </h1>

                                </div>

                                <form class="user"
                                      method="POST"
                                      action="{{ route('login') }}">

                                    @csrf

                                    <div class="form-group">

                                        <input
                                            id="email"
                                            type="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email"
                                            autofocus>

                                        @error('email')
                                            <span class="invalid-feedback"
                                                  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <input
                                            id="password"
                                            type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password"
                                            required>

                                        @error('password')
                                            <span class="invalid-feedback"
                                                  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <button type="submit"
                                            class="btn btn-primary btn-user btn-block">

                                        Login

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- JQuery -->
<script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- JQuery Easing -->
<script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- SB Admin JS -->
<script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>

</body>
</html>