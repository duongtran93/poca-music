<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Poca - Podcast &amp; Audio Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @toastr_css
    <!-- Title -->
    <title>Poca - Podcast &amp; Audio</title>
{{--    <base href="{{ asset('') }}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/source/img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->

    <link rel="stylesheet" href="{{ asset('storage/source/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/source/style.css') }}">
    <link href="{{ asset('storage/mycss/user-profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('storage/Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('storage/Login/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/Login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/Login/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/Login/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/Login/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/Login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/Login/css/main.css') }}">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <link href="{{ asset('storage/mycss/editUser.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/mycss/playlist.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
</head>

<body>
{{--<!-- Preloader -->--}}
{{--<div id="preloader">--}}
{{--    <div class="preloader-thumbnail">--}}
{{--        <img src="{{ asset('storage/source/img/core-img/preloader.png') }}" alt="">--}}
{{--    </div>--}}
{{--</div>--}}

<div style="margin-top: 80px;">
    @yield('content')
</div>
<!-- ******* All JS ******* -->
<!-- jQuery js -->
<script src="{{ asset('storage/source/js/jquery.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('storage/source/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('storage/source/js/bootstrap.min.js') }}"></script>
<!-- All js -->
<script src="{{ asset('storage/source/js/poca.bundle.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('storage/source/js/default-assets/active.js') }}"></script>
<script type="text/javascript" src="{{ asset('storage/myjs/show-hide-password.js') }}"></script>
<script type="text/javascript" src="{{ asset('storage/myjs/toastr.js') }}"></script>
<script type="text/javascript" src="{{ asset('storage/myjs/add-song-to-playlist.js') }}"></script>
<script type="text/javascript" src="{{ asset('storage/myjs/delete-song-in-playlist.js') }}"></script>
<script type="text/javascript" src="{{ asset('storage/myjs/edit-profile.js') }}"></script>
<script src="{{ asset('storage/Login/vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('storage/Login/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('storage/Login/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('storage/Login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('storage/Login/vendor/countdowntime/countdowntime.js') }}"></script>
<script src="{{ asset('storage/Login/js/main.js') }}"></script>


</body>
@jquery
@toastr_js
@toastr_render
</html>
