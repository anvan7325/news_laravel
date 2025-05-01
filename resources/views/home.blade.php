@extends('main_layouts.master')

@section('title','TDQ - Trang Tin Tức Việt Nam')

@section('content')

<div class="wrapper">
    <!-- Main Content Section Start -->
    <div class="main-content--section pbottom--30">
        <div class="container">
            <!-- Main Content Start -->
            <div class="main--content">
                <!-- Post Items Start -->
                <div class="post--items post--items-1 pd--30-0">
                    <div class="row gutter--15">
                        <div class="col-md-6">
                            <div class="row gutter--15">
                                @if(isset($posts_new) && count($posts_new) >= 3)
                                    @for ($i = 0; $i <= 1; $i++)
                                        @if(isset($posts_new[$i]) && isset($posts_new[$i][0]))
                                            <div class="col-xs-6 col-xss-12">
                                                <!-- Post Item Start -->
                                                <div class="post--item post--layout-1 post--title-large">
                                                    <div class="post--img">
                                                        <a href="{{ route('posts.show', $posts_new[$i][0]) }}" class="thumb">
                                                            <img src="{{ asset($posts_new[$i][0]->image ? 'storage/' .$posts_new[$i][0]->image->path : 'storage/placeholders/placeholder-image.png') }}" alt="">
                                                        </a>
                                                        <a href="{{ route('categories.show', $posts_new[$i][0]->category) }}" class="cat">{{ $posts_new[$i][0]->category->name }}</a>
                                                        <a href="javascript:;" class="icon"><i class="fa fa-flash"></i></a>
                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="javascript:;">{{ $posts_new[$i][0]->author->name ?? 'Unknown Author' }}</a></li>
                                                                <li><a href="javascript:;">{{ $posts_new[$i][0]->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                            </ul>
                                                            <div class="title">
                                                                <h2 class="h4">
                                                                    <a href="{{ route('posts.show', $posts_new[$i][0]) }}" class="btn-link">{{ $posts_new[$i][0]->title }}</a>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </div>
                                        @endif
                                    @endfor

                                    @if(isset($posts_new[2]) && isset($posts_new[2][0]))
                                        <div class="col-sm-12 hidden-sm hidden-xs">
                                            <!-- Post Item Start -->
                                            <div class="post--item post--layout-1 post--title-larger">
                                                <div class="post--img">
                                                    <a href="{{ route('posts.show', $posts_new[2][0]) }}" class="thumb">
                                                        <img src="{{ asset($posts_new[2][0]->image ? 'storage/' .$posts_new[2][0]->image->path : 'storage/placeholders/placeholder-image.png') }}" style="height:200px" alt="">
                                                    </a>
                                                    <a href="{{ route('categories.show', $posts_new[2][0]->category) }}" class="cat">{{ $posts_new[2][0]->category->name }}</a>
                                                    <a href="javascript:;" class="icon"><i class="fa fa-fire"></i></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="javascript:;">{{ $posts_new[2][0]->author->name ?? 'Unknown Author' }}</a></li>
                                                            <li><a href="javascript:;">{{ $posts_new[2][0]->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h2 class="h4">
                                                                <a href="{{ route('posts.show', $posts_new[2][0]) }}" class="btn-link">{{ $posts_new[2][0]->title }}</a>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Post Item End -->
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            @if(isset($posts_new[3]) && isset($posts_new[3][0]))
                                <!-- Post Item Start -->
                                <div class="post--item post--layout-1 post--title-larger">
                                    <div class="post--img">
                                        <a href="{{ route('posts.show', $posts_new[3][0]) }}" class="thumb">
                                            <img src="{{ asset($posts_new[3][0]->image ? 'storage/' .$posts_new[3][0]->image->path : 'storage/placeholders/placeholder-image.png') }}" alt="">
                                        </a>
                                        <a href="{{ route('categories.show', $posts_new[3][0]->category) }}" class="cat">{{ $posts_new[3][0]->category->name }}</a>
                                        <a href="javascript:;" class="icon"><i class="fa fa-flash"></i></a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="javascript:;">{{ $posts_new[3][0]->author->name ?? 'Unknown Author' }}</a></li>
                                                <li><a href="javascript:;">{{ $posts_new[3][0]->created_at->locale('vi')->diffForHumans() }}</a></li>
                                            </ul>
                                            <div class="title">
                                                <h2 class="h4">
                                                    <a href="{{ route('posts.show', $posts_new[3][0]) }}" class="btn-link">{{ $posts_new[3][0]->title }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Post Item End -->
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Post Items End -->
            </div>
            <!-- Main Content End -->

            <div class="row">
                <!-- Main Content Start -->
                <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <div class="row">
                            <!-- World News Start -->
                            @if(isset($category_home[0]) && isset($post_category_home0) && count($post_category_home0) > 0)
                                <div class="col-md-6 ptop--30 pbottom--30">
                                    <!-- Post Items Title Start -->
                                    <div class="post--items-title" data-ajax="tab">
                                        <h2 class="h4">{{ $category_home[0]->name }}</h2>
                                    </div>
                                    <!-- Post Items Title End -->

                                    <!-- Post Items Start -->
                                    <div class="post--items post--items-2" data-ajax-content="outer">
                                        <ul class="nav row gutter--15" data-ajax-content="inner">
                                            @if(isset($post_category_home0[0]))
                                                <li class="col-xs-12">
                                                    <!-- Post Item Start -->
                                                    <div class="post--item post--layout-1">
                                                        <div class="post--img">
                                                            <a href="{{ route('posts.show', $post_category_home0[0]) }}" class="thumb">
                                                                <img src="{{ asset($post_category_home0[0]->image ? 'storage/' . $post_category_home0[0]->image->path : 'storage/placeholders/placeholder-image.png') }}" alt="">
                                                            </a>
                                                            <a href="javascript:;" class="icon"><i class="fa fa-flash"></i></a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="javascript:;">{{ $post_category_home0[0]->author->name ?? 'Unknown Author' }}</a></li>
                                                                    <li><a href="javascript:;">{{ $post_category_home0[0]->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4">
                                                                        <a href="{{ route('posts.show', $post_category_home0[0]) }}" class="btn-link">{{ $post_category_home0[0]->title }}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Post Item End -->
                                                </li>
                                            @endif

                                            @for ($i = 1; $i <= min(4, count($post_category_home0) - 1); $i++)
                                                @if($i == 1 || $i == 3)
                                                    <li class="col-xs-12">
                                                        <hr class="divider">
                                                    </li>
                                                @endif
                                                @if(isset($post_category_home0[$i]))
                                                    <li class="col-xs-6">
                                                        <!-- Post Item Start -->
                                                        <div class="post--item post--layout-2">
                                                            <div class="post--img">
                                                                <a href="{{ route('posts.show', $post_category_home0[$i]) }}" class="thumb">
                                                                    <img src="{{ asset($post_category_home0[$i]->image ? 'storage/' . $post_category_home0[$i]->image->path : 'storage/placeholders/placeholder-image.png') }}" alt="">
                                                                </a>
                                                                <div class="post--info">
                                                                    <ul class="nav meta">
                                                                        <li><a href="javascript:;">{{ $post_category_home0[$i]->author->name ?? 'Unknown Author' }}</a></li>
                                                                        <li><a href="javascript:;">{{ $post_category_home0[$i]->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                                    </ul>
                                                                    <div class="title">
                                                                        <h3 class="h4">
                                                                            <a href="{{ route('posts.show', $post_category_home0[$i]) }}" class="btn-link">{{ $post_category_home0[$i]->title }}</a>
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Post Item End -->
                                                    </li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>
                                    <!-- Post Items End -->
                                </div>
                            @endif
                            <!-- World News End -->

                            <!-- Technology Start -->
                            @if(isset($category_home[1]) && isset($post_category_home1) && count($post_category_home1) > 0)
                                <div class="col-md-6 ptop--30 pbottom--30">
                                    <!-- Post Items Title Start -->
                                    <div class="post--items-title" data-ajax="tab">
                                        <h2 class="h4">{{ $category_home[1]->name }}</h2>
                                    </div>
                                    <!-- Post Items Title End -->

                                    <!-- Post Items Start -->
                                    <div class="post--items post--items-3" data-ajax-content="outer">
                                        <ul class="nav" data-ajax-content="inner">
                                            @if(isset($post_category_home1[0]))
                                                <li>
                                                    <!-- Post Item Start -->
                                                    <div class="post--item post--layout-1">
                                                        <div class="post--img">
                                                            <a href="{{ route('posts.show', $post_category_home1[0]) }}" class="thumb">
                                                                <img src="{{ asset($post_category_home1[0]->image ? 'storage/' . $post_category_home1[0]->image->path : 'storage/placeholders/placeholder-image.png') }}" alt="">
                                                            </a>
                                                            <a href="javascript:;" class="icon"><i class="fa fa-flash"></i></a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="javascript:;">{{ $post_category_home1[0]->author->name ?? 'Unknown Author' }}</a></li>
                                                                    <li><a href="javascript:;">{{ $post_category_home1[0]->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4">
                                                                        <a href="{{ route('posts.show', $post_category_home1[0]) }}" class="btn-link">{{ $post_category_home1[0]->title }}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Post Item End -->
                                                </li>
                                            @endif

                                            @for ($i = 1; $i <= min(5, count($post_category_home1) - 1); $i++)
                                                @if(isset($post_category_home1[$i]))
                                                    <li>
                                                        <!-- Post Item Start -->
                                                        <div class="post--item post--layout-3">
                                                            <div class="post--img">
                                                                <a href="{{ route('posts.show', $post_category_home1[$i]) }}" class="thumb">
                                                                    <img src="{{ asset($post_category_home1[$i]->image ? 'storage/' . $post_category_home1[$i]->image->path : 'storage/placeholders/placeholder-image.png') }}" alt="">
                                                                </a>
                                                                <div class="post--info">
                                                                    <ul class="nav meta">
                                                                        <li><a href="javascript:;">{{ $post_category_home1[$i]->author->name ?? 'Unknown Author' }}</a></li>
                                                                        <li><a href="javascript:;">{{ $post_category_home1[$i]->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                                    </ul>
                                                                    <div class="title">
                                                                        <h3 class="h4">
                                                                            <a href="{{ route('posts.show', $post_category_home1[$i]) }}" class="btn-link">{{ $post_category_home1[$i]->title }}</a>
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Post Item End -->
                                                    </li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>
                                    <!-- Post Items End -->
                                </div>
                            @endif
                            <!-- Technology End -->

                            <!-- Các phần khác tương tự với kiểm tra isset() và count() -->
                            <!-- Finance, Politics, Sports, Health and fitness, Lifestyle, Photo Gallery... -->

                        </div>
                    </div>
                </div>
                <!-- Main Content End -->

                <!-- Main Sidebar Start -->
                <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Tin tức nổi bật</h2>
                                <i class="icon fa fa-newspaper-o"></i>
                            </div>

                            <!-- List Widgets Start -->
                            <div class="list--widget list--widget-1">
                                <!-- Post Items Start -->
                                <div class="post--items post--items-3" data-ajax-content="outer">
                                    <ul class="nav" data-ajax-content="inner">
                                        @if(isset($outstanding_posts) && count($outstanding_posts) > 0)
                                            @foreach($outstanding_posts as $outstanding_post)
                                                <li>
                                                    <!-- Post Item Start -->
                                                    <div class="post--item post--layout-3">
                                                        <div class="post--img">
                                                            <a href="{{ route('posts.show', $outstanding_post) }}" class="thumb">
                                                                <img width="120" src="{{ asset($outstanding_post->image ? 'storage/' .$outstanding_post->image->path : 'storage/placeholders/placeholder-image.png') }}" alt="">
                                                            </a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="javascript:;">{{ $outstanding_post->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                                    <li><a href="javascript:;"><i class="fa fm fa-comments"></i>{{ count($outstanding_post->comments) }}</a></li>
                                                                    <li><span><i class="fa fm fa-eye"></i>{{ $outstanding_post->views }}</span></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4">
                                                                        <a href="{{ route('posts.show', $outstanding_post) }}" class="btn-link">{{ $outstanding_post->title }}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Post Item End -->
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <!-- Post Items End -->
                            </div>
                            <!-- List Widgets End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Các widget khác... -->
                    </div>
                </div>
                <!-- Main Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Main Content Section End -->
</div>
@endsection