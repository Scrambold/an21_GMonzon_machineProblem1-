<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterms</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 20px;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 90vh;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            margin-bottom: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50; /* Green header */
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .grade-A { color: #28a745; font-weight: bold; } /* Green */
        .grade-B { color: #007bff; font-weight: bold; } /* Blue */
        .grade-C { color: #ffc107; font-weight: bold; } /* Orange/Yellow */
        .grade-D { color: #fd7e14; font-weight: bold; } /* Dark Orange */
        .grade-F { color: #dc3545; font-weight: bold; } /* Red */
    </style>
</head>
<body>

    <div class="container">
        <h1>Student Final Grade Calculation</h1>

        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Class Participation (Avg of 5 EAs)</th>
                    <th>Summative Grade (Avg of 3 SAs)</th>
                    <th>Final Exam</th>
                    <th>Final Grade</th>
                    <th>Letter Grade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $students_raw_grades = [
                    [
                        'name' => 'Gabriel Monzon',
                        'enabling_assessments' => [85, 90, 88, 92, 87], 
                        'summative_assessments' => [78, 85, 82],     
                        'final_exam' => 90
                    ],
                    [
                        'name' => 'Jeff Galvan',
                        'enabling_assessments' => [70, 75, 72, 78, 73],
                        'summative_assessments' => [65, 70, 68],
                        'final_exam' => 75
                    ],
                    [
                        'name' => 'Rysen Siason',
                        'enabling_assessments' => [95, 98, 92, 90, 97],
                        'summative_assessments' => [90, 95, 93],
                        'final_exam' => 88
                    ],
                    [
                        'name' => 'Neil Lim',
                        'enabling_assessments' => [60, 65, 58, 62, 60],
                        'summative_assessments' => [50, 55, 52],
                        'final_exam' => 58
                    ],
                    [
                        'name' => 'Mark Zuckerberg',
                        'enabling_assessments' => [80, 82, 79, 85, 81],
                        'summative_assessments' => [75, 78, 76],
                        'final_exam' => 82
                    ]
                ];

               
                
                foreach ($students_raw_grades as $student) {
                    $student_name = $student['name'];
                    $enabling_assessments = $student['enabling_assessments'];
                    $summative_assessments = $student['summative_assessments'];
                    $final_exam = $student['final_exam'];

                    
                    $class_participation_sum = array_sum($enabling_assessments);
                    $class_participation_grade = $class_participation_sum / count($enabling_assessments);

                    
                    $summative_grade_sum = array_sum($summative_assessments);
                    $summative_grade = $summative_grade_sum / count($summative_assessments);

                    
                   
                    $final_grade = ($class_participation_grade * 0.30) +
                                   ($summative_grade * 0.40) +
                                   ($final_exam * 0.30);

                   
                    $final_grade = round($final_grade, 2);

                  
                    $letter_grade = '';
                    $grade_class = ''; 
                    if ($final_grade >= 90) {
                        $letter_grade = 'A';
                        $grade_class = 'grade-A';
                    } elseif ($final_grade >= 80) {
                        $letter_grade = 'B';
                        $grade_class = 'grade-B';
                    } elseif ($final_grade >= 70) {
                        $letter_grade = 'C';
                        $grade_class = 'grade-C';
                    } elseif ($final_grade >= 60) {
                        $letter_grade = 'D';
                        $grade_class = 'grade-D';
                    } else {
                        $letter_grade = 'F';
                        $grade_class = 'grade-F';
                    }

                    
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($student_name) . '</td>';
                    echo '<td>' . round($class_participation_grade, 2) . '</td>';
                    echo '<td>' . round($summative_grade, 2) . '</td>';
                    echo '<td>' . $final_exam . '</td>';
                    echo '<td>' . $final_grade . '</td>';
                    echo '<td class="' . $grade_class . '">' . $letter_grade . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>