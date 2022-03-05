<!--
Biradar, Lakshmi
Red_ID: 825975651
CS545_00
Assignment #4
Fall 2020
Instructor:Cyndi Chie
-->

<!DOCTYPE html>
<html lang="en">
<!--head-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>SDSU Natural History Museum</title>
</head>
<!--Body-->
<body>
<section class = "flex-container">
<!--Header-->
<header>
    <div>
        <a href="https://www.sdsu.edu" target="_blank">
            <img class="img-left" src="image/SDSUprimary3CrgbRV.png" alt="SDSU">
        </a>
        <h1>San Diego State University <br />Natural History Museum</h1>
   </div>
   <!--Navigation-->
        <nav id="navbar">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li  class="active"><a href="Events.html">Events</a></li>
                <li><a href="Exhibitions.html"> Exhibits</a></li>
                <li><a href="Science.html">Science</a></li>
                <li  > <a>Contribute</a>
                    <ul>
                        <li><a  href="member.html">Membership</a></li>
                        <li><a href="volunteer.html">Volunteer</a></li>
                        <li><a href="donate.html">Donate</a></li>
                    </ul>
                </li>
                <li><a  href="Aboutus.html">About us</a></li>
                
            </ul>
        </nav>
    
</header>

<!--Main Body-->
<section class= "col-1_2">
<!-- Start Session -->
<?php
session_start();
?>
<div class="form2">
<h2 class="borderbottom" > Thank You! for subscribing to our Event </h2>
<h3> Please find below details: </h3>
<!-- Display Data in Table Format -->
<table class= "table">
<!-- Display only data added by user to show on page using 'If' logic -->
<?php if (!empty($_SESSION["fname"])): ?> <tr> <th>First Name</th> <td><?php echo $_SESSION["fname"];?> </td> </tr><?php endif;
if (!empty($_SESSION["lname"])): ?> <tr> <th>Last Name</th> <td><?php echo $_SESSION["lname"];?> </td> </tr><?php endif;
 if (!empty($_SESSION["Address"])): ?> <tr> <th>Address</th> <td><?php echo $_SESSION["Address"];?> </td> </tr><?php endif;
if (!empty($_SESSION["email"])): ?> <tr> <th>Email</th> <td><?php echo $_SESSION["email"];?> </td> </tr><?php endif;
if (!empty($_SESSION["phone"])): ?> <tr> <th>Phone</th> <td><?php echo $_SESSION["phone"];?> </td> </tr><?php endif;
if (!empty($_SESSION["EName"])): ?> <tr> <th>Event Name</th> <td><?php echo $_SESSION["EName"];?> </td> </tr><?php endif;
if (!empty($_SESSION["tattendee_val"]) || $_SESSION["tattendee_val"] == 0): ?> <tr> <th>Total Number of Attendees</th> <td><?php echo $_SESSION["tattendee_val"];?> </td> </tr><?php endif;
if (!empty($_SESSION["tyoung"]) || $_SESSION["tyoung"] == 0): ?> <tr> <th>Number of attendees under 5 years old</th> <td><?php echo $_SESSION["tyoung"];?> </td> </tr><?php endif;
if (!empty($_SESSION["tmid"]) || $_SESSION["tmid"]== 0): ?> <tr> <th>Number of attendees between 5 and 12 years old</th> <td><?php echo $_SESSION["tmid"];?> </td> </tr><?php endif;
if (!empty($_SESSION["tuppermid"]) || $_SESSION["tuppermid"] == 0): ?> <tr> <th>Number of attendees between 13 and 17 years old</th> <td><?php echo $_SESSION["tuppermid"];?> </td> </tr><?php endif;
if (!empty($_SESSION["thigher"]) || $_SESSION["thigher"] == 0): ?> <tr> <th>Number of attendees 18+ years old</th> <td><?php echo $_SESSION["thigher"];?> </td> </tr><?php endif;
if (!empty($_SESSION["offered_event"])): ?> <tr> <th>List other Events to be offered:</th> <td><?php echo $_SESSION["offered_event"];?> </td> </tr><?php endif;

?>
</table> 
</div>

</section>
<!--Aside Bar-->
<aside class= "col-1_1">
<h2 class="borderbottom" > Join us</h2>
 <div><a href="donate.html">Donate </a></div>
 <div><a href="member.html">Membership</a></div>
 <div> <a href="volunteer.html">Volunteer</a></div>
 <h2 class="borderbottom" >Contact Us</h2>
        
        <address>
            San Diego State University<br/>
            Natural History Museum<br/>
            San Diego, CA 92182-0000<br/>
            (619)594-5200<br>
            Mailing address:<a href="mailto:nhmuseum@sdsu.edu">nhmuseum@sdsu.edu</a>
     </address>
</aside>

<!--Footer-->
<footer>

        <section class="infoot">
            <h2>Museum hours</h2>
            <p>Daily 10 AM to 5 PM<br>
			Closed when the campus is closed<br>
			Hours subject to change. </p>
        </section>
        <section class="infoot">
            <h2>Important Links</h2>
            <ul>
                <li> <a href="member.html"> Become a member</a></li>
                <li> <a href="donate.html">Donate </a></li>
                <li> <a href="volunteer.html">Volunteer</a></li>
            </ul>
        </section>
        <section class="infoot">
            <h2>Contact Us:</h2>
<address>
       San Diego State University<br/>
	   Natural History Museum<br/>
	   San Diego, CA 92182-0000<br/>
	   (619)594-5200<br>
	   Mailing address:<a href="mailto:nhmuseum@sdsu.edu">nhmuseum@sdsu.edu</a>
</address>
<!--Last Modified Date Time for PHP page to reflect the correct date time-->
<br>
<b>
<?php
// Time zone setting
date_default_timezone_set("America/Los_Angeles");
echo "Last Modified: " . date ("m/d/y H:i:s.", getlastmod());
?></b>
        </section>
</footer>
</section>

</body>
</html>