@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a
                                        href="{{ route('category', [$movie->category->slug]) }}">{{ $movie->category->title }}</a>
                                    » <span>
                                        <a
                                            href="{{ route('country', [$movie->country->slug]) }}">{{ $movie->country->title }}</a>
                                        »
                                        @foreach ($movie->movie_genre as $gen)
                                            <a href="{{ route('genre', [$gen->slug]) }}">{{ $gen->title }}</a> »
                                        @endforeach
                                        <span class="breadcrumb_last" aria-current="page">{{ $movie->title }}</span>
                                    </span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">

                    <div class="halim-movie-wrapper">
                        <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div>
                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                <img class="movie-thumb" src="{{ asset('uploads/movie/' . $movie->image) }}"
                                    alt="{{ $movie->title }}">
                                @if ($movie->resolution != 5)
                                    @if ($episode_current_list_count > 0)
                                        <div class="bwa-content">
                                            <div class="loader"></div>
                                            <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $episode_tapdau->episode) }}"
                                                class="bwac-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <a href="#watch_trailer" style="display: block;"
                                        class="btn btn-primary watch_trailer">Xem Trailer</a>
                                @endif
                            </div>

                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $movie->title }}
                                    @if ($movie->season != 0)
                                        -Season {{ $movie->season }}
                                    @endif
                                </h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->name_eng }}</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item">
                                        <span>Định dạng</span> :
                                        <span class="quality">
                                            @if ($movie->resolution == 0)
                                                HD
                                            @elseif($movie->resolution == 1)
                                                SD
                                            @elseif($movie->resolution == 2)
                                                HD_Cam
                                            @elseif($movie->resolution == 3)
                                                Cam
                                            @elseif($movie->resolution == 4)
                                                FullHD
                                            @else
                                                Trailer
                                            @endif
                                        </span>
                                        @if ($movie->resolution != 5)
                                            <span class="episode">
                                                @if ($movie->phude == 0)
                                                    Phụ đề
                                                @else
                                                    Thuyết minh
                                                @endif
                                            </span>
                                        @endif
                                    </li>

                                    <li class="list-info-group-item"><span>Thời lượng</span> :
                                        @if ($movie->thoiluong != null)
                                            {{ $movie->thoiluong }}
                                        @else
                                            Đang cập nhật
                                        @endif
                                    </li>
                                    <li class="list-info-group-item"><span>Số tập phim</span> :
                                        @if ($movie->thuocphim == 'phimbo')
                                            {{ $episode_current_list_count }}/{{ $movie->sotap }} -
                                            @if ($episode_current_list_count == $movie->sotap)
                                                Hoàn thành
                                            @else
                                                Đang cập nhật
                                            @endif
                                        @else
                                            Phim lẻ
                                        @endif

                                    </li>
                                    <li class="list-info-group-item">
                                        <span>Thể loại</span> :
                                        {{-- <a href="{{ route('genre', $movie->genre->slug) }}"
                                            rel="category tag">{{ $movie->genre->title }}</a> --}}

                                        @if ($movie->movie_genre != null)
                                            @foreach ($movie->movie_genre as $gen)
                                                <a href="{{ route('genre', $gen->slug) }}"> {{ $gen->title }}</a>
                                            @endforeach
                                        @else
                                            Đang cập nhật
                                        @endif
                                    </li>
                                    <li class="list-info-group-item"><span>Danh mục</span> :
                                        <a href="{{ route('category', $movie->category->slug) }}"
                                            rel="category tag">{{ $movie->category->title }}</a>
                                    </li>
                                    <li class="list-info-group-item"><span>Quốc gia</span> :
                                        <a href="{{ route('country', $movie->country->slug) }}"
                                            rel="tag">{{ $movie->country->title }}</a>
                                    </li>

                                    @if ($movie->year != null)
                                    <li class="list-info-group-item"><span>Năm</span> :
                                        <a rel="tag">{{ $movie->year }}</a>
                                    </li>
                                    @endif
                                    @if ($movie->season != 0)
                                        <li class="list-info-group-item"><span>Season</span> :
                                            <a rel="tag">{{ $movie->season }}</a>
                                        </li>
                                    @endif
                                    <li class="list-info-group-item"><span>Tập phim mới nhất</span> :
                                        @if ($episode_current_list_count > 0)
                                            @if ($movie->thuocphim == 'phimbo')
                                                @foreach ($episode as $key => $ep)
                                                    <a href="{{ url('xem-phim/' . $ep->movie->slug . '/tap-' . $ep->episode) }}"
                                                        rel="tag">Tập
                                                        {{ $ep->episode }}</a>
                                                @endforeach
                                            @elseif($movie->thuocphim == 'phimle')
                                                @foreach ($episode as $key => $ep_le)
                                                    <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $ep_le->episode) }}"
                                                        rel="tag"> {{ $ep_le->episode }}</a>
                                                @endforeach
                                            @endif
                                        @else
                                            Đang cập nhật
                                        @endif
                                    </li>
                                    {{-- <li class="list-info-group-item">
                                        @php
                                            $current_url = Request::url();
                                        @endphp
                                        <div style="margin-top:11px;" class="fb-like"
                                            data-href="{{ $current_url }}" data-width="" data-layout="button_count"
                                            data-action="like" data-size="small" data-share="true">
                                        </div>
                                    </li> --}}
                                </ul>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title">
                            <span style="color:#ffed4d">Nội dung phim</span>
                        </h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                @if ($movie->description != null)
                                    {{ $movie->description }}
                                @else
                                    Đang cập nhật
                                @endif
                            </article>
                        </div>
                    </div>
                    {{-- Tags phim --}}
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Tags phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                @if ($movie->tags != null)
                                    @php
                                        $tags = [];
                                        $tags = explode(',', $movie->tags);

                                    @endphp
                                    @foreach ($tags as $key => $tag)
                                        <a href="{{ url('tag/' . $tag) }}">{{ $tag }}</a>
                                    @endforeach
                                @else
                                    {{ $movie->tags }}
                                @endif
                            </article>
                        </div>
                    </div>
                    {{-- Tags phim --}}
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận phim {{ $movie->title }}</span>
                        </h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix" style="background-color:white;">
                        @php
                            $current_url = Request::url();
                        @endphp
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                <div class="fb-comments" data-href="{{ $current_url }}" data-width="100%"
                                    data-numposts="10"></div>
                            </article>
                        </div>
                    </div>
                    {{-- Trailer phim --}}

                    <div class="section-bar clearfix" id="watch_trailer">
                        <h2 class="section-title"><span style="color:#ffed4d">Trailer phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article title="" class="item-content">

                                <iframe width="100%" height="300px"
                                    src="https://www.youtube.com/embed/{{ $movie->trailer }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </article>
                        </div>
                    </div>

                </div>
            </section>
            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach ($related as $key => $hot)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $hot->slug) }}"
                                        title="{{ $hot->title }}">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('uploads/movie/' . $hot->image) }}"
                                                alt="{{ $hot->title }}" title="{{ $hot->title }}"></figure>
                                        <span class="status">
                                            @if ($movie->resolution == 0)
                                                HD
                                            @elseif($movie->resolution == 1)
                                                SD
                                            @elseif($movie->resolution == 2)
                                                HD_Cam
                                            @elseif($movie->resolution == 3)
                                                FullHD
                                            @else
                                                Trailer
                                            @endif
                                        </span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>
                                            @if ($movie->resolution != 5)
                                                <span class="episode">
                                                    @if ($movie->phude == 0)
                                                        Phụ đề
                                                    @else
                                                        Thuyết minh
                                                    @endif
                                                </span>
                                            @endif
                                        </span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $hot->title }}</p>
                                                <p class="original_title">{{ $hot->name_eng }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach

                    </div>
                    <script>
                        $(document).ready(function($) {
                            var owl = $('#halim_related_movies-2');
                            owl.owlCarousel({
                                loop: true,
                                margin: 4,
                                autoplay: true,
                                autoplayTimeout: 4000,
                                autoplayHoverPause: true,
                                nav: true,
                                navText: ['<i class="hl-down-open rotate-left"></i>',
                                    '<i class="hl-down-open rotate-right"></i>'
                                ],
                                responsiveClass: true,
                                responsive: {
                                    0: {
                                        items: 2
                                    },
                                    480: {
                                        items: 3
                                    },
                                    600: {
                                        items: 4
                                    },
                                    1000: {
                                        items: 4
                                    }
                                }
                            })
                        });
                    </script>
                </div>
            </section>
        </main>
        @include('pages.include.sidebar')

    </div>
@endsection