@extends('layouts.app', ['page' => 'List of Products', 'pageSlug' => 'orders', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">SKU</th>
                                <th scope="col">Title</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Buying Price</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ format_money($product->buying_price) }}</td>
                                        <td>{{ format_money($product->selling_price) }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('products.show', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="View Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('order.order', $product) }}" class="btn btn-sm btn-primary" data-placement="bottom" title="Order Product">Add Order
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
