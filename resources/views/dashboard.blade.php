@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category"><strong>Filter Report By</strong></h5>
                            <form method="post" action="{{ route('home.index') }}" autocomplete="off">
                                @csrf
                                <select id="input-category" name="searchBy" class="form-select form-control-alternative">
                                    @if($searchBy == '' || $searchBy == 'all')
                                       <option value="all" selected>All Products</option>
                                       <option value="parent">Only Parent</option>
                                    @else
                                       <option value="all">All Products</option>     
                                       <option value="parent" selected>Only Parent</option>
                                    @endif
                                </select>

                                <input type="submit" value="Search">
                            </form>
                            <p></p>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category"><strong>Monthly Top Five Profitable Item</strong></h5>
                            <table class="table tablesorter " id="">
                                <tbody>
                                    <thead>
                                        <th>Product SKU</th>
                                        <th>Product Title</th>
                                        <th>Profit</th>
                                    </thead>
                                        @foreach($monthlyTopFiveProfitableItem as $key => $order)
                                            <tr>    
                                                <td>{{ $order->sku }}</td>
                                                <td>{{ $order->title }}</td>
                                                <td>{{ format_money($order->profit) }}</td>
                                            </tr>        
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category"><strong>Monthly Top Five Sell Item</strong></h5>
                            <table class="table tablesorter " id="">
                                <tbody>
                                    <thead>
                                        <th>Product SKU</th>
                                        <th>Product Title</th>
                                        <th>Quantity</th>
                                    </thead>
                                        @foreach($monthlyTopFiveSellItem as $key => $order)
                                            <tr>    
                                                <td>{{ $order->sku }}</td>
                                                <td>{{ $order->title }}</td>
                                                <td>{{ $order->quantity }}</td>
                                            </tr>        
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

