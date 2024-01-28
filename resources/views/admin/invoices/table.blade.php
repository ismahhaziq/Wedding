This is table.blade

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

                            <h5>Name: {{ $user->name}}</h5>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->invoices as $index => $invoice)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td>{{ $invoice->title }}</td>
                                                <td>
                                                    @if(in_array($invoice->title, ['PAKEJ RUBY', 'PAKEJ NILAM', 'PAKEJ DIAMOND']))
                                                        RM{{ $invoice->total_amount }}
                                                    @else
                                                        RM{{ $invoice->price }}
                                                    @endif
                                                </td>
                                                @if($index === 0)
                                                    <td rowspan="{{ count($user->invoices) }}" class="align-middle text-center">
                                                        <!-- Add action buttons here if needed -->
                                                        <p class="text-success">COMPLETED</p>
                                                    </td>
                                                @endif
                                            </tr>
                                            @php
                                                $totalUser += $invoice->total_amount ?? $invoice->price; // Increment the total for each user
                                            @endphp
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