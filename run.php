<?php

// $name = $_REQUEST["name"];
// $fileName = "hello"
// $code = $_REQUEST["code"];
$config = include("common/Config.php");
$path = "$config->buildDir/$config->userName";


function saveToFile() {
    $config = include("common/Config.php");
    $pathToFile = $GLOBALS['path'] . "/hello.c";// . $config->userName . ;
    $file = fopen($pathToFile,"w");

    fwrite($file, $_REQUEST["code"]);
    fclose($file);
}


saveToFile();

// Output "no suggestion" if no hint was found or output correct values 
// echo $hint === "" ? "no suggestion" : $hint;




// $output2 = shell_exec('gcc prog.c -o main 2>&1');
// echo "<pre>$output2</pre>";
?>
