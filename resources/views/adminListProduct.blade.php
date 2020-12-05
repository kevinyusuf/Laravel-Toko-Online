@extends('layouts.headerAdmin')

@section('content')
<div class="container">
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
                                <th>Action</th>
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
                                <td><a class="btn btn-danger" href="{{url('/adminListProduct/'.$product->id)}}" type="button">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection