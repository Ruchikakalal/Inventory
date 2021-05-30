<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Order;
use App\Product;
use App\Http\Requests\HomeRequest;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function index(HomeRequest $request)
    {
        $searchBy = request()->has('searchBy') ? request()->searchBy : '';
        return view('dashboard', [
            'monthlyTopFiveProfitableItem' => $this->getTopFiveProfitableItem($searchBy),
            'monthlyTopFiveSellItem' => $this->getTopFiveSellItem($searchBy),
            'searchBy' => $searchBy
        ]);
    }

    public function getTopFiveProfitableItem($searchBy)
    {
        return $products = Product::query()
                                ->join('orders', 'orders.product_id', '=', 'products.id')
                                ->selectRaw('products.id, products.sku, products.title, SUM(orders.profit) AS profit')
                                ->when($searchBy, function($query) use($searchBy) {
                                    if($searchBy !== '' && $searchBy !== 'all'){
                                        $query->where('products.parent_id', '=', 0);
                                     }
                                })
                                ->whereMonth('orders.order_date', '=', Carbon::now()->subMonth()->month)
                                ->groupBy(['products.id', 'products.sku', 'products.title'])
                                ->orderByDesc('profit')
                                ->take(5)
                                ->get();
    }

    public function getTopFiveSellItem($searchBy)
    {
        return $products = Product::query()
                                   ->join('orders', 'orders.product_id', '=', 'products.id')
                                   ->selectRaw('products.id, products.sku, products.title, SUM(orders.quantity) AS quantity')
                                   ->when($searchBy, function($query) use($searchBy) {
                                     if($searchBy !== '' && $searchBy !== 'all'){
                                        $query->where('products.parent_id', '=', 0);
                                      }
                                   })
                                   ->whereMonth('orders.order_date', '=', Carbon::now()->subMonth()->month)
                                   ->groupBy(['products.id', 'products.sku', 'products.title'])
                                   ->orderByDesc('quantity')
                                   ->take(5)
                                   ->get();
    }
}
