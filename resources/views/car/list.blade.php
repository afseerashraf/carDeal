@extends('layout.layout')
@section('title') list Car @endsection
@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">S.no</th>
            <th scope="col">Car Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Action</th>





        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{ $loop->iteration  }}</td>
            <td>{{ $car->name }}</td>
            <td>{{ $car->brand_id }}</td>
            <td><a href="{{ route('car.create') }}" class="btn btn-outline-success">New</a> 
            <a href="{{ route('car.edit', encrypt($car->id)) }}" class="btn btn-outline-primary">Edit</a>
            <a href="{{ route('car.delete', encrypt($car->id)) }}" class="btn btn-outline-danger">Delete</a>
        </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection