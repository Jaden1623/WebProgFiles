<!DOCTYPE html>
<html>
<head>
    <title>Submitted Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .payslip {
            background: #fff;
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .payslip h2 {
            text-align: center;
            background: #198754;
            color: #fff;
            padding: 12px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .payslip p {
            margin: 9px 0;
            font-size: 15px;
        }
        .payslip strong {
            font-weight: bold;
        }
        .divider {
            border-top: 1px solid #ddd;
            margin: 15px 0;
        }
        .netpay {
            font-size: 18px;
            color: green;
            font-weight: bold;
        }
        .buttons {
            margin-top: 15px;
            text-align: center;
        }
        .buttons a, .buttons button {
            background: #1748ddff;
            color: white;
            border: none;
            padding: 8px 14px;
            margin: 5px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }
        .buttons a:hover, .buttons button:hover {
            background: #1748ddff;
        }
    </style>
</head>
<body><?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $course = $_POST['course'];
}
else{
    echo "<div class = 'alert alert-danger'>Please Input Datas to Continue.</div>";
    exit;
}
?>
    <div class="payslip">
        <h2>Student's Information</h2>
        <p><strong>Student's Name:</strong> <?= $fullname ?></p>
        <p><strong>Age:</strong> <?= $age ?></p>
        <p><strong>Grade:</strong> <?= $grade ?></p>
        <p><strong>Course:</strong> <?= $course ?></p>

        <div class="divider"></div>

        <p><strong>Tuition Fee:</strong></p>
        <p><strong>Age Discount:</strong></p>
        <p><strong>Total Discounts:</strong></p>
        <p><strong>Final Tuition Fee:</strong></p>

        <div class="buttons">
            <a href="course.php" class="btn btn-primary">Back</a>
        </div>
    </div>
</body>
</html>