<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
    <style>
        /* Reset default padding for all elements */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        /* Centered container styling */
        .container {
            max-width: 500px;
            margin: 10vh auto;
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Input and label styling */
        label {
            font-weight: bold;
            margin-top: 1rem;
        }

        input.form-control {
            margin-bottom: 1rem;
        }

        /* Adjust link styling */
        a {
            display: inline-block;
            margin-bottom: 1.5rem;
            text-decoration: none;
            color: #0d6efd;
        }

        /* Improved button styling */
        .btn-primary {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center mb-4">Register Form</h3>
        <a href="{{ route('login') }}">Already have an account?</a>
        <form action="{{ route('agent.register') }}" method="post">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Name" required>
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror

            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror

            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
            @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror

            <button type="submit" class="btn btn-primary mt-3">Register</button>
        </form>
    </div>

    <!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
