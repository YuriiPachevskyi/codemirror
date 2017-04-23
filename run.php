<?php

$userName = $_REQUEST["userName"];
// $code = $_REQUEST["code"];
$config = include("common/Config.php");
$buildDir = $config->buildDir;
$path = "$config->buildDir/${userName}";


function isExistUserDir() {
    $dirsList = explode("\n", shell_exec("ls ${GLOBALS['buildDir']}"));

    foreach($dirsList as $userDir){
        if ($GLOBALS['userName'] === $userDir) {
            return true;
        }
    }

    return false;
}

function saveToFile() {
    $config = include("common/Config.php");
    $pathToFile = $GLOBALS['path'] . "/hello.c";// . $config->userName . ;
    $file = fopen($pathToFile,"w");

    fwrite($file, $_REQUEST["code"]);
    fclose($file);

    echo "pathToFile = " . $pathToFile;
}


// saveToFile();

if (!isExistUserDir()) {
    echo "no exist";
} else {
    echo "exist";
}



// $output2 = shell_exec('gcc prog.c -o main 2>&1');
// echo "<pre>$output2</pre>";
?>
