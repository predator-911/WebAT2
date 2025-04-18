<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Admin: Upload Result Data</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = $_POST['json'];
        $data = json_decode($json, true);
        if ($data) {
            foreach ($data as $student) {
                db_set($student['StudentID'], $student);
            }
            echo "<div class='alert alert-success'>Data uploaded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Invalid JSON!</div>";
        }
    }
    ?>

    <form method="post">
        <div class="mb-3">
            <label for="json" class="form-label">Paste JSON Data</label>
            <textarea name="json" class="form-control" rows="10" required>[{ "StudentID": "1001", "Name": "Alice", "Semester": "1", "Subjects": { "Math": 85, "Physics": 90 }, "TotalMarks": 175, "Percentage": 87.5, "Class": "A" }]</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</body>
</html>
