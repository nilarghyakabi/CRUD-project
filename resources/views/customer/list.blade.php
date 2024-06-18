<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">Customers</h1>
            </div>
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th>UserID</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    @push('js')
        <script type="text/javascript">
        $(function (){
            var table=$('.data-table').DataTable({
                serverSide:true,
                ajax: "{{route('customer-list')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false,searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image',orderable: false,searchable: false},
                    {data: 'address', name: 'addres'},
                    {data: 'phone', name: 'phone'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })
        });

        </script>
    @endpush
</x-app-layout>
