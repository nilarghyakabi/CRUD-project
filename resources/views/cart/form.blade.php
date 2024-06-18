<x-app-layout>

    <div class="container mt-5">
        <div class="card">
            <div style="text-align: center; color: #007bff; font-size: 24px; font-weight: bold; padding: 10px;">Cart Details</div>

            <div class="card-body">
                <form id="customer-form" action="{{ route('cart-save') }}" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="user_id">User ID</label>
                        <input type="number" class="form-control" id="user_id" placeholder="User ID" value="{{ old('user_id') }}" name="user_id">
                        @error('user_id')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="cart_no">Cart Number</label>
                        <input type="number" class="form-control" id="cart_no" placeholder="Cart Number" value="{{ old('cart_no') }}" name="cart_no" min="0">
                        @error('cart_no')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="sub_total">Sub Total</label>
                        <input type="number" class="form-control" id="sub_total" placeholder="Sub Total" value="{{ old('sub_total') }}" name="sub_total" min="0" step="0.01">
                        @error('sub_total')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control" id="discount" placeholder="Discount" value="{{ old('discount') }}" name="discount" min="0" step="0.01">
                        @error('discount')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" id="total" placeholder="Total" value="{{ old('total') }}" name="total" min="0" step="0.01">
                        @error('total')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="placed" {{ old('status') == 'placed' ? 'selected' : '' }}>Placed</option>
                            <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="confirmed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group pt-4 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#customer-form').submit(function(event) {
            // Example: Check if User ID is empty
            if ($('#user_id').val() === '') {
                alert('User ID is required.');
                event.preventDefault();
            }
        });
    });
</script>
