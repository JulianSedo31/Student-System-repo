<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            color: #333;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        footer {
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card p-4">
                <div class="card-header text-center bg-white border-0">
                    <h3 class="fw-bold text-primary">Create Account</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control" name="name" required autofocus />
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email" required />
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required />
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required />
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="address" class="form-control" name="address" required />
                            </div>
                            <div class="col-md-6">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" id="age" class="form-control" name="age" required />
                            </div>
                            <div class="col-md-6">
                                <label for="moto" class="form-label">Moto</label>
                                <input type="text" id="moto" class="form-control" name="moto" required />
                            </div>
                            <div class="col-md-6">
                                <label for="college_level" class="form-label">College Level</label>
                                <input type="text" id="college_level" class="form-control" name="college_level" required />
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('login') }}" class="text-decoration-none">Already registered?</a>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="mt-4">
                <p class="text-muted">Copyright &copy; Your Website 2023</p>
                <a href="#" class="text-decoration-none">Privacy Policy</a> &middot; 
                <a href="#" class="text-decoration-none">Terms & Conditions</a>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
