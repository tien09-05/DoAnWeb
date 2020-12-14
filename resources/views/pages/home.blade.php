@extends('layout')
@section('content')
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Danh sách món ăn</h2>
    @foreach($all_product as $key =>$value)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="public/uploads/product/{{$value->product_image}}" alt="" />
                    <form action="{{URL::to('/save-cart')}}" method="post">
                        {{csrf_field()}}

                        <h2>{{$value->product_price}}</h2>
                        <p>{{$value->product_name}}</p>
                        <input value="{{$value->product_id}}" type="hidden" name="product_id_hidden" />
                        <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!--features_items-->

@endsection