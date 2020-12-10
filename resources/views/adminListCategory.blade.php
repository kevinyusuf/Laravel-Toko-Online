@extends('layouts.headerAdmin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center card-title">Category</h3>
            <div class="btn-group-vertical" role="group" style="width: 100%;">
            @foreach($categories as $category)
            <a class="btn btn-primary border-success" style="background-color: rgba(0,123,255,0);color: rgb(0,0,0);" href="{{url('adminPanel/adminListCategory/'.$category->categoryId)}}">{{$category->categoryName}}</a>
            @endforeach
        </div>
        </div>
    </div>
    @if(\Request::is('adminPanel/adminListCategory/*'))
    <div class="card">
            <div class="card-body">
                <h4 class="text-center card-title">Product</h4>
                <div class="table-responsive table-bordered">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Product Price</th>
                                <th>Product Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img src="{{ asset('img/'.$product->productImg)}}" alt="" style="width: 100px;"></td>
                                <td>{{$product->productName}}</td>
                                <td>{{$product->categoryName}}</td>
                                <td>{{$product->productPrice}}</td>
                                <td>{{$product->productDesc}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
@endsection