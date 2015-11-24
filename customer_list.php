<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
$sql = "select * from test_Customers";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
    echo '<p>';
    echo 'FirstName: <b>' . $row['FirstName']. '</b> ';
    echo 'LastName: <b>' . $row ['LastName'] . '</b> ';
    echo 'Email: <b>' . $row ['Email'] . '</b> ';
        
    echo '<a href="customer_view.php?id=' . $row['CustomerID'] . '"> ' . $row['FirstName'] . '</a>'; 
        
    echo '</p>'; 
    }
    
}else{//inform there are no records
    echo '<p>There are currently no customers</p>';
}    

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