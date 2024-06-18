<x-app-layout>

    <div class="container">
        <div class="card">
            <div style="text-align: center; color: #007bff; font-size: 24px; font-weight: bold; padding: 10px;">Customer details</div>

            <div class="card-body">
                <form id="" name="" action="{{route('customer-update',$customer->id)}}" method="post">
                    @csrf

                    Customer Deatils

                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$customer->name}}" >
                        @error('name')<span>{{$message}}</span>@enderror
                    </div>

                    <div class="form-group pt-4">
                        <label >Phone Number</label>
                        <input type="number" id="phone"  name="phone" placeholder="PhoneNumber" value="{{$customer->phone}}" >
                        @error('number')<span>{{$message}}</span>@enderror
                    </div><br><br>
                    <div>
                        <label >Address</label>
                        <input type="text" id="address" name="address"  placeholder="Address" value="{{$customer->address}}" max="1000" > <br><br>
                    </div>
                    <div>
                        <label >UserId</label>
                        <input type="text" id="user_id" name="user_id"  placeholder="user_id" value="{{$customer->user_id}}" max="10" > <br><br>
                    </div>
                    <div class="form-group pt-4">
                        <label for="status">Status:</label>
                        <select id="status" name="status" class="form-control">
                            <option value="active">ACTIVE</option>
                            <option value="inactive">INACTIVE</option>
                        </select>
                        @error('status')<span>{{$message}}</span>@enderror
                    </div>
                    <div class ="form-group pt-4">
                        <div class="col-sm-offset-2 col-sm-10 ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

</x-app-layout>
