<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-center">Welcome to the Home Page</h1>
        <p class="text-center">You don't have admin privileges.</p>
        <div class="text-center mt-4">
            <a href="/admin/login" class="btn btn-primary">Admin Login</a>
        </div>
    </div>
</body>
</html>
