@extends('layouts.frontend')

@section('content')

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register | Minimalin eCommerce Bootstrap 5 Template.</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css')}}">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/futura-std-4">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">




</head>


<body>


    <main class="main_wrapper body__overlay overflow__hidden">

        {{-- navbar --}}
        
        {{-- end navbar --}}

        <center>
      <!-- breadcrumb__start -->
      <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__title">
                        <h1>Login</h1>
                        <ul>
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li class="color__blue">
                                Login
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- breadcrumb__end -->


 <!-- login__section__start -->
    <div class="loginarea  sp_bottom_80 sp_top_80">
     <div class="container">
        <div class="row">
            <div class="col-xl-12 offset-md-2 loginarea__col">
                <ul class="nav  tab__button__wrap text-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one" type="button">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two" type="button">Sing up</button>
                    </li>



                </ul>
            </div>


            <div class="tab-content tab__content__wrapper" id="myTabContent">

                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                    <div class="col-xl-8 offset-md-2 loginarea__col">
                        <div class="loginarea__wraper">
                            <div class="loginarea__heading">
                                <h5 class="login__title">Login</h5>
                                <p class="login__description">Don't have an account yet? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Sign up for free</a></p>
                            </div>



                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="loginarea__form">
                                <label class="form__label">Email</label>
                                <input class="common__login__input" name="email" type="email" placeholder="Your email" required>
                            </div>
                            <div class="loginarea__form">
                                <label class="form__label">Password</label>
                                <input class="common__login__input" name="password" type="password" placeholder="Password" required>
                            </div>
                            <div class="loginarea__form d-flex justify-content-between flex-wrap gap-2">
                                <div class="form__check">
                                    <input type="checkbox" name="remember" id="login__privacy">
                                    <label for="login__privacy">Remember Me</label>
                                </div>
                                <div class="text-end login__form__link">
                                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                                </div>
                            </div>
                            <div class="loginarea__button text-center">
                                <button class="default__button" type="submit">Log In</button>
                            </div>
                        </form>


                           


                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                    <div class="col-xl-8 offset-md-2 loginarea__col">
                        <div class="loginarea__wraper">
                            <div class="loginarea__heading">
                                <h5 class="login__title">Sing Up</h5>
                                <p class="login__description">Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Log In</a></p>
                            </div>



                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="loginarea__form">
                                            <label class="form__label">Name</label>
                                            <input class="common__login__input" type="text" name="name" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="loginarea__form">
                                            <label class="form__label">Email</label>
                                            <input class="common__login__input" type="email" name="email" placeholder="Your Email" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="loginarea__form">
                                            <label class="form__label">Password</label>
                                            <input class="common__login__input" type="password" name="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="loginarea__form">
                                            <label class="form__label">Confirm Password</label>
                                            <input class="common__login__input" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="loginarea__form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form__check">
                                        <input type="checkbox" id="regi__privacy" required>
                                        <label for="regi__privacy">Accept the Terms and Privacy Policy</label>
                                    </div>
                                </div>
                                <div class="login__button">
                                    <button class="default__button text-center" type="submit">Sign Up</button>
                                </div>
                            </form>

                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                

        </center>


    @include('layouts.components-frontend.footer')


    </main>





    <!-- JS here -->
    <script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}} "></script>
    <script src="{{asset('js/vendor/jquery-3.6.0.min.js')}} "></script>
    <script src="{{asset('js/popper.min.js')}} "></script>
    <script src="{{asset('js/bootstrap.min.js')}} "></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}} "></script>
    <script src="{{asset('js/one-page-nav-min.js')}} "></script>
    <script src="{{asset('js/slick.min.js')}} "></script>
    <script src="{{asset('js/jquery.meanmenu.min.js')}} "></script>
    <script src="{{asset('js/ajax-form.js')}} "></script>
    <script src="{{asset('js/wow.min.js')}} "></script>
    <script src="{{asset('js/jquery.scrollUp.min.js')}} "></script>
    <script src="{{asset('js/imagesloaded.pkgd.min.js')}} "></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}} "></script>
    <script src="{{asset('js/waypoints.min.js')}} "></script>
    <script src="{{asset('js/jquery.counterup.min.js')}} "></script>
    <script src="{{asset('js/plugins.js')}} "></script>
    <script src="{{asset('js/main.js')}} "></script>


</body>

</html>
@endsection
