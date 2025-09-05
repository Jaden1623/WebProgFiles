
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-3">Student Course Registration</h3>
        <form action="backend.php" method="POST">

            <!-- Text Input -->
            <div class="mb-3">
                <label class="form-label">Full Name:</label>
                <input type="text" name="fullname" class="form-control" required>
            </div>

            <!-- Number Input Age -->
            <div class="mb-3">
                <label class="form-label">Age: <i>(5% Discount for age 26 to 30 only)</i></label>
                <input type="number" name="age" class="form-control" required>
            </div>

            <!-- Average Grade Input -->
            <div class="mb-3">
                <label class="form-label">Average Grade: <i>(20% Discount for grade 95 and above)</i></label>
                <input type="number" name="grade" class="form-control" min="60" max="100" required>
            </div>

            <!-- Select Dropdown -->
            <div class="mb-3">
                <label class="form-label">Select Course:</label>
                <select name="course" class="form-select" required>
                    <option value="">-- Choose Course --</option>
                    <option value="ACT">ACT (Associate in Computer Technology) P15,000</option>
                    <option value="HM">HM (Hospitality Management) P20,000</option>
                    <option value="BSOA">BSOA (Bachelor of Science in Office Administration) P18,000</option>
                </select>
            </div>

            <!-- Radio Buttons -->
            <div class="mb-3">
                <label class="form-label">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" value="Male" class="form-check-input" required>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" value="Female" class="form-check-input" required>
                    <label class="form-check-label">Female</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</body>
</html>
