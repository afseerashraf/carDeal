@extends('layout.layout')
@section('title') list Brands @endsection
<style>
 
</style>
@section('page')Available Brands @endsection
@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Action</th>
   </tr>
  </thead>
  <tbody>
    @foreach($brandes as $brand)
    <tr>
      <td>{{ $loop->iteration  }}</td>
      <td>{{ $brand->name }}</td>
      <td>
        <a href="{{ route('index') }}" class="btn btn-outline-success">Add New Brand</a>
        <a href="{{route('edit.brand', encrypt($brand->id))}}" class="btn btn-outline-primary">Edit</a>
        <a href="{{ route('brand.delete', encrypt($brand->id)) }}" class="btn btn-outline-danger">Delete</a>
        @if(filled($brand->deleted_at))<a href="{{ route('brand.restore', encrypt($brand->id)) }}" class="btn btn-outline-danger">Restore</a>@endif

      </td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection