<?php
// Define exchange rates relative to USD
$exchangeRates = [
  "USD" => 1,
  "EUR" => 0.9,
  "GBP" => 0.75,
  "JPY" => 110,
  "INR" => 82,
  "PHP" => 56.5,
  "KRW" => 1300,
];

// Simulate last update date
$lastUpdate = new DateTime("2025-08-20");
$today = new DateTime();

$diffDays = $lastUpdate->diff($today)->days;

$resultMessage = "";
$resultType = "";
$warningMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = isset($_POST["amount"]) ? floatval($_POST["amount"]) : 0;
    $fromCurrency = $_POST["fromCurrency"] ?? "";
    $toCurrency = $_POST["toCurrency"] ?? "";

    if ($amount <= 0) {
        $resultMessage = "Please enter a valid positive amount.";
        $resultType = "danger";
    } elseif ($fromCurrency === $toCurrency) {
        $resultMessage = "Please select two different currencies.";
        $resultType = "danger";
    } elseif (isset($exchangeRates[$fromCurrency]) && isset($exchangeRates[$toCurrency])) {
        $amountInUSD = $amount / $exchangeRates[$fromCurrency];
        $convertedAmount = $amountInUSD * $exchangeRates[$toCurrency];
        $resultMessage = number_format($amount, 2) . " $fromCurrency = " . number_format($convertedAmount, 2) . " $toCurrency";
        $resultType = "success";

        if ($diffDays > 7) {
            $warningMessage = "⚠️ Exchange rates were last updated $diffDays days ago. Rates may be outdated.";
        }
    } else {
        $resultMessage = "Invalid currency selected.";
        $resultType = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Currency Converter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .converter-card {
      max-width: 400px;
      margin: 50px auto;
      padding: 30px;
      border-radius: 8px;
      background-color: #ffffff;
    }

    .converter-card .form-control,
    .converter-card .form-select {
      font-size: 0.9rem;
      padding: 6px 10px;
    }

    footer {
      margin-top: 50px;
      text-align: center;
      padding: 20px 0;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Currency Converter</a>
    </div>
  </nav>

  <!-- Converter Card -->
  <div class="converter-card shadow-sm">
    <h3 class="mb-4 text-center">Convert Your Currency</h3>
    <form method="POST" action="">
      <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input
          type="number"
          step="0.01"
          class="form-control"
          id="amount"
          name="amount"
          placeholder="Enter amount"
          value="<?= isset($_POST['amount']) ? htmlspecialchars($_POST['amount']) : '' ?>"
          required
        />
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="fromCurrency" class="form-label">From</label>
          <select class="form-select" id="fromCurrency" name="fromCurrency" required>
            <?php foreach ($exchangeRates as $code => $rate): ?>
              <option value="<?= $code ?>" <?= (isset($_POST['fromCurrency']) && $_POST['fromCurrency'] == $code) ? 'selected' : '' ?>>
                <?= $code ?> - <?= currencyName($code) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-6">
          <label for="toCurrency" class="form-label">To</label>
          <select class="form-select" id="toCurrency" name="toCurrency" required>
            <?php foreach ($exchangeRates as $code => $rate): ?>
              <option value="<?= $code ?>" <?= (isset($_POST['toCurrency']) && $_POST['toCurrency'] == $code) ? 'selected' : '' ?>>
                <?= $code ?> - <?= currencyName($code) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <!-- Centered Button -->
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Convert</button>
      </div>
    </form>

    <?php if (!empty($resultMessage)): ?>
      <div id="result" class="alert alert-<?= $resultType ?> mt-4 d-flex align-items-center justify-content-center">
        <?= $resultMessage ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($warningMessage)): ?>
      <div id="warning" class="alert alert-warning mt-3">
        <?= $warningMessage ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <small>© Dizon, Iriz C. From ACT - 2E.</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Helper function to show full currency names
function currencyName($code) {
    return match($code) {
        "USD" => "US Dollar",
        "EUR" => "Euro",
        "GBP" => "British Pound",
        "JPY" => "Japanese Yen",
        "INR" => "Indian Rupee",
        "PHP" => "Philippine Peso",
        "KRW" => "South Korean Won",
        default => $code,
    };
}
?>
