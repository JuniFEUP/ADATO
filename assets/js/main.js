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
