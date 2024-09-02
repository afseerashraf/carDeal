@extends('layout.layout')
@section('title') list Brands @endsection
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Brand Name</th>
      <th  scope="col">Action</th>
      
 
     


    </tr>
  </thead>
  <tbody>
    @foreach($brandes as $brand)
    <tr>
      <td>{{  $loop->iteration  }}</td>
      <td>{{ $brand->name }}</td>
      <td><a href="{{ route('index') }}" class="btn btn-outline-success">New</a> <a href="{{route('edit.brand', encrypt($brand->id))}}" class="btn btn-outline-primary">Edit</a> <a href="{{ route('brand.delete', encrypt($brand->id)) }}" class="btn btn-outline-danger">Delete</a></td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection