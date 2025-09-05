<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Calculator</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Payroll Calculator</h4>
        </div>
        <div class="card-body">
            <form action="result.php" method="POST">
                <!-- Employee Name -->
                <div class="mb-3">
                    <label for="employeeName" class="form-label">Employee Name</label>
                    <input type="text" name="employeeName" id="employeeName" class="form-control" placeholder="Enter employee name" required>
                </div>

                <!-- Total Days of Work -->
                <div class="mb-3">
                    <label for="daysWorked" class="form-label">Total Days of Work</label>
                    <input type="number" name="daysWorked" id="daysWorked" class="form-control" placeholder="Enter days worked" required>
                </div>

                <!-- Daily Rate -->
                <div class="mb-3">
                    <label for="dailyRate" class="form-label">Daily Rate</label>
                    <input type="number" name="dailyRate" id="dailyRate" class="form-control" placeholder="Enter daily rate" required>
                </div>

                <!-- Cash Advance -->
                <div class="mb-3">
                    <label for="cashAdvance" class="form-label">Cash Advance</label>
                    <input type="number" name="cashAdvance" id="cashAdvance" class="form-control" placeholder="Enter cash advance" required>
                </div>

                <!-- Submit -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Generate Payslip</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>