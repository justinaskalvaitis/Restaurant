<?php

namespace App\Http\Controllers;

use App\Order;
use App\Contact;
use App\OrderLine;
use App\Table;
use App\Dish;
use Illuminate\Http\Request;


class OrdersController extends Controller
{

     public function __construct() {
        $this->middleware('auth.admin')
            ->except(['index', 'show', 'addToCart', 'clearCart', 'deleteLine', 'checkout', 'store']);

        $this->middleware('auth')->except(['index', 'show', 'addToCart', 'clearCart', 'deleteLine']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->type =='admin'){
            $orders = Order::all()->sortByDesc("created_at");
        } else {
            $orders = Order::where('user_id', \Auth::user()->id)->get();
        }
       
        return view('order.index', ['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session('cart.total')){
            return view('order.form');
        }else {

    return redirect()->route('dishes.index');
    }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $betkoks = session('cart.reservation_info');
        $order = Order::create([
            'name' =>$betkoks['name'],
             
            'email' => $betkoks['email'],
            'table_name' => $betkoks['table_name'],
            'contact_person' => $betkoks['contact_person'],
            'phone' => $betkoks['phone'],
            'order_time' => $betkoks['order_time'],
            'order_date' => $betkoks['order_date'],
            'number_of_persons' => $betkoks['number_of_persons'],

            'total' => session('cart.total'),
            'date' => \Carbon\Carbon::now(),
            'user_id' => \Auth::user()->id,

            



            ]);
       foreach (session('cart.items') as $item){
        OrderLine::create([
              'name' =>$betkoks['name'],
            'order_id' => $order->id,
            'dish_id' => $item['id'],
            'quantity' => $item['quantity'],
            'total' => $item['total'],

            'contact_person' => $request->get('contact_person'),
            'phone' => $request->get('phone'),
            'order_date' => $request->get('order_date'),
            'order_time' => $request->get('order_time')
            ]);
        }
       $this->clearCart();
       return redirect()->route('contacts.index')->with('message', [
        'text' => 'uzsakymas priimtas',
        'type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $orders
     * @return \Illuminate\Http\Response
     */
    public function show( $orders)
    {
        $order = Order::find($orders);
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);


        return view('order.form', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Order::find($id)->update($request->all());
        return  redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
 
       $order->order_lines()->delete();
       $order->delete(); 
       return redirect()->route('orders.index');
    }

    public function addToCart(Request $request){
        // session(['cart.items' => [] ]);
        $dish_id = $request->id;

        $dish = Dish::find($dish_id);

        $product = [
            'id'   => $dish->id,
            'title'=> $dish->title,
            'photo' => $dish->photo,
            'quantity'=> 1,
            'price' => $dish->price,
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




    public function checkout(){
        $tables = Table::all();
        $tax = number_format(session('cart.total') / 1.21);
        return view('checkout', compact('tables', 'tax'));
    }




    public function deleteItem(Request $request){
        $id = $request->id;
        $items = session('cart.items');
        $total = session('cart.total');


        foreach($items as $index => $item)
        {
            if($item['id'] == $id) {
            $total -= $item['total'];
            unset($items[$index]);
            break;
    }
        }

        session(['cart.items' => $items,
            'cart.total' => $total]);


        return redirect()->route('cart.checkout');
    }
    
}

