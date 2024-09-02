@extends('layout.layout')
@section('title') list Customers @endsection
@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">S.no</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
     </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $loop->iteration  }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->mobile }}</td>
            <td>{{ $customer->email }}</td>
            <td><a href="{{ route('customer.create') }}" class="btn btn-outline-success">New</a> 
            <a href="{{ route('customer.edit', encrypt($customer->id)) }}" class="btn btn-outline-primary">Edit</a>
            <a href="{{ route('customer.delete', encrypt($customer->id)) }}" class="btn btn-outline-danger">Delete</a>
        </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection