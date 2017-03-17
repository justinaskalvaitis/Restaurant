<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Dish;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $orders = Orders::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.form');
        return redirect()->route('orders.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Orders::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'total' => $request->get('total'),
            'date' => $request->get('date'),
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show( $orders)
    {
        $order = Orders::find($orders);
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Orders::find($id);


        return view('order.form', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Orders::find($id)->update($request->all());
        return  redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Orders::find($id)->delete();
       return redirect()->route('orders.index');
    }

    public function addToCart(Request $request){
        // session(['cart.items' => [] ]);
        $dish_id = $request->id;

        $dish = Dish::find($dish_id);

        $product = [
            'id'   => $dish->id,
            'title'=> $dish->title,
            'quantity'=> 1,
            'total' => $dish->price
        ];

        $items = session('cart.items');
        $existing = false;
        $grand_total = 0;

        if($items  && count($items)> 0) {

        foreach($items as $index => $item) {
                if($item['id'] == $dish_id) {
                    $items[$index]['quantity'] = $item['quantity'] + $product['quantity'];
                    $items[$index]['total'] = $items[$index]['quantity'] * $dish->price;
                    $existing = true;
                    $grand_total += $items[$index]['total'];
                } else {
                    $grand_total += $item['total'];
                }
            }

        } 

        if(!$existing){
        session()->push('cart.items', $product);
        $grand_total += $product['total'];
        } else {
            session(['cart.items'=> $items]);
        }

        session(['cart.total' => $grand_total]);

        return session('cart');
    }

    public function clearCart(){
        session([ 'cart.items' => [], 'cart.total' => 0]);
    }
}
