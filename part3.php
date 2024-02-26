<?php declare( strict_types = 1);
define('nov', '11');
define('day', '18');

//function that takes year as input
function checkFreeMonday(int $year)
{
    //check if nov. 18 of that year was sat or sun
    $Y = $year;
    $M = nov;
    $d = day;
    $date = strtotime("$Y-$M-$d");
    $weekEnd = date('w', $date);
    //echo $weekEnd;
    $isWeekend = false;
    //return true if it was, false if wasn't
    ($weekEnd == 0 || $weekEnd == 6)? $isWeekend = true : $isWeekend = false;
    return $isWeekend;
}

function displayMonday( int $start, int $end )
{
    $curDate = date("Y-m-d");
    echo $curDate , "<br>";
    for( $i = $start; $i <= $end; $i++)
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

//displayMonday(2020, 2030); //commented out so it wouldn't display in part4_result.php
