<?php require 'db.php';

$student = null;
if (isset($_GET['id'])) {
    $student = db_get($_GET['id']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<?php if ($student): ?>
    <h2>Result for <?= htmlspecialchars($student['Name']) ?> (<?= htmlspecialchars($student['StudentID']) ?>)</h2>
    <p><strong>Semester:</strong> <?= htmlspecialchars($student['Semester']) ?></p>
    <ul class="list-group mb-3">
        <?php foreach ($student['Subjects'] as $subject => $mark): ?>
            <li class="list-group-item"><?= htmlspecialchars($subject) ?>: <?= $mark ?></li>
        <?php endforeach; ?>
    </ul>
    <p><strong>Total Marks:</strong> <?= $student['TotalMarks'] ?></p>
    <p><strong>Percentage:</strong> <?= $student['Percentage'] ?>%</p>
    <p><strong>Class:</strong> <?= $student['Class'] ?></p>
    <a href="index.php" class="btn btn-secondary mt-3">Back</a>
<?php else: ?>
    <div class="alert alert-danger">Student not found.</div>
    <a href="index.php" class="btn btn-secondary mt-3">Back</a>
<?php endif; ?>
</body>
</html>
