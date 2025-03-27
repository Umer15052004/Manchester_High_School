<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manchester High School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .hero {
            background: linear-gradient(to right, #007bff, #6c63ff);
            color: white;
            padding: 60px 20px;
            text-align: center;
            border-radius: 0 0 20px 20px;
        }
        .section-title {
            margin-top: 60px;
            margin-bottom: 20px;
        }
        .why-box {
            background-color: #f1f3f5;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body class="bg-light">

<!-- 🌐 NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Manchester High School</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index_pupils.php">Pupils</a></li>
                <li class="nav-item"><a class="nav-link" href="index_parents.php">Parents</a></li>
                <li class="nav-item"><a class="nav-link" href="index_teachers.php">Teachers</a></li>
                <li class="nav-item"><a class="nav-link" href="index_class.php">Class</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- 🎓 HERO -->
<div class="hero">
    <h1 class="display-4 fw-bold">Welcome to Manchester High School</h1>
    <p class="lead">Empowering minds. Shaping futures.</p>
</div>

<!-- 📖 ABOUT US -->
<div class="container">
    <div class="section-title text-center">
        <h2>About Us</h2>
        <p class="text-muted">Who we are & what we stand for</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <p>
                Manchester High School is a vibrant, inclusive primary school dedicated to academic excellence,
                creativity, and emotional growth. With experienced educators and a strong community focus, we aim to
                prepare every child for a successful future in a supportive and engaging environment.
            </p>
        </div>
    </div>

    <!-- ⭐ WHY US -->
    <div class="section-title text-center">
        <h2>Why Manchester High School?</h2>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="why-box">
                <h5>✔️ Outstanding Teachers</h5>
                <p>Our qualified staff are passionate about nurturing every child's potential.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="why-box">
                <h5>✔️ Safe & Modern Facilities</h5>
                <p>Clean, secure, and tech-enabled classrooms and recreational spaces.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="why-box">
                <h5>✔️ Family-Centered Culture</h5>
                <p>Strong communication and involvement with parents and guardians.</p>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer class="text-center mt-5 p-4 bg-white text-muted">
    &copy; <?= date('Y') ?> Manchester High School. All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
