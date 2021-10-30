



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Log In - Sialvi Motors</title>
    <meta content="Codembeded" name="author" />
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="home-btn d-none d-sm-block">
        <a href="/Home/Index" class="text-white"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">
            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    
                </div>
                <h5 class="font-18 text-center">Sign in to continue to Sialvi Motors.</h5>

                    <form  action="{{ route('login') }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <div class="col-12">
                            <label for="Email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" data-val="true" data-val-email="The Email field is not a valid e-mail address." data-val-required="The Email field is required." id="Email" name="email" placeholder="Email" required="required" type="text" value="" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <label for="Password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" data-val="true" data-val-required="The Password field is required." id="Password" name="password" placeholder="Password" required="required" type="password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <div class="custom-control custom-checkbox" style="padding-left: 5.5%;">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                           
                            <button type="submit" class="btn btn-primary btn-block btn-lg waves-effect waves-light">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
</form>            </div>

        </div>
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/metismenu.min.js"></script>
    <script src="/assets/js/jquery.slimscroll.js"></script>
    <script src="/assets/js/waves.min.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>

</html>