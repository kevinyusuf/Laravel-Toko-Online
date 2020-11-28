@extends('layouts.headerhome')

@section('content')
            <div class="container">
                <div class="card">
                <div class="card-deck">
                    @foreach($products as $product)
                    <div class="card">
                        <img src="{{ asset('img/'.$product->productImg) }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h4>{{$product->productName}}</h4>
                            <p>IDR {{$product->productPrice}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
                
            </div>
@endsection




