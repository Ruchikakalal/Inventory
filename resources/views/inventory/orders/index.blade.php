@extends('layouts.app', ['page' => 'List of Products', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Orders</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('orders.create') }}" class="btn btn-sm btn-primary">New Order</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Order Id</th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>ITEM{{ $order->id }}</td>
                                        <td>{{ $order->product->sku }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ format_money($order->price) }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('orders.show', $order) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="View Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('orders.edit', $order) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Order">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('orders.destroy', $order) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Order" onclick="confirm('Are you sure you want to remove this order?') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        {{ $orders->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
