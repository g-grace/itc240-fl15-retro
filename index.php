<?php include 'includes/config.php';?>

<?php
//index.php (Coffee)
				
if(isset($_GET['day']))
{//show the selected day
    $date= $_GET['day'];

}else{//show today

    $date = date('l');

}

    $greeting = '';
    $Description = '';
    $myPic = '';
    switch($date){
            case "Monday":
                $greeting = "Hello, Monday!!."; 
                $desCription = "Starts off your Monday with our exclusive cinnamon spice coffee!";
                $myPic .= "cinnamon-coffee.jpg";
				break;
				
            case "Tuesday":
				$greeting = "Hello, Tuesday!!";
                $desCription = "Warm up your Tuesday with double shot, extracted using a double filter basket in the portafilter.!";
				$myPic .= "doppio.jpg"; 
				break;
				
            case "Wednesday":
				$greeting = "Hello, Wednesday!!"; 
                $desCription = "Refreshing your Wednesday and swap out your morning coffee with matcha for an antioxidant boost.!";
				$myPic .= "matcha-latte.jpg"; 
				break;
				
            case "Thursday":
				$greeting = "Hello, Thursday!!";
                $desCription = "Give your Thursday temptation with this; essential gourmet Espresso. The combination of Espresso with a drop of milk in the centre creates an intensely smooth experience.!";
				$myPic .="espresso_macchiato.jpg";
				break;
				
            case "Friday":
                $greeting = "Hello, Friday!!";
                $desCription = "Jazz up your Friday with our creamy and smooth Baileys Irish Cream!";
				$myPic .= "baileys-irishcream.jpg";
				break;
				
            case "Saturday":
               	$greeting = "Hello, Saturday!!";
                $desCription = "Clam your Saturday with our rich, robust &amp powerful; Slow roasted!";
				$myPic .= "baileys-irishcream.jpg";
				break;
				    
            case "Sunday":
                $greeting = "Hello, Sunday!!"; 
                $desCription = "It' s a Sunday. Boost your spirit with our fresh vanilla latte!"; 
				$myPic .= "vanilla-latte.jpg";
				break;
				
				default:
                $greeting= "Welcome to Retro Diner::: Ask our barrista for our today's special";
                $desCription = "Inspire your days and every mood with our daily special coffee!";
				$myPic .= "defaultcoffee.jpg"; 
    }
?>

<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<h2><?=$greeting?></h2>
<img src="images/<?=$myPic;?>" alt="Home/<?= $greeting;?>" />
<p><strong class="feature"> <?=$desCription;?>.</strong> 

<p>Grinder, chicory, body cinnamon grinder mocha foam. Mazagran, kopi-luwak spoon, cup, white eu aromatic fair trade chicory roast barista. Variety filter medium caffeine medium so eu qui trifecta. Robusta, coffee, acerbic americano coffee at fair trade as plunger pot. <br>

<br />Sweet, plunger pot barista plunger pot, cultivar barista, est in body frappuccino dark. Mocha to go brewed ristretto id est macchiato coffee. Latte white est, body kopi-luwak spoon medium single shot iced. Shop brewed breve, roast extraction sweet lungo espresso mocha instant aroma. <br>

<br />Whipped, java, affogato crema dark seasonal as percolator froth galão mazagran. Sweet flavour extraction decaffeinated qui chicory robusta cup affogato. Instant in, carajillo blue mountain cup so frappuccino galão. Cappuccino, wings steamed caffeine, lungo est half and half frappuccino in filter.<br>

<br />Iced medium so whipped barista robusta cream. Carajillo kopi-luwak, breve, frappuccino mocha redeye barista sugar crema. Extra, strong café au lait, mazagran steamed, turkish spoon aftertaste decaffeinated siphon spoon. Java whipped acerbic carajillo a eu sugar redeye medium. </p>

<?php include 'includes/footer.php';?>