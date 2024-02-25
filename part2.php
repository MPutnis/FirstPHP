<?php
header("Content-Type: text/plain; charset=UTF-8");
function splitString()
{
    $strTS = "HELLO";
    for ($i = 0; $i < strlen($strTS); $i++)
    {
        for ($j = 0; $j <= $i; $j++)
            echo $strTS[$j];
        echo "\n";
    }
    for ($i = strlen($strTS)-2; $i >= 0 ; $i--)
    {
        for ($j = 0; $j <= $i; $j++)
            echo $strTS[$j];
        echo "\n";
    }
}

splitString();