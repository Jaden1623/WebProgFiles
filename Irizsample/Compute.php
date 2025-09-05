<!DOCTYPE html>
<html>
<head>
    <title>Purchase Calculator</title>
</head>
<body>
    <h2>Simple Purchase Calculator</h2>

    <form method="post">
        <label for="quantity">Enter Quantity:</label>
        <input type="number" name="quantity" id="quantity" required>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $quantity = $_POST['quantity'];
        $price_per_item = 25;
        $total = $quantity * $price_per_item;

        // Apply discount if total is greater than $100
        if ($total > 100) {
            $discount = $total * 0.10;
            $final_total = $total - $discount;
            echo "<p>Total: $$total</p>";
            echo "<p>Discount: $$discount (10%)</p>";
            echo "<p><strong>Final Total: $$final_total</strong></p>";
        } else {
            echo "<p><strong>Total: $$total</strong> (No discount applied)</p>";
        }
    }
    ?>
</body>
</html>
