<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
    <style>
        * {

            padding-left: 12px;
        }

        .continer {
            padding-top: 12px;
            text-decoration: none;
            margin-top: 150px;
            margin-left: 300px;
            font-style: oblique;
            background-color: #f2e7e5;
            width: 454px;
            height: 325px;
            box-shadow: 1px 1px 1px 1px;

        }

        input {
            width: 400px;
        }
    </style>
    @section('content')

    <div class="continer">
        <h3>Register Form</h3>
        <a href="{{ route('login') }}">already have an account</a>
        <form action="{{ route('agent.register') }}" method="post">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" class="form-controller" name="name" placeholder="Name"><br>
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <label for="email">email</label><br>
            <input type="email" class="form-controller" name="email" placeholder="email"><br>
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <label for="password">Password</label><br>
            <input type="password" class="form-controller" name="password" placeholder="password"><br><br>
            @error('password') <div class="alert alert-danger">{{ $message }}</div>@enderror
            <input type="submit" class="btn btn-outline-primary" value="register">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>

</html>