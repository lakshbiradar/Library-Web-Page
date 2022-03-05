/*
Biradar, Lakshmi
Red_ID: 825975651
CS545_00
Assignment #4
Fall 2020
Instructor:Cyndi Chie
*/

// Anonymous function  with one parameter to return the DOM element
var $= function (id) {
    "use strict";
    return document.getElementById(id);
};

// Anonymous function for Last modified date
function last_modified () {
    "use strict";
    var x = document.lastModified;
    $("lastModified").innerHTML= `Last Modified: ${x} `;
};

//Function to calculate total Attendees

function totalAttendees(){
    var x = 0;
    var patt = /^[0-9]+$/; //validating the attendee data before adding it to total count.

    x += !patt.test($("tyoung").value) || $("tyoung").value=="" ? 0: parseInt($("tyoung").value);
    x += !patt.test($("tmid").value) || $("tyoung").value=="" ? 0: parseInt($("tmid").value);
    x += !patt.test($("thigher").value) || $("tyoung").value=="" ? 0: parseInt($("thigher").value);
    x += !patt.test($("tuppermid").value) || $("tuppermid").value=="" ? 0: parseInt($("tuppermid").value);
    $("tattendee").innerHTML = x; // To display on page.
    $("tattendee_val").value = x; // assign it to hidden input field value for sending to confirmation page
};

// Function to convert First and Last name to uppercase

function convertUppercase (){
"use strict";
    var fName = $('fname').value;
    var lName = $('lname').value;
    var a = fName.toLowerCase().split(/(-|'|\.| )/); //splits string based on hyphen, full stop and aphostrophe.
    var b = lName.toLowerCase().split(/(-|'|\.| )/);
    for (var i=0; i< a.length ; i++)
    {
        a[i] = a[i].charAt(0).toUpperCase() + a[i].substring(1);
        // to convert first character to uppercase and append other string
    }
    for (var i=0; i< b.length ; i++)
    {
        b[i] = b[i].charAt(0).toUpperCase() + b[i].substring(1);
    }
    $('fname').value = a.join(''); // join the string.
    $('lname').value = b.join('');
};

// Real time validation on Attendee   - Extra feature
function verifynUpdate() {
    window.console.log(this.id);
    var x = this.id;
    var a = $(`${this.id}`).value;
    var patt = /^[0-9]+$/;
    var result = patt.test(a);
    if (result === false)
    {
    $(`${this.id}`).nextElementSibling.textContent = "* Please add valid attendee"; // append error for invalid input
// Re- Calculate total Attendee when user changes data from valid to invalid to reflect total count for valid data only.
    totalAttendees();
    }  
    else if (result === true)
    {
        $(`${this.id}`).nextElementSibling.textContent = "*"; //to retain 'orginal page design'after user adds valid input.
//Calculate total Attendee after validating.
        totalAttendees();
    } 
    };
// Function for Accordion. - Extra Feature
    function acord () {
        this.classList.toggle("active1");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") { 
          panel.style.display = "none"; // to switch back the display to none for already opened section on click.
        } else {
          panel.style.display = "block"; //to change display from none to block if not clicked earlier. 
        }
      };


// Adding Event listener to reflect the data on Load
window.addEventListener("load", function () {

// Event listner to validate and Calculate Attendee on Change 
    [...document.querySelectorAll('.attd')].forEach (function (e){
        e.addEventListener ("change", verifynUpdate);
    });
// Check to Execute only for the Forms
 var checkForm = document.getElementsByClassName('form_style');
 
   if(checkForm.length > 0){
//Event listner to convert the Name to uppercase after adding/updating the details
    $("fname").addEventListener("change", convertUppercase);
    $("lname").addEventListener("change", convertUppercase);
    totalAttendees();
    }
// check to reflect last modified date for HTML page. PHP has different logic added on Page
var checkID = $("lastModified");
 if(checkID)
 {
    last_modified();
 }
 // Event listner for click - Accordion.
 [...document.querySelectorAll('.accordion')].forEach (function (e){
    e.addEventListener ("click", acord);
});
var checkCarousel = document.getElementsByClassName('carousel');
if( checkCarousel.length >0)
{
var slideIndex = 0;
Carousel();
//Function for Slideshow.
function Carousel() {
  var i;
  var slides = document.getElementsByClassName("Slides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active2", "");// removal of class.
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active2";// add of class.
  setTimeout(Carousel, 2000); // Change image every 2 seconds
}}
});
// Functionality to add Sticky Navbar on Scroll
document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('scroll', navFix);
    var nav = document.getElementById("navbar");
    var sticky = nav.offsetTop; // calculating the position of navbar.

    function navFix() {
        if (window.pageYOffset >= sticky) { // check if window offset is greater than nav offset
          navbar.classList.add("sticky"); //Assign class sticky which defines fixed position at top for nav
        } else {
          navbar.classList.remove("sticky"); // remove the class to switch back to orginal positioning.
        }
      }
  });

