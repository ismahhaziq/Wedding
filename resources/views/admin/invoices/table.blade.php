@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Admin Invoices'])

<div class="row mt-4 mx-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div id="alert">
                    @include('components.alert')
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                @if(count($users) > 0)
                @foreach($users as $user)
                @if($user->user_type === 'admin')
                {{-- Skip the admin user --}}
                @continue
                @endif

                <h5>Name: {{ $user->name }}</h5>
                @php
                $totalUser = 0; // Initialize the total variable for each user
                @endphp

                @if($user->invoices && count($user->invoices) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Title</th>
                            <th>Total Amount</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->invoices as $index => $invoice)
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
                                                $totalUser += $item->total_amount; // Add the item's total amount to the total
                                            @endphp
                                        @else
                                            RM{{ $item->price }}
                                            @php
                                                $totalUser += $item->price; // Add the item's price to the total
                                            @endphp
                                        @endif
                                    </td>
                                    @if($itemIndex === 0)
                                        <td rowspan="{{ $itemCount }}" class="align-middle text-center">
                                            @if($invoice->status == 'Completed')
                                                <p class="text-success text-bold">Completed</p>
                                            @elseif($invoice->status == 'Paid')
                                                <p class="text-warning text-bold">Paid</p>
                                            @else
                                                <p class="text-danger text-bold">Not Yet Paid</p>
                                            @endif
                                        </td>
                                        @if($invoice->status != 'Completed') <!-- Only display the buttons if status is not Completed -->
                                            <td rowspan="{{ $itemCount }}" class="align-middle text-center">
                                                <form action="{{ route('invoices.updateStatus', $invoice->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary btn-sm">Check</button>
                                                </form>
                                                <form action="{{ route('invoices.revertStatus', $invoice->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger btn-sm">Revert</button>
                                                </form>
                                            </td>
                                        @else <!-- If status is Completed, only display the Revert button -->
                                            <td rowspan="{{ $itemCount }}" class="align-middle text-center">
                                                <form action="{{ route('invoices.revertStatus', $invoice->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger btn-sm">Revert</button>
                                                </form>
                                            </td>
                                        @endif
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

                <div class="text-right mt-3 d-flex justify-content-between">
                    <strong>Total: RM{{ $totalUser }}</strong>
                </div>
                @else
                <p class="text-center">No items added to the invoice for {{ $user->name }}</p>
                @endif

                <hr class="mt-4 mb-4">
                @endforeach
                @else
                <p class="text-center">No users found</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection