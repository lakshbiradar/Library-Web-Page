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
<!--Head-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles.css">
    <link rel="stylesheet" type="text/css" href="form.css">
    <script src="features.js"></script>
    <title>SDSU Natural History Museum</title>
</head>
<!--Body-->
<body>
<section class="flex-container">
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
                <li ><a href="index.html">Home</a></li>
                <li  class="active"><a href="Events.html">Events</a></li>
                <li><a href="Exhibitions.html"> Exhibits</a></li>
                <li><a href="Science.html">Science</a></li>
                <li> <a>Contribute</a>
                    <ul>
                        <li><a href="member.html">Membership</a></li>
                        <li><a href="volunteer.html">Volunteer</a></li>
                        <li><a href="donate.html">Donate</a></li>
                    </ul>
                </li>
                <li ><a  href="Aboutus.html">About us</a></li>
            </ul>
        </nav>
    
</header>
<!-- PHP Validation rules -->
<?php
//Session Start
session_start();
$fnameErr= $lnameErr= $EmailErr = $AttErr= $AttErr1=$AttErr2=$AttErr3=$AttErr4 = $eventErr="";
$valid=false;
$fname = $lname = $Address = $Address = $email = $phone = $EName = $tattendee_val= $tattendee = $offered_event=$tyoung = $tmid = $tuppermid = $thigher ="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$valid = true;
//Validate Name field 
if (empty(filter_input(INPUT_POST,"fname")))
{$fnameErr = "First Name is required";
  $valid = false;
} else {
    $fname = test_input(filter_input(INPUT_POST,"fname"));
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-'-. ]*$/", $fname)) {
      $fnameErr = "Only letters and space allowed";
      $valid = false;
    }
    else
    {
      $_SESSION['fname'] = test_input(filter_input(INPUT_POST,"fname"));
    }
  }
// Validate Last Name Field
  if (empty(filter_input(INPUT_POST,"lname")))
  {$lnameErr = "Last Name is required";
    $valid = false;
  } else {
      $lname = test_input(filter_input(INPUT_POST,"lname"));
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-'-. ]*$/", $lname)) {
        $lnameErr = "Only letters and space allowed";
        $valid = false;
      }
      else
      {
        $_SESSION['lname'] = test_input(filter_input(INPUT_POST,"lname")); 
      }
    }
// Validate Email Field    
    if (empty(filter_input(INPUT_POST,"email")))
    {$EmailErr = "Email is required";
      $valid = false;
    } else {
        $email= test_input(filter_input(INPUT_POST,"email"));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $EmailErr = "Enter Valid Email Address";
        }
        else
        {
          $_SESSION['email'] = test_input(filter_input(INPUT_POST,"email"));
        }
      }
// Event Field Required and Validation
    if ((filter_input(INPUT_POST,"EName")) === 'None')
    {
      $eventErr = "Please select an Event";
      $valid = false;
    }
    else
    {
      $_SESSION['EName'] = test_input(filter_input(INPUT_POST,"EName"));
    }

    if (empty(filter_input(INPUT_POST,"tyoung")) && filter_input(INPUT_POST,"tyoung")!== '0')
    {
     
        $AttErr1 = "Details required";
        $valid = false;
    } 

    else{
      $tyoung= test_input(filter_input(INPUT_POST,"tyoung"));
      if (Valnum($tyoung)) {
        $AttErr1= "Please add valid attendee";
      $valid = false;
    }
  }
    if (empty(filter_input(INPUT_POST,"tmid")) && filter_input(INPUT_POST,"tmid")!== '0')
    {
        $AttErr2 = "Details required";
        $valid = false;
    } 
    else{
      $tmid= test_input(filter_input(INPUT_POST,"tmid"));
      if (Valnum($tmid)) {
        $AttErr2= "Please add valid attendee";
      $valid = false;
    }
  }
    if (empty(filter_input(INPUT_POST,"tuppermid")) && filter_input(INPUT_POST,"tuppermid")!== '0')
    {$AttErr3 = "Details required";
      $valid = false;
    }
    else{
      $tuppermid= test_input(filter_input(INPUT_POST,"tuppermid"));
      if (Valnum($tuppermid)) {
        $AttErr3= "Please add valid attendee";
      $valid = false;
    }
  }
    if (empty(filter_input(INPUT_POST,"thigher")) && filter_input(INPUT_POST,"thigher")!== '0')
    {
      $AttErr4 = "Details required";
      $valid = false;
    }
    else{
      $thigher= test_input(filter_input(INPUT_POST,"thigher"));
      if (Valnum($thigher)) {
        $AttErr4= "Please add valid attendee";
      $valid = false;
    }
  }
  // Validate Total number of Attendee equals sub attendees
   if(empty($AttErr1) && empty($AttErr3) && empty($AttErr4) && empty($AttErr2))
   {

        
          $tattendee_val = $_POST['tattendee_val'];    
         $_SESSION['tattendee_val'] = ($tattendee_val); 
          $_SESSION['tyoung'] = (int)test_input($tyoung);
          $_SESSION['tmid'] = (int)test_input($tmid);
          $_SESSION['tuppermid'] = (int)test_input($tuppermid);
          $_SESSION['thigher'] = (int)test_input($thigher);
        
   }

   // Check for Address added to pass details
   if (trim(filter_input(INPUT_POST,"Address")) == "")  
   {
    $_SESSION['Address'] =  null;

     
   }
   else
   {
    $_SESSION['Address'] = test_input(filter_input(INPUT_POST,"Address"));
    $Address = test_input(filter_input(INPUT_POST,"Address"));
   }
   // Check for Offered Events to pass details
   if (trim(filter_input(INPUT_POST,"offered_event")) == "")  
   {
    $_SESSION['offered_event'] =  null;

     
   }
   else
   {
    $_SESSION['offered_event'] = test_input(filter_input(INPUT_POST,"offered_event"));
    $offered_event = test_input(filter_input(INPUT_POST,"offered_event"));
   }
