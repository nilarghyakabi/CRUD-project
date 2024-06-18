{{--<x-app-layout>--}}

{{--    <div class="container">--}}
{{--        <div class="card">--}}
{{--            <div style="text-align: center; color: #007bff; font-size: 24px; font-weight: bold; padding: 10px;">Customer details</div>--}}

{{--            <div class="card-body">--}}
{{--                <form id="" name="" action="{{route('customer-save')}}" method="post">--}}
{{--                    @csrf--}}

{{--                              Customer Deatils  --}}

{{--                    <div class="form-group">--}}
{{--                        <label for="inputName">Name</label>--}}
{{--                        <input type="text" class="form-control" id="name" placeholder="Name" value="{{old('name')}}" name="name">--}}
{{--                        @error('name')<span>{{$message}}</span>@enderror--}}
{{--                    </div>--}}

{{--                    <div class="form-group pt-4">--}}
{{--                        <label >Phone Number</label>--}}
{{--                        <input type="number" id="phone" value="{{old('phone')}}" placeholder="PhoneNumber" name="phone" min="0.00" max=" " >--}}
{{--                        @error('number')<span>{{$message}}</span>@enderror <br><br>--}}
{{--                        <label >Address</label>--}}
{{--                        <input type="text" id="address" placeholder="Address" value="{{old('address')}}" name="address" min="0.00" max=" " > <br><br>--}}
{{--                    </div>--}}
{{--                    <div class ="form-group pt-4">--}}
{{--                        <div class="col-sm-offset-2 col-sm-10 ">--}}
{{--                            <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--</x-app-layout>--}}

<x-app-layout>
    <div class="container">
        <div class="card">
            <div style="text-align: center; color: #007bff; font-size: 24px; font-weight: bold; padding: 10px;">
                Customer details
            </div>

            <div class="card-body">
                <button id="toggleFormButton" class="btn btn-secondary mb-3">ENTER DETAILS</button>
                <form id="customerForm" name="customerForm" action="{{ route('customer-save') }}" method="post" style="display: none;">
                    @csrf

                    {{-- Customer Details --}}
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}" name="name">
                        @error('name')<span>{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group pt-4">
                        <label for="phone">Phone Number</label>
                        <input type="number" class="form-control" id="phone" value="{{ old('phone') }}" placeholder="Phone Number" name="phone" min="0">
                        @error('phone')<span>{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group pt-4">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Address" value="{{ old('address') }}" name="address">
                        @error('address')<span>{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group pt-4">
                        <label for="user_id">UserId</label>
                        <input type="text" class="form-control" id="user_id" placeholder="Address" value="{{ old('user_id') }}" name="user_id">
                        @error('user_id')<span>{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group pt-4">
                        <label for="status">Status:</label>
                        <select id="status" name="status" class="form-control">
                            <option value="active">ACTIVE</option>
                            <option value="inactive">INACTIVE</option>
                        </select>
                        @error('status')<span>{{$message}}</span>@enderror
                    </div>

                    <div class="form-group pt-4">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" onclick="location.href='{{route('customer-view')}}'">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleFormButton').addEventListener('click', function() {
            var form = document.getElementById('customerForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                this.textContent = 'Hide Form';
            } else {
                form.style.display = 'none';
                this.textContent = 'Show Form';
            }
        });
    </script>
</x-app-layout>

