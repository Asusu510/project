@extends('layouts.app_master_frontend')



@section('content')
<div class="main-container wishlist list-blogs">
    <div class="container">
        <h3 class="page-title">Our Blog</h3>
        <div class="blog-grid butique-masonry">
            <div class="masonry-grid" data-layoutmode="masonry" data-cols="3">
               <div class="row">
                    
                @if(isset($articles))
                    @foreach($articles as $article)
                        @include('frontend.pages.article.include._inc_blog_item',['article' => $article])
                    @endforeach

                @endif

               </div>
            </div>
        </div> 
    </div>
</div>


@include('frontend.components.support')

@stop


