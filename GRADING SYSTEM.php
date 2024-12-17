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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Conversion Tool</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }
        .container {
            background: #fff;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: bold;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        input[type="text"] {
            width: 80%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
        }
        input[type="text"]:focus {
            border-color: #007bff;
        }
        button {
            width: 80%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            font-size: 1.1rem;
            font-weight: bold;
            line-height: 1.5;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Grading System Conversion Tool</h2>
    <form method="POST" action="">
        <label for="score">Enter the grade (0-100):</label>
        <input type="text" name="score" id="score" placeholder="Enter Grade" required>
        <button type="submit">Convert Grade</button>
    </form>

    <?php if ($message): ?>
        <div class="message">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
