<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::all();
        return view('home', compact('carts'));
    }

    public function create(){
        // $carts = DB::table('carts')->join('recipes', 'carts.recipe_id', '=', 'recipes.id')->select('carts.item', 'carts.quantity', 'carts.status')->where('carts.recipe_id', $id)->get();
        $recipes = Recipe::all();
        return view('carts.create', compact('recipes'));
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'item'=>'required',
            'quantity'=>'required',
            'status'=>'required'
        ]);

        Cart::create([
            'item'=>$request->item, 
            'quantity'=>$request->quantity,
            'recipe_id'=>$request->recipe_id,
            'status'=>$request->status
        ]);

        // $this->show($request->recipe_id);
        return redirect()->route('carts.show', $request->recipe_id);
    }

    function show($id){
        $carts = DB::table('carts')->join('recipes', 'carts.recipe_id', '=', 'recipes.id')->select('carts.item', 'carts.quantity', 'carts.status', 'carts.recipe_id', 'carts.id')->where('carts.recipe_id', $id)->get();
        // dd($carts);
        return view('carts.index', compact('carts'));
    }

    function destroy(Cart $cart){
        $cart->delete();
        return redirect()->back();
    }
}
