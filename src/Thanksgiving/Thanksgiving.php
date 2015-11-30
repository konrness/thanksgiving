<?php

/**
 * @param string $date
 * @return boolean
 */
function isThanksgiving($date)
{
    $queryDate = strtotime($date);

    // identify year of query date
    $year = date("Y", $queryDate);

    $thanksgiving = getThanksgiving($year);

    return $thanksgiving == $queryDate;
}

function getThanksgiving($year) {
    // generate Thanksgiving date for given year
    return strtotime("fourth thursday", mktime(0,0,0,11,1,$year) - 1);
}