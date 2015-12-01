Click here to enable desktop notifications for Gmail.   Learn more  Hide
 
 
More 
1 of 98
 
common.php
Inbox
	x
Thomas Karchesy
	
Attachments3:13 PM (15 minutes ago)
		
to me
Here is what I have. I found it in my GitHub repo
Attachments area
Preview attachment common.php
[PHP]
	
Click here to Reply or Forward
0.73 GB (4%) of 15 GB used
Manage
Terms - Privacy
Last account activity: 8 minutes ago
Details
	
	
	Thomas Karchesy
Show details

<?php 
//common.php
/* 
all of the functions from our application will go here
*/
/**
 * generic error handling function for hiding db errors, etc.
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
/**
 * Wrapper function for processing data pulled from db
 *
 * Forward slashes are added to MySQL data upon entry to prevent SQL errors.  
 * Using our dbOut() function allows us to encapsulate the most common functions for removing  
 * slashes with the PHP stripslashes() function, plus the trim() function to remove spaces.
 *
 * @param string $str data as pulled from MySQL
 * @return $str data cleaned of slashes, spaces around string, etc.
 * @see dbIn()
 * @todo none
 */
function dbOut($str)
{
	if($str!=""){$str = stripslashes(trim($str));}//strip out slashes entered for SQL safety
	return $str;
} #End dbOut()