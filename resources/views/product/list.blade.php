<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">Products</h1>
            </div>
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Cost Price</th>
                    <th>Selling Price</th>
                    <th>Unit</th>
                    <th>Status</th>
                    <th>created At</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    @push('js')
        <script type="text/javascript">
            $(function () {

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('product-list') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false,searchable: false},
                        {data: 'name', name: 'name'},
                        {data: 'image', name: 'image',orderable: false,searchable: false},
                        {data: 'cost_price', name: 'cost_price'},
                        {data: 'selling_price', name: 'selling_price'},
                        {data: 'unit', name: 'unit'},
                        {data: 'status', name: 'status'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });

            });
        </script>
    @endpush

</x-app-layout>
