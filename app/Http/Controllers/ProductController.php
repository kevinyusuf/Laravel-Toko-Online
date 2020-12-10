<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

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
    

    //admin
    public function adminHome(){
        return view('adminPanel');
    }

    public function listProduct(){
        $products = DB::table('products')->join('categories','products.categoryId','=','categories.categoryId')->get();
        
        return view('adminListProduct', compact('products'));
    }

    public function deleteProduct($id){
        DB::delete('delete from products where id = ?',[$id]);
        
        return back();
    }

    public function indexAddProduct(){
        $products = DB::table('products')->join('categories','products.categoryId','=','categories.categoryId')->get();
        $categories = Category::all();

        return view('adminAddProduct', compact('products','categories'));
    }

    public function addProducts(Request $request){
        


        $request->validate([
            'productName' => 'required|unique:products,productName',
            'category' => 'required',
            'productDesc' => 'required',
            'productPrice' => 'required|numeric|min:100',
            'productImg' => 'required|image|max:10000',
        ]);
        
        $productName = $request->input('productName');
        $category = $request->input('category');
        $productDesc = $request->input('productDesc');
        $productPrice = $request->input('productPrice');
        $image = $request->file('productImg')->getClientOriginalName();;
        $destination = base_path() . '/public/img';
        $request->file('productImg')->move($destination, $image);
         
                
        DB::table('products')->insert(
            ['categoryId' => $category, 
            'productImg' => $image,
            'productName' => $productName, 
            'productPrice' => $productPrice, 
            'productDesc'=> $productDesc
            ]);

        return redirect('/adminPanel/adminListProduct');
    }

    public function indexListCategory(){
        $categories = Category::all();

        return view('adminListCategory', compact('categories'));
    }

    public function listProductByCategory($id){
        $products = Product::join('categories','products.categoryId','=','categories.categoryId')->where('products.categoryId',$id)->get();
        $categories = Category::all();

        return view('adminListCategory', compact('products','categories'));
    }

    public function indexAddCategory(){
        $categories = Category::all();

        return view('adminAddCategory', compact('categories'));
    }

    public function addCategory(Request $request){
        $request->validate([
            'categoryName' => 'required|unique:categories,categoryName'
        ]);

        $categoryName = $request->input('categoryName');

        DB::table('categories')->insert([
            'categoryName' => $categoryName
        ]);

        return redirect('/adminPanel/adminListCategory');
    }
}

