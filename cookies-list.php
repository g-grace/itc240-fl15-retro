<?php
//cookies_list.php - shows a list of cookies

require 'includes/config.php'; #provides configuration, pathing, error handling, db credentials 
 
# SQL statement
//$sql = "select MuffinName, MuffinID, Price from test_Muffins";

$sql = "select * from Cookies";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

#Fills <title> tag  
$title = 'Cookies are prepared and made with a considerated care in Seattle';

# END CONFIG AREA ---------------------------------------------------------- 
include 'includes/header.php';
?>

<h1><?=$pageID?></h1>

<?php
#reference images for pager
$prev = '<img src="' . VIRTUAL_PATH . 'images/arrow_prev.gif" border="0" />';
$next = '<img src="' . VIRTUAL_PATH . 'images/arrow_next.gif" border="0" />';

#Create a connection
# connection comes first in mysqli (improved) function
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));


# Create instance of new 'pager' class
$myPager = new Pager(5,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0)
{#records exist - process
	if($myPager->showTotal()==1){$itemz = "cookie";}else{$itemz = "cookies";}  //deal with plural
    echo '<div align="center"><b>We have ' . $myPager->showTotal() . ' ' . $itemz . '!</b></div>';
	while($row = mysqli_fetch_assoc($result))
	{# process each row
         echo '<p>';
         echo '<a href="cookies_view.php?id= ' . $row[CookiesID] . '"> <b>'. $row['Cookie'] . ' </a> </b>';

         echo 'This cookies, ' . $row['Cookie'] . ','. ' have ' . $row['Calories']  . ''. 'calories!!' .'';
	}
    //show NAV() method
	echo $myPager->showNAV(); # show paging nav, only if enough records	 
}else{#no records
    echo "<div align=center>What! No cookies?  There must be a mistake!!</div>";	
}
@mysqli_free_result($result);
@mysqli_close($iConn);
include 'includes/footer.php';
?>





