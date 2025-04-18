<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>University Result System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Student Result Portal</h2>
    <form action="result.php" method="get">
        <div class="mb-3">
            <label for="student_id" class="form-label">Enter Student ID</label>
            <input type="text" class="form-control" id="student_id" name="id" required>
        </div>
        <button type="submit" class="btn btn-primary">View Result</button>
    </form>
    <hr>
    <a href="upload.php" class="btn btn-secondary">Admin: Upload Results</a>
    <a href="class_results.php" class="btn btn-success">Download Class Results</a>
</body>
</html>
