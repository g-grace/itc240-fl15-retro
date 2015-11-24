<?php include 'includes/config.php';?>
<?php
//index.php (Coffee)
				
if(isset($_GET['day']))
{//show the selected day
    $date= $_GET['day'];

}else{//show today

    $date = date('l');

}

    $daySpecial = '';
    $myPic = '';
    $backgroundColor = '';
    $desCription = '';
    switch($date){
            case "Monday":
                $daySpecial = "Monday's Special, Cinnamon Coffee."; 
                $desCription = "Starts off your Monday with our exclusive cinnamon spice coffee!";
                $backgroundColor = "#FFD700";
                $myPic .= "cinnamon-coffee.jpg";
				break;
				
            case "Tuesday":
				$daySpecial = "Tuesday Special, Doppio.";
                $desCription = "Warm up your Tuesday with double shot, extracted using a double filter basket in the portafilter.!";
				$myPic .= "doppio.jpg"; 
                $backgroundColor = "#FFE1FF";
				break;
				
            case "Wednesday":
				$daySpecial = "Wednesday Special, Matcha Latte."; 
                $desCription = "Refreshing your Wednesday and swap out your morning coffee with matcha for an antioxidant boost.!";
				$myPic .= "matcha-latte.jpg"; 
                $backgroundColor = "#FBF5E6";
				break;
				
            case "Thursday":
				$daySpecial = "Thursday Special, Espresso Macchiato.";
                $desCription = "Give your Thursday temptation with this essential gourmet Espresso. The combination of Espresso with a drop of milk in the centre creates an intensely smooth experience.!";
				$myPic .="espresso_macchiato.jpg";
                $backgroundColor = "#F5FFFA";
				break;
				
            case "Friday":
                $daySpecial = "Friday Special, Baileys Irish Cream";
                $desCription = "Jazz up your Friday with our creamy and smooth Baileys Irish Cream!";
				$myPic .= "baileys-irishcream.jpg";
                $backgroundColor = "#F0FFFF";
				break;
				
            case "Saturday":
               	$daySpecial = "Saturday Special, Slow Roast Italian";
                $desCription = "Clam your Saturday with our rich, robust &amp powerful; Slow roasted!";
				$myPic .= "baileys-irishcream.jpg";
                $backgroundColor = "FFFF99";
				break;
				    
            case "Sunday":
                $daySpecial = "Sunday Special, Vanilla Latte"; 
                $desCription = "It' s a Sunday. Boost your spirit with our fresh vanilla latte!"; 
				$myPic .= "vanilla-latte.jpg";
                $backgroundColor = "FFCC66";
				break;
				
				default:
                $daySpecial = "Daily Special::: Ask our barrista for today special";
                $desCription = "Inspire your days and every mood with our daily special coffee!";
				$myPic .= "defaultcoffee.jpg"; 
                $backgroundColor = "#E0FFFF";
    }
?>

<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<img src="images/<?=$myPic;?>" alt="Our <?= $daySpecial;?>" />
<p><strong class="feature"> <?=$date;?>.</strong> Our special drink is <strong class="feature"> <?= $daySpecial;?></strong></p>


<p><a href="daily.php?day=Sunday">Sunday</a></p>
<p><a href="daily.php?day=Monday">Monday</a></p>
<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
<p><a href="daily.php?day=Thursday">Thursday</a></p>
<p><a href="daily.php?day=Friday">Friday</a></p>
<p><a href="daily.php?day=Saturday">Saturday</a></p>



<?php include 'includes/footer.php';?>

