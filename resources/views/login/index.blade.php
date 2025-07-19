<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>{{$title}}</title>
    <style>
        body {
            background-color: #f3f4f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-custom {
            background-color: #ffffff;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }
        .form-control-custom {
            background-color: #f9fafb;
            border: 1px solid #d1d5db;
            color: #111827;
        }
        .form-control-custom:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.25);
        }
        .btn-primary-custom {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }
        .btn-primary-custom:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }
        .btn-primary-custom:focus {
            box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
        }
    </style>
</head>
<body class="h-100">
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
        <div class="card card-custom rounded-lg">
            <div class="card-body p-4 p-sm-5">
                <h1 class="h4 fw-bold text-dark text-center mb-4">
                    Login
                </h1>
                <form class="needs-validation" action="/login" method="POST">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has ('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div>{{ session('success') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has ('loginerror'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div>{{ session('loginerror') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="email" class="form-label text-dark">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-custom" placeholder="Email" required>
                        <div class="invalid-feedback">
                            Harap masukkan email yang valid.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-dark">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-custom" required>
                        <div class="invalid-feedback">
                            Harap masukkan password Anda.
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <a href="#" class="text-sm text-decoration-none text-primary">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-primary-custom w-100 py-2">Login</button>
                    <p class="text-center text-muted mt-3">
                        Don’t have an account yet? <a href="/register" class="text-primary text-decoration-none fw-medium">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
