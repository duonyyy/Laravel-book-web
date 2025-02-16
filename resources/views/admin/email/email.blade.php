<!DOCTYPE html>
<html>
<head>
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow-sm">
            <!-- Header Section -->
            <div class="card-header bg-primary text-white text-center">
                <h1 class="h4 mb-0">{{ $subject }}</h1>
            </div>

            <!-- Body Section -->
            <div class="card-body">
                <p class="text-muted">{{ $body }}</p>
                <div class="text-center mt-3">
                    <a href="http://127.0.0.1:8000/" class="btn btn-primary">Visit Our Website</a>
                </div>
            </div>

            <!-- Footer Section -->
            <div class="card-footer bg-light text-center text-muted small">
                &copy; {{ date('Y') }} Your Company. All Rights Reserved.
            </div>
        </div>
    </div>
</body>
</html>
