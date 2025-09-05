<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Currency Converter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Background gradient */
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      padding: 40px 15px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
    }

    /* Navbar customizations */
    .navbar {
      width: 100%;
      max-width: 960px;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
      background-color: #5a4da7 !important;
      margin-bottom: 30px;
      transition: background-color 0.3s ease;
    }
    .navbar-brand {
      font-weight: 700;
      font-size: 1.6rem;
      letter-spacing: 1.2px;
      color: #f0e9ff !important;
      user-select: none;
    }
    .navbar-nav .nav-link {
      color: #d9cfff !important;
      font-weight: 600;
      transition: color 0.3s ease;
    }
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      color: #fff !important;
      text-shadow: 0 0 5px #e0d4ff;
    }
    .navbar-toggler {
      border-color: #d9cfff !important;
    }
    .navbar-toggler-icon {
      filter: invert(90%) sepia(70%) saturate(300%) hue-rotate(260deg);
    }

    /* Converter card */
    .converter-card {
      max-width: 480px;
      width: 100%;
      background: #ffffffee;
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
      backdrop-filter: saturate(180%) blur(20px);
      -webkit-backdrop-filter: saturate(180%) blur(20px);
      transition: box-shadow 0.3s ease;
    }
    .converter-card:hover {
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
    }
    .converter-card h3 {
      font-weight: 700;
      margin-bottom: 1.8rem;
      color: #5a4da7;
      text-align: center;
      letter-spacing: 1.2px;
    }

    /* Form labels */
    label.form-label {
      font-weight: 600;
      color: #4b3b94;
    }

    /* Inputs */
    input.form-control,
    select.form-select {
      border-radius: 12px;
      border: 1.8px solid #9c8ddc;
      padding: 0.7rem 1.1rem;
      font-size: 1rem;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    input.form-control:focus,
    select.form-select:focus {
      border-color: #6f57e1;
      box-shadow: 0 0 8px #7e6ff1a8;
      outline: none;
    }

    /* Button */
    button.btn-primary {
      background: linear-gradient(135deg, #6f57e1 0%, #764ba2 100%);
      border: none;
      border-radius: 30px;
      padding: 12px 0;
      font-weight: 700;
      font-size: 1.15rem;
      letter-spacing: 0.05rem;
      transition: background 0.35s ease, box-shadow 0.3s ease;
      box-shadow: 0 8px 15px rgba(111, 87, 225, 0.5);
      cursor: pointer;
      display: block;
      margin: 1.5rem auto 0 auto; /* Center button */
      width: 50%;
      min-width: 180px;
    }
    button.btn-primary:hover {
      background: linear-gradient(135deg, #7e6ff1 0%, #6a3c91 100%);
      box-shadow: 0 12px 25px rgba(126, 111, 241, 0.7);
    }
    button.btn-primary:focus {
      outline: none;
      box-shadow: 0 0 12px 3px #a392f7;
    }

    /* Alerts */
    #result {
      font-size: 1.3rem;
      font-weight: 700;
      color: #2a2a72;
      background: #e0d9ff;
      border-radius: 15px;
      padding: 15px 25px;
      box-shadow: 0 8px 20px rgba(111, 87, 225, 0.3);
      text-align: center;
      user-select: none;
      letter-spacing: 0.05rem;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      margin-top: 1.5rem;
      display: none;
    }
    #result.alert-success {
      background: linear-gradient(135deg, #b3f6b3 0%, #3cc13c 100%);
      color: #145214;
      box-shadow: 0 8px 25px rgba(56, 145, 56, 0.6);
      display: block;
    }
    #result.alert-danger {
      background: linear-gradient(135deg, #f6b3b3 0%, #c13c3c 100%);
      color: #5a1212;
      box-shadow: 0 8px 25px rgba(193, 60, 60, 0.6);
      display: block;
    }

    #warning {
      font-size: 1rem;
      font-weight: 600;
      background: #fff8dc;
      color: #665500;
      border-radius: 12px;
      padding: 12px 20px;
      box-shadow: 0 4px 15px rgba(204, 204, 0, 0.3);
      text-align: center;
      user-select: none;
      margin-top: 20px;
      display: none;
    }

    /* Footer */
    footer {
      max-width: 960px;
      width: 100%;
      margin-top: 60px;
      padding: 15px 0;
      text-align: center;
      color: #ddd;
      font-weight: 500;
      font-size: 0.9rem;
      user-select: none;
    }

    /* Responsive */
    @media (max-width: 540px) {
      .converter-card {
        padding: 30px 20px;
      }
      .navbar {
        border-radius: 10px;
      }
      button.btn-primary {
        width: 80%;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Currency Converter</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      </div>
    </div>
  </nav>

  <!-- Converter Card -->
  <div class="converter-card shadow-sm">
    <h3 class="mb-4 text-center">Convert Your Currency</h3>
    <form id="converterForm">
      <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input
          type="number"
          step="0.01"
          class="form-control"
          id="amount"
          placeholder="Enter amount"
          required
        />
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="fromCurrency" class="form-label">From</label>
          <select class="form-select" id="fromCurrency" required>
            <option value="USD" selected>USD - US Dollar</option>
            <option value="EUR">EUR - Euro</option>
            <option value="GBP">GBP - British Pound</option>
            <option value="JPY">JPY - Japanese Yen</option>
            <option value="INR">INR - Indian Rupee</option>
            <option value="PHP">PHP - Philippine Peso</option>
            <option value="KRW">KRW - South Korean Won</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="toCurrency" class="form-label">To</label>
          <select class="form-select" id="toCurrency" required>
            <option value="EUR">EUR - Euro</option>
            <option value="USD" selected>USD - US Dollar</option>
            <option value="GBP">GBP - British Pound</option>
            <option value="JPY">JPY - Japanese Yen</option>
            <option value="INR">INR - Indian Rupee</option>
            <option value="PHP">PHP - Philippine Peso</option>
            <option value="KRW">KRW - South Korean Won</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Convert</button>
    </form>

    <div id="result" class="alert d-flex align-items-center justify-content-center"></div>
    <div id="warning" class="alert alert-warning"></div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <small>© Dizo, Iriz C. From  ACT - 2E.</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Sample fixed exchange rates relative to USD
    const exchangeRates = {
      USD: 1,
      EUR: 0.9,
      GBP: 0.75,
      JPY: 110,
      INR: 82,
      PHP: 56.5,  
      KRW: 1300, 
    };

    // Simulate last update date of rates
    const lastUpdate = new Date('2025-08-20'); // Example update date
    const today = new Date();

    const form = document.getElementById('converterForm');
    const resultDiv = document.getElementById('result');
    const warningDiv = document.getElementById('warning');

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      const amount = parseFloat(document.getElementById('amount').value);
      const fromCurr = document.getElementById('fromCurrency').value;
      const toCurr = document.getElementById('toCurrency').value;

      if (isNaN(amount) || amount <= 0) {
        showResult('Please enter a valid positive amount.', 'danger');
        warningDiv.style.display = 'none';
        return;
      }
      if (fromCurr === toCurr) {
        showResult('Please select two different currencies.', 'danger');
        warningDiv.style.display = 'none';
        return;
      }

      // Convert amount to USD first, then to target currency
      const amountInUSD = amount / exchangeRates[fromCurr];
      const convertedAmount = amountInUSD * exchangeRates[toCurr];

      showResult(
        `${amount.toFixed(2)} ${fromCurr} = ${convertedAmount.toFixed(2)} ${toCurr}`,
        'success'
      );

      // Check if rates are older than 7 days
      const diffTime = Math.abs(today - lastUpdate);
      const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

      if (diffDays > 7) {
        warningDiv.textContent = `⚠️ Exchange rates were last updated ${diffDays} days ago. Rates may be outdated.`;
        warningDiv.style.display = 'block';
      } else {
        warningDiv.style.display = 'none';
      }
    });

    function showResult(message, type) {
      resultDiv.textContent = message;
      resultDiv.className = `alert mt-4 d-flex align-items-center justify-content-center`;
      resultDiv.classList.add(`alert-${type}`);
      resultDiv.style.display = 'block';
    }
  </script>
</body>
</html>
