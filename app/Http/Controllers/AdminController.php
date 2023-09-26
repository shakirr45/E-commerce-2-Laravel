<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\MensItems;
use App\Models\WomensItems;
use App\Models\KidsItems;

class AdminController extends Controller
{
    //Mens Product add =====>
    public function mens_pro_add_view(){
        return view('admin.mens_pro_add_view');
    }

    // Mens Product add =====>
    public function add_mens_product(Request $request){
        $m_product = new MensItems;
        $m_product->title = $request->title;
        $m_product->description = $request->description;
        $m_product->quantity = $request->quantity;
        $m_product->price = $request->price;
        $m_product->discount_price = $request->discount_price;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $m_product->image = $imagename;
        }

        $m_product->save();
        return redirect()->back();  
    }

    // Show Mens Items ====>
    public function show_mens_item(){
        $mens_product = MensItems::all();
        return view('admin.show_mens_item',compact('mens_product'));
    }

    // Delete Mens Items ====>
    public function delete_product($id){
        $product_delete = MensItems::find($id);
        $product_delete->delete();
        return redirect()->back();  

    }


    //Womens Product add =====>
    public function womens_pro_add_view(){
        return view('admin.womens_pro_add_view');
    }
    // Womens Product add =====>
    public function add_womens_product(Request $request){
        $w_product = new WomensItems;
        $w_product->title = $request->title;
        $w_product->description = $request->description;
        $w_product->quantity = $request->quantity;
        $w_product->price = $request->price;
        $w_product->discount_price = $request->discount_price;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $w_product->image = $imagename;
        }

        $w_product->save();
        return redirect()->back();  
    }
        // Show women Items ====>
        public function show_womens_item(){
            $womens_product = WomensItems::all();
            return view('admin.show_womens_item',compact('womens_product'));
        }
    
        // Delete Womens Items ====>
        public function delete_product_women($id){
            $product_delete = WomensItems::find($id);
            $product_delete->delete();
            return redirect()->back();  
    
        }



    //kids Product add =====>
    public function kids_pro_add_view(){
    return view('admin.kids_pro_add_view');
    }
    // Womens Kids add =====>
    public function add_kids_product(Request $request){
        $k_product = new KidsItems;
        $k_product->description = $request->description;
        $k_product->quantity = $request->quantity;
        $k_product->title = $request->title;
        $k_product->price = $request->price;
        $k_product->discount_price = $request->discount_price;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $k_product->image = $imagename;
        }

        $k_product->save();
        return redirect()->back();  
    }

    // Show kids Items ====>
    public function show_kids_item(){
    $kids_product = KidsItems::all();
    return view('admin.show_kinds_item',compact('kids_product'));
    }

        // Delete Kids Items ====>
        public function delete_kids_product($id){
            $product_delete = KidsItems::find($id);
            $product_delete->delete();
            return redirect()->back();  
    
        }


}

