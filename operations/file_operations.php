

<?php

function writeToFile($data, $fileName){
    $json = json_encode($data);

    $writefile = fopen($fileName, "w") or die("Unable to open file!");
    fwrite($writefile, $json);
    fclose($writefile);
}

function readFromFile($fileName){
    $readfile = fopen($fileName, "r") or die("Unable to open file!");
    $jsonFromFile =  fread($readfile,filesize($fileName));
    fclose($readfile);

    return $jsonFromFile;
}



?>