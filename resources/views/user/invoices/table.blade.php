@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Invoice'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Invoice</h6>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                            <p>Event Date: {{ $eventDate}}</p>
                    </div>
                                                        <div id="alert">
                    @include('components.alert')
                </div>
                    <!-- PLEASE DISPLAY THE EVENT DATE HERE-->
                </div>
                @php
                    $count = 1;
                    $total = 0; // Initialize the total variable
                @endphp
                <div class="card-body px-0 pt-0 pb-2">
                    @if(count($invoices) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Title</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td class="text-center">{{ $count++ }}</td>
                                        <td>{{ $invoice->title }}</td>
                                        <td>
                                            @if(in_array($invoice->title, ['PAKEJ RUBY', 'PAKEJ NILAM', 'PAKEJ DIAMOND']))
                                                RM{{ $invoice->total_amount }}
                                            @else
                                                RM{{ $invoice->price }}
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Add action buttons here if needed -->
                                            <form id="deleteForm{{ $invoice->id }}" action="{{ route('invoices.destroy', $invoice->id) }}" method="POST">
                                                <div class=" px-3 py-1 align-items-center">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ms-auto" >Delete</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $total += $invoice->total_amount ?? $invoice->price; // Increment the total with the current item's total amount or price
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-right mt-3  d-flex justify-content-between">
                            <strong>Total: RM{{ $total }}</strong>
                             <button class="btn btn-success ml-2">PAY</button>
                        </div>

                        <div class="text-left mt-3">
                            <!-- Add additional buttons or forms for further actions -->
                          
                        </div>

                    @else
                        <p class="text-center">No items added to the invoice</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
