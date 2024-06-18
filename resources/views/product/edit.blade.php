<x-app-layout>
    <div class="container">
        <div class="card">
            <!-- Start Card Body -->
                        <div style="text-align: center">Edit Product</div>
            <div style="text-align: center; color: #007bff; font-size: 24px; font-weight: bold; padding: 10px;">Edit Product</div>

            <div class="card-body">
                <form id="" name="" action="{{route('product-update',$p_edit->id)}}" method="post">

{{--                    <input type="hidden" name="hidden_id" value="{{$p_edit->id}}">--}}

                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{$p_edit->name}}">
                        @error('name')<span>{{$message}}</span>@enderror
                    </div>
                    <div class="form-group pt-4">
                        <label >Cost Price</label>
                        <input type="number" id="cost"  class="form-control" name="cost" placeholder="CostPrice" value="{{$p_edit->cost_price}}">
                        @error('cost')<span>{{$message}}</span>@enderror
                    </div>
                    <div class="form-group pt-4">
                        <label >saling price</label>
                        <input type="number" id="sale" name="sale" placeholder="SalingPrice" class="form-control" value="{{$p_edit->selling_price}}" min="0.00" max=" " >
                        @error('sale')<span>{{$message}}</span>@enderror
                    </div>
                    <div class="form-group pt-4">
                        <label >image</label>
                        <input type="file" id="image"  class="form-control" name="image"  >
                        @error('sale')<span>{{$message}}</span>@enderror
                    </div>
                    <div class="form-group pt-4">
                        <label for="status">Status:</label>
                        <select id="status" name="status" class="form-control" value="{{$p_edit->status}}">
                            <option value="active">ACTIVE</option>
                            <option value="inactive">INACTIVE</option>
                        </select>
                        @error('status')<span>{{$message}}</span>@enderror
                    </div>

                    <div class="form-group pt-4">
                        <div class="col-sm-offset-2 col-sm-10 ">
                            @csrf
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('css')
    @endpush
    @push('js')
        @if(!empty($is_view))
            <script>
                $(document).ready(function(){
                    $("form :input").prop("disabled", true);
                });
            </script>
        @endif
    @endpush
</x-app-layout>

{{--has context menu--}}


