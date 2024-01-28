@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Catering'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>List of Caterings</h6>
                    </div>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <!-- Total Guest and Selected Package Input -->
                <div class="row md-3 mx-1">
                    <div class="col-md-3">
                        <label for="total_guests" class="form-label">Total Guests:</label>
                        <input type="number" class="form-control" id="total_guests" name="total_guests" placeholder="Enter total guests" value="{{ $totalGuests ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label for="selected_package" class="form-label">Selected Package:</label>
                        <select class="form-select" id="selected_package" name="selected_package">
                            @foreach ($caterings as $catering)
                                <option value="{{ $catering->id }}" data-price="{{ $catering->price }}">{{ $catering->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="total_amount" class="form-label">Total Amount:</label>
                        <input type="number" class="form-control" id="total_amount" name="total_amount" placeholder="Total Amount" value="{{ $totalAmount ?? '' }}" disabled>
                    </div>
                    <div class="col-md-3">
                        <!-- Confirm Button -->
                        <button type="button" class="btn btn-success mt-4" onclick="confirmTotal()">Update</button>
                    </div>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    @if(count($caterings) > 0)
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                            @foreach ($caterings as $catering)
                                <div class="col mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title bg-primary text-white p-2">{{ $catering->title }}</h5>
                                            <div class="card-text">
                                                <strong>Price:</strong> RM{{ $catering->price }} / PAX<br><br>
                                                {!! nl2br(e($catering->description)) ?? 'N/A' !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">No Catering Added</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
          // Add an event listener to update the total amount when the total guests or selected package changes
document.getElementById('total_guests').addEventListener('input', updateTotalAmount);
document.getElementById('selected_package').addEventListener('change', function() {
    updateTotalAmount(); // Call the function when the selected package changes
});

        // Function to update the total amount
        function updateTotalAmount() {
            const totalGuests = document.getElementById('total_guests').value;
            const selectedPackageDropdown = document.getElementById('selected_package');
            const totalAmountInput = document.getElementById('total_amount');

            // Get the selected package's price from the data attribute
            const selectedPackagePrice = parseFloat(selectedPackageDropdown.options[selectedPackageDropdown.selectedIndex].getAttribute('data-price'));

            // Calculate the total amount based on selected package and total guests
            let totalAmount = 0;
            if (!isNaN(selectedPackagePrice)) {
                totalAmount = totalGuests * selectedPackagePrice;
            }

            // Update the total amount input field
            totalAmountInput.value = totalAmount.toFixed(2);

            // Set initial values for hidden inputs
            document.getElementById('hidden_total_guests').value = totalGuests;
            document.getElementById('hidden_total_amount').value = totalAmount.toFixed(2);
        }

function confirmTotal() {
    const totalGuests = document.getElementById('total_guests').value;
    const totalAmount = document.getElementById('total_amount').value;
    const selectedPackage = document.getElementById('selected_package');
    const selectedPackageId = selectedPackage.options[selectedPackage.selectedIndex].value;
    const selectedPackageName = selectedPackage.options[selectedPackage.selectedIndex].text;

    const confirmationMessage = `Confirm Total Guests: ${totalGuests}, Total Amount: ${totalAmount}, Selected Package ID: ${selectedPackageId}, Selected Package Name: ${selectedPackageName}`;

    if (confirm(confirmationMessage)) {
        // Send an AJAX request to the confirmInvoice route
        fetch('{{ route("caterings.confirmInvoice") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                total_guests: totalGuests,
                total_amount: totalAmount,
                selected_package: selectedPackageId,
            }),
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); // Display the response message
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}
    </script>

@endsection