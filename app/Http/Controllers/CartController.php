<?php

namespace App\Http\Controllers;

use App\Models\cartModel;
use Illuminate\Http\Request;

use App\Models\cart;
use App\Models\flower;

class CartController extends Controller
{

    public function index()
    {
        $items = array();
        $quantity = array();

        if (session()->get('user_email') != null) {
            $useremail = session()->get('user_email');
         } else {
            $useremail = session()->get('adminemail');
         }

        $carts = cart::where('user_email' , '=' , $useremail)->get();

        foreach ($carts as $cart) {
            $flowers = flower::where('flowers_id' , '=' , $cart['flower_id'])->get();
            array_push($items ,$flowers);
            if ($flowers[0]['name'] != "") {
                array_push($quantity , $cart['quantity']);
            }
        }
        return view('carts.index' , ['items' => $items , 'quantity' => $quantity ]);
    }

  
    public function create()
    {
        return redirect('/carts/store');
    }

  
    
    public function store(Request $request)
    {

        if (session()->get('user_email') != null) {
            $useremail = session()->get('user_email');
         } else {
            $useremail = session()->get('adminemail');
         }
        
         $carts = cart::where('flower_id' , '=' , $request->input('flower_id'))->where('user_email' , '=' , $useremail)->get();

        if(empty($carts[0]['flower_id'])){

            $Data = $request->validate(
                [
                    'flower_id' => ['required'],
                    'user_email' => ['required'],
                    'quantity' => ['required' , 'numeric'],
                ] 
            );
            cart::create($Data);

            return redirect()->back()->with(['successmessage' => 'Item is added to cart']);

        } else {
            return redirect()->back()->with(['errormessage' => 'Item is in cart']);
        }
        

    }

 
    public function show($carts)
    {
        //
    }

   
    public function edit($carts)
    {
        //
    }

  
    public function update(Request $request, cart $carts)
    {
        //
    }

  
    public function destroy($id)
    {
        if (session()->get('user_email') != null) {
           $useremail = session()->get('user_email');
        } else {
             $useremail = session()->get('adminemail');
        }
        $delete = cart::where('flower_id' , '=' , $id)->where('user_email' , '=' , $useremail)->delete();
        return redirect('/carts');
    }
}
