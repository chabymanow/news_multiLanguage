@php
    $seos = DB::table('seos')->first();
@endphp

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="{{ $seos->meta_author }}">
<meta name="title" content="{{ $seos->meta_title }}">
<meta name="description" content="{!! $seos->meta_description !!}">
<meta name="keyword" content="{{ $seos->meta_keyword }}">
<meta name="google verification" content="{{ $seos->google_verification }}">

<title>{{ $seos->meta_title }}</title>

<link href="{{ asset('/frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/frontend/assets/css/menu.css') }}" rel="stylesheet">
<link href="{{ asset('/frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('/frontend/assets/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('/frontend/assets/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('/frontend/assets/css/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
