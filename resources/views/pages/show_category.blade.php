@extends('layout')
@section('content')
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Danh sách món ăn</h2>
    @foreach($category_by_id as $key =>$value)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="" />
                    <h2>{{$value->product_price}}</h2>
                    <p>{{$value->product_name}}</p>
                    <a href="{{URL::to('/save-cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!--features_items-->

@endsection