@extends('layout.layout')
@section('title') Create Brand @endsection

<style>
    /* Container for centering form */
    .container {
        margin-top: 10vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        
    }

    /* Form container styling */
    .form-container {
        background-color: #f2ebeb;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        text-align: center;
    }

    /* Input field styling */
    input[type="text"] {
        width: 100%;
        margin-top: 8px;
    }

    /* Row styling for brand images */
    .row {
        margin-top: 2rem;
        justify-content: center;
    }

    /* Image styling */
    .brand-logo {
        height: 100px;
        width: 130px;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Image hover effect */
    .brand-logo:hover {
        transform: scale(1.1) rotate(-3deg);
    }
</style>

@section('content')


<div class="container">
    <!-- Form container -->
    <div class="form-container">
       
        <form action="{{ route('create.brand') }}" method="post">
            @csrf
            <label for="brand">Brand Name</label><br>
            <input type="text" name="brandName" id="brand-name-input" placeholder="Enter brand name" required>
            @error('brandName') 
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br><br>
            <input type="submit" class="btn btn-outline-success" value="Add Brand">
        </form>
        <a href="{{ route('agent.logout', encrypt($agent->id)) }}" class="btn btn-danger">Logout</a>

    </div>

    <!-- Brand images for selection -->
    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <img src="{{ asset('brands/hundai.jpeg') }}" alt="Hyundai" value="Hyundai" class="brand-logo">
        </div>
        <div class="col-md-4 mb-4">
            <img src="{{ asset('brands/suzuki.png') }}" alt="Suzuki" value="Suzuki" class="brand-logo">
        </div>
        <div class="col-md-4 mb-4">
            <img src="{{ asset('brands/toyota.jpeg') }}" alt="Toyota" value="Toyota" class="brand-logo">
        </div>
        <div class="col-md-4 mb-4">
            <img src="{{ asset('brands/renault.jpeg') }}" alt="Renault" value="Renault" class="brand-logo">
        </div>
        <div class="col-md-4 mb-4">
            <img src="{{ asset('brands/honda.jpeg') }}" alt="Honda" value="Honda" class="brand-logo">
        </div>
        <div class="col-md-4 mb-4">
            <img src="{{ asset('brands/benz.jpeg') }}" alt="Mercedes-Benz" value="Mercedes-Benz" class="brand-logo">
        </div>
    </div>
</div>

<!-- jQuery script to autofill brand name input on image click -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.brand-logo').on('click', function() {
            var brandName = $(this).attr('value');
            $('#brand-name-input').val(brandName);
        });
    });
</script>
@endsection
