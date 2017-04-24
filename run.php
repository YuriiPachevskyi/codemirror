<?php

$userName = $_REQUEST["userName"];
$sourceCode = $_REQUEST["sourceCode"];
$config = include("common/Config.php");
$buildDir = $config->buildDir;

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
}

function saveToFile($buildDir, $userName, $sourceCode) {
    $userBuildDir = "${buildDir}/${userName}";
    $pathToFile = "${userBuildDir}/hello.c";
    $programFile = fopen($pathToFile,"w");

    fwrite($programFile, $sourceCode);
    fclose($programFile);
}

function compileSourceCode($buildDir, $userName) {
    $userBuildDir = "${buildDir}/${userName}";
    $pathToFile = "${userBuildDir}/hello.c";

    $errorMessage = shell_exec("gcc ${pathToFile} -o ${userBuildDir}/main 2>&1");

    if (strlen($errorMessage) !== 0) {
        echo "error = " . $errorMessage;
        return $errorMessage;
    }

    return "ok";
}

if (!isExistUserDir($buildDir, $userName)) {
    createUserDir($buildDir, $userName);
}
saveToFile($buildDir, $userName, $sourceCode);

$resultCode = compileSourceCode($buildDir, $userName);
if ($resultCode !== "ok") {
    echo "string " + $resultCode;
}

// $output2 = shell_exec('gcc prog.c -o main 2>&1');
// echo "<pre>$output2</pre>";
?>
