@extends('admin_layout');
@section('admin_content');
<?php

use Illuminate\Support\Facades\Session;

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    @foreach($edit_product as $key =>$pro)
                    <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm </label>
                            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" value="{{$pro->product_name}}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm </label>
                            <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" value="{{$pro->product_price}}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm </label>
                            <input type="file" class="form-control" name="product_image" id="exampleInputEmail1" value="{{$pro->product_image}}">
                            <img src="public/uploads/product/{{$pro->product_image}}" height="100px" width="100px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key => $cate)

                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>

                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_product">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach

                </div>

            </div>
        </section>

    </div>
</div>
@endsection