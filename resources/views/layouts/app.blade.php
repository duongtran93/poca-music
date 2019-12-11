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

<!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/source/img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->

    <link rel="stylesheet" href="{{ asset('storage/source/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/source/style.css') }}">
    <link href="{{ asset('storage/mycss/user-profile.css') }}" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>

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

</body>

</html>
