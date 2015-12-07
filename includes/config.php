<?php
//config.php

define('DEBUG',true); #we want to see all errors

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'retro_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

date_default_timezone_set('America/Los_Angeles'); #sets default date/timezone for this website

/* 
 *   Virtual (web) 'root' of application for images, JS & CSS files
 *   
 *   IF SECURE, MUST BE https://
 *   Contact hosting company for assistance:
 *   http://wiki.dreamhost.com/Secure_Hosting
*/
define('VIRTUAL_PATH', 'http://itc240grace.com/retro/'); 

define('PHYSICAL_PATH', '/home/lapsan1/itc240grace.com/retro/'); # Physical (PHP) 'root' of application for file & upload reference

# END GENERAL SETTINGS, START BOOTSTRAP CODE ---------------------------

/*
 * reference required include files here
 */
include 'credentials.php'; //stores database login info
include 'common.php'; //stores all unsightly application functions, etc.
include 'MyAutoLoader.php'; //loads class that autoloads all classes in include folder

//This defines the current file name
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}

define('INCLUDE_PATH', PHYSICAL_PATH . 'includes/'); # Path to PHP include files - INSIDE APPLICATION ROOT

define('ADMIN_PATH', VIRTUAL_PATH); # Could change to sub folder

ob_start();  #buffers our page to be prevent header errors. Call before INC files or ANY html!
header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

# END BOOTSTRAP CODE, START SITE SPECIFIC DATA ---------------------------


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
        
        case "data1.php":
        $title = "Links to data page1";
        $pageID = "Customer DB";
        $wait = "waitress2.gif";
        break;
        
        case "cookies-list.php":
        $title = "Our famous cookies!";
        $pageID = "Cookies";
        $wait = "waitress4.gif";
        break;
        
        case "contact.php":
        $title = "Contact Retro Diner";
        $pageID = "Contact Retro Diner";
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
$nav1['ourcoffee.php'] = 'Coffee';
$nav1['daily.php'] = 'Daily';
$nav1['data1.php'] = 'DB';
$nav1['cookies-list.php'] = 'Cookies';
$nav1['contact.php'] = 'Contact';


/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
	$adminWidget = '<li><a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a></li>';
	$adminWidget .= '<li><a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a></li>';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    $adminWidget = '<li><a href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a></li>';
}

/*
 * These variables, when added to the header.php and footer.php files, 
 * allow custom JS or CSS scripts to be loaded into <head> element and 
 * just before the closing body tag, respectively
 */
$loadhead = '';
$loadfoot = '';
