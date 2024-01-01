



// Smooth scrolling effect for navbar links
$(document).ready(function() {
    $('a[href^="#"]').on('click', function(event) {
      var target = $(this.getAttribute('href'));
      if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
          scrollTop: target.offset().top - 100
        }, 1000);
      }
    });
  });
  
  // Enable tooltips for social media icons
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
  
  // Form validation for contact form
  $(document).ready(function() {
    $('#contact-form').validate({
      rules: {
        name: {
          required: true,
          minlength: 2
        },
        email: {
          required: true,
          email: true
        },
        message: {
          required: true
        }
      },
      messages: {
        name: {
          required: "Please enter your name",
          minlength: "Your name must consist of at least 2 characters"
        },
        email: {
          required: "Please enter your email address",
          email: "Please enter a valid email address"
        },
        message: {
          required: "Please enter a message"
        }
      },
      submitHandler: function(form) {
        $.ajax({
          type: "POST",
          url: "process.php",
          data: $(form).serialize(),
          success: function() {
            $('#contact-form :input').attr('disabled', 'disabled');
            $('#contact-form').fadeTo( "slow", 0.15, function() {
              $(this).find(':input').attr('disabled', 'disabled');
              $(this).find('label').css('cursor','default');
              $('#success').fadeIn();
            });
          },
          error: function() {
            $('#contact-form').fadeTo( "slow", 0.15, function() {
              $('#error').fadeIn();
            });
          }
        });
      }
    });
  });


  // Function to be called on page load
  function Loader() {
    // Hide the loading animation after a delay
    var loader = document.getElementById('loader');
    setTimeout(function() {
      loader.classList.add('fadeOut');
      // Show the content after the animation fade is finished
      var myDiv = document.getElementById('myDiv');
      myDiv.style.display = 'block';
    }, 1000); // Adjust the delay (in milliseconds) to match the duration of the fade animation
  }


  window.addEventListener("scroll", function() {
    var navbar = document.getElementById("navbar");
    if (window.pageYOffset > 0) {
      navbar.style.backgroundColor = "#111111";
      navbar.style.boxShadow = "0 2px 4px rgba(0, 0, 0, 0.1)";
    } else {
      navbar.style.backgroundColor = "#1111114d";
      navbar.style.boxShadow = "none";
    }
  });
  let nums = document.querySelectorAll(".stats .number");
  let section = document.querySelector(".stats");
  let section2 = document.querySelector(".our-skills");
  let spans = document.querySelectorAll(".the-progress .spans ");
  let started = false; 
  let countDownDate = new Date("feb 22, 2024 23:59:59").getTime();
  window.onscroll = function () {
    if (window.scrollY >= section.offsetTop) {
      if (!started) {
        nums.forEach((num) => startCount(num));
      }
      started = true;
    };
    if (window.scrollY >= section2.offsetTop) {
      console.log("Reached Section Three");
      spans.forEach((span) => {
        span.style.width = span.dataset.width;
      });
    };
  };
  
  function startCount(el) {
    let goal = el.dataset.goal;
    let count = setInterval(() => {
      el.textContent++;
      if (el.textContent == goal) {
        clearInterval(count);
      }
    }, 2500 / goal);
  };
  
  let counter = setInterval(() => {
      // Get Date Now
      let dateNow = new Date().getTime();
    
      // Find The Date Difference Between Now And Countdown Date
      let dateDiff = countDownDate - dateNow;
    
      // Get Time Units
      
      let days = Math.floor(dateDiff / (1000 * 60 * 60 * 24));
      let hours = Math.floor((dateDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((dateDiff % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((dateDiff % (1000 * 60)) / 1000);
    
      document.querySelector(".days").innerHTML = days < 10 ? `0${days}` : days;
      document.querySelector(".hours").innerHTML = hours < 10 ? `0${hours}` : hours;
      document.querySelector(".minutes").innerHTML = minutes < 10 ? `0${minutes}` : minutes;
      document.querySelector(".seconds").innerHTML = seconds < 10 ? `0${seconds}` : seconds;
    
      if (dateDiff < 0) {
        clearInterval(counter);
      }
    }, 1000);

    //funcions for Contact
    function messageResponse(){
      let a=document.forms["contact"]["fname"].value;
      let b=document.forms["contact"]["femail"].value;
      let c=document.forms["contact"]["fmessage"].value;
      
      if (a!= null && a!="" && b!= null && b!="" && c!= null && c!="")

      alert("Your message has sent successfully");
      }

  

    //function for getAPP    

    function embeddedAlert(){
      let a=document.forms["getApp"]["name"].value;
      let b=document.forms["getApp"]["email"].value;
      let c=document.forms["getApp"]["date"].value;
      let d=document.forms["getApp"]["time"].value;
      let e=document.forms["getApp"]["area"].value;
      let f=document.forms["getApp"]["city"].value;
      let g=document.forms["getApp"]["state"].value;
      let h=document.forms["getApp"]["post-code"].value;
      
      if (a!= null && a!="" && b!= null && b!="" && c!= null && c!="" && d!= null && d!="" && e!= null && e!="" && f!= null && f!="" && g!= null && g!="" && h!= null && h!="")
{
      alert("Your Appiontment has been booked successfully");
      alert("Thank You for choosinng Our services");
    
    }
                      
      } 