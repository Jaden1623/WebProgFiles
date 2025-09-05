<!DOCTYPE html>
<html>
<head>
    <title>Employee Payslip</title>
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
    $employeeName = $_POST['employeeName'];
    $daysWorked = $_POST['daysWorked'];
    $dailyRate = $_POST['dailyRate'];
    $cashAdvance = $_POST['cashAdvance'];

    $grossPay = $daysWorked * $dailyRate;
    $tax = $grossPay * 0.02;    
    $sss = $grossPay * 0.015;   
    $pagibig = 50;
    $totalDeductions = $tax + $sss + $pagibig + $cashAdvance;
    $netPay = $grossPay - $totalDeductions;
}
else{
    echo "<div class = 'alert alert-danger'>Please Input Datas to Continue.</div>";
    exit;
}
?>
    <div class="payslip">
        <h2>Employee Payslip</h2>
        <p><strong>Employee Name:</strong> <?= $employeeName ?></p>
        <p><strong>Total Days Worked:</strong> <?= $daysWorked ?></p>
        <p><strong>Daily Rate:</strong> ₱<?= number_format($dailyRate, 2) ?></p>

        <div class="divider"></div>

        <p><strong>Gross Pay:</strong> ₱<?= number_format($grossPay, 2) ?></p>
        <p><strong>Tax (2%):</strong> ₱<?= number_format($tax, 2) ?></p>
        <p><strong>SSS (1.5%):</strong> ₱<?= number_format($sss, 2) ?></p>
        <p><strong>Pag-IBIG:</strong> ₱<?= number_format($pagibig, 2) ?></p>
        <p><strong>Cash Advance:</strong> ₱<?= number_format($cashAdvance, 2) ?></p>

        <div class="divider"></div>

        <p><strong>Total Deductions:</strong> ₱<?= number_format($totalDeductions, 2) ?></p>
        <p class="netpay">Net Pay: ₱<?= number_format($netPay, 2) ?></p>

        <div class="buttons">
            <a href="frontend.php" class="btn btn-primary">Back</a>
            <button onclick="window.print()">Print Payslip</button>
        </div>
    </div>
</body>
</html>