<div class="grid-item masonry-item col-md-4">         
    <div class="blog-item">  
        <div class="post-thumbnail">                               
            <a class="banner-opacity" href="{{ route('get.blog.detail', $article->a_slug.'-'.$article->id) }}" ><img  src="{{url('uploads')}}/{{$article->a_avatar}}"  height="250px"></a>
        </div> 
        <h3 class="blog-title"><a href="#">{{$article->a_name}}</a></h3>
        <div class="entry-meta">
            <span class="post-date">{{$article->created_at}}</span>
                                              
        </div>

        <a class="readmore" href="{{ route('get.blog.detail', $article->a_slug.'-'.$article->id) }}" >Readmore</a>
    </div>                                                            
</div>