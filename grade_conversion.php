<?php

function convertGrade($score) {
    if ($score >= 96 && $score <= 100) return "1.0";
    elseif ($score >= 94) return "1.25 Excellent";
    elseif ($score >= 91) return "1.50 Very Good";
    elseif ($score >= 88) return "1.75 Very Good";
    elseif ($score >= 85) return "2.00 Good";
    elseif ($score >= 83) return "2.25 Good";
    elseif ($score >= 80) return "2.50 Fair";
    elseif ($score >= 78) return "2.75 Fair";
    elseif ($score >= 75) return "3.00 Pass";
    else return "5.0 Failure";
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $score = trim($_POST['score']);
    if (is_numeric($score)) {
        $score = (int)$score; // Convert to integer
        if ($score >= 0 && $score <= 100) {
            $universityGrade = convertGrade($score);
            $message = "The grade is $score, and the university grade is: <strong>$universityGrade</strong>.";
        } else {
            $message = "<span class='error'>Error: Invalid grade. Please enter a grade between 0 and 100.</span>";
        }
    } else {
        $message = "<span class='error'>Error: Invalid input. Please enter a numeric grade.</span>";
    }
}
?>
