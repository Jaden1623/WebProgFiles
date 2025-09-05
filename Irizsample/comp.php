<?php
$n1 = $_POST ['num1'];
$n2 = $_POST ['num2'];
$n3 = $_POST ['num3'];
$n4 = $_POST ['num4'];

$sum = $n1 + $n2;
$diff = $n4 - $n3;
$prod = $n1 * $n3;
$quo = $n2 / $n3;
$ave = ($n1 + $n2 + $n3 + $n4) / 4;

echo "The Sum of $n1 and $n2 is: $sum <br>";
echo "The Difference of $n4 and $n3 is: $diff <br>";
echo "The Product of $n1 and $n3 is: $prod <br>";
echo "The Quotient of $n2 and $n3 is:", round ($quo, 2);
echo "<br>The Average of $n1, $n2, $n3 and $n4 is: $ave <br>";
?>