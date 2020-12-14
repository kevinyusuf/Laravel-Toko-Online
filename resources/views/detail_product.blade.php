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
                    <form action="{{url('/addtocart')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <p class="card-text form-group row">
                            <label style="margin-left: 30px;" class="col-sm-3half col-form-label">Quantity: </label>
                            <input style="width: fit-content;" type="number" class="form-control input" value="1" min="1" name="quantity">
                            <input type="hidden" name="productId" value="{{$products['id']}}">
                        </p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection