@extends('layouts.headerhome')
@section('content')

<div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center"><img src="{{asset('img/'.$products['productImg'])}}" style="height: 417px;"></div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <h4>{{$products['productName']}}</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>Price : <span style="font-size: 25px;color: rgb(240,67,12);">IDR. {{$products['productPrice']}}</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Description : {{$products['productDesc']}}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><button class="btn btn-success" type="submit">Add To Cart</button></div>
            </div>
        </div>
    </div>
@endsection