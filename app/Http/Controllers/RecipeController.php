<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(){
        $recipes = Recipe::all();
        return view('home', compact('recipes'));
    }

    public function create(){
        return view('recipes.create');
    }

    public function store(Request $request){
        $request->validate([
            'recipe_name'=>'required',
            'note'=>'required'
        ]);

        Recipe::create([
            'recipe_name'=>$request->recipe_name,
            'created_at'=>Carbon::now(),
            'note'=>$request->note
        ]);

        return redirect()->route('home');
    }
}
