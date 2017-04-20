<?php

$name = $_REQUEST["name"];
$code = $_REQUEST["code"];

$file = fopen("hello","w");
fwrite($file, "test2");
fclose($file);

echo "name = " . $name . " code = " . $code;

// lookup all hints from array if $q is different from "" 
// if ($q !== "") {
//     $q = strtolower($q);
//     $len=strlen($q);
//     foreach($a as $name) {
//         if (stristr($q, substr($name, 0, $len))) {
//             if ($hint === "") {
//                 $hint = $name;
//             } else {
//                 $hint .= ", $name";
//             }
//         }
//     }
// }

// Output "no suggestion" if no hint was found or output correct values 
// echo $hint === "" ? "no suggestion" : $hint;




// $output2 = shell_exec('gcc prog.c -o main 2>&1');
// echo "<pre>$output2</pre>";
?>
