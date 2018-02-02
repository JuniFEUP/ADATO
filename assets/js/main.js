/*
 * Change Navbar color while scrolling
 */

$(window).scroll(function() {
  handleTopNavAnimation();
});

$(window).load(function() {
  handleTopNavAnimation();
});

function handleTopNavAnimation() {
  var top = $(window).scrollTop();

  if (top > 10) {
    $('#site-nav').addClass('navbar-solid');
  } else {
    $('#site-nav').removeClass('navbar-solid');
  }
}

/*
 * Registration Form
 */

/*$('#registration-form').submit(function(e) {
  e.preventDefault();

  var postForm = { //Fetch form data
    'fname': $('#registration-form #fname').val(),
    'email': $('#registration-form #email').val(),
    'curso': $('#registration-form #curso').val(),
    'ano': $('#registration-form #ano').val()
  };

  $.ajax({
    type: 'POST',
    url: './assets/php/contact.php',
    data: postForm,
    dataType: 'json',
    success: function(data) {
      if (data.success) {
        $('#registration-msg .alert').html("Registration Successful");
        $('#registration-msg .alert').removeClass("alert-danger");
        $('#registration-msg .alert').addClass("alert-success");
        $('#registration-msg').show();
      } else {
        $('#registration-msg .alert').html("Registration Failed");
        $('#registration-msg .alert').removeClass("alert-success");
        $('#registration-msg .alert').addClass("alert-danger");
        $('#registration-msg').show();
      }
    }
  });
});*/

/*
 * SmoothScroll
 */

//smoothScroll.init();


/**
 *  Selector
 */

$(document).ready(function() {
  //esconde o botao do video - ainda nao ha
  $("#video").hide();

  // Add smooth scrolling to all links
  $("a").on("click", function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (1000) specifies the number of milliseconds it takes to scroll to the specified area
      $("html, body").animate(
        {
          scrollTop: $(hash).offset().top
        },
        1000,
        function() {
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        }
      );
    } // End if
  });
  $("p").on("touchstart", function() {
    //simply starts listening for touchstart - allows for hover state on touch devices
  });
});


/**
 * AUDIO CONTROLS
 */
 function aud_play_pause() {
    var myAudio = document.getElementById("audio");
    var icon = document.getElementById("iconBtn");

     if (icon.classList.contains("pauseBtn"))
     {
       icon.classList.add('playBtn');
       icon.classList.remove('pauseBtn');
       myAudio.pause();
     } else {
       icon.classList.add('pauseBtn');
       icon.classList.remove('playBtn');
       myAudio.play();
    }
  }

  $(document).ready(function() {
    // the site has now loaded, grab the video!
    var audio = document.getElementById("audio");
    // now tweak the volume!
    audio.volume = 0.5;
    // now, play it!
    audio.play();
});
