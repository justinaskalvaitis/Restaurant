<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Order;
use Illuminate\Http\Request;

class DishController extends Controller
{


   public function __construct() {
        $this->middleware('auth.admin')
             ->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dish.form');
        // return redirect()->route('dishes.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dish::create([
            'title' => $request->get('title'),
            'photo' => $request->get('photo'),
            'description' => $request->get('description'),
            'netto_price' => $request->get('netto_price'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show($dish)
    {
        $dishes = Dish::find($dish);
        return view('dish.show', compact('dishes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $dishes = Dish::find($id);


        return view('dish.form', compact('dishes'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Dish::find($id)->update($request->all());
        return  redirect()->route('dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Dish::find($id)->delete();
       return redirect()->route('dishes.index');
    }
}
