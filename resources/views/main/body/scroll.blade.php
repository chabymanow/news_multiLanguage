@php
    $scroll = DB::table('posts')->where('posts.headline', 1)->limit(3)->get();
    $headline = DB::table('headline')->where('headline.status', 1)->get();
@endphp
<section>
    <div class="container-fluid">
        <div class="row scroll">
            <div class="col-md-2 col-sm-3 scroll_01 ">
                @if (session()->get('lang') == 'en')
                    Breaking News :
                @else
                    Friss hirek:
                @endif
            </div>
            <div class="col-md-10 col-sm-9 scroll_03">
                <marquee>
                    @foreach ($scroll as $text)
                    @if (session()->get('lang') == 'en')
                        - {!! $text->title_en !!} -
                    @else
                        - {!! $text->title_hun !!} -
                    @endif
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-fluid">
        <div class="row scroll">
            <div class="col-md-2 col-sm-3 scroll_01 ">
                @if (session()->get('lang') == 'en')
                    Headline:
                @else
                    Fo hir:
                @endif
            </div>
            <div class="col-md-10 col-sm-9 scroll_03">
                <marquee>
                    @foreach ($headline as $text)
                        {!! $text->headline_text !!}
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</section>