// Check for phone to pass details
  if(!empty(filter_input(INPUT_POST,"phone")))
  {
    $_SESSION['phone'] = test_input(filter_input(INPUT_POST,"phone"));
    $phone = test_input(filter_input(INPUT_POST,"phone"));
  }
  else
  {
    $_SESSION['phone'] =  null; 
  }
   
}// Pass details to other page after validation 
if ($valid == true && isset($_POST['submit'])) 
{
  header('Location: process.php');
  exit();
 // exit 
}
//Function to validate in attendee in number
function Valnum ($a)
{
  if (!preg_match('/^[0-9]+$/', $a))
  {
  return true;
  }
  else 
  return false;

}

/*
// Function to validate total number of Attendee
function Val_attendee()
{
    $s = (int)$_POST["tmid"]+ (int)$_POST["thigher"] +(int) $_POST["tyoung"]+ (int) $_POST["tuppermid"];
    if($_POST["tattendee"] != $s)
    {
        return false;
    }
    else
    {
    return true;
    }
}
*/
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
<!--Main Content-->
<section class="col-1_2">
<h2 class="borderbottom" > Sign up for the Events</h2>
Please fill below details and click on submit when finished.
<br><br>

<!--Form Details -->
<form class="form_style" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>
<legend>Personal Information:</legend>
<div>

<label for="fname"> First Name:
<input type="text" id="fname" name="fname" size="30" maxlength= "60"value="<?php echo $fname;?>">
  <span class="error">* <?php echo $fnameErr;?></span>
</label>
  <br><br>
<label for="lname">Last Name:
<input type="text" id="lname" name="lname" size="30" maxlength= "60" value="<?php echo $lname;?>">
<span class="error">* <?php echo $lnameErr;?></span>
</label>
  <br><br>
<label for="Address">Address:  
<textarea id="Address"name="Address" rows="5" cols="60" ><?php echo $Address;?></textarea>
</label>
  <br>
<label for="email"> E-mail address:
 <input type="text" id="email" name="email" size="30" maxlength= "60" value="<?php echo $email;?>"> 
 <span class="error">* <?php echo $EmailErr;?></span>
 </label>
  <br>
<label for="phone">Phone:
 <input type="tel" id="phone" name="phone" placeholder="000-000-0000" size="30"maxlength= "12" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $phone;?>">
 </label>
  <br>
<label for="EName"> Event Name: 
<select id="events" id="EName" name="EName">
    <option value = "None" selected> None </option>
    <option value = "Shot Hole Borer Citizen Science Project" <?php echo (isset($_POST['EName']) && $_POST['EName'] == 'Shot Hole Borer Citizen Science Project') ? 'selected="selected"' : ''; ?> > Shot Hole Borer Citizen Science Project </option>
    <option value = "Hidden Pacific 3D" <?php echo (isset($_POST['EName']) && $_POST['EName'] == 'Hidden Pacific 3D') ? 'selected="selected"' : ''; ?> > Hidden Pacific 3D </option>
    
</select>
<span class="error">* <?php echo $eventErr;?></span>
</label>
<br>
<label for="tattendee">Total Number of Attendees: <span id='tattendee'> </span> </label><br>
<span class="error"> <?php echo $AttErr;?></span>
<input type="hidden" name="tattendee_val" id="tattendee_val">
 
 </label> 
  <br>
  <label for="tyoung">Number of attendees under 5 years old
 <input type="text" class= "attd" id="tyoung" name="tyoung" size="30" maxlength= "3" value="<?php echo $tyoung;?>">
 <span class="error">* <?php echo $AttErr1;?></span>
 </label>
  <br>
  <label for="tmid">Number of attendees between 5 and 12 years old
 <input type="text" class= "attd" id="tmid" name="tmid" size="30" maxlength= "3" value="<?php echo $tmid;?>">
 <span class="error">* <?php echo $AttErr2;?></span>
 </label>
  <br>
  <label for="text">Number of attendees 13 to 17 years old 
 <input type="text" class= "attd" id="tuppermid" name="tuppermid" size="30" maxlength= "3" value="<?php echo $tuppermid;?>">
 <span class="error">* <?php echo $AttErr3;?></span>
 </label>
  <br>
  <label for="thigher">Number of attendees 18+ years old 
 <input type="text" class= "attd" id="thigher" name="thigher" size="30" maxlength= "3" value="<?php echo $thigher;?>">
 <span class="error">* <?php echo $AttErr4;?></span>
 </label>
  <br>
  <label for="offered_event">List other Events to be offered: 
<textarea id="offered_event"name="offered_event" rows="5" cols="60"><?php echo $offered_event;?></textarea>
</label>
  <br>
  <label class= "check" for="checkbox">
  <input type="checkbox" id="newsletter" name="newsletter" value="register" checked>
  Signup for Newsletter</label><br>
</div>
</fieldset>
<br><br>
<!-- Submit Button --> 
<div>
    <input type="submit" id ="submit" name= "submit" value="Submit">
</div>
</form>
</section>
<!--SideBar-->
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
        <br>
<!--Last Modified Date Time for PHP page to reflect the correct date time-->
        <b>
       <?php
// Time Zone setting.
date_default_timezone_set("America/Los_Angeles");
echo "Last Modified: " . date ("m/d/y H:i:s.", getlastmod());
?></b>
        </section>

</footer>   
</section>

</body>
</html>