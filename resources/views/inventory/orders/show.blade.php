@extends('layouts.app', ['page' => 'Order Information', 'pageSlug' => 'orders', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order Information</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ORDER ID</th>
                            <th>SKU</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ITEM{{ $order->id }}</td>
                                <td>{{ $order->sku }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ format_money($order->price) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
