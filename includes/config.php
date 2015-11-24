<?php
//config.php

//database credentials here
include 'credentials.php';


//This defines the current file name
define('THIS_PAGE',basename($_SERVER['PHP_SELF'])); 
//will create constants (constants have no $)

//echo THIS_PAGE;

//This allows us to add unique info to our pages
switch(THIS_PAGE)
{
    case "index.php":
        $title = "Home";
        $pageID = "Home";
        $wait = "waitress5.gif";
        $heros[] = '<img src="images/coulson.png" />';
        $heros[] = '<img src="images/fury.png" />';
        $heros[] = '<img src="images/hulk.png" />';
        $heros[] = '<img src="images/thor.png" />';
        $heros[] = '<img src="images/black-widow.png" />';
        $heros[] = '<img src="images/captain-america.png" />';
        $heros[] = '<img src="images/machine.png" />';
        $heros[] = '<img src="images/iron-man.png" />';
        $heros[] = '<img src="images/loki.png" />';
        $heros[] = '<img src="images/giant.png" />';
        $heros[] = '<img src="images/hawkeye.png" />';
        echo randomize($heros);
        break;
    
    case "ourcoffee.php":
        $title = "Our Coffee";
        $pageID = "Our Coffee";
        $wait = "waiter2.gif";
        $planets[] = '
        <img src="images/mercury.gif" style="float:right; margin:0 10px 10px 0" />';

        $planets[] = '
        <img src="images/venus.gif" style="float:right; margin:0 10px 10px 0" />';

        $planets[] = '
        <img src="images/mars.gif" style="float:right; margin:0 10px 10px 0" />';

        $planets[] = '
       <img src="images/jupiter.gif" style="float:right; margin:0 10px 10px 0" />';

        $planets[] = '
        <img src="images/saturn.gif" style="float:right; margin:0 10px 10px 0" />';

        $planets[] = '
    <img src="images/uranus.gif" style="float:right; margin:0 10px 10px 0" />';

        $planets[] = '
        <img src="images/neptune.gif" style="float:right; margin:0 10px 10px 0" />';

        $planets[] = '
        <img src="images/pluto.gif" style="float:right; margin:0 10px 10px 0" />';
        echo rotate($planets);
        break;

        case "daily.php":
        $title = "Daily Special";
        $pageID = "Daily Special";
        $wait = "waitress4.gif";
        break;    
    
        case "contact.php":
        $title = "Contact Retro Diner";
        $pageID = "Contact Retro Diner";
        $wait = "waitress2.gif";
        break;
        
        case "data1.php":
        $title = "Links to data page1";
        $pageID = "Customer Date";
        $wait = "waitress2.gif";
        break;
        
        
        default: 
        $title = THIS_PAGE;
        $pageID = "Retro Diner";
        $wait = "waitress.png";
        $hero[] = '';
        $planets[] = '';
}// end switch

//Here are our navigation pages:
$nav1['index.php'] = 'Home';
$nav1['ourcoffee.php'] = 'OurCoffee';
$nav1['daily.php'] = 'Daily';
$nav1['data1.php'] = 'Data1';
$nav1['contact.php'] = 'Contact';




/*
				<li>
					<a href="index.html">Home</a>
				</li>
				<li>
					<a class="active" href="about.html">About</a>
				</li>
				<li>
					<a href="burger.html">Menu</a>
				</li>
				<li>
					<a href="contact.html">Contact</a>
				</li>
				<li>
					<a href="blog.html">Blog</a>
				</li>
			</ul>

*/



//echo $title;
//die;

/*
Creates links inside the header.php file

<li><a href ="LINK">LABEL</a></li>

<li class="active"><a href ="LINK">LABEL</a></li>

*/

function makeLinks($arr, $prefix= '', $suffix= '', $exception= '')
{
    $myReturn = '';
    foreach($arr as $link => $label){
        
    if(THIS_PAGE == $link)
    {//current file gets active class
            $myReturn .= $exception . '<a href ="' . $link . '"> ' . $label. '</a>'. $suffix;
    
    }else{
            $myReturn .= '<li><a href ="' . $link . '"> ' . $label. '</a>'. $suffix;
    
    }//end if/else
    
}//end foreach()

    return $myReturn;
    
} //end makeLinks()
			


/*
Allows us to send an email that respects the server domain spoofing polices of 
hosts like DH.

$response = safeEmail($to, $subject, $message, $replyTo='','html');

if($response)
{
    echo 'hopefully HTML email sent!<br />';
}else{
   echo 'Trouble with HTML email!<br />'; 
}

*/
function safeEmail($to, $subject, $message, $replyTo = '',$contentType='text')
{
    $fromAddress = "Automated Email <noreply@" . $_SERVER["SERVER_NAME"] . ">";

    if(strtolower($contentType)=='html')
    {//change to html format
        $contentType = 'Content-type: text/html; charset=iso-8859-1';
    }else{
        $contentType = 'Content-type: text/plain; charset=iso-8859-1';
    }
    
    $headers[] = "MIME-Version: 1.0";//optional but more correct
    //$headers[] = "Content-type: text/plain; charset=iso-8859-1";
    $headers[] = $contentType;
    //$headers[] = "From: Sender Name <sender@domain.com>";
    $headers[] = 'From: ' . $fromAddress;
    //$headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
    //$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
    
    if($replyTo !=''){
        $headers[] = 'Reply-To: ' . $replyTo;   
    }
    
    
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/". phpversion();
    
    $headers = implode(PHP_EOL,$headers);

    
    return mail($to, $subject, $message, $headers);

}//end safeEmail()


function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
} 

/**
 * returns a random item from an array sent to it.
 *
 * Uses count of array to determine highest legal random number.
 *
 * Used to show random HTML segments in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo randomize($arr); #will show one of three random images
 * </code>
 *
 * @param array array of HTML strings to display randomly
 * @return string HTML at random index of array
 * @see rotate() 
 * @todo none
 */
function randomize ($arr)
{//randomize function is called in the right sidebar - an example of random (on page reload)
	if(is_array($arr))
	{//Generate random item from array and return it
		return $arr[mt_rand(0, count($arr) - 1)];
	}else{
		return $arr;
	}
}#end randomize()

/**
 * returns a daily item from an array sent to it.
 *
 * Uses count of array to determine highest legal rotated item.
 *
 * Uses day of month and modulus to rotate through daily items in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo rotate($arr); #will return a different image each day for three days
 * </code>
 * 
 * @param array array of HTML strings to display on a daily rotation
 * @return string HTML at specific index of array based on day of month
 * @see rotate() 
 * @todo none
 */
function rotate ($arr)
{//rotate function is called in the right sidebar - an example of rotation (on day of month)
	if(is_array($arr))
	{//Generate item in array using date and modulus of count of the array
		return $arr[((int)date("j")) % count($arr)];
	}else{
		return $arr;
	}
}#end rotate

?>

