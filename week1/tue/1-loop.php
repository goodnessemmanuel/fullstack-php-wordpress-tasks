<?php 

// for
// $data = [20, 45, 33, 10];
for($i=0; $i<10; $i++) {
   
     echo "$i\n";
   
}

echo "\n=====================\n";
for($i=10; $i>0; $i--) {
   
    echo "$i\n";
  
}
echo "\n=====================\n";


$data = [20, 45, 33, 10];

for($i=0; $i < count($data); $i++) {
    echo $data[$i] . "\n";
}

// endless loop (run for 100 times max)
/*$y = 0;
for(;;) {
         echo "Hello\n";
        sleep(1);
    
        if($y === 100) {
            break;
        }
   

    $y++;
}*/




// foreach
$configs = [
    'db_host' => 'localhost',
    'port' => 9005,
    'user' => 'root',
    'password' => 'root',
    'keep_open' => true
 ];
 



 foreach($configs as $key=>$value) {
    echo "$key = $value\n";
 }
 echo "\n=====================\n";


 // only values
 foreach($configs as $value) {
    echo "$key = $value\n";
 }

 $keys = array_keys($configs);
 foreach( $keys as $k) {
    echo "$k\n";
 }

print_r( $keys);

$langauges = ["PHP", "JAVA", "C#"];
foreach($langauges as $key=>$value) {
    echo "$key";
}


echo "\n=====================\n";
// while
$i = 0;
while ($i < 10) {
    
    echo "$i\n";
    $i++;
}

echo "\n=========while (true)============\n";
$i = 0;
while (true) {
    
    if($i >= 10) {
        break;
    }
    echo "$i\n";
    $i++;
}

echo "\n=========do while============\n";
// while/do

$i = 0;
do {

    echo "$i\n";
    $i++;

}while($i < 10);