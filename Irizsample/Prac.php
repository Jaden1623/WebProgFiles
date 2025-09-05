<?php
$age = 18;
$gender = "Female";

echo "Your Age is: $age <br>";
echo "Your Gender is: $gender <br>";

if ($gender ==  "Female") {
    if ($age == 18) {
        echo "You are a Debutant";
    }
    else {
        echo "You're Female but not Debutant.";
    }
}
elseif ($gender == "Male") {
    if ($age == 21) {
     echo "You are a Debutant";
    }
    else {
        echo "You're Male but not Debutant.";
    }
}
else {
    echo"Please Input information.";
}
?>