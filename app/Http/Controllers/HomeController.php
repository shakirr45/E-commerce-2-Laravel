<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\MensItems;
use App\Models\WomensItems;
use App\Models\KidsItems;

use App\Models\Cart;


class HomeController extends Controller
{
    //For Home page ====>
    public function index(){
    //for show men's items =======>
    $mens_items = MensItems::orderby('id','desc')->get();
    $womens_items = WomensItems::orderby('id','desc')->get();
    $kids_items = KidsItems::orderby('id','desc')->get();


    //for cart count----->
    if(Auth::id()){
        $userId = Auth::user()->id;
        $caunt_cart = Cart::where('user_id' , '=' , $userId)->count();
    return view('home.homepage',compact('mens_items','caunt_cart','womens_items','kids_items'));

    }else{
        return view('home.homepage',compact('mens_items','womens_items','kids_items'));

    }
    

    }

    // For Redirect ====>
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype == 'admin'){
            return view('admin.adminhome');
        }else{
        //for show men's items =======>
        $mens_items = MensItems::orderby('id','desc')->get();
        $womens_items = WomensItems::orderby('id','desc')->get(); 
        $kids_items = KidsItems::orderby('id','desc')->get();

        //for cart count----->
        $userId = Auth::user()->id;
        $caunt_cart = Cart::where('user_id' , '=' , $userId)->count();

            return view('home.homepage',compact('mens_items','caunt_cart','womens_items','kids_items'));
        }
    }

    //For Add Cart mens ====>
    public function add_cart(Request $request , $id){
        if(Auth::id()){

            //for user data ------>
            $user = Auth::user();
            $user_id = $user->id;
            $user_name = $user->name;
            $user_email = $user->email;
            $user_phone = $user->phone;
            $user_address = $user->address;

            //for product details ----->
            $product = MensItems::find($id);

            //store into cart ------->
            $cart = new Cart;

            $cart->name = $user_name;
            $cart->email = $user_email;
            $cart->phone = $user_phone;
            $cart->addres = $user_address;
            $cart->user_id = $user_id;

            $cart->product_ttitle = $product->title;
            $cart->image = $product->image;
            $cart->product_id = $product->id;

            if($product->discount_price !=null){
            $cart->price = $product->discount_price * $request->quantity;
            }else{
            $cart->price = $product->price * $request->quantity;
            }

            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();  

        }else{
            return  redirect('/login');
        }
    }


        //For Add Cart womens ====>
        public function add_cart_women(Request $request , $id){
            if(Auth::id()){
    
                //for user data ------>
                $user = Auth::user();
                $user_id = $user->id;
                $user_name = $user->name;
                $user_email = $user->email;
                $user_phone = $user->phone;
                $user_address = $user->address;
    
                //for product details ----->
                $product = WomensItems::find($id);
    
                //store into cart ------->
                $cart = new Cart;
    
                $cart->name = $user_name;
                $cart->email = $user_email;
                $cart->phone = $user_phone;
                $cart->addres = $user_address;
                $cart->user_id = $user_id;
    
                $cart->product_ttitle = $product->title;
                $cart->image = $product->image;
                $cart->product_id = $product->id;
    
                if($product->discount_price !=null){
                $cart->price = $product->discount_price * $request->quantity;
                }else{
                $cart->price = $product->price * $request->quantity;
                }
    
                $cart->quantity = $request->quantity;
                $cart->save();
                return redirect()->back();  
    
            }else{
                return  redirect('/login');
            }
        }

            //For Add Cart kids ====>
                public function add_cart_kids(Request $request , $id){
                    if(Auth::id()){
            
                        //for user data ------>
                        $user = Auth::user();
                        $user_id = $user->id;
                        $user_name = $user->name;
                        $user_email = $user->email;
                        $user_phone = $user->phone;
                        $user_address = $user->address;
            
                        //for product details ----->
                        $product = KidsItems::find($id);
            
                        //store into cart ------->
                        $cart = new Cart;
            
                        $cart->name = $user_name;
                        $cart->email = $user_email;
                        $cart->phone = $user_phone;
                        $cart->addres = $user_address;
                        $cart->user_id = $user_id;
            
                        $cart->product_ttitle = $product->title;
                        $cart->image = $product->image;
                        $cart->product_id = $product->id;
            
                        if($product->discount_price !=null){
                        $cart->price = $product->discount_price * $request->quantity;
                        }else{
                        $cart->price = $product->price * $request->quantity;
                        }
            
                        $cart->quantity = $request->quantity;
                        $cart->save();
                        return redirect()->back();  
            
                    }else{
                        return  redirect('/login');
                    }
                }
            

    //for cart ====>
    public function cart_view(){
        if(Auth::id()){

        //for cart count----->
        $userId = Auth::user()->id;
        $caunt_cart = Cart::where('user_id' , '=' , $userId)->count();

        //for cart value----->
        $userid = Auth::user()->id;
        $cart_data = Cart::where('user_id' , '=' , $userid)->get();

        return view('home.cart_view',compact('caunt_cart','cart_data'));

        }else{
            return redirect('login');
        }
    }

    //For delete from cart ====>
    public function delete_cart_data($id){
        $delete_cart_pro = Cart::find($id);
        $delete_cart_pro->delete();
        return redirect()->back();
    }


    





}
