<?php 
//common.php

/*
All of the functions from our application 
will go here
*/

/**
*generic error handling function for hiding db errors, etc.
*
* Change the socks reference and any HTML to suit
*
* @param string $myFile File from which error emitted
* @param string $myLine Line where error can be found
* @param string $errorMsg Message to be shown to admin only
* @return void
* @see dbIn()
* @todo none
*/

define('DEBUG',TRUE); #we want to see all errors
function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
        echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
        die();
    }
}
