<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pupil Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: linear-gradient(to right, #dfe9f3, #ffffff);
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .btn-glow {
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.4);
            transition: all 0.3s ease;
        }
        .btn-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.6);
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card text-center">
        <div class="card-header bg-primary text-white">
            <h3>Pupil Dashboard</h3>
        </div>
        <div class="card-body">
            <p class="lead">Manage all pupil records with ease from here.</p>
            <div class="d-grid gap-3 col-6 mx-auto">
                <a href="add_pupils.php" class="btn btn-success btn-lg btn-glow">➕ Add New Pupil</a>
                <a href="view_pupils.php" class="btn btn-outline-primary btn-lg btn-glow">👁️ View Pupils</a>
                <a href="index.php" class="btn btn-secondary btn-lg btn-glow mt-3">⬅️ Back to Home</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
