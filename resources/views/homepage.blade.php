
@extends('layouts.header')

@section('content')

<div class="container">
    
    <div class="card-deck">
        @foreach($products as $product)
        <div class="card">
            <img src="{{ asset('img/'.$product->productImg)}}" class="card-img-top" alt="">
            <h4>{{$product['productName']}}</h4>
            <p>IDR {{$product['productPrice']}}</p>
        </div>
        @endforeach
    </div>
</div>

@endsection

