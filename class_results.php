<?php require 'db.php';

$students = db_all();

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="class_results.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['StudentID', 'Name', 'Semester', 'Subject', 'Marks', 'Total', 'Percentage', 'Class']);

foreach ($students as $student) {
    foreach ($student['Subjects'] as $subject => $marks) {
        fputcsv($output, [
            $student['StudentID'],
            $student['Name'],
            $student['Semester'],
            $subject,
            $marks,
            $student['TotalMarks'],
            $student['Percentage'],
            $student['Class']
        ]);
    }
}
fclose($output);
exit;
