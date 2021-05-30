<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\Http\Requests\OrderRequest;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $orders = Order::with(['product'])->where('user_id', $user->id)->paginate(5);

        return view('inventory.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('inventory.orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\OrderRequest  $request
     * @param  App\Product  $model
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request, Order $model)
    {
        $user = Auth::user();

        $product = Product::find(request()->product_id);
        $order = new Order();
        $order['product_id'] = $product->id;
        $order['sku'] = $product->sku;
        $order['order_date'] = date('Y-m-d');
        $order['quantity'] = request()->selected_quantity;
        $totalQtys = request()->selected_quantity;
        $total_seller_qty = 0;
        $total_buyer_qty = 0;
        for($i=0; $i < $totalQtys; $i++){
              $total_seller_qty += $product->selling_price;
              $total_buyer_qty += $product->buying_price;
        }
        $order['price'] = $total_seller_qty;
        $order['profit'] = $total_seller_qty - $total_buyer_qty;
        $order['user_id'] = $user->id;
        
        $order->save(); 
        
        return redirect()
            ->route('orders.create')
            ->withStatus('Order successfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('inventory.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('inventory.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $user = Auth::user();

        $product = Product::find(request()->product_id);
        $order = Order::find(request()->order_id);
        $order->product_id = $product->id;
        $order->sku = $product->sku;
        $order->order_date = date('Y-m-d');
        $order->quantity = request()->selected_quantity;
        $totalQtys = request()->selected_quantity;
        $total_seller_qty = 0;
        $total_buyer_qty = 0;
        for($i=0; $i < $totalQtys; $i++){
              $total_seller_qty += $product->selling_price;
              $total_buyer_qty += $product->buying_price;
        }
        $order->price = $total_seller_qty;
        $order->profit = $total_seller_qty - $total_buyer_qty;
        $order->user_id = $user->id;
         
        $order->save(); 
        
        return redirect()
            ->route('orders.index')
            ->withStatus('Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('orders.index')
            ->withStatus('Order removed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function order($id)
    {
        $product = Product::find($id);
        return view('inventory.orders.order', compact('product'));
    }
}
