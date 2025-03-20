<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #ffffff;
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
        <div class="col-lg-5 col-md-7 col-sm-9">
            <div class="card p-4">
                <div class="card-header text-center bg-white border-0">
                    <h3 class="fw-bold text-primary">Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required />
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">Remember me</label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot your password?</a>
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3 bg-white">
                    <div class="small">
                        <a href="{{ route('register') }}" class="text-decoration-none text-primary">Don't have an account? Sign up</a>
                    </div>
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
