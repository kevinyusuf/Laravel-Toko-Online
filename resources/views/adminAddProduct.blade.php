@extends('layouts.headerAdmin')

@section('content')

<div class="card">
        <div class="card-body">
            <h4 class="text-center card-title">Add Product</h4>
            <form action="{{url('/adminPanel/adminAddProduct/addProducts')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <h6 class="text-center">Name</h6>
                    <input class="form-control" type="text" placeholder="Product Name" name="productName">
                </div>
                <div class="form-group">
                    <h6 class="text-center">Category</h6>
                    <select class="form-control" name="category">
                        <optgroup label="Categories">
                            @foreach($categories as $category)
                            <option value="{{$category->categoryId}}">{{$category->categoryName}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <h6 class="text-center">Description</h6><input class="form-control" type="text" name="productDesc" placeholder="Description">
                </div>
                <div class="form-group">
                    <h6 class="text-center">Price</h6><input class="form-control" type="text"  name="productPrice" placeholder="Price">
                </div>
                <div class="form-group">
                    <h6 class="text-center">Choose File</h6><input type="file" name="productImg" accept="img/*" style="width: 260px;">
                </div>
                <div class="form-group">
                <button class="btn btn-success" type="submit">Add Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection