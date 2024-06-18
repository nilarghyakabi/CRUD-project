<x-app-layout>
    <div class="container">
        <div class="card">
            <!-- Start Card Body -->
{{--            <div style="text-align: center">Create Product</div>--}}
            <div style="text-align: center; color: #007bff; font-size: 24px; font-weight: bold; padding: 10px;">Create Product</div>

            <div class="card-body">
                <form id="" name="" action="{{route('product-save')}}" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Product Name" value="{{old('name')}}" name="name">
                        @error('name')<span>{{$message}}</span>@enderror
                    </div>
                    <div class="form-group pt-4">
                        <label >Cost Price</label>
                        <input type="number" id="cost" value="{{old('cost')}}" class="form-control" placeholder="CostPrice" name="cost" min="0.00" max=" " >
                        @error('cost')<span>{{$message}}</span>@enderror
                    </div>
                    <div class="form-group pt-4">
                        <label >saling price</label>
                        <input type="number" id="sale" placeholder="SalingPrice" class="form-control" value="{{old('sale')}}" name="sale" min="0.00" max=" " >
                        @error('sale')<span>{{$message}}</span>@enderror
                    </div>
                    <div class="form-group pt-4">
                        <label >image</label>
                        <input type="file" id="image"  class="form-control" name="image"  >
                        @error('sale')<span>{{$message}}</span>@enderror
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
                        <div class="col-sm-offset-2 col-sm-10 ">
                            @csrf
                            <button type="submit" class="btn btn-primary" onclick="location.href='{{route('product-list')}}'">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('css')
    @endpush
    @push('js')
    @endpush
</x-app-layout>

{{--has context menu--}}


