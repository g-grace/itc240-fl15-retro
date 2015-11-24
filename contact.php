<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
					<h1><?=$pageID?></h1>
<?php
if(isset($_POST['submit']))
{//data submitted
    /*echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    */
    
    $to = 'lsango01@seattlecentral.edu';
    $message = process_post();
    $replyTo = $_POST['Email'];
    $subject = 'Test from contact form';
        
    safeEmail($to, $subject, $message, $replyTo);
}
else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    Name: <input type="text" name="Name" required="required" /><br />
    Email: <input type="email" name="Email" required="required" /><br />
    Comments: <textarea name="Comments"></textarea> <br />
    <input type="submit" value="Send" name="submit" />
    </form>
    ';


    
}
      
?>


<?php include 'includes/footer.php';?>