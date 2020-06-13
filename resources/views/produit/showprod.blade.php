@extends('layouts.app')

@section('content')
<div class="main-content-wrapper d-flex clearfix">
    @include('layouts.navgauche')

    <!-- Product Details Area Start  -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                      <nav aria-label="breadcrumb">
                      <ol class="breadcrumb mt-50">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Produit</a></li>
                        <li class="breadcrumb-item"><a href="#">{{$Produit->name}}</a></li>
                      </ol>
                    </nav>
                  </div>
                </div>
              <div class="row">
                  <div class="col-12 col-lg-7">
                      <div class="single_product_thumb">
                          <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            @if($total != 0)
                                <ol class="carousel-indicators">
                                    {{$counter = 0}} 
                                    <li class="active" data-target="#product_details_slider" data-slide-to="{{$counter}}" style="background-image: url({{ asset('storage/'.$Produit['photo']) }});">
                                    </li>
                                    @foreach ($ImageProduit as $imgprod)       
                                        {{$counter++}}
                                        <li data-target="#product_details_slider" data-slide-to="{{$counter}}" style="background-image: url({{ asset('storage/'.$imgprod['image']) }});">
                                        </li>
                                    @endforeach
                                </ol>
                            @endif
                              <div class="carousel-inner">
                                  <div class="carousel-item active">
                                      <a class="gallery_img" href="{{ asset('storage/'.$Produit['photo']) }}">
                                          <img class="d-block w-100" src="{{ asset('storage/'.$Produit['photo']) }}" alt="ID img prod  {{$Produit['id']}}">
                                      </a>
                                  </div>
                                  
                                  @if($total != 0)
                                        @foreach ($ImageProduit as $imgprod)
                                            <div class="carousel-item">
                                                <a class="gallery_img" href="{{ asset('storage/'.$imgprod['image']) }}">
                                                    <img class="d-block w-100" src="{{ asset('storage/'.$imgprod['image']) }}" alt="ID img prod {{$imgprod['id']}}">
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                              </div>
                          </div>
                      </div>
                  </div>

                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data" id="review-container">
                            <div class="line"></div>
                            <p class="product-price">{{ $Produit->price }} DT</p>
                            <a href="#"><!--product-details.html-->
                                <h6>{{ $Produit->name }}</h6>
                            </a>
                            <!-- Ratings & Review -->
                            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                 <input id="input-2" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{$Produit->rating}}"  data-size="md" onchange="r(this.value,{{$Produit->id}});">
                                
                                   
                                    <form action="{{route('rating.store')}}" method="post">
                                        @csrf
                                        <input id="inputRR" name="prodId" type="hidden">
                                        <input id="inputR" name="rating" type="hidden">
                                        <button style="display:none;" type="sumbit" id="r"></button>
                                    </form>
                                </div>
                                
                            
                            <!-- Avaiable -->
                            <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            @if($canComment)
                                <div class="review">
                                    <a href="#" id="write-review">Write A Review</a>
                                </div>
                            @endif
                        </div>

                        <div class="short_overview my-5">
                          <p>{{ $Produit->description }}</p>
                        </div>

                        <!-- Add to Cart Form -->
                        <!-- <form class="cart clearfix" method="post">
                            <div class="cart-btn d-flex mb-50">
                                <p>Qty</p>
                                <div class="quantity">
                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{{ $Produit->quantity }}">
                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                </div>
                            </div> -->
                            @if($Produit->user_id == $user )
                                It's your product 
                                <br> You can't modify or delete it !
                                
                            @else
                            
                               
                                    <form action="{{route('panier.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Quantity : </label>
                                            <input class="form-control" value="1" min="1" max="{{$Produit->quantity}}" type="number"  type="number" name="qtt" id="qtt">
                                        </div>
                                        <input type="hidden" name="prod_id" id="prod_id" value="{{$Produit->id}}">
                                        <button class="btn amado-btn" type="submit"><img src="{{ asset('img/core-img/cart.png') }}" alt="">Add to cart</button>
                                    </form>
                                
                                <!-- <a href="{{ route('Produit.edit', $Produit->id) }}" class="btn amado-btn">Edit</a><--class="btn btn-outline-info"-->
                                <!-- <a href="#" class="btn btn-outline-danger" class="btn amado-btn" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a> -->
                            @endif
                        </form>
                        <div class="review mt-3">
                            <label>Average rate overview</label>
                            <input data-showcaption=false disabled id="{{$Produit->id}}" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{$Produit->average_rating}}"  data-size="md">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--commentaires-->
        <div class="col-md-10 mt-5" id="comments-area">
            <h4>Comments</h4>
        @foreach($comments as $comment)
            <div class="row mb-3">
                <div class="col-2">
                    <img style="width:100px; height:100px;" src="{{(starts_with($comment->image, 'images') ? '/':'') . $comment->image}}" alt="">
                </div>
                <div class="col-10">
                    <p>{{$comment->comment}}</p>
                    <i class="d-block mt-3">By {{$comment->name}} le {{$comment->created_at}}</p>
                @if($comment->user_id == Auth::user()->id)
                <p>
                    <a href="/edit/{{$comment->id}}" class="edit1">edit</a>
                    <a href="/comment/delete/{{$comment->id}}" class="delete">delete</a>
                </p>
                @endif
                </div>
            </div>
        @endforeach
        </div>
        <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}">
    </div>
    <!-- Product Details Area End -->
