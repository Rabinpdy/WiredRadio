// Animates play/pause button on click
$(function() {
  $(".amplitude-play-pause").click(function() {
    // $(this).addClass("flipInY").delay(500).queue(function(){
    //   $(this).removeClass("flipInY").dequeue();
    // });
    $(".player-header").toggleClass("player-header-active flash");
    // $(".brand-icon-image").toggleClass("animated flash");
  });
});

// Scroll to top of window on refresh
$(window).on('beforeunload', function() {
  $(window).scrollTop(0);
});

// Hide volume controls on iOS devices
$(function() {
  if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
    $(".amplitude-volume-controls").hide();
  }
});

// Animations heart glyph on click
$(function() {
  $(".glyphicon-heart").click(function() {
    $(this).addClass("animated rubberBand").delay(500).queue(function(){
      $(this).removeClass("animated rubberBand").dequeue();
    });
  });
  // $(".glyphicon-heart").hover(function() {
  //   $(this).addClass("animated rubberBand").delay(500).queue(function(){
  //     $(this).removeClass("animated rubberBand").dequeue();
  //   });
  // });
});

$("#player-column").click(function(){

  $("#make-this-flash").toggleClass("player-header-active animated flash");

  var icon = $('#play-pause-icon');

  if(icon.hasClass('fa-play')){
    icon.removeClass('fa fa-play fa-lg');
    icon.addClass('fa fa-pause fa-lg');

    $(this).removeClass('normal-player-column-colorway');
    $(this).addClass('inverse-player-column-colorway');

    // $(this).removeClass("amplitude-play");
    // $(this).addClass("amplitude-pause");

  } else if(icon.hasClass('fa fa-pause fa-lg')){
    icon.removeClass('fa fa-pause fa-lg');
    icon.addClass('fa fa-play fa-lg');

    $(this).addClass('normal-player-column-colorway');
    $(this).removeClass('inverse-player-column-colorway');
    // $(this).removeClass("amplitude-pause");
    // $(this).addClass("amplitude-play");
  }
});  

// Activates mute button on click
$(function() {
  $(".amplitude-mute").click(function() {
    $(this).toggleClass("amplitude-mute-active");
    $(this).toggleClass("amplitude-mute");
  });
  return false;
});

$(function() {
  $(window).resize(function() {
    console.log("resize");
    var newWidth = $('#navigation').width();
  var newHeight = $('#navigation').height();
  console.log(newHeight); 
  $('#navigation-size-block').width(newWidth);
  $('#navigation-size-block').height(newHeight);
  });
});
// Blinking effect on player header
// function blinker() {
//     $('.player-header-active').fadeOut(1000);
//     $('.player-header-active').fadeIn(1000);
// }
// setInterval(blinker, 2000);

// Amplitude Player
Amplitude.init({
  "songs": [
    {
      // "call_sign": "Call Sign",
      // "station_name": "Station Name",
      // "location": "Location",
      // "frequency": "Freq MHz",
      "url": "http://soho.wavestreamer.com:6865/live",
      "live": true
    }
  ],
  "volume": 0.75
});

$('.navbar').resize(function() {
  var newWidth = $(this).width();
  var newHeight = $(this).height();
  $('#navigation-size-block').width(newWidth);
});

var scheduleCurrentDay;

$('#schedule-main-content').resize(function() {
  console.log("resize");
  var newHeight = $(this).height();

  $('#schedule-left-button').height(newHeight);
  $('#schedule-right-button').height(newHeight);
});

$('#schedule-left-button').click(function() {
  if(scheduleCurrentDay == 0){
    scheduleCurrentDay = 6;
  } else {
    scheduleCurrentDay--;
  }
  updateSchedule(scheduleCurrentDay);
});

$('#schedule-right-button').click(function() {
  if(scheduleCurrentDay == 6){
    scheduleCurrentDay = 0;
  } else {
    scheduleCurrentDay++;
  }

  updateSchedule(scheduleCurrentDay);
});

var amElevenToTwelve;
var pmTwelveToOne;
var pmOneToTwo;
var pmTwoToThree;
var pmThreeToFour;
var pmFourToFive;
var pmFiveToSix;
var pmSixToSeven;
var pmSevenToEight;
var pmEightToNine;
var pmNineToTen;

$(document).ready(function() {
  var d = new Date();
  scheduleCurrentDay = d.getDay();
  updateSchedule(scheduleCurrentDay);
});

function updateSchedule(day){
  var d = new Date();
  var actualDay = d.getDay();
  var hour = d.getHours();

  var weekday = new Array(7);
  weekday[0] =  "Sunday";
  weekday[1] = "Monday";
  weekday[2] = "Tuesday";
  weekday[3] = "Wednesday";
  weekday[4] = "Thursday";
  weekday[5] = "Friday";
  weekday[6] = "Saturday";

  $('#day-of-week').html(weekday[day]);

  console.log("day = " + day);

  if(day == 3){
    console.log(amTenToEleven[day]);
   console.log(amElevenToTwelve[day]);
    console.log(pmTwelveToOne[day]);     
  }

  $('#amTenToEleven').html(amTenToEleven[day]);
  $('#amElevenToTwelve').html(amElevenToTwelve[day]);
  $('#pmTwelveToOne').html(pmTwelveToOne[day]);
  $('#pmOneToTwo').html(pmOneToTwo[day]);
  $('#pmTwoToThree').html(pmTwoToThree[day]);
  $('#pmThreeToFour').html(pmThreeToFour[day]);
  $('#pmFourToFive').html(pmFourToFive[day]);
  $('#pmFiveToSix').html(pmFiveToSix[day]);
  $('#pmSixToSeven').html(pmSixToSeven[day]);
  $('#pmSevenToEight').html(pmSevenToEight[day]);
  $('#pmEightToNine').html(pmEightToNine[day]);
  $('#pmNineToTen').html(pmNineToTen[day]);

  $('.blink').addClass('non-blink');
  $('.blink').removeClass('blink');
  if(day == actualDay){
    $('.non-blink').each(function() {
      var attribute = $(this).data('hour');
      if(attribute == hour){
        $(this).removeClass('non-blink');
        $(this).addClass('blink');
        blink('.blink');
      }
    });
  }

  $('.show-placeholder').each(function() {
    if(scheduleCurrentDay == actualDay){
      var attribute = $(this).data('hour');
      if(attribute == hour){
        var nowPlaying = $(this).html();
        $('#now-playing').html(nowPlaying);
      }
    }
  });
}

function openChat() {
  window.open('chat.html', 'chat', 'width=400, height=400');
}

function blink(selector){
$(selector).fadeOut('slow', function(){
    $(this).fadeIn('slow', function(){
        blink(this);
    });
});
}