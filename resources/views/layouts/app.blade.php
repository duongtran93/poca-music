<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Poca - Podcast &amp; Audio Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <link rel="stylesheet" href="{{ asset('storage/mycss/toastr.css') }}">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <link href="{{ asset('storage/mycss/editUser.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


</body>

</html>
