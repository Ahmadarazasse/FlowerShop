<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\flower;
use App\Models\cart;

class flowerController extends Controller
{
    public function index(Request $request)
    {

        if ($request->input('search') == "") {
            $flowers = flower::all();
            return view('home' , ['flowers' => $flowers]);
        } else {
            $flower = flower::where('name', 'LIKE' , "%{$request->input('search')}%")->get();
            return view('home' , ['flowers' => $flower]);
        }
    }
    
    public function create()
    {
        return view('flowers.create');
    }



    public function store(Request $request)
    {

        $vaildateData = $request->validate(
            [
                'name' => ['required' , 'min:10' , 'max:55'],
                'detail' => ['required'],
                'image_url' => ['required' , 'url'],
                'categorie' => ['required'],
                'price' => ['required']
            ]
            
        );

        flower::create($vaildateData);
        

        return redirect('/flowers')->with(['successmessage' =>  'flower is added']);
        
    }


    public function edit($id)
    {
        
    }


    public function show($id)
    {
        if (is_numeric($id)) {         
            $flower = flower::where('flowers_id' , '=' , $id)->get();
            return view('flowers.show' , ['flower' => $flower]);
        } else {
            $flowers = flower::where('categorie', '=', $id)->get();
            return view('home' , ['flowers' => $flowers]);
        }
    }


    public function update(Request $request , $id)
    {
        $flower = flower::where('flowers_id' , '=' , $id);
        $flower->update(request()->except(['_token' , '_method']));

        return redirect()->back()->with(['successmessage' =>  'flower is updated']);
    }


    public function destroy($id)
    {
        $flowers = flower::where('flowers_id' , '=' , $id);
        $carts = cart::where('flower_id' , '=' , $id);
        $flowers->delete();
        $carts->delete();

        return redirect('/flowers')->with(['successmessage' =>  'flower is deleted from table']);
    }


}
