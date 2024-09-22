@extends('layout.layout')
@section('title') Agent Registerform @endsection
<style>
   *{
       
       padding-left: 12px;
   }
   .continer{
       padding-top: 12px;
       text-decoration: none;
       margin-top: 150px;
       margin-left: 300px;
       font-style: oblique;
       background-color:#f2e7e5;
       width: 454px;
       height: 309px;
       box-shadow: 1px 1px 1px 1px;
       
   }
   input{
       width: 400px;
   }
   form p{
    padding-left: 166px;
    padding-top: 35px;
   }
</style>
@section('content')

<div class="continer">
    <h3>Logim Form</h3>
    <a href="{{ route('register') }}">Register</a>
    <form action="{{ route('agent.dologin') }}" method="post">
    @csrf
    <label for="email">email</label><br>
    <input type="email" class="form-controller" name="email" placeholder="email"><br>
    @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
    <label for="password">Password</label><br>
    <input type="password" class="form-controller" name="password" placeholder="password"><br><br>
    @error('password') <div class="alert alert-danger">{{ $message }}</div>@enderror
    <input type="submit" class="btn btn-outline-primary" value="Login">
    <p>cardealing</p>
    </form>
</div>

@endsection