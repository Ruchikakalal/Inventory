@extends('layouts.app', ['page' => 'Product Information', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Information</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>SKU</th>
                            <th>Title</th>
                            <th>Parent Product</th>
                            <th>Quantity</th>
                            <th>Buying Price</th>
                            <th>Selling Price</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->title }}</td>
                                <td>
                                    @if($product->parent_id > 0)
                                        @foreach($categories as $category)
                                            @if($category->id == $product->parent_id)
                                              {{ $category->title }}
                                            @endif
                                        @endforeach 
                                    @else
                                        -
                                    @endif       
                                </td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ format_money($product->buying_price) }}</td>
                                <td>{{ format_money($product->selling_price) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
