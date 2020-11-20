
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="rating-block">
                <h4>Điểm trung bình</h4>
                @php
                    $age = 0;
                    if($product->pro_review_total)
                      $age = round($product->pro_review_star/$product->pro_review_total,2)
                @endphp
                <h2 class="bold padding-bottom-7">{{ $age}} <small>/ 5</small></h2>
                @for($j = 1;$j <=5; $j++)
                  <button type="button" class="btn btn-sm {{ $j <= $age ? ' btn-warning' : 'btn-default btn-grey'}}" aria-label="Left Align">
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  </button>
                @endfor  

                      
            </div>
        </div>
        <div class="col-sm-5">
            <h4>Tổng quan lượt bình chọn</h4>
            @foreach($ratingDefault as $key => $item)
              <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                      <div style="height:9px; margin:5px 0;">{{$key}} <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                      <div class="progress" style="height:9px; margin:8px 0;">
                        @php
                            $ageItem = 0;
                            if($product->pro_review_total)
                              $ageItem = ($item['count_number']/$product->pro_review_total)*100
                        @endphp
                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: {{ $ageItem }}%">
                              <span class="sr-only">80% Complete (danger)</span>
                          </div>
                      </div>
                  </div>
                  <div class="pull-right text-info" style="margin-left:10px;"><a href="">{{$item['count_number']}} đánh giá</a></div>
              </div>
            @endforeach
        </div>
    </div>
</div>
<!-- /container -->

<div class="box-list-reviews" style="margin-top:0; padding-top:30px">
    
      <div class="">
        <div class="box-review form-review">
            <h4 class="title-border form-review" data-toggle="collapse" data-target="#form-review"><span class="btn btn-info" style="cursor:pointer;margin-left: 15px;">Thêm đánh giá</span></h4>
            <form class="reviews collapse" method="post" action="{{route('ajax_post.user.add_rating')}}" id="form-review" >
              <div class="rating">
                    <label>Vote đánh giá :</label>
                    <span id="ratings">
                       @for($i = 1;$i <=5; $i++)
                        <i class="fa fa-star active-rating" data-i="{{$i}}"></i>
                      @endfor
                    </span>   
                    <span style="color: red;" id="review-text" class="review-text">Tuyệt vời</span>                                         
                </div>
                <p>
                  <textarea cols="40" placeholder="Ý kiến của bạn về sản phẩm" name="content_review"></textarea>
                  <input type="hidden" name="review" id="review_value" value="5">
                  <input type="hidden" name="product_id"  value="{{$product->id}}">

                </p>
                
                <input type="submit" class="button submit {{(\Auth::guard('client')->check() && \Auth::guard('client')->user()->status == 1) ? 'js-process-review' : 'js-review'}}" name="email" value="Đánh giá" />
            </form>
        </div>
      </div>
      <div class=" ">
        <div class="box-review">
          <h4 class="title-border" ><span class="text">Đánh giá</span><span class="subtext">( {{$product->pro_review_total}} Đánh giá )</span></h4>
          <ol class="commentlist">
            @if(isset($ratings))
            @foreach($ratings as $rating)
              <li class="comment">
                  <div class="comment_container">
                      <div class="comment-info">
                          <div class="row">
                            <div class="col-md-3">
                              <img src="{{url('public/uploads')}}/{{$rating->client->avatar}}" width="50px" height="50px" class="img-circle">
                            </div>
                            <div class="col-md-9">
                              <div class="rating">
                                  @for($j = 1;$j <=5; $j++)
                                    <i class="fa fa-star {{ $j <= $rating->r_number ? 'active-rating' : ''}}"></i>
                                  @endfor                                               
                              </div>

                              <div class="meta">

                                <span class="author">{{$rating->client->name}}</span>
                                <span class="date">{{$rating->created_at}}</span>
                              </div>
                          </div>
                          </div>
                          
                      </div>
                      <div class="comment-text">
                          <div class="comment-content">
                            {{$rating->r_content}}
                          </div>
                      </div>
                  </div>
              </li>
            @endforeach
            @endif
          </ol>
        </div>
      </div>


    

</div> 
