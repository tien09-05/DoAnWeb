@extends('admin_layout');
@section('admin_content');
<?php

use Illuminate\Support\Facades\Session;

?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục món ăn
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
                    <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục món ăn</label>
                            <input type="text" class="form-control" name="category_product_name" id="exampleInputEmail1" placeholder="Tên danh mục món ăn">
                        </div>
                        <button type="submit" class="btn btn-info" name="add_category_product">Thêm danh mục món ăn</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection