@extends('layouts.app_master_frontend')



@section('content')

<div class="main-container">
    <div class="container">
        <div class="blog-detail">
            <article class="blog-item">
                <h3 class="blog-title"><a href="#">{{$article->a_name}}</a></h3>
                <div class="entry-meta">
                    <span class="post-date">{{$article->created_at}}</span>
                    <span class="blog-comment"><i class="fa fa-comment"></i><span class="count-comment">36</span></span>                                   
                </div>
                <div class="post-thumbnail">                               
                    <a href="#"><img alt="17_blog" src="{{url('uploads')}}/{{$article->a_avatar}}"></a>
                </div>
                <div class="blog-short-desc">
                    <p>{!! $article->a_description !!}</p>
                </div>
            </article>
        </div>
       

        <div class="related-wrap">
            <h4 class="related-title"> YOU MAY ALSO LIKE</h4>
            <ul class="blog-related row">
               @if(isset($hotArticles))
                    @foreach($hotArticles as $hotArticle)
                         <li class="blog-item col-sm-4">
                            <div class="post-thumbnail">                               
                                <a class="banner-opacity" href="{{ route('get.blog.detail', $hotArticle->a_slug.'-'.$hotArticle->id) }}"><img alt="17_blog" src="{{url('uploads')}}/{{$hotArticle->a_avatar}}"></a>
                            </div>
                            <h3 class="blog-title"><a href="#">{{$hotArticle->a_name}}</a></h3>
                            <div class="entry-meta">
                                <span class="post-date">{{$hotArticle->created_at}}</span>
                                <span class="blog-comment"><i class="fa fa-comment"></i><span class="count-comment">36</span></span>                                   
                            </div>
                        </li>
                    @endforeach
               @endif

            </ul>
        </div>
   

    </div>
</div>

@include('frontend.components.support')

@stop


