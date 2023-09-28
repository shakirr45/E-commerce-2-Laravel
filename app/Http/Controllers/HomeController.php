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

use Session;
use Stripe;

use App\Models\Order;



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


            //for this code increase value of same product if add ====>
            $product_exist_id = Cart::where('product_id', '=' , $id)->where('user_id' , '=' ,$user_id)->get('id')->first();
            if($product_exist_id){

                $cart =Cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity + $request->quantity;
                
                if($product->discount_price!=null){
                    $cart->price=$product->discount_price * $cart->quantity;

                }else{

                $cart->price=$product->price * $cart->quantity;
                }
                $cart->save();
                return redirect()->back();

             }else{
                
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

             }
  

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


//for stripe paymentgetway =====>
public function stripe($totalprice){
    $totalprice = $totalprice;
    return view('home.stripe',compact('totalprice'));
}
//for stripe paymentgetway =====>
public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);


        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id', '=' , $userid)->get();
        foreach($data as $data){
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->addres;
            $order->user_id = $data->user_id;
            $order->product_ttitle = $data->product_ttitle;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = "paid";
            $order->delivery_status = "processing";

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();

        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    // For cash Order ====>
    public function cash_order(){
        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id', '=' , $userid)->get();
        foreach($data as $data){
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->addres;
            $order->user_id = $data->user_id;
            $order->product_ttitle = $data->product_ttitle;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = "cash on delivery";
            $order->delivery_status = "processing";

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();

        }
        return redirect()->back();


    }

    //for view all product ====>
    public function all_pro(){
        return view('home.all_pro');
    }

        //for view all mens product ====>
        public function mens_all(){
            if(Auth::id()){
                $userId = Auth::user()->id;
                $caunt_cart = Cart::where('user_id' , '=' , $userId)->count();
    
                $mens_product = MensItems::all();
                return view('home.mens_all',compact('mens_product','caunt_cart'));

            }else{
                $mens_product = MensItems::all();
                
                return view('home.mens_all',compact('mens_product'));
  
            }

        }


        //for view all womens product ====>
        public function womens_all(){
            if(Auth::id()){
                $userId = Auth::user()->id;
                $caunt_cart = Cart::where('user_id' , '=' , $userId)->count();
    
                $womens_product = WomensItems::all();
                return view('home.womens_all',compact('womens_product','caunt_cart'));

            }else{
                $womens_product = WomensItems::all();
                
                return view('home.womens_all',compact('womens_product'));
  
            }

        }


        //for view all kids product ====>
        public function kids_all(){
            if(Auth::id()){
                $userId = Auth::user()->id;
                $caunt_cart = Cart::where('user_id' , '=' , $userId)->count();
    
                $kids_product = KidsItems::all();
                return view('home.kids_all',compact('kids_product','caunt_cart'));

            }else{
                $kids_product = KidsItems::all();
                
                return view('home.kids_all',compact('kids_product'));
  
            }

        }

        //for view orders =====>
        public function view_orders(){
            if(Auth::id()){
                $userId = Auth::user()->id;
                $caunt_cart = Cart::where('user_id' , '=' , $userId)->count();

                $userid = Auth::user()->id;

                $order = Order::where('user_id', '=' , $userid)->get();
        
                return view('home.view_orders',compact('caunt_cart','order'));
            }else{
                return redirect('/login');
            }
        }

        // for cancle order ====>

        public  function cancle_order($id){
            $order = Order::find($id);
            $order->delivery_status = 'You Canceled the order';
            $order->save();
            return redirect()->back();
        }

        // ----

        



}
