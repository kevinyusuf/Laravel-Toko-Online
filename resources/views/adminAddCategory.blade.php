@extends('layouts.headerAdmin')

@section('content')


<div class="card">
        <div class="card-body">
            <h4 class="text-center card-title">Add Product</h4>
            <form action="{{url('/adminPanel/adminAddCategory/addCategory')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <h6 class="text-center">Name</h6><input class="form-control" type="text" name="categoryName" placeholder="Category Name">
                </div>
                <div class="form-group">
                <button class="btn btn-success" type="submit">Add Category</button>
                </div>
            </form>
        </div>
    </div>

@endsection