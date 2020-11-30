<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    private function search($req){
        $search = $req->input('search');
        $products = Product::where('productName', 'like', "%$search%")->paginate(3);

        return view('homepage', compact('products'));
    }
    
    public function productDetail($id, Request $req){
        if(count($req->all()) > 0){
            return $this->search($req);
        }else{
            $products = Product::where('id',$id)->first();
            return view('detail_product', compact('products'));
        }
        
    }

    public function allProduct(Request $req){
        if(count($req->all()) > 0){
            return $this->search($req);
        }else{
            $products = Product::paginate(3);
            return view('homepage', compact('products'));
        }
    }
    
    public function adminProduct(){
        $products = DB::table('products')->join('categories','products.categoryId','=','categories.categoryId')->get();

        return view('homeAdmin', compact('products'));
    }

}
