@extends('layouts.headerhome')

@section('content')
            <div style="margin-top: 50px; margin-bottom: 50px;" class="container">
                <div class="card-deck">
                    @foreach($products as $product)
                    <div class="card" style="max-width: 450px;">
                        <div class="card-body text-center">
                            <img src="{{ asset('img/'.$product->productImg) }}" class="card-img-top" alt="" style="width: 180px;">
                            <h4 class="card-title" style="margin-top: 30px;">{{$product->productName}}</h4>
                            <p class="card-text">IDR {{$product->productPrice}}</p>
                        </div>
                        <div class="card-footer">
                            <a style="width: 100%;" text href="{{url('/detail_product/'.$product->id)}}" class="btn btn-success">Product Detail</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
@endsection






