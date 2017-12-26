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

  } else if(icon.hasClass('fa fa-pause fa-lg')){
    icon.removeClass('fa fa-pause fa-lg');
    icon.addClass('fa fa-play fa-lg');

    $(this).addClass('normal-player-column-colorway');
    $(this).removeClass('inverse-player-column-colorway');
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
      "url": "http://soho.wavestreamer.com:6865/listen.pls",
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

var amTenToEleven;
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
var pmTenToEleven;

$(document).ready(function() {

  //setup

  amTenToEleven = new Array(7);
  amTenToEleven[0] = "sunday show 1"; amTenToEleven[1] = "monday show 1"; amTenToEleven[2] = "tuesday show 1"; amTenToEleven[3] = "Wednesday show 1"; 
  amTenToEleven[4] = "Thursday show 1"; amTenToEleven[5] = "Friday show 1"; amTenToEleven[6] = "Saturday show 1";

  amElevenToTwelve = new Array(7);
  amElevenToTwelve[0] = "sunday show 2"; amElevenToTwelve[1] = "monday show 2"; amElevenToTwelve[2] = "tuesday show 2"; amElevenToTwelve[3] = "Wednesday show 2"; 
  amElevenToTwelve[4] = "Thursday show 2"; amElevenToTwelve[5] = "Friday show 2"; amElevenToTwelve[6] = "Saturday show 2";

  pmTwelveToOne = new Array(7);
  pmTwelveToOne[0] = "sunday show 3"; pmTwelveToOne[1] = "monday show 3"; pmTwelveToOne[2] = "tuesday show 3"; pmTwelveToOne[3] = "Wednesday show 3"; 
  pmTwelveToOne[4] = "Thursday show 3"; pmTwelveToOne[5] = "Friday show 3"; pmTwelveToOne[6] = "Saturday show 3"; 

  pmOneToTwo = new Array(7);
  pmOneToTwo[0] = "sunday show 4"; pmOneToTwo[1] = "monday show 4"; pmOneToTwo[2] = "tuesday show 4"; pmOneToTwo[3] = "Wednesday show 4"; 
  pmOneToTwo[4] = "Thursday show 4"; pmOneToTwo[5] = "Friday show 4"; pmOneToTwo[6] = "Saturday show 4"; 

  pmTwoToThree = new Array(7);
  pmTwoToThree[0] = "sunday show 5"; pmTwoToThree[1] = "monday show 5"; pmTwoToThree[2] = "tuesday show 5"; pmTwoToThree[3] = "Wednesday show 5"; 
  pmTwoToThree[4] = "Thursday show 5"; pmTwoToThree[5] = "Friday show 5"; pmTwoToThree[6] = "Saturday show 5"; 

  pmThreeToFour = new Array(7);
  pmThreeToFour[0] = "sunday show 6"; pmThreeToFour[1] = "monday show 6"; pmThreeToFour[2] = "tuesday show 6"; pmThreeToFour[3] = "Wednesday show 6"; 
  pmThreeToFour[4] = "Thursday show 6"; pmThreeToFour[5] = "Friday show 6"; pmThreeToFour[6] = "Saturday show 6"; 

  pmFourToFive = new Array(7);
  pmFourToFive[0] = "sunday show 7"; pmFourToFive[1] = "monday show 7"; pmFourToFive[2] = "tuesday show 7"; pmFourToFive[3] = "Wednesday show 7"; 
  pmFourToFive[4] = "Thursday show 7"; pmFourToFive[5] = "Friday show 7"; pmFourToFive[6] = "Saturday show 7"; 

  pmFiveToSix = new Array(7);
  pmFiveToSix[0] = "sunday show 8"; pmFiveToSix[1] = "monday show 8"; pmFiveToSix[2] = "tuesday show 8"; pmFiveToSix[3] = "Wednesday show 8"; 
  pmFiveToSix[4] = "Thursday show 8"; pmFiveToSix[5] = "Friday show 8"; pmFiveToSix[6] = "Saturday show 8"; 

  pmSixToSeven = new Array(7);
  pmSixToSeven[0] = "sunday show 9"; pmSixToSeven[1] = "monday show 9"; pmSixToSeven[2] = "tuesday show 9"; pmSixToSeven[3] = "Wednesday show 9"; 
  pmSixToSeven[4] = "Thursday show 9"; pmSixToSeven[5] = "Friday show 9"; pmSixToSeven[6] = "Saturday show 9"; 

  pmSevenToEight = new Array(7);
  pmSevenToEight[0] = "sunday show 10"; pmSevenToEight[1] = "monday show 10"; pmSevenToEight[2] = "tuesday show 10"; pmSevenToEight[3] = "Wednesday show 10"; 
  pmSevenToEight[4] = "Thursday show 10"; pmSevenToEight[5] = "Friday show 10"; pmSevenToEight[6] = "Saturday show 10"; 

  pmEightToNine = new Array(7);
  pmEightToNine[0] = "sunday show 11"; pmEightToNine[1] = "monday show 11"; pmEightToNine[2] = "tuesday show 11"; pmEightToNine[3] = "Wednesday show 11"; 
  pmEightToNine[4] = "Thursday show 11"; pmEightToNine[5] = "Friday show 11"; pmEightToNine[6] = "Saturday show 11"; 

  pmNineToTen = new Array(7);
  pmNineToTen[0] = "sunday show 12"; pmNineToTen[1] = "monday show 12"; pmNineToTen[2] = "tuesday show 12"; pmNineToTen[3] = "Wednesday show 12"; 
  pmNineToTen[4] = "Thursday show 12"; pmNineToTen[5] = "Friday show 12"; pmNineToTen[6] = "Saturday show 12"; 

  pmTenToEleven = new Array(7);
  pmTenToEleven[0] = "sunday show 13"; pmTenToEleven[1] = "monday show 13"; pmTenToEleven[2] = "tuesday show 13"; pmTenToEleven[3] = "Wednesday show 13"; 
  pmTenToEleven[4] = "Thursday show 13"; pmTenToEleven[5] = "Friday show 13"; pmTenToEleven[6] = "Saturday show 13"; 






  var d = new Date();
  scheduleCurrentDay = d.getDay();
  updateSchedule(scheduleCurrentDay, d.getHours());
});

function updateSchedule(day, hour){
  var d = new Date();

  var weekday = new Array(7);
  weekday[0] =  "Sunday";
  weekday[1] = "Monday";
  weekday[2] = "Tuesday";
  weekday[3] = "Wednesday";
  weekday[4] = "Thursday";
  weekday[5] = "Friday";
  weekday[6] = "Saturday";

  $('#day-of-week').html(weekday[day]);

  $('#amTenToEleven').html(amTenToEleven[day]);
  $('#amElevenToTwelve').html(amElevenToTwelve[day]);
  $('#pmTwelveToOne').html(pmTwelveToOne[day]);
  $('#pmOneToTwo').html(pmOneToTwo[day]);
  $('#pmTwoToThree').html(pmTwoToThree[day]);
  $('#pmThreeToFour').html(pmThreeToFour[day]);
  $('#pmFourToFive').html(pmFourToFive[day]);
  $('#pmFiveToSix').html(pmFiveToSix[day]);
  $('#pmSixToSeven').html(pmSixToSeven[day]);
  $('#pmSevenToEight').html(amTenToEleven[day]);
  $('#pmEightToNine').html(pmEightToNine[day]);
  $('#pmNineToTen').html(pmNineToTen[day]);
  $('#pmTenToEleven').html(pmTenToEleven[day]);

  $('.blink').addClass('non-blink');
  $('.blink').removeClass('non-blink');
  if(day == d.getDay()){
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
    var attribute = $(this).data('hour');
    if(attribute == hour){
      var nowPlaying = $(this).html();
      $('#now-playing').html(nowPlaying);
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