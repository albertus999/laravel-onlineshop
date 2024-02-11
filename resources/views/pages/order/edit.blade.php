@extends('layouts.app')

@section('title', 'Edit Order')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Status Order Form</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Order</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Order</h2>



                <div class="card">
                    <form action="{{ route('order.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- <div class="card-header">
                            <h4>Input Text</h4>
                        </div> --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Order Id</label>
                                <input type="text"
                                    class="form-control @error('transaction_number')
                                is-invalid
                            @enderror"
                                    name="transaction_number" value="{{ $order->transaction_number }}" readonly>
                                @error('transaction_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Transaction Date</label>
                                <input type="text"
                                    class="form-control @error('created_at')
                                is-invalid
                            @enderror"
                                    name="name" value="{{ $order->created_at }}" readonly>
                                @error('created_at')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                <input type="number"
                                    class="form-control @error('total_cost')
                                is-invalid
                            @enderror"
                                    name="total_cost" value="{{ $order->total_cost }}" readonly>
                                @error('total_cost')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Shipping Service</label>
                                <input type="text"
                                    class="form-control @error('shipping_service')
                                is-invalid
                            @enderror"
                                    name="shipping_service" value="{{ $order->shipping_service }}" readonly>
                                @error('shipping_service')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status Update</label>
                                <select class="form-control selectric @error('status') is-invalid @enderror" name="status">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="on_delivery" {{ $order->status == 'on_delivery' ? 'selected' : '' }}>On
                                        Delivery</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                        Delivered</option>
                                    <option value="expired" {{ $order->status == 'expired' ? 'selected' : '' }}>Expired
                                    </option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Failed
                                    </option>

                                </select>
                            </div>

                            {{-- text no resi --}}
                            <div class="form-group">
                                <label>No Resi</label>
                                <input type="text"
                                    class="form-control @error('shipping_resi')
                                is-invalid
                            @enderror"
                                    name="shipping_resi" value="{{ $order->shipping_resi }}">
                                @error('shipping_resi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label>Photo Product</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image"
                                        @error('image') is-invalid @enderror>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
