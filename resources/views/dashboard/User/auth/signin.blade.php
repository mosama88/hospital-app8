@extends('dashboard.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('dashboard/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
<style>
    .login-form {
        display: none;
    }
</style>
@section('content')

    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('dashboard/assets/img/sign-in.jpg') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <ul class="nav">
                    <li class="">
                        <div class="dropdown  nav-itemd-none d-md-flex">
                            <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown"
                                aria-expanded="false">
                                @if (App::getLocale() == 'ar')
                                    <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
                                            src="{{ URL::asset('Dashboard/assets/img/flags/egypt_flag.jpg') }}"
                                            alt="img"></span>
                                    <strong
                                        class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                                @else
                                    <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
                                            src="{{ URL::asset('Dashboard/assets/img/flags/us_flag.jpg') }}"
                                            alt="img"></span>
                                    <strong
                                        class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                                @endif
                                <div class="my-auto">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        @if ($properties['native'] == 'English')
                                            <i class="flag-icon flag-icon-us"></i>
                                        @elseif($properties['native'] == 'العربية')
                                            <i class="flag-icon flag-icon-eg"></i>
                                        @endif
                                        {{ $properties['native'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('dashboard/assets/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{ trans('dashboard/login_trans.welcome_back') }} !</h2>
                                            @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger text-center">
                                                        {{ $error }}
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="mb-4">
                                                <label
                                                    class="mg-b-10">{{ trans('dashboard/login_trans.Select_the_login_method') }}</label>
                                                <div class="SumoSelect sumo_somename" tabindex="0" role="button"
                                                    aria-expanded="true">
                                                    <select name="somename" class="form-control SlectBox SumoUnder"
                                                        onclick="console.log($(this).val())"
                                                        onchange="console.log('change is firing')" tabindex="-1"
                                                        id="selectForm">
                                                        <option value="" selected disabled>
                                                            {{ trans('dashboard/login_trans.Choose_from_the_list') }}</option>
                                                        <option value="user">{{ trans('dashboard/login_trans.As_a_Patient') }}
                                                        </option>
                                                        <option value="admin">{{ trans('dashboard/login_trans.As_a_Admin') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Login Form User --}}
                                            <div class="login-form" id="user">
                                                <h5 class="font-weight-semibold mb-4">
                                                    {{ trans('dashboard/login_trans.As_a_Patient') }}</h5>
                                                <form method="POST" action="{{ route('user.login') }}">
                                                    @csrf

                                                    {{-- Email Input --}}
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard/login_trans.Email') }}</label> <input
                                                            class="form-control" name="email"
                                                            placeholder="Enter your email" type="text">
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>

                                                    {{-- Password Input --}}
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard/login_trans.Password') }}</label> <input
                                                            class="form-control" name="password"
                                                            placeholder="Enter your password" type="password"
                                                            autocomplete="current-password">
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                                    </div>

                                                    {{-- Remember Me --}}
                                                    <div class="block mt-4">
                                                        <label for="remember_me" class="inline-flex items-center">
                                                            <input id="remember_me" type="checkbox"
                                                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                                                name="remember">
                                                            <span
                                                                class="ms-2 text-sm text-gray-600 dark:text-gray-400 mx-1">{{ trans('dashboard/login_trans.Remember_Me') }}</span>
                                                        </label>
                                                    </div>

                                                    {{-- Login Input --}}
                                                    <button
                                                        class="btn btn-main-primary btn-block">{{ trans('dashboard/login_trans.Sign_In') }}</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>


                                            {{-- Login Form Admin --}}
                                            <div class="login-form" id="admin">
                                                <h5 class="font-weight-semibold mb-4">
                                                    {{ trans('dashboard/login_trans.As_a_Admin') }}</h5>
                                                <form method="POST" action="{{ route('admin.login') }}">
                                                    @csrf

                                                    {{-- Email Input --}}
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard/login_trans.Email') }}</label> <input
                                                            class="form-control" name="email"
                                                            placeholder="Enter your email" type="text">
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>

                                                    {{-- Password Input --}}
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard/login_trans.Password') }}</label> <input
                                                            class="form-control" name="password"
                                                            placeholder="Enter your password" type="password"
                                                            autocomplete="current-password">
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                                    </div>

                                                    {{-- Remember Me --}}
                                                    <div class="block mt-4">
                                                        <label for="remember_me" class="inline-flex items-center">
                                                            <input id="remember_me" type="checkbox"
                                                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                                                name="remember">
                                                            <span
                                                                class="ms-2 text-sm text-gray-600 dark:text-gray-400 mx-1">{{ trans('dashboard/login_trans.Remember_Me') }}</span>
                                                        </label>
                                                    </div>

                                                    {{-- Login Input --}}
                                                    <button
                                                        class="btn btn-main-primary btn-block">{{ trans('dashboard/login_trans.Sign_In') }}</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i
                                                                    class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with
                                                                Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>



                                            {{-- Forget Password --}}
                                            <div class="main-signin-footer mt-5">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                        href="{{ route('password.request') }}">
                                                        {{ trans('dashboard/login_trans.Forget_Password') }}

                                                    </a>
                                                @endif
                                                {{-- Register --}}
                                                <p>{{ trans('dashboard/login_trans.Dont_have_Account') }} <a
                                                        href="{{ url('/' . ($page = 'signup')) }}">
                                                        {{ trans('dashboard/login_trans.Create_Account') }}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#selectForm').change(function() {
            var myID = $(this).val();
            $('.login-form').each(function() {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
