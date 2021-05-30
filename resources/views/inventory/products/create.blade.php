@extends('layouts.app', ['page' => 'New Product', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">New Product</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">Product Information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('sku') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">SKU</label>
                                    <input type="text" name="sku" id="input-name" class="form-control form-control-alternative{{ $errors->has('sku') ? ' is-invalid' : '' }}" placeholder="SKU" value="{{ old('sku') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'sku'])
                                </div>

                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Title</label>
                                    <input type="text" name="title" id="input-name" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Title" value="{{ old('title') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">Parent Product</label>
                                    <select name="parent_id" id="input-category" class="form-select form-control-alternative">
                                        <option value="0">Select Parent</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['title']}}</option>
                                        @endforeach
                                    </select>
                                    <!--@include('alerts.feedback', ['field' => 'parent_product'])-->
                                </div>


                                <div class="form-group{{ $errors->has('quantity') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock">Quantity</label>
                                    <input type="number" name="quantity" id="input-stock" class="form-control form-control-alternative" placeholder="Quantity" value="{{ old('quantity') }}" required>
                                    @include('alerts.feedback', ['field' => 'quantity'])
                                </div>
                                

                                <div class="row">
                                    <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('selling_price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">Selling Price</label>
                                            <input type="number" step=".01" name="selling_price" id="input-price" class="form-control form-control-alternative" placeholder="Selling Price" value="{{ old('selling_price') }}" required>
                                            @include('alerts.feedback', ['field' => 'selling_price'])
                                        </div>
                                    </div>  
                                    <div class="col-4">                                    
                                        <div class="form-group{{ $errors->has('buying_price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">Buying Price</label>
                                            <input type="number" step=".01" name="buying_price" id="input-price" class="form-control form-control-alternative" placeholder="Buying Price" value="{{ old('buying_price') }}" required>
                                            @include('alerts.feedback', ['field' => 'buying_price'])
                                        </div>
                                    </div>                            
                                </div>

                                <div class="text-center">
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

@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
@endpush