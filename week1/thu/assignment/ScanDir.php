
<?php
// We can search for the character, ignoring anything before the offset
// $newstring = 'abcdef abcdef';
$newstring = 'abcdef';
$pos = strpos($newstring, 'a', 1); // $pos = 7, not 0

echo "\n";
echo "$pos\n";
$newstring = 'james.jpg';

echo "----------jpg check----------\n";
$pos = strpos($newstring, '.jpg', -4);
echo "$pos\n";

echo "----------abc check----------\n";
$newstring = 'abc';
$pos = strpos($newstring, 'c', -1);
echo "$pos\n";