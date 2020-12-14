@extends('admin_layout');
@section('admin_content');
<?php

use Illuminate\Support\Facades\Session;

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cap nhat danh mục sản phẩm
            </header>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
            <div class="panel-body">
                @foreach($edit_category_product as $key => $value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-category-product/'.$value->category_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="category_product_name" value="{{$value->category_name}}">
                        </div>
                        <button type="submit" class="btn btn-info" name="update_category_product">Cap nhat danh mục</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection