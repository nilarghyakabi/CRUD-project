<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">ALL Customers</h1>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th>UserID</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->user_id }}</td>
                            <td>{{ $customer->status }}</td>
                            <td>
                                <a href="{{ route('customer-edit', $customer->id) }}" class="btn btn-primary shadow rounded-pill">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('customer-delete', $customer->id) }}" class="btn btn-sm btn-danger shadow">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-primary text-white">
                Total Customers: {{ count($customers) }}
            </div>
        </div>
    </div>
</x-app-layout>
