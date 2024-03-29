@extends('layouts.headerhome')
@section('content')
<div>
    <h2 class="display-4 text-center text-success border rounded-0" style=" font-size: 30px; margin-top: 30px; margin-bottom: 50px;">Detail Transaction History</h2>
</div>
@foreach($products as $p)
    @php
        $total = $p->productPrice*$p->productQTY
    @endphp
    <div class="d-flex justify-content-center">
        <div class="col-md-6 justify-content-center card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4 align-self-center">
                    <img style="max-width: 200px;" src="{{ asset('img/'.$p->productImg) }}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$p->productName}}</h5>
                        <p class="card-text">Rp{{$total}}</p>
                        <p class="card-text">Quantity: {{$p->productQTY}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div  class="d-flex justify-content-center card mb-3" style="margin-top: 0px; max-width: 600px;">
            <div class="row no-gutters">
            </div>
        </div>
    </div>
@endforeach
@endsection