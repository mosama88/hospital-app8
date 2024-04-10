@extends('dashboard.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('dashboard/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('dashboard/assets/img/media/login.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
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
                                            <h2>مرحبًا بعودتك!</h2>

                                            <div class="mb-4">
                                                <p class="mg-b-10">حدد طريقة الدخول</p>
                                                <div class="SumoSelect sumo_somename" tabindex="0" role="button"
                                                    aria-expanded="true"><select name="somename"
                                                        class="form-control SlectBox SumoUnder"
                                                        onclick="console.log($(this).val())"
                                                        onchange="console.log('change is firing')" tabindex="-1">
                                                        <!--placeholder-->
                                                        <option value="" selected disabled>أختار من القائمة</option>
                                                        <option value="user">الدخول كمريض</option>
                                                        <option value="admin">الدخول أدمن</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <h5 class="font-weight-semibold mb-4">الدخول كمستخدم</h5>
                                            <form method="POST" action="{{ route('user.login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>البريد الالكترونى</label> <input class="form-control"
                                                        name="email" placeholder="Enter your email" type="text">
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                                </div>
                                                <div class="form-group">
                                                    <label>كلمة المرور</label> <input class="form-control" name="password"
                                                        placeholder="Enter your password" type="password"
                                                        autocomplete="current-password">
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                                </div>

                                                <!-- Remember Me -->
                                                <div class="block mt-4">
                                                    <label for="remember_me" class="inline-flex items-center">
                                                        <input id="remember_me" type="checkbox"
                                                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                                            name="remember">
                                                        <span
                                                            class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('تذكرنى') }}</span>
                                                    </label>
                                                </div>


                                                <button class="btn btn-main-primary btn-block">الدخول</button>
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
                                            <div class="main-signin-footer mt-5">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                        href="{{ route('password.request') }}">
                                                        {{ __('نسيت كلمة المرور؟') }}
                                                    </a>
                                                @endif
                                                <p>لا أملك حساب <a href="{{ url('/' . ($page = 'signup')) }}">أنشاء حساب
                                                        جديد</a></p>
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
@endsection
