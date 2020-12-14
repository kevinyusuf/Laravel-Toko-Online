@extends('layouts.headerhome')

@section('content')

<center>
<h1>Your Cart <img class="img-fluid justify-content-xl-center align-items-xl-center"
                            src="{{ asset('img/shopping-cart.png')}}" style="width: 30px;"></h1>
<?php if (empty($carts[0]->id)): ?>
	<div>Empty</div>
<?php endif ?>

</center>
<div class="container">
	<div class="col-md-12">
		<div class="row">
			<button type="button" style="display: none" class="btn btn-info btn-modal" data-toggle="modal" data-target="#modal-default">Open Modal</button>
    		@foreach($carts as $cart)
        		<div class="col-md-6">
	        		<div class="card" style="width: 100%;">
						<div class="card-body">
							<div class="row">
						    	<div class="col-md-4 text-center"><img src="{{ asset('img/'.$cart->productImg) }}" style="height: 100px;"></div>
						    	<div class="col-md-8">
				                    <table>
				                        <thead>
				                        </thead>
				                        <tbody>
				                        	<tr>{{$cart->productName}}</tr>
				                            <tr>
				                                <td>
				                                    <p>Product Price : <span style="color: rgb(240,67,12);">IDR. {{$cart->productPrice}}</span></p>
				                                </td>
				                            </tr>
				                            <tr>
				                                <td>
							                        <p class="card-text form-group">
							                            <label style="" class="col-sm-3half col-form-label">Quantity: {{$cart->productQTY}}</label>
							                        </p>
							                        <div class="row">
							                        	<div class="col-md-6">
							                        		<div class="form-group">
							                        			<button class="btn btn-danger btn-delete" data-id="{{$cart->id}}" data-uri="{{ url('deletecart') }}">Delete</button>
									                        </div>
							                        	</div>
							                        	<div class="col-md-6">
							                        		<div class="form-group">

							                        			<button class="btn btn-success btn-edit" data-id="{{$cart->id}}" data-uri="{{ url('getedit') }}">Edit</button>
									                        </div>
							                        	</div>
							                        </div>
				                                </td>
				                            </tr>
				                        </tbody>
				                    </table>
					    		</div>
					    	</div>
					  	</div>
					</div>
				</div>
			@endforeach
    	</div>
	</div>
	<div class="col-md-6 mt-5">
		<div class="form-group">
			<?php if (!empty($carts[0]->id)): ?>
				<form action="{{url('/checkout')}}" method="post">
					@csrf
					<button type="submit" class="btn btn-primary">Checkout</button>
				</form>
			<?php endif ?>
        </div>
	</div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modal-default" role="dialog"><div class="modal-dialog modal-lg"><div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title">Edit Cart</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="col-md-12">
    		<div class="card" style="width: 100%;">
				<div class="card-body">
					<div class="row">
				    	<div class="col-md-4 text-center"><img id="product-img" src="" style="height: 100px;"></div>
				    	<div class="col-md-8">
		                    <table>
		                        <thead>
		                        </thead>
		                        <tbody>
		                        	<tr id="product-name"></tr>
		                            <tr>
		                                <td>
		                                    <p>Product Price : <span style="color: rgb(240,67,12);">IDR. <span id="product-price"></span></span></p>
		                                </td>
		                            </tr>
		                            <tr>
		                                <td>
					                        <p class="card-text form-group">
					                            <label style="" class="col-sm-3half col-form-label">Quantity: </label>
					                            <input style="width: fit-content;" type="number" id="quantity" class="form-control input" name="quantity">
					                        </p>
		                                </td>
		                            </tr>
		                        </tbody>
		                    </table>
			    		</div>
			    	</div>
			  	</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="productId" id="product-id">
		<button id="btn-update" data-uri="{{ url('updatecart') }}" class="btn btn-info">Update</button>
	</div>
</div></div></div>


@endsection