</div>


<script>


function r(value,prodId){
            document.getElementById('inputRR').value=prodId;
            document.getElementById('inputR').value=value;
            document.getElementById('r').click();
        }
</script>

    @include('layouts.footer')   
@endsection

@section ('extra-js')
<script>
//Edit comment
function edit(){
    let edits = $('.edit1');
    if( edits.length > 0){
        edits.each(function (index){
            $(this).on('click', function (e){
                e.preventDefault();
                console.log('clicked')
                let parent = $(this).parent();
                let oldComment = parent.parent().children().first().text();
                let htmlForm = `
                <form id="commentForm" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name = "comment" id="comment" row="10">${oldComment}</textarea>
                        <button class="btn btn-primary mt-1">Update</button>
                    </div>
                </form>
            `;
                parent.parent().html(htmlForm)
                $('#commentForm textarea').focus();
                let commentId = parseInt($(this).attr('href').split('/')[2]);
                $('#commentForm').on('submit', function(e){
                    e.preventDefault();
                    let comment = $("#commentForm textarea").val();
                    let csrf = $('#csrf-token').val();
                    $.ajax({
                        type: "PUT",
                        url:'/comment/update/' + commentId,
                        data: {'comment': comment, '_token' : csrf}
                    })
                    .done(function (e){
                        window.location.reload();
                    })
                })
            })
        })
    }
}
edit();

let writeReview = $('#write-review');
if(writeReview.length != 0){
    writeReview.on('click', function (e){
        e.preventDefault();
        //append comment form
        let htmlForm = `
            <form id="commentForm" method="post">
                <div class="form-group">
                    <label>Comment</label>
                    <textarea class="form-control" name = "comment" id="comment" row="10"></textarea>
                    <button class="btn btn-primary mt-1">Comment</button>
                </div>
            </form>
        `;
        let div = document.createElement('div');
        div.className= "col-12 mt-5";
        div.id = "review-div"
        div.innerHTML = htmlForm;
        let reviewContainer = $('#review-container');
        reviewContainer.append(div)
        
        //add event listener on comment form submit button
        let form = $('#commentForm');
        form.on('submit', function(e){
            e.preventDefault();
            
            let idProd = parseInt(window.location.pathname.split('/')[2]);
            let comment = $("#commentForm textarea").val();
            let csrf = $('#csrf-token').val();

            $.ajax({
                type: "POST",
                url:'/comment/create',
                data: {'prod_id': idProd, 'comment': comment, '_token' : csrf}
            })
            .done(function (e){
               $('#review-div').remove();
               $('#comments-area h4').after(`<div class="row mb-3">
                <div class="col-2">
                    <img style="width:100px; height:100px;" src="${e.image}" alt="">
                </div>
                <div class="col-10">
                    <p>${comment}</p>
                    <i class="d-block mt-3">By ${e.name} le ${e.created_at}</p>
                    <p>
                        <a href="/edit/${e.id}" class="edit1">edit</a>
                        <a href="/comment/delete/${e.id}" class="delete">delete</a>
                    </p>
                </div>
            </div>`);
            edit();
            })
        })
    //remove element
    $('.review').remove();
    })
}

</script>  
@endsection
