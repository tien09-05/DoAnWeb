@extends('admin_layout');
@section('admin_content');
<?php

use Illuminate\Support\Facades\Session;

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm món ăn
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
                    <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên món ăn </label>
                            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1">
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputEmail1">Giá món ăn </label>
                            <input type="text" class="form-control" name="product_price" id="exampleInputEmail1">
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputEmail1">Hình ảnh món ăn </label>
                            <input type="file" class="form-control" name="product_image" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục món ăn</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key => $value)
                                <option value="{{$value->category_id}}">{{$value->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_product">Thêm món ăn</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection