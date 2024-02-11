@extends('layouts.app')

@section('title', 'Order')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Order List</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Order</a></div>
                    <div class="breadcrumb-item">All Order</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>



                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                {{-- <div class="float-left">
                                    <form method="GET" action="{{ route('order.index') }}" class="mt-3">
                                        <div class="input-group">
                                            <select class="form-control" name="transaction_number">
                                                <option value="">All Order</option>
                                                @foreach ($orders as $order)
                                                    <option value="{{ $order->transaction_number }}">{{ $order->transaction_number }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                                <div class="float-right">
                                    <form method="GET" action="{{ route('order.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Order Id" name="transaction_number">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Transaction Date</th>
                                            <th>Order Id</th>
                                            <th>Bank</th>
                                            <th>Total</th>
                                            <th>Service</th>
                                            <th>Status</th>
                                            <th>Resi</th>
                                            <th>Action</th>
                                        </tr>

                                        @foreach ($orders as $order)
                                            <tr>

                                                <td>{{ $order->created_at }}
                                                </td>
                                                <td>{{ $order->transaction_number }}
                                                </td>
                                                <td>{{ $order->payment_va_name }}
                                                </td>
                                                <td>{{ $order->total_cost }}
                                                </td>
                                                <td>{{ $order->shipping_service }}
                                                </td>
                                                <td>{{ $order->status }}
                                                </td>
                                                <td>{{ $order->shipping_resi }}
                                                </td>

                                                {{-- <td>{{ $order->created_at }}</td> --}}
                                                <td>
                                                    <div class="d-flex justify-content-left">
                                                        <a href='{{ route('order.edit', $order->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Update
                                                        </a>

                                                        {{-- <form action="{{ route('order.destroy', $order->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $orders->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
