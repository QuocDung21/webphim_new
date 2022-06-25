<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim hot</span>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($phimhot_sidebar as $key => $hot_sidebar)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $hot_sidebar->slug) }}" title="{{ $hot_sidebar->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $hot_sidebar->image) }}"
                                        class="lazy post-thumb" alt="{{ $hot_sidebar->title }}"
                                        title="{{ $hot_sidebar->title }}" />
                                    <span class="is_trailer">
                                        @if ($hot_sidebar->resolution == 0)
                                            HD
                                        @elseif($hot_sidebar->resolution == 1)
                                            SD
                                        @elseif($hot_sidebar->resolution == 2)
                                            HD_Cam
                                        @elseif($hot_sidebar->resolution == 3)
                                            Cam
                                        @elseif($hot_sidebar->resolution == 4)
                                            FullHD
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{ $hot_sidebar->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;"></div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>


    <div class="clearfix"></div>


    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim sắp chiếu</span>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($phimhot_trailer as $key => $hot_trailer)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $hot_trailer->slug) }}" title="{{ $hot_trailer->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $hot_trailer->image) }}"
                                        class="lazy post-thumb" alt="{{ $hot_trailer->title }}"
                                        title="{{ $hot_trailer->title }}" />
                                    <span class="is_trailer">
                                        @if ($hot_trailer->resolution == 0)
                                            HD
                                        @elseif($hot_trailer->resolution == 1)
                                            SD
                                        @elseif($hot_trailer->resolution == 2)
                                            HD_Cam
                                        @elseif($hot_trailer->resolution == 3)
                                            FullHD
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{ $hot_trailer->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;"></div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</aside>
