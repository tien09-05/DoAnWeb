@extends('admin_layout');
@section('admin_content');
<?php

use Illuminate\Support\Facades\Session;

?>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê món ăn
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên món ăn</th>
                        <th>Giá</th>
                        <th>Hìnhm</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_product as $key =>$value)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$value->product_name}}</td>
                        <td>{{$value->product_price}}</td>
                        <td><img src="public/uploads/product/{{$value->product_image}}" height="100px" width="100px"></td>
                        <td>{{$value->category_name}}</td>
                        <td>
                            <a href="{{URL::to('/edit-product/'.$value->product_id)}}" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a href="{{URL::to('/delete-product/'.$value->product_id)}}" onclick="return confirm('Chac chan muon xoa ?')" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection