<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>View Teachers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4>All Teachers</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr><th>ID</th><th>Name</th><th>Phone</th><th>Salary</th><th>Background</th><th>Class ID</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM teachers");
                    while ($row = $result->fetch_assoc()) {
                        $bg = $row['background_check'] ? '✅' : '❌';
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['phone']}</td>
                            <td>£{$row['salary']}</td>
                            <td>$bg</td>
                            <td>{$row['class_id']}</td>
                            <td>
                                <a href='update_teachers.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                                <a href='delete_teachers.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Delete this teacher?')\">Delete</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="index_teachers.php" class="btn btn-link">← Back</a>
        </div>
    </div>
</div>
</body>
</html>
