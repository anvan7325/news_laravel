@extends('main_layouts.master')

@section('title', $post->title . ' - TDQ')

@section('custom_css')
<style>
    .post--body.post--content {
        color: black;
        font-family: "Source Sans Pro", sans-serif;
        font-size: 18px;
    }

    .text.capitalize {
        text-transform: capitalize !important;
    }

    .author-info,
    .post-time {
        margin: 0;
        font-size: 14px !important;
        text-align: right;
    }
</style>
@endsection

@section('content')
<div class="global-message info d-none"></div>

<!-- Breadcrumb -->
<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}" class="btn-link"><i class="fa fm fa-home"></i> Trang Chủ</a></li>
            <li><a href="{{ route('categories.show', $post->category ) }}" class="btn-link">{{ $post->category->name }}</a></li>
            <li class="active"><span>{{ $post->title }}</span></li>
        </ul>
    </div>
</div>

<!-- Main Content -->
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="main--content col-md-8" data-sticky-content="true">
                <div class="sticky-content-inner">

                    <!-- Post -->
                    <div class="post--item post--single post--title-largest pd--30-0">
                        <div class="post--cats">
                            <ul class="nav">
                                <li><span><i class="fa fa-folder-open-o"></i></span></li>
                                @foreach($post->tags as $tag)
                                    <li><a class="text capitalize" href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="post--info">
                            <ul class="nav meta">
                                <li class="text capitalize">
                                    <a href="#">
                                        {{ $post->created_at->locale('vi')->translatedFormat('l') }},
                                        {{ $post->created_at->locale('vi')->format('d/m/Y') }}
                                    </a>
                                </li>
                                <li><a href="#">{{ $post->author->name ?? 'Unknown Author' }}</a></li>
                                <li><span><i class="fa fm fa-eye"></i>{{ $post->views }}</span></li>
                                <li><a href="#"><i class="fa fm fa-comments-o"></i>{{ $post->comments->count() }}</a></li>
                            </ul>

                            <div class="title">
                                <h2 class="post_title h4">{{ $post->title }}</h2>
                            </div>
                        </div>

                        <div class="post--body post--content">
                            {!! $post->body !!}
                        </div>
                    </div>

                    <!-- Author + Time -->
                    <div class="ad--space pd--20-0-40">
                        <p class="author-info">Người viết: {{ $post->author->name ?? 'Unknown Author' }}</p>
                        <p class="post-time">Thời gian: {{ $post->created_at->locale('vi')->diffForHumans() }}</p>
                    </div>

                    <!-- Tags -->
                    <div class="post--tags">
                        <ul class="nav">
                            <li><span><i class="fa fa-tags"></i> Từ khóa</span></li>
                            @foreach($post->tags as $tag)
                                <li><a class="text capitalize" href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Social Share -->
                    <div class="post--social pbottom--30">
                        <span class="title"><i class="fa fa-share-alt"></i> Chia sẻ</span>
                        <div class="social--widget style--4">
                            <ul class="nav">
                                <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="javascript:;"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Comments -->
                    <div class="comment--list pd--30-0">
                        <div class="post--items-title">
                            <h2 class="h4"><span class="post_count_comment h4">{{ $post->comments->count() }}</span> bình luận</h2>
                            <i class="icon fa fa-comments-o"></i>
                        </div>

                        <ul class="comment--items nav">
                            @foreach($post->comments as $comment)
                                <li>
                                    <div class="comment--item clearfix">
                                        <div class="comment--info">
                                            <div class="comment--header clearfix">
                                                <p class="date">{{ $comment->created_at->locale('vi')->diffForHumans() }}</p>
                                                <a href="javascript:;" class="reply"><i class="fa fa-flag"></i></a>
                                            </div>
                                            <div class="comment--content">
                                                <p>{{ $comment->the_comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Add Comment Form -->
                    <div class="comment--form pd--30-0">
                        <div class="post--items-title">
                            <h2 class="h4">Viết bình luận</h2>
                            <i class="icon fa fa-pencil-square-o"></i>
                        </div>

                        <div class="comment-respond">
                            <x-blog.message :status="'success'" />
                            @auth
                                <form method="POST" action="{{ route('posts.add_comment', $post) }}">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <textarea name="the_comment" cols="30" rows="5" class="form-control" placeholder="Đánh giá bài viết này"></textarea>
                                        </div>
                                    </div>
                                    <small class="comment_error text-danger"></small>
                                    <div class="form-group">
                                        <input type="submit" value="Bình luận" class="send-comment-btn btn btn-primary">
                                    </div>
                                </form>
                            @else
                                <p class="h4">
                                    <a href="{{ route('login') }}">Đăng nhập</a> hoặc 
                                    <a href="{{ route('register') }}">Đăng ký</a> để bình luận bài viết
                                </p>
                            @endauth
                        </div>
                    </div>

                    <!-- Related Posts -->
                    <div class="post--related ptop--30">
                        <div class="post--items-title">
                            <h2 class="h4">Có thể bạn cũng thích</h2>
                        </div>

                        <div class="post--items post--items-2">
                            <ul class="nav row">
                                @foreach($postTheSame as $relatedPost)
                                    <li class="col-sm-12 pbottom--30">
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <a href="{{ route('posts.show', $relatedPost) }}" class="thumb">
                                                    <img src="{{ asset($relatedPost->image ? 'storage/' . $relatedPost->image->path : 'storage/placeholders/placeholder-image.png') }}" alt="">
                                                </a>
                                                <div class="post--info">
                                                    <div class="title">
                                                        <h3 class="h4">
                                                            <a href="{{ route('posts.show', $relatedPost) }}" class="btn-link">{{ $relatedPost->title }}</a>
                                                        </h3>
                                                        <p style="font-size:16px">
                                                            <span>{{ $relatedPost->excerpt }}</span>
                                                        </p>
                                                    </div>
                                                    <ul class="nav meta">
                                                        <li><a href="javascript:;">{{ $relatedPost->author->name ?? 'Unknown Author' }}</a></li>
                                                        <li><a href="javascript:;">{{ $relatedPost->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                        <li><a href="javascript:;"><i class="fa fm fa-comments"></i>{{ $relatedPost->comments->count() }}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Related Posts End -->

                </div>
            </div>

            <!-- Sidebar -->
            <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <x-blog.side-outstanding_posts :outstanding_posts="$outstanding_posts"/>
                    <x-blog.side-vote />
                    <x-blog.side-ad_banner />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script>
    setTimeout(() => {
        $(".global-message").fadeOut();
    }, 5000);
</script>
@endsection
