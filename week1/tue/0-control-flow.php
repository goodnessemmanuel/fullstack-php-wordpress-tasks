<?php 


$age  = 18;
$subscription = false; // true


// ==
// === (test identity)


$a = true;
$b = true;

if($a === $b) {
    echo "True statement\n";
}

if ( $age >= 18 && $subscription) {
   echo "Welcome to members area\n";
} else {
    echo "Sign up\n";
}


$grade = 60;

// IF
if ($grade <= 50) {
    echo "D";
} elseif($grade > 50 && $grade < 60) {
    echo "C";
}elseif($grade >= 60 && $grade < 70) {
    echo "B";
}elseif($grade >= 70 && $grade < 80) {
    echo "A";
}else {
    echo "A+";
}


if(true || false) {
    echo "This is true\n";
}else{
    echo "Nothing is true";
}



$grade = 20;
// switch
switch($grade) {
        case 18:
            echo "18"; // fallthrough
        break;
        case 19:
            echo "19";
        break;
        case 20:
            echo "20";
        break;
        case 21:
            echo "21";
        break;
    default:
        echo "Default value";
   
}
