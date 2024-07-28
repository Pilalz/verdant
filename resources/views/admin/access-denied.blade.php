<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger text-center">
                    <h1>Access Denied</h1>
                    <p>You do not have permission to access this page.</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Return to Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
