<?php

$userName = $_REQUEST["userName"];
// $code = $_REQUEST["code"];
$config = include("common/Config.php");
$buildDir = $config->buildDir;
$path = "$config->buildDir/${userName}";


function isExistUserDir($buildDir, $userName) {
    $dirsList = explode("\n", shell_exec("ls ${buildDir}"));

    foreach($dirsList as $userDir){
        if ($userName === $userDir) {
            return true;
        }
    }

    return false;
}

function createUserDir($buildDir, $userName) {
    $resultCode = shell_exec("mkdir ${buildDir}/${userName} 2>&1");
    // echo "create = ${buildDir}/${userName}";
    echo $resultCode;
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

if (!isExistUserDir($buildDir, $userName)) {
    echo "no exist";
    createUserDir($buildDir, $userName);
} else {
    echo "exist";
}



// $output2 = shell_exec('gcc prog.c -o main 2>&1');
// echo "<pre>$output2</pre>";
?>
