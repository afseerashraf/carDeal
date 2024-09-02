@extends('layout.layout')
@section('title') list Customers @endsection
@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">S.no</th>
            <th scope="col">Car</th>
            <th scope="col">Agent</th>
            <th scope="col">Customer</th>
            <th scope="col">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <td>{{ $loop->iteration  }}</td>
        <td>{{ $order->car->name }} </td>
        <td>{{ $order->agent->name }}</td>
        <td>{{ $order->customer->name }}</td>
        <td>{{ $order->amount }}</td>
        @endforeach

    </tbody>
</table>

@endsection