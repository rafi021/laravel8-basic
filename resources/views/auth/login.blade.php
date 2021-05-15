<!DOCTYPE html>
<html lang="en">
    <head>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta
                name="viewport"
                content="width=device-width, initial-scale=1"
            />
            <title></title>
            @include('admin.dashboard_layout.style')
        </head>
    </head>
    <body class="bg-light-gray" id="body">
        <div class="container d-flex flex-column justify-content-between vh-100">
            <div class="row justify-content-center mt-5">
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="card">
                        <div class="card-header bg-primary">
                            @include('admin.dashboard_layout.app-brand')
                        </div>
                        <div class="card-body p-5">
                            <h4 class="text-dark mb-5">Sign In</h4>
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <input
                                            type="email"
                                            name="email" :value="old('email')" required autofocus
                                            class="form-control input-lg"
                                            id="email"
                                            aria-describedby="emailHelp"
                                            placeholder="Username"
                                        />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input
                                            type="password"
                                            name="password" required autocomplete="current-password"
                                            class="form-control input-lg"
                                            id="password"
                                            placeholder="Password"
                                        />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex my-2 justify-content-between">
                                            <div class="d-inline-block mr-3">
                                                <label class="control control-checkbox">Remember me
                                                    <input type="checkbox" id="remember_me" name="remember"/>
                                                    <div class="control-indicator"></div>
                                                </label>
                                            </div>
                                            <p>
                                                @if (Route::has('password.request'))
                                                <a class="text-blue" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                                @endif
                                            </p>
                                        </div>
                                        <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign In</button>
                                        <p>Don't have an account yet ?
                                            <a class="text-blue" href="{{ route('register') }}">Sign Up</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright pl-0">
                <p class="text-center">
                    &copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
                    <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                </p>
            </div>
        </div>
        <script>
            var d = new Date();
            var year = d.getFullYear();
            document.getElementById("copy-year").innerHTML = year;
        </script>
    </body>
</html>
