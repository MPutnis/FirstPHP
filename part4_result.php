<?php
require_once('part3.php');
$yearStart = $yearStartErr =  $yearEnd = $yearEndErr = $intervalErr = "";

// validate inputs
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    if( empty($_GET["startYear"]) || !validYear($_GET["startYear"]))
        $yearStartErr = "Interval start must be between 1970 and 2100";
    else
        $yearStart = $_GET["startYear"];

    if( empty($_GET["endYear"]) || !validYear($_GET["endYear"]))
        $yearEndErr = "Interval end must be between 1970 and 2100";
    else
        $yearEnd = $_GET["endYear"];

    if ($yearEnd < $yearStart)
        $intervalErr = "Invalid interval";
}

function validYear( $year)
{
    $isValid = "";
    (intval($year) >= 1970 && intval($year) <= 2100)? 
        $isValid = true : $isValid = false;
    return $isValid;
}

//error messeges
if ($yearStartErr != "")
    echo $yearStartErr, "<br>";
elseif ($yearEndErr != "")
    echo $yearEndErr, "<br>";
elseif ($intervalErr != "")
    echo $intervalErr, "<br>";

// interval output
else
    displayMonday($yearStart, $yearEnd); // function from part3.php
?>
<a href="/part4_input.php">Back to form</a>