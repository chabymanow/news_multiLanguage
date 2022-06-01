@php
    $first_section_big = DB::table('posts')->where('first_section_thumbnail', 1)->orderBy('id', 'desc')->first();
    $firstSection = DB::table('posts')->where('first_section', 1)->orderBy('id', 'desc')->limit(8)->get();
    $categories = DB::table('categories')->orderBy('id', 'desc')->get();
    $photos = DB::table('photos')->orderBy('id', 'desc')->get();
    $bigPhoto = DB::table('photos')->where('type', 1)->orderBy('id', 'desc')->first();
    $videos = DB::table('videos')->orderBy('id', 'desc')->get();
    $bigVideo = DB::table('videos')->where('type', 1)->orderBy('id', 'desc')->first();
@endphp

@extends('main.home_master')
@section('main_content')
<section class="news-section">
    <div class="container">
        <div class="row">
        <div class="col-md-8 order-md-1">
                    <!-- 1st-news-section-start -->
                            {{-- Firsr section big image - Start --}}
                            @if($first_section_big)
                                <div class="row">
                                    <div class="col">
                                        <div class="lead-news">
                                            <div class="service-img">
                                                <a href="#">
                                                    <img src="{{ asset($first_section_big->image) }}" width="100%" alt="Notebook">
                                                </a>
                                            </div>
                                            <div class="content">
                                                @if (session()->get('lang') == 'en')
                                                    <h4 class="lead-heading-01"><a href="#">{{ $first_section_big->title_en }}</a> </h4>
                                                @else
                                                    <h4 class="lead-heading-01"><a href="#">{{ $first_section_big->title_hun }}</a> </h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- Firsr section big image - Close --}}

                            {{-- Firsr section post list image - Start --}}

                                <div class="row">
                                    <div class="col">
                                        @if($firstSection)
                                            @foreach ( $firstSection as $post)
                                                <div class="col-md-4 mt-4" style="height: 250px; margin-top: 2em;">
                                                    <div class="top-news">
                                                        <a href="#"><img src="{{ asset($post->image) }}" alt="Notebook" class="border-radius: 10px;"></a>
                                                        @if (session()->get('lang') == 'en')
                                                            <h4 class="heading-02"><a href="#">{{ $post->title_en }}</a> </h4>
                                                        @else
                                                            <h4 class="heading-02"><a href="#">{{ $post->title_hun }}</a> </h4>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                            {{-- Firsr section post list image - Close --}}

                            {{-- News in all categories - Start --}}
                            @foreach ($categories as $category)
                                @php
                                    $firstCatPostBig = DB::table('posts')->where('category_id', $category->id)->where('bigthumbnail', 1)->first();
                                    $firstCatPostSmall = DB::table('posts')->where('category_id', $category->id)->where('bigthumbnail', NULL)->limit(3)->get();
                                @endphp
                                    @if($firstCatPostBig)
                                        <div class="row">
                                            {{-- First category news - Start --}}
                                            <div class="col">
                                                <div class="bg-one">
                                                    <div class="cetagory-title">
                                                        <a href="#">
                                                            @if (session()->get('lang') == 'en')
                                                                {{ $category->category_en }}
                                                            @else
                                                                {{ $category->category_hun }}
                                                            @endif
                                                            <span>
                                                                @if (session()->get('lang') == 'en')
                                                                    More
                                                                @else
                                                                    Tobb
                                                                @endif
                                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    {{-- News bigger post - Start --}}
                                                    <div class="col-md-6">
                                                        <div class="top-news">
                                                            <a href="#"><img src="{{ asset( $firstCatPostBig->image) }}" alt="Notebook"></a>
                                                            <h4 class="heading-02">
                                                                <a href="#">
                                                                    @if (session()->get('lang') == 'en')
                                                                        {{ $firstCatPostBig->title_en }}
                                                                    @else
                                                                        {{ $firstCatPostBig->title_hun }}
                                                                    @endif
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    {{-- News bigger post - Close --}}
                                            @if($firstCatPostSmall)
                                                {{-- News smaller post - Start --}}
                                                    <div class="col-md-6">
                                                        @foreach ( $firstCatPostSmall as $post)
                                                            <div class="image-title">
                                                                <a href="#"><img src="{{ asset( $post->image ) }}" alt="Notebook"></a>
                                                                <h4 class="heading-03">
                                                                    <a href="#">
                                                                        @if (session()->get('lang') == 'en')
                                                                            {{ $post->title_en }}
                                                                        @else
                                                                            {{ $post->title_hun }}
                                                                    @endif
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    {{-- News smaller post - Close --}}
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endif
                            @endforeach

                            <section class="news-section">
                                    <div class="row">
                                        <div class="col">
                                            <div class="gallery_cetagory-title"> Photo Gallery </div>
                                            <div class="row">

                                                <div class="col-md-8">
                                                    <div class="photo_screen">
                                                        <div class="myPhotos" style="width:100%">
                                                              <img src="{{ asset($bigPhoto->photo) }}"  alt="Avatar">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="demo col-md-4">

                                                        <div class="photo_list_bg') }}">
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @foreach ( $photos as $photo )
                                                            <div class="photo_img photo_border active">
                                                                <img src="{{  asset($photo->photo) }}" alt="image" onclick="currentDiv(
                                                                    @php
                                                                        $i ++;
                                                                    @endphp
                                                                )">
                                                                <div class="heading-03">
                                                                    {{ $photo->title}}
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            </section>

                            <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

            <section>
				<div class="col">
					<div class="gallery_cetagory-title "> Video Gallery </div>

					<div class="row">
                        <div class="col">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                        {!! $bigVideo->embed_code !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="gallery_sec owl-carousel">
                                @foreach ($videos as $video)
                                dkfughoid
                                    <div style="width:100%" onclick="currentDivs(1)">
                                        {!! $video->embed_code !!}
                                        <div class="heading-03">
                                            <div class="content_padding') }}">
                                                {!! $video->title !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div> <!-- End of fluid conatiner -->
        <div class="col-md-4 order-md-2 ml-4">
            @include('main.body.sidebar')
        </div>
    </div>
    </div>
</section>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function currentDiv(n) {
      showDivs(slideIndex = n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("myPhotos");
      var dots = document.getElementsByClassName("demo");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
      }
      x[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " w3-opacity-off";
    }
</script>

<script>
    var slideIndex = 1;
    showDivss(slideIndex);

    function plusDivs(n) {
      showDivss(slideIndex += n);
    }

    function currentDivs(n) {
      showDivss(slideIndex = n);
    }

    function showDivss(n) {
      var i;
      var x = document.getElementsByClassName("myVideos");
      var dots = document.getElementsByClassName("demo");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
      }
      x[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " w3-opacity-off";
    }
</script>

@endsection
