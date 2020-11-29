@extends('layouts.headerhome')

@section('content')
            <div class="container">
                <div class="card-deck">
                    @foreach($products as $product)
                    <div class="card" style="max-width: 450px;">
                    <img src="{{ asset('img/'.$product->productImg) }}" class="card-img-top" alt="" style="max-width: 220px;">
                        <div class="card-body">
                            <h4>{{$product->productName}}</h4>
                            <p>IDR {{$product->productPrice}}</p>
                        </div>
                        <div class="card-footer">
                            <a style="width: 100%;" text href="{{url('/detail_product/'.$product->id)}}" class="btn btn-success">Product Detail</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
@endsection






