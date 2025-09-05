<?php
$age = 18;

if ($age >= 0 && $age <=12) {
   echo "You are Minor.";
}
elseif ($age >= 13 && $age <=17) {
     echo "Still a Minor.";
}
elseif ($age >= 18 && $age <=59) {
     echo "Adulthood Baybehh.";
}
else {
    echo "Closer to Heaven.";
}

?>