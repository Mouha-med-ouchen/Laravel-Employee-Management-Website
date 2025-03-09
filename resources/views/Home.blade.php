<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Home Page</title>
    <style>
        /* تحسين مظهر الهيدر */
        .hero {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 80px 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .card {
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .custom-card {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 30px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    .custom-card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    .icon-style {
        font-size: 40px;
        color: #007bff;
        margin-bottom: 15px;
    }
    .card-title {
        font-weight: bold;
        color: #333;
    }
    .card-text {
        color: #555;
    }
    </style>
</head>
<body>

@include('layouts.nav')

<div class="container mt-5">
    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to Our Website</h1>
        <p>Your go-to platform for amazing services and products.</p>
        <a href="{{route('showemployee')}}" class="btn btn-light btn-lg mt-3">Get Started</a>
    </div>

    <!-- Cards Section -->
    <div class="container my-5">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card custom-card shadow-lg">
                <div class="card-body">
                    <i class="bi bi-star-fill icon-style"></i>
                    <h5 class="card-title">Premium Quality</h5>
                    <p class="card-text">Enjoy top-tier services with the best quality standards.</p>
                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card shadow-lg">
                <div class="card-body">
                    <i class="bi bi-lightning-fill icon-style"></i>
                    <h5 class="card-title">Fast & Secure</h5>
                    <p class="card-text">Experience lightning-fast and highly secure solutions.</p>
                    <a href="#" class="btn btn-outline-success">Explore Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-card shadow-lg">
                <div class="card-body">
                    <i class="bi bi-people-fill icon-style"></i>
                    <h5 class="card-title">Community Support</h5>
                    <p class="card-text">Join a growing community with outstanding support.</p>
                    <a href="#" class="btn btn-outline-danger">Join Today</a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
