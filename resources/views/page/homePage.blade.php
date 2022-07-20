@extends('layout.master')
@section('content')

<div class="container">
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <div class="col-xs-12 carausel-sliderWidget">
            <section id="halim-advanced-widget-4">
                <div class="section-heading">
                    <a href="danhmuc.php" title="Phim Chiếu Rạp">
                    <span class="h-text">Phim Hot</span>
                    </a>
                    <ul class="heading-nav pull-right hidden-xs">
                        <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
                    </ul>
                </div>
                <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
                    <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                        <div class="halim-item">
                            <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                                <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                                <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">GÓA PHỤ ĐEN</p>
                                        <p class="original_title">Black Widow</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                    
                </div>
            </section>
            <div class="clearfix"></div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            @foreach($categories as $key => $category)
            <section id="halim-advanced-widget-2">
                <div class="section-heading">
                    <a href="danhmuc.php" title="{{$category->title}}">
                    <span class="h-text">{{$category->title}}</span>
                    </a>
                </div>
                <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                    @foreach($category->movie as $key =>$mov)
                    <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{route('movie',$mov->slug)}}" title="VŨNG LẦY PHẦN 1">
                              <figure><img class="lazy img-responsive" src="{{asset('Uploads/'.$mov->image)}}" alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                              <span class="status">5/5</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title ">
                                    <p class="entry-title">{{$mov->title}}</p>
                                    <p class="original_title">The Mire Season 1</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article>
                    @endforeach
                </div>
            </section>
            @endforeach
            <div class="clearfix"></div>
        </main>
        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
            <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
                <div class="section-bar clearfix">
                    <div class="section-title">
                        <span>Top Views</span>
                        <ul class="halim-popular-tab" role="tablist">
                            <li role="presentation" class="active">
                                <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>
                            </li>
                            <li role="presentation">
                                <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">Week</a>
                            </li>
                            <li role="presentation">
                                <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>
                            </li>
                            <li role="presentation">
                                <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <section class="tab-content">
                    <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                        <div class="halim-ajax-popular-post-loading hidden"></div>
                        <div id="halim-ajax-popular-post" class="popular-post">
                            <div class="item post-37176">
                                <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                    <div class="item-link">
                                        <img src="data:image/jpeg;base64,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" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                        <span class="is_trailer">Trailer</span>
                                    </div>
                                    <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </section>
                <div class="clearfix"></div>
            </div>
        </aside>
    </div>
</div>
@endsection