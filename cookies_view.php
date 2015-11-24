<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
     $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:cookies_list.php');
}


$sql = "select * from Cookies where CookiesID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $Cookie = stripslashes($row['Cookie']);
        $Brand = stripslashes($row['Brand']); 
        $Calories = stripslashes($row['Calories']);
        $Description = stripslashes($row['Description']);
        $title = "Title Page for " . $Cookie;
        $pageID = $Cookie;   
        $Feedback = ''; //no feedback neccessary
    }
    
}else{//inform there are no records
    $Feedback = '<p>This customer does not exist</p>';
} 

?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
   
if($Feedback == '')
{//data exists, show it
    
    echo '<p>';
    echo 'Cookie: <b>' . $Cookie . '</b> ';
    echo 'Brand: <b>' . $Brand . '</b> ';
    echo 'Calories: <b>' . $Calories . '</b> ';
    echo 'Description: <b>' . $Description . '</b> ';   
    
    echo '<img src="uploads/cookie' . $id . '.jpg" />';
    
    echo '</p>';
}else{//warn user no data
    echo $Feedback;    
}
    
    echo '<p><a href = "cookies_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php include 'includes/footer.php';?>




drop table if exists test_Customers;
create table test_Customers
( CustomerID int unsigned not null auto_increment primary key,
LastName varchar(50),
FirstName varchar(50),
Email varchar(80)
);
insert into test_Customers values (NULL,"Smith","Bob","bob@example.com");
insert into test_Customers values (NULL,"Jones","Bill","bill@example.com");
insert into test_Customers values (NULL,"Doe","John","john@example.com");
insert into test_Customers values (NULL,"Rules","Ann","ann@example.com");