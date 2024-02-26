<?php
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

//function that takes year as input checks monday
function checkFreeMonday(int $year)
{
    //check if nov. 18 of that year was sat or sun
    $Y = $year;
    $M = 11;
    $d = 18;
    $date = strtotime("$Y-$M-$d");
    $weekEnd = date('w', $date);
    //echo $weekEnd;
    $isWeekend = false;
    //return true if it was, false if wasn't
    ($weekEnd == 0 || $weekEnd == 6)? $isWeekend = true : $isWeekend = false;
    return $isWeekend;
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
{
    $curDate = date("Y-m-d");
    //loop that checks multiple years with the function
    for( $i = $yearStart; $i <= $yearEnd; $i++)
    {
        $date = date("Y-m-d",strtotime("$i-11-18")); // date formated for comparison
        $nov = date("F d, Y", strtotime("$i-11-18")); // date formated for output
        
        echo "The next Monday after $nov ";
        if (checkFreeMonday($i))
        {    
            if ($curDate > $date) //past
                echo "was";
            else //future
                echo "will be";
        } 
        else 
        {
            if ($curDate > $date) //past
                echo "was not";
            else //future
                echo "will not be";
        }
        echo " a holiday. <br>";
    }
}
?>
<a href="/part4_input.php">Back to form</a>