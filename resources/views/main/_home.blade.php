@php
    $first_section_big = DB::table('posts')->where('first_section_thumbnail', 1)->orderBy('id', 'desc')->first();
    $firstSection = DB::table('posts')->where('first_section', 1)->orderBy('id', 'desc')->limit(8)->get();
@endphp

@extends('main.home_master')
@section('main_content')
<div class="content-wrapper" style="min-height: 70vh;">
	<!-- 1st-news-section-start -->
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-8">

                    {{-- Firsr section big image - Start --}}
                    @if($first_section_big)
                        <div class="row">
                            <div class="col-md-1 col-sm-1 col-lg-1"></div>
                            <div class="col-md-10 col-sm-10">
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
                    @if($firstSection)
						<div class="row">
                            @foreach ( $firstSection as $post)
								<div class="col-md-3 col-sm-3" style="width: 200px; height: 300px; border: 1px solid rgba(200, 200, 200, 1); border-radius: 20px; margin: 5px 10px; box-shadow: 0 0 10px rgba(0, 0, 0, .3);">
									<div class="top-news">
										<a href="#"><img src="{{ asset($post->image) }}" alt="Notebook"></a>
                                        @if (session()->get('lang') == 'en')
										    <h4 class="heading-02"><a href="#">{{ $post->title_en }}</a> </h4>
                                        @else
                                            <h4 class="heading-02"><a href="#">{{ $post->title_hun }}</a> </h4>
                                        @endif
									</div>
								</div>
                            @endforeach
						</div>
                    @endif
                    {{-- Firsr section post list image - Close --}}

					<!-- add-start -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="add"><img src="{{ asset('/frontend/assets/img/top-ad.jpg') }}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->

					<!-- news-start -->
                    @php
                        $firstCategory = DB::table('categories')->first();
                        $firstCatPostBig = DB::table('posts')->where('category_id', $firstCategory->id)->where('bigthumbnail', 1)->first();
                        $firstCatPostSmall = DB::table('posts')->where('category_id', $firstCategory->id)->where('bigthumbnail', NULL)->limit(3)->get();
                    @endphp
					<div class="row">
                        {{-- First category news - Start --}}
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title">
                                    <a href="#">
                                        @if (session()->get('lang') == 'en')
                                            {{ $firstCategory->category_en }}
                                        @else
                                            {{ $firstCategory->category_hun }}
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
								<div class="row">
                                {{-- News bigger post - Start --}}
									<div class="col-md-6 col-sm-6">
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

                                {{-- News smaller post - Start --}}
                                @php
                                    $firstCategory = DB::table('categories')->first();
                                    $firstCatPostBig = DB::table('posts')->where('category_id', $firstCategory->id)->where('bigthumbnail', 1)->first();
                                    $firstCatPostSmall = DB::table('posts')->where('category_id', $firstCategory->id)->where('bigthumbnail', NULL)->limit(3)->get();
                                @endphp
									<div class="col-md-6 col-sm-6">
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
                        {{-- First category news - Close --}}

                        {{-- Second category news - Start --}}
                        @php
                        $secondCategory = DB::table('categories')->skip(1)->first();
                        $secondtCatPostBig = DB::table('posts')->where('category_id', $secondCategory->id)->where('bigthumbnail', 1)->first();
                        $secondCatPostSmall = DB::table('posts')->where('category_id', $secondCategory->id)->where('bigthumbnail', NULL)->limit(3)->get();
                    @endphp
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title">
                                    <a href="#">
                                        @if (session()->get('lang') == 'en')
                                            {{ $secondCategory->category_en }}
                                        @else
                                            {{ $secondCategory->category_hun }}
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
								<div class="row">
                                    {{-- News bigger post - Start --}}
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="#"><img src="{{ asset( $secondtCatPostBig->image) }}" alt="Notebook"></a>
                                            <h4 class="heading-02">
                                                <a href="#">
                                                    @if (session()->get('lang') == 'en')
                                                        {{ $secondtCatPostBig->title_en }}
                                                    @else
                                                        {{ $secondtCatPostBig->title_hun }}
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    {{-- News bigger post - Close --}}

                                    {{-- News smaller post - Start --}}
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ( $secondCatPostSmall as $post)
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
                        {{-- Second category news - Close --}}

					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<!-- add-start -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{ asset('/frontend/assets/img/add_01.jpg') }}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->

					<!-- youtube-live-start -->
                    @php
                        $livetv = DB::table('livetv')->first();
                    @endphp
                    @if ($livetv->status == 1)
                        <div class="cetagory-title-03">Live TV</div>
                        <div class="photo">
                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                                {!! $livetv->embed_code !!}
                                {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/nmp51np10Sw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                            </div> --}}
                        </div>
                        @endif
                    <!-- /.youtube-live-close -->

                    {{-- Important websites - Start --}}
                    @php
                        $websites = DB::table('websites')->get();
                    @endphp
                    @if (session()->get('lang') == 'en')
                        <div class="cetagory-title-04"> Important Website</div>
                    @else
                        <div class="cetagory-title-04"> Fontos weboldalak</div>
                    @endif
                    <div class="">
                        @foreach ($websites as $website)
                                <div class="news-title-02">
                                    <h4 class="heading-03">
                                            <a href="{{ $website->website_link }}" target="_blank">
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                                {{ $website->website_name }}
                                            </a>
                                    </h4>
                                </div>
                        @endforeach
                    </div>
                    {{-- Important websites - Close--}}

					<!-- facebook-page-start -->
					<div class="cetagory-title-03">Facebook </div>
					<div class="fb-root">
						facebook page here
					</div><!-- /.facebook-page-close -->

					<!-- add-start -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="{{ asset('/frontend/assets/img/add_01.jpg') }}" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->
				</div>
			</div>
		</div>
	</section><!-- /.1st-news-section-close -->

	<!-- 2nd-news-section-start -->
    @php
        $thirdCategory = DB::table('categories')->skip(2)->first();
        $thirdCatPostBig = DB::table('posts')->where('category_id', $thirdCategory->id)->where('bigthumbnail', 1)->first();
        $thirdCatPostSmall = DB::table('posts')->where('category_id', $thirdCategory->id)->where('bigthumbnail', NULL)->limit(3)->get();
    @endphp
    @if($thirdCatPostBig)
        <section class="news-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title-02">
                                <a href="#">
                                    @if (session()->get('lang') == 'en')
                                        {{ $thirdCategory->category_en }}
                                    @else
                                        {{ $thirdCategory->category_hun }}
                                    @endif
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <span><i class="fa fa-plus" aria-hidden="true"></i>
                                        @if (session()->get('lang') == 'en')
                                            All news
                                        @else
                                            Osszes
                                        @endif
                                    </span>
                                </a>
                            </div>
                            <div class="row">

                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{ asset( $thirdCatPostBig->image ) }}" alt="Notebook"></a>
                                        <h4 class="heading-02">
                                            <a href="#">
                                                @if (session()->get('lang') == 'en')
                                                    {{ $thirdCatPostBig->title_en }}
                                                @else
                                                    {{ $thirdCatPostBig->title_hun }}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                                    </div>
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                                    </div>
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title-02"><a href="#">Politics <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-02"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                                    </div>
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                                    </div>
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ******* -->
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title-02"><a href="#">Biz-Econ<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-02"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                                    </div>
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                                    </div>
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title-02"><a href="#">Education <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-02"><a href="#">Students won't get form fill-up fee back</a> </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                                    </div>
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                                    </div>
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="add"><img src="{{ asset('/frontend/assets/img/top-ad.jpg') }}" alt="" /></div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="add"><img src="{{ asset('/frontend/assets/img/top-ad.jpg') }}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->

            </div>
	    </section><!-- /.2nd-news-section-close -->
    @endif

	<!-- 3rd-news-section-start -->
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="cetagory-title-02"><a href="#">Feature  <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>

					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="top-news">
								<a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="image-title">
								<a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="image-title">
								<a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
					</div>
					<!-- ******* -->
					<br />
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bg-gray">
								<div class="top-news">
									<a href="#"><img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="{{ asset('/frontend/assets/img/top-ad.jpg') }}" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->


				</div>
				<div class="col-md-3 col-sm-3">
					<div class="tab-header">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">Latest</a></li>
							<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">Popular</a></li>
							<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">Popular1</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content ">
							<div role="tabpanel" class="tab-pane in active" id="tab21">
								<div class="news-titletab">
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab22">
								<div class="news-titletab">
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab23">
								<div class="news-titletab">
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Coffee Times -->
                    @php
                        $coffees = DB::table('coffee')->first();
                    @endphp
					<div class="cetagory-title-03">Coffee Time </div>
					<table>
                        <tbody>
                            <tr><td><b>Morning:</b> {{ $coffees->morning }}</td></tr>
                            <tr><td><b>Second: </b>{{ $coffees->morning }}</td></tr>
                            <tr><td><b>Afternoon</b>{{ $coffees->morning }}</td></tr>
                            <tr><td><b>One more:</b>{{ $coffees->morning }}</td></tr>

                        </tbody>
                    </table>
				   <br><br><br><br><br>

				</div>
			</div>
		</div>
	</section><!-- /.3rd-news-section-close -->









	<!-- gallery-section-start -->
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title"> Photo Gallery </div>

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{ asset('/frontend/assets/img/news.jpg') }}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg') }}">

	                            <div class="photo_img photo_border active">
	                                <img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                    Casting of Israeli actress as Cleopatra sparks anger
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                   Casting of Israeli actress as Cleopatra sparks anger
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                   Casting of Israeli actress as Cleopatra sparks anger
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                   Casting of Israeli actress as Cleopatra sparks anger
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{ asset('/frontend/assets/img/news.jpg') }}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                   Casting of Israeli actress as Cleopatra sparks anger
	                                </div>
	                            </div>

	                        </div>
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

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

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title"> photo Gallery </div>

					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/AWM8164ksVY?list=RDAWM8164ksVY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="gallery_sec owl-carousel">

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{ asset('/frontend/assets/img/news.jpg') }}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding') }}">
                                           Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{ asset('/frontend/assets/img/news.jpg') }}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding') }}">
                                       Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{ asset('/frontend/assets/img/news.jpg') }}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding') }}">
                                          Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{ asset('/frontend/assets/img/news.jpg') }}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding') }}">
                                           Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


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

				</div>
			</div>
		</div>
	</section><!-- /.gallery-section-close -->

</div>
@endsection
