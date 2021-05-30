@extends('layouts.app', ['page' => 'Order Product', 'pageSlug' => 'orders', 'section' => 'inventory'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Order Product</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('orders.store') }}" autocomplete="off">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">Product Information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">SKU</label>
                                    <input type="text" name="sku" id="input-name" class="form-control" placeholder="{{ __('sku') }}" value="{{ old('sku', $product->sku) }}" disabled>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-price">Price</label>
                                    <input type="number" step=".01" name="selling_price" id="input-price" class="form-control form-control-alternative" placeholder="Selling Price" value="{{ old('selling_price', $product->selling_price) }}" disabled>
                                </div>

                                <div class="form-group{{ $errors->has('selected_quantity') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock">Select Quantity</label>
                                    <input type="number" name="selected_quantity" id="input-stock" class="form-control form-control-alternative" placeholder="Select Quantity" value="" required>
                                    @include('alerts.feedback', ['field' => 'selected_quantity'])
                                </div>
                                    
                                <div class="text-center">
                                    <input type="hidden" name="product_id" value="{{ old('id', $product->id) }}">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
