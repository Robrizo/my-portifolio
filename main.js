//start of page greeting JS
function pageGreeting() {
    var currentTime = new Date();
    var currentHour = currentTime.getHours();
    var greeting;

    if (currentHour < 12) {
    greeting = "Good morning!!!";
    } else if (currentHour < 18) {
    greeting = "Good afternoon!!!";
    } else {
    greeting = "Good evening!!!";
    }

    document.getElementById("greeting").textContent = greeting;
}

pageGreeting();
//end of page greeting JS

// start of background slideshow JS.
var i = 0;
var images = [];
var slideTime = 3000; 

images[0] = './images/main_img.jpg';
images[1] = './images/bg-image-one.jpg';
images[2] = './images/bg-image-two.jpg';

function changePicture() {
    document.getElementsByClassName("main_page")[0].style.background = 'linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.5)), url("' + images[i] + '")center/cover no-repeat fixed';

    if (i < images.length - 1) {
        i++;
    } else {
        i = 0;
    }

    setTimeout(changePicture, slideTime);
}

changePicture(); 
// End of background slideshow JS.
