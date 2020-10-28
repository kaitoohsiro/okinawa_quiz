<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="沖縄県出身の奴が沖縄の魅力を伝えるために沖縄クイズを作りました。ITでできることは俺がやります。" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="canonical" href="https://ok-okinawa-quiz.herokuapp.com/">
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <meta name="google-site-verification" content="NDKgva2rOLoYrStgx_l9lpouVROjJNp9AU1lHiAhhAM" />
</head>

<body>
    <div id="app"></div>
</body>

</html>