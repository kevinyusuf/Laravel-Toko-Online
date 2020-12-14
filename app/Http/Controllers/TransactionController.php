<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use Auth;
use Carbon\Carbon;

use App\Cart;

class TransactionController extends Controller
{
    /** Cart **/
    public function cartpage(){//untuk mengarahkan ke page cart.blade.php
    	$compact['carts'] = DB::table('carts')
        ->join('products', 'carts.productId', '=', 'products.id')
        ->where('userId', Auth::id())
        ->select('products.*', 'carts.productQTY', 'carts.id')
        ->paginate(12);
		return view('cart', $compact);
    }

    // public function checkout(){

    //     $transactionId = DB::table('transactions')->insertGetId([
    //         'transactionDate' => date('Y-m-d H:i:s'),
    //         'userId'            => Auth::id()
    //     ]);

    //     $products = DB::table('carts');

    //     foreach($products as $i => $products){
    //         $arr[] = [
    //             'id' => $transactionId,
    //             'productId' => $products->productId,
    //             'productQTY' => $products->ProductQTY
    //         ];
    //     }

    //     DB::table('detailTransaction')->insert($arr);

    //     return back();
    // }
    
    function historypage(){
        $transactions = DB::table('transactions')->where('userId', Auth::id())->paginate(12);

        return view('history',compact('transactions'));
    }

    function transaction_detail($id){

        $products = DB::table('detailTransactions')
        ->join('products','detailTransactions.productId','=','products.id')
        ->join('transactions','detailTransactions.transactionId','=','transactions.id')
        ->where('detailTransactions.transactionId',$id)
        ->get();

        return view('detail_history',compact('products'));
    }

	public function addToCart(Request $request){
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $id = $request->input('productId');
        $quantity = $request->input('quantity');
        $user_id = Auth::id();

        $product_id = DB::table('carts')->where('productId',$id)->where('userId',$user_id)->first();
        if($product_id == null){
            DB::table('carts')->insert(
                ['userId' => $user_id, 'productId' => $id, 'productQTY'=> $quantity]
            );
        }else{
            $total = DB::table('carts')->select('productQTY')->where('productId',$id)->where('userId',$user_id)->first()->{'productQTY'};
            $total = $total + $quantity;
            
            DB::update('update carts set productQTY = ? where userId = ? AND productId = ?', [$total , $user_id, $id]);
        }
        return redirect('/');
    }

    public function getEdit(Request $request){
    	$id = $request->input('key');
    	if (empty($id)) { $response['msg'] = "Id tidak ditemukan"; return json_encode($response);exit; }

    	$cart = DB::table('carts')
        ->join('products', 'carts.productId', '=', 'products.id')
        ->where('userId', Auth::id())
        ->where('carts.id', $id)
        ->select('products.productImg', 'products.productName', 'products.productPrice', 'carts.productQTY', 'carts.id')
        ->first();

        if (!$cart) { $response['msg'] = "Cart tidak ditemukan.";echo json_encode($response);exit; }

    	$response['msg'] = $cart;
      	$response['type'] 	= 'done';
        echo json_encode($response);exit;
    }

    public function updateCart(Request $request){
    	$id 		= $request->input('key');
    	$quantity 	= $request->input('quantity');

    	if (empty($id)) { $response['msg'] = "Id tidak ditemukan"; return json_encode($response);exit; }
    	if (empty($quantity)) { $response['msg'] = "Quantity kosong"; return json_encode($response);exit; }

    	Cart::where('id', $id)->update([
			'productQTY' => $quantity,
		]);

    	$response['msg'] 	= 'Berhasil Update';
      	$response['type'] 	= 'done';
        echo json_encode($response);exit;
    }

    public function deleteCart(Request $request){
    	$id = $request->input('key');
    	
    	if (empty($id)) { $response['msg'] = "Id tidak ditemukan"; return json_encode($response);exit; }

    	DB::delete('delete from carts where id = ?', [$id]);

    	$response['msg'] 	= 'Berhasil Hapus';
      	$response['type'] 	= 'done';
        echo json_encode($response);exit;
    }

    public function transaction(){
        date_default_timezone_set('Asia/Jakarta');

    	$myCarts = DB::table('carts')->where('userId', Auth::id())->get();
    	
    	if (!$myCarts) { return view('Cart tidak ditemukan');exit; }

    	$trans = DB::table('transactions')->insertGetId(
            ['transactionDate'  => Carbon::now(),
            'userId'            => Auth::id() ]
        );

        $data = array();
		foreach($myCarts as $myCart)
		{
			if($myCart)
			{
			  $data[] =[
			            'transactionId' => $trans,
			            'productId' 	=> $myCart->productId,
			            'productQTY'	=> $myCart->productQTY
			           ];                 
			}
		}

        $transDet = DB::table('detailtransactions')->insert($data);

    	DB::delete('delete from carts where userId = ?', [ Auth::id()]);

    	return redirect('cart');
    }
}
