{{-- @extends('main.home_master')
@section('sidebar_content') --}}
        <!-- Coffee Times -->
        <section>
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
            </section>

            <section>
                <!-- facebook-page-start -->
                <div class="cetagory-title-03">Facebook </div>
                <div class="fb-root">
                    facebook page here
                </div><!-- /.facebook-page-close -->
            </section>

            <section>
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
            </section>

            <section>
                <!-- youtube-live-start -->
                @php
                    $livetv = DB::table('livetv')->first();
                @endphp
                @if ($livetv->status == 1)
                    <div class="cetagory-title-03">Live TV</div>
                    <div class="photo">
                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                            {!! $livetv->embed_code !!}
                        </div>
                    </div>
                @endif
            <!-- /.youtube-live-close -->
            </section>

            <section>
                <div class="col-md-3 col-sm-3">
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add"><img src="{{ asset('/frontend/assets/img/add_01.jpg') }}" alt="" /></div>
                        </div>
                    </div><!-- /.add-close -->
                </div>
            </section>

{{-- @endsection --}}
