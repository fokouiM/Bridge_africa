<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>Une voyante fr</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->


    <!--begin::Page Custom Styles(used by this page)-->
    <link href="assets/css/pages/login/classic/login-2.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="assets/media/logos/favicon.png" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed subheader-enabled page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white"
            id="kt_login">
            <!--begin::Aside-->
            <div
                class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10">
                <!--begin: Aside Container-->
                <div class="d-flex flex-row-fluid flex-column justify-content-between">
                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
                        <a href="" class="mb-15 text-center">
                            <img src="assets/media/logos/logo-letter-1.png" class="max-h-100px" alt="" />
                        </a>

                        <!--begin::Signin-->
                        <div class="login-form login-signin">
                            <div class="text-center mb-10 mb-lg-20">
                                <h2 class="font-weight-bold">connectez-vous</h2>
                                <p class="text-muted font-weight-bold">Entrer votre adress mail et votre mot de passe</p>
                            </div>

                            <!--begin::Form-->
                            <div id="kt_login_signin_form">
                                <form class="form" method="POST" action="{{ route('login') }}"  >
                                    @csrf
                                    <div class="form-group py-3 m-0">
                                        <input class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off" />
                                        @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group py-3 border-top m-0">
                                        <input class="form-control h-auto border-0 px-0 placeholder-dark-75  @error('password') is-invalid @enderror" type="Password"  placeholder="Mot de passe" name="password" required autocomplete="current-password" />
                                        @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-outline m-0 text-muted">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <span></span>
                                                se souvenir de moi
                                            </label>
                                        </div>
                                        <a href="{{ route('password.request') }}"  class="text-muted text-hover-primary">Mot de passe oublier ?</a>
                                    </div>

                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
                                        <div class="my-3 mr-2">
                                            <span class="text-muted mr-2">Vous n'aviez pas de compte ?</span>
                                            <a href="javascript:;" id="kt_login_signup" class="font-weight-bold">
                                                Créer un compte
                                            </a>
                                        </div>
                                        <button  class="btn btn-primary font-weight-bold px-9 py-4 my-3">Connexion</button>
                                    </div>
                                </form>
                            </div>
                            <!--end::Form-->
                        </div>

                        <!--end::Signin-->

                        <!--begin::Signup-->
                        <div class="login-form login-signup">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">créer un compte</h3>
                                <p class="text-muted font-weight-bold">Entrer vos informations et créer votre compte </p>
                            </div>

                            <!--begin::Form-->
                            <form class="form" action="{{ route('register') }}" method="POST"
                                id="kt_login_signup_form">
                                @csrf
                                <div class="form-group py-3 m-0">
                                    <input
                                        class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('fullname') is-invalid @enderror"
                                        type="text" required placeholder="nom complet" name="fullname" autocomplete="off"
                                        value="{{ old('fullname') }}" />
                                    @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group py-3 border-top m-0">
                                    <input
                                        class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('email') is-invalid @enderror"
                                        type="email" required value="{{ old('email') }}" placeholder="Email"
                                        name="email" autocomplete="off" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group py-3 border-top m-0">
                                    <input
                                        class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('password') is-invalid @enderror"
                                        required type="password" value="{{ old('password') }}" placeholder="Mot de passe"
                                        name="password" autocomplete="off" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group py-3 border-top m-0">
                                    <input
                                        class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('name') is-invalid @enderror"
                                        required type="password" placeholder="Confirmer votre Mot de passe"
                                        name="password_confirmation" autocomplete="off" />
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-5">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline">
                                            <input type="checkbox" name="agree" required />
                                            <span></span>
                                            I Agree the <a href="#" class="ml-1">terms and conditions</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center">
                                    <button class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Enregistré</button>
                                    <button id="kt_login_signup_cancel"
                                        class="btn btn-outline-primary font-weight-bold px-9 py-4 my-3 mx-2">annuler</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signup-->

                        <!--begin::Forgot-->
                        <div class="login-form login-forgot">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">Forgotten Password ?</h3>
                                <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                            </div>

                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                                <div class="form-group py-3 border-bottom mb-10">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="email"
                                        placeholder="Email" name="email" autocomplete="off" />
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center">
                                    <button id="kt_login_forgot_submit"
                                        class="btn btn-primary  font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                    <button id="kt_login_forgot_cancel"
                                        class="btn btn-light-primary  font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Forgot-->
                    </div>
                    <!--end::Aside body-->

                    <!--begin: Aside footer for desktop-->
                    <div class="d-flex flex-column-auto justify-content-between mt-15">
                        <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
                            &copy; unevoyante-fr.fr tous droits réservés
                        </div>
                        {{-- <div class="d-flex order-1 order-sm-2 my-2">
                    <a href="#" class="text-muted text-hover-primary">Privacy</a>
                    <a href="#" class="text-muted text-hover-primary ml-4">Legal</a>
                    <a href="#" class="text-muted text-hover-primary ml-4">Contact</a>
                </div> --}}
                    </div>
                    <!--end: Aside footer for desktop-->
                </div>
                <!--end: Aside Container-->
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7"
                style="background-image: url(assets/media/bg/bg-4.jpg);">
                <!--begin::Content body-->
                <div class="d-flex flex-column-fluid flex-lg-center">
                    <div class="d-flex flex-column justify-content-center">
                        <h3 class="display-3 font-weight-bold my-7 text-white">Bienvenue sur Une voyante fr !</h3>
                    </div>
                </div>
                <!--end::Content body-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->


    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";

    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#8950FC",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#6993FF",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#EEE5FF",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#E1E9FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": "Poppins"
        };

    </script>
    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->


    <!--begin::Page Scripts(used by this page)-->
    <script src="assets/js/pages/custom/login/login-general.js"></script>
    <!--end::Page Scripts-->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script>
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        };
    </script>
</body>
<!--end::Body-->

</html>
