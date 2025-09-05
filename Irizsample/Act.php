<?php

$Item = "Ballpen";
$Quanti = 10;
$Price = 20;
$FixedDiscount = 0.10;
$AmountCustomerPaid = 300;


$Totalbeforediscount = $Quanti * $Price;
$Discount = $Totalbeforediscount * $FixedDiscount;
$Totalafterdiscount = $Totalbeforediscount - $Discount;
$Change = $AmountCustomerPaid - $Totalafterdiscount;


echo "<b>Purchase Summary</b><br>";
echo "Item: $Item<br>";
echo "Quantity: $Quanti<br>";
echo "Price per item: ₱$Price<br>";
echo "Total before discount: ₱$Totalbeforediscount<br>";
echo "Discount (10%): ₱$Discount<br>";
echo "Total after discount: ₱$Totalafterdiscount<br>";
echo "Amount paid: ₱$AmountCustomerPaid<br>";
echo "Change: ₱$Change<br>";
?>