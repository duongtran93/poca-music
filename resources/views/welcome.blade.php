<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Poca - Podcast &amp; Audio Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Title -->
    <title>Poca - Podcast &amp; Audio</title>
{{--    <base href="{{ asset('') }}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/source/img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('storage/source/style.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/source/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/mycss/login.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/mycss/register.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/mycss/search-result.css') }}">

    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>--}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body id="body">
<!-- Preloader -->
<div id="preloader">
    <div class="preloader-thumbnail">
        <img src="{{ asset('storage/source/img/core-img/preloader.png') }}" alt="">
    </div>
</div>

<!-- ***** Header Area Start ***** -->
@include('menu')
<!-- ***** Header Area End ***** -->

<!-- ***** Welcome Area Start ***** -->
@include('header')
<!-- ***** Welcome Area End ***** -->

@include('body')

@include('footer')

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
<script type="text/javascript" src="{{ asset('storage/myjs/search-result.js') }}"></script>

</body>

</html>
