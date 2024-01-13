@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Invoice Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Add Service to Invoice</h6>
                        <div class="mb-2">
                            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back to Invoices</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="{{ route('invoice.add', $service->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="service_title" class="form-label">Service Title</label>
                            <input type="text" class="form-control" id="service_title" name="service_title" value="{{ $service->title }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="service_price" class="form-label">Service Price</label>
                            <input type="text" class="form-control" id="service_price" name="service_price" value="RM{{ $service->price }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total_amount" class="form-label">Total Amount</label>
                            <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{ $invoice->total_amount }}" readonly>
                        </div>
                        <button type="submit" class="btn btn-success">Add Service to Invoice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
