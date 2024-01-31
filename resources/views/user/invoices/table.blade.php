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
                    <p>Event Date: {{ $eventDate }}</p>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
            </div>
            @php
            $total = 0; // Initialize the total variable
            $discount = 0; // Initialize discount
            @endphp
            <div class="card-body px-0 pt-0 pb-2">
                @if(count($invoices) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Title</th>
                            <th>Total Amount</th>
                            <th class="text-center">Action</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $index => $invoice)
                        @php
                        $itemCount = count($invoice->items);
                        @endphp
                        @foreach($invoice->items as $itemIndex => $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @if(in_array($item->title, ['PAKEJ RUBY', 'PAKEJ NILAM', 'PAKEJ DIAMOND']))
                                RM{{ $item->total_amount }}
                                @php
                                $total += $item->total_amount; // Add the item's total amount to the total
                                @endphp
                                @else
                                RM{{ $item->price }}
                                @php
                                $total += $item->price; // Add the item's price to the total
                                @endphp
                                @endif
                            </td>
                            <td>
                                <!-- Add action buttons here if needed -->
                                @if($invoice->status != 'Completed' && $invoice->status != 'Paid')
                                <form class="text-center" id="deleteForm{{ $item->id }}"
                                    action="{{ route('invoices.destroy', $item->id) }}" method="POST">
                                    <div class=" px-3 py-1 align-items-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ms-auto">Delete</button>
                                    </div>
                                </form>
                                @endif
                            </td>
                            @if($itemIndex === 0)
                            <td rowspan="{{ $itemCount }}" class="align-middle text-center ">
                                @if($invoice->status == 'Completed')
                                <p class="text-success text-bold">Completed</p>
                                @elseif($invoice->status == 'Paid')
                                <p class="text-warning text-bold">Paid</p>
                                @else
                                <p class="text-danger text-bold">Not Yet Paid</p>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
                <div class="text-left mt-3">
                    <!-- Add additional buttons or forms for further actions -->
                </div>

                <div class="text-right mt-3 d-flex justify-content-between" style="margin-left: 10px;">
                    @php
                    // Apply discount if total is above 1000
                    if ($total > 900) {
                    $discount = $total * 0.20; // 20% discount
                    $total -= $discount; // Deduct discount from total
                    }
                    @endphp
                    <strong>Total: RM{{ $total }}</strong>
                    @if($invoice->status != 'Completed' && $invoice->status != 'Paid')
                    <a href="{{ route('make.payment', ['totalAmount' => $total, 'invoice_id' =>$invoice->id]) }}"><button
                            class="btn btn-success ml-20">PAY</button></a>
                </div>
                @endif
                @else
                <p class="text-center">No items added to the invoice</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
