<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="favicon.ico"> -->

    <title>Wired Radio</title>
    <link rel="icon" href="images/logo.ico" style = "border-radius:50%"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/custom-styles.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <!--font awesome cdn -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <?php
    $mysqli = new mysqli("localhost", "", "", "wiredradio");
  ?>
  <body>

    <div id = "navigation-size-block" style="position: absolute;"></div>
    <!-- Navbar with logo -->
    <nav class="navbar navbar-inverse navbar-static-top" id = "navigation" style = "border-top: none; position: fixed; width: 100%">
      <div class="container-fluid">
        <div class="row row-eq-height no-gutters">
          <div class="col-sm-2" style = "min-height: 50px" id = "wired-nav-box1">
            <a class="navbar-brand" href="www.wiredradio.co.uk">
              <img alt="Wired Radio" src="images/navbar-logo.png">
            </a>
          </div>
          <div class="col-sm-5 vertical-align-parent normal-player-column-colorway button amplitude-play-pause amplitude-paused" id = "player-column" style="min-height: 30px;">
            <div class = "row row-eq-height">
              <div class = "container-fluid">
                <div class = "col-xs-12 vertical-align-parent" style = "display: table">
                  <p style = "display: table-cell; vertical-align: middle;">
                    <i class="fa fa-play fa-lg" aria-hidden="true" style="padding-right: 10px" id = "play-pause-icon"></i>
                    <span id = "make-this-flash">ON AIR</span> :
                    <i><b><span id = "now-playing"></span></b></i>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class = "col-sm-5 vertical-align-parent" style = "min-height: 30px; color: white" id = "wired-nav-box3">
            <div class = "row row-eq-height">
              <div class = "social-icon">
                <p id = "navbar-icon">
                  <a href = "https://www.facebook.com/wiredgold/" target="_blank">
                      <i class="fa fa-facebook-official" aria-hidden="true"></i>
                  </a>
                </p>
              </div>
              <div class = "social-icon" style = "margin-left: 40px">
                <p id = "navbar-icon">
                  <a href = "https://www.mixcloud.com/wiredgold/" target="_blank">
                      <i class="fa fa-mixcloud" aria-hidden="true"></i>
                  </a>
                </p>
              </div>
              <div class = "social-icon" style = "margin-left: 85px">
                <p id = "navbar-icon">
                  <a href = "https://www.instagram.com/wiredgold/" target="_blank">
                      <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </p>
              </div>
              <div class = "social-icon" style = "margin-left: 125px">
                <p id = "navbar-icon">
                  <a href = "https://twitter.com/wiredgold" target="_blank">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                </p>
              </div>
              <div id = "chat-div" onclick="openChat();" >
                <p id = "navbar-icon">
                  <svg width="100%" height="100%" overflow="hidden" viewBox="0 0 100 100" id = "chat-svg" style = " position: absolute; top: 0; bottom:0; margin:auto; vertical-align: middle;  margin-left: 65%; fill:#a0a0a0; padding-top: 1px"><path d="M 0 0 L 100 0 100 68 0 68 0 0 Z" stroke="#a0a0a0" stroke-width="0" fill="#ffffff" fill-opacity="1" shape-rendering="crispEdges" class = "on-hover"></path><path d="M 42 66 42 100 18 66 Z" stroke="#ffffff" stroke-width="0" fill="#ffffff" fill-opacity="1" class = "on-hover"></path></svg>
                  <span>CHAT</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="container" id = "logo-container">
      <div class="row">
        <img alt="Icon" class="brand-icon-image center-block" src="images/background-icon-dark.png">
      </div>
    </div>


<!-- RECENTLY PODCASTED SHOWS SECTION NOT LIVE YET -->    

<!--       <div class = "container-fluid">
        <div class="col-xs-3" style = "">
          <i>RECENT SHOWS</i>
        </div>
      </div>

      <!-- Amplitude mute and volume controls 
      <div class="container amplitude-volume-controls">
        <div class="row">
          <div class="col-md-2 col-xs-2">
          </div>
          <div class="col-md-9 col-xs-9">
          </div>
          <div class="col-md-offset-1 col-xs-offset-1"></div>
        </div>
      </div>
      <div class="container">
        <div class="row">
        </div>
      </div>

    </div> -->
    
<!--     <div style = "width:100%; min-height: 300px; background-color: #1e1e23; padding: 2.5%; overflow-x:auto; overflow-y:hidden; display: block; position: relative;">
      <div style = "min-width: 5000px;">

        <?php 
          $result = $mysqli->query("SELECT * FROM uploaded_shows ORDER BY upload_number DESC");
          $i = 1;
          while($row = $result->fetch_assoc()){
            if($i > 12){
              break;
            }
            echo $row['upload_number'];
            echo "<div class = 'podcast'>";

            echo "<iframe width='100%' height='375' src='https://www.mixcloud.com/widget/iframe/?light=1&feed=%2Fwiredgold%2F" . $row["link"] . "%2F' frameborder='0' ></iframe>";
            echo "<br> " . $row["show_name"] . " <br> " . $row["date"];
            echo "</div>"; 
            echo $row["link"];

            $i++;
          }
        ?>
      </div>
    </div> -->

    <div class = "container-fluid" style = "padding-top: 20px">
      <div class="col-xs-3">
        <i>LIVE SCHEDULE</i>
      </div>
    </div>
    <div style = "width:100%; min-height: 300px; background-color: #1e1e23; padding: 2.5%;overflow-x:auto; overflow-y:hidden; display: block; position: relative;">
      <div class = "container" id = "schedule" style = "color: white">  
        <div class="col-xs-2" id = "schedule-left-button">
          <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </div>
        <div class = "col-xs-8" id = "schedule-main-content">
        <div class = "col-xs-12">
          <div id = "day-of-week">
            <b> Monday </b>
          </div>
        </div>
        <div class = "col-sm-6">
        <div class = "row">
            <div class="show-row">
              <div class = "non-blink" data-hour = "10"></div>
              <div class = "show-row-content">
                10:00 - 11:00 <span class = "show-placeholder" id = "amTenToEleven" data-hour = "10">Show 1</span>
              </div>
            </div>
          </div>
          <div class = "row">
            <div class="show-row">
              <div class = "non-blink" data-hour = "11"></div>
              <div class = "show-row-content">
                11:00 - 12:00 <span class = "show-placeholder" id = "amElevenToTwelve" data-hour = "11">Show 1</span>
              </div>
            </div>      
          </div>
          <div class = "row">
            <div class="show-row">
              <div class = "non-blink" data-hour = "12"></div>
              <div class = "show-row-content">
                12:00 - 13:00 <span class = "show-placeholder" id = "pmTwelveToOne" data-hour = "12">Show 1</span>
              </div>
            </div>      
          </div>
          <div class = "row">
            <div class="show-row">
              <div class = "non-blink" data-hour = "13"></div>
              <div class = "show-row-content">
                13:00 - 14:00 <span class = "show-placeholder" id = "pmOneToTwo" data-hour = "13">Show 1</span>
              </div>
            </div>     
          </div>
          <div class = "row">
            <div class="show-row">
              <div class = "non-blink" data-hour = "14"></div>
              <div class = "show-row-content">
                14:00 - 15:00 <span class = "show-placeholder" id = "pmTwoToThree" data-hour = "14">Show 1</span>
              </div>
            </div>      
          </div>
          <div class = "row">
            <div class="show-row">
              <div class = "non-blink" data-hour = "15"></div>
              <div class = "show-row-content">
                15:00 - 16:00 <span class = "show-placeholder" id = "pmThreeToFour" data-hour = "15">Show 1</span>
              </div>
            </div>      
          </div>
        </div>
        <div class = "col-sm-6">
          <div class = "row">
            <div class="show-row">
              <div class = "non-blink" data-hour = "16"></div>
              <div class = "show-row-content">
                16:00 - 17:00 <span class = "show-placeholder" id = "pmFourToFive" data-hour = "16">Show 1</span>
              </div>
            </div>      
          </div>
          <div class = "row">
            <div class="show-row">
              <div class = "non-blink" data-hour = "17"></div>
              <div class = "show-row-content">
                17:00 - 18:00 <span class = "show-placeholder" id = "pmFiveToSix" data-hour = "17">Show 1</span>
              </div>
            </div>      
          </div>
          <div class = "row">
            <div class="show-row">
              <div class = "non-blink" data-hour = "18"></div>
              <div class = "show-row-content">
                18:00 - 19:00 <span class = "show-placeholder" id = "pmSixToSeven" data-hour = "18">Show 1</span>
              </div>
            </div>      
          </div>
        <div class = "row">
          <div class="show-row">
            <div class = "non-blink" data-hour = "19"></div>
            <div class = "show-row-content">
              19:00 - 20:00 <span class = "show-placeholder" id = "pmSevenToEight" data-hour = "19">Show 1</span>
            </div>
          </div>      
        </div>
        <div class = "row">
          <div class="show-row">
            <div class = "non-blink" data-hour = "20"></div>
            <div class = "show-row-content">
              20:00 - 21:00 <span class = "show-placeholder" id = "pmEightToNine" data-hour = "20">Show 1</span>
            </div>
          </div>      
        </div>
        <div class = "row">
          <div class="show-row">
            <div class = "non-blink" data-hour = "21"></div>
            <div class = "show-row-content">
             21:00 - 22:00 <span class = "show-placeholder" id = "pmNineToTen" data-hour = "21">Show 1</span>
            </div>
          </div>      
        </div>
        </div>
        </div>
        <div class = "col-xs-2" id = "schedule-right-button">
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </div>
      </div>
    </div>


<!-- RESIDENT DJS SECTION NOT LIVE YET -->
<!--     <div class = "container-fluid" style = "padding-top: 25px">
      <div class="col-xs-3">
        <i>RESIDENT DJS</i>
      </div>
    </div>
    <div style = "width:100%; min-height: 300px; background-color: #1e1e23; padding: 2.5%;overflow-x:auto; overflow-y:hidden; display: block; position: relative;">
      <div class = "container-fluid">
        <div class = "row">
          <?php 
            $result = $mysqli->query("select * from residents order by resident_name ASC");
            while($row = $result->fetch_assoc()){
              echo '<a href="resident.php?id=' . $row["resident_id"] . '">
                      <div class = "col-sm-6 col-md-3 show-container">
                        <div class = "container-fluid resident-dj-container">
                          <div class = "row">
                            <img src = "' . $row["image_name"] . '">
                          </div>
                          <div class = "row">' . $row["resident_name"] . 
                          '</div>
                        </div>
                      </div>
                    </a>';
            }
          ?> 
        </div>
      </div>
    </div> -->

    <!-- Main text content -->
    <div class="container">
      <div class="main-content animated fadeIn">
        <div class="row">
          <div class="col-sm-6 col-xs-12">
          <br>
            <h2>About</h2>
            <p>Wired is Goldsmiths University's digital radio station. Over 80 shows. 7 days a week. 10am until late.</p>
          </div>
          <div class="col-sm-6 col-xs-12">
          <br>
            <h2>Contact</h2>
            <p>If you'd like to get in touch, send us an email at
              <script>
              emailE=('management@' + 'wiredradio.co.uk')
              document.write('<A href="mailto:' + emailE + '">' + emailE + '</a>' + "")
              </script>.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer credits -->
    <div class="footer footer-copyright navbar-fixed-bottom animated slideInUp">
      <p>Website by <a href='mailto:kelvin.van_vuuren@kcl.ac.uk' target="_blank">Kelvin</a></p>
      <p>Copyright © <script>document.write(new Date().getFullYear());</script></p>
    </div>

    <!-- Scripts -->
    <?php

        function getShow($day, $time, $mysqli){
          $command = 'select resident_name from schedule_time_slot where day = ' . $day . ' AND time = ' . $time . ';';
          $result = $mysqli->query($command);
          $show;

          while($row = $result->fetch_assoc()){
            $show = $row['resident_name'];
          }
          return $show;
        }

        $sundayShow1 = getShow('0', '1011', $mysqli);
        $sundayShow2 = getShow('0','1112', $mysqli);
        $sundayShow3 = getShow('0','1201', $mysqli);
        $sundayShow4 = getShow('0','102', $mysqli);
        $sundayShow5 = getShow('0','203', $mysqli);
        $sundayShow6 = getShow('0','304', $mysqli);
        $sundayShow7 = getShow('0', '0405', $mysqli);
        $sundayShow8 = getShow('0', '506', $mysqli);
        $sundayShow9 = getShow('0', '607', $mysqli);
        $sundayShow10 = getShow('0', '708', $mysqli);
        $sundayShow11 = getShow('0', '809', $mysqli);
        $sundayShow12 = getShow('0', '910', $mysqli);

        $mondayShow1 = getShow('1', '1011', $mysqli);
        $mondayShow2 = getShow('1','1112', $mysqli);
        $mondayShow3 = getShow('1','1201', $mysqli);
        $mondayShow4 = getShow('1','102', $mysqli);
        $mondayShow5 = getShow('1','203', $mysqli);
        $mondayShow6 = getShow('1','304', $mysqli);
        $mondayShow7 = getShow('1','0405', $mysqli);
        $mondayShow8 = getShow('1','506', $mysqli);
        $mondayShow9 = getShow('1','607', $mysqli);
        $mondayShow10 = getShow('1','708', $mysqli);
        $mondayShow11 = getShow('1','809', $mysqli);
        $mondayShow12 = getShow('1','910', $mysqli);

        $tuesdayShow1 = getShow('2', '1011', $mysqli);
        $tuesdayShow2 = getShow('2', '1112', $mysqli);
        $tuesdayShow3 = getShow('2', '1201', $mysqli);
        $tuesdayShow4 = getShow('2', '102', $mysqli);
        $tuesdayShow5 = getShow('2', '203', $mysqli);
        $tuesdayShow6 = getShow('2', '304', $mysqli);
        $tuesdayShow7 = getShow('2', '0405', $mysqli);
        $tuesdayShow8 = getShow('2', '506', $mysqli);
        $tuesdayShow9 = getShow('2', '607', $mysqli);
        $tuesdayShow10 = getShow('2', '708', $mysqli);
        $tuesdayShow11 = getShow('2', '809', $mysqli);
        $tuesdayShow12 = getShow('2', '910', $mysqli);

        $wednesdayShow1 = getShow('3', '1011', $mysqli);
        $wednesdayShow2 = getShow('3', '1112', $mysqli);
        $wednesdayShow3 = getShow('3', '1201', $mysqli);
        $wednesdayShow4 = getShow('3', '102', $mysqli);
        $wednesdayShow5 = getShow('3', '203', $mysqli);
        $wednesdayShow6 = getShow('3', '304', $mysqli);
        $wednesdayShow7 = getShow('3', '0405', $mysqli);
        $wednesdayShow8 = getShow('3', '506', $mysqli);
        $wednesdayShow9 = getShow('3', '607', $mysqli);
        $wednesdayShow10 = getShow('3', '708', $mysqli);
        $wednesdayShow11 = getShow('3', '809', $mysqli);
        $wednesdayShow12 = getShow('3', '910', $mysqli);

        $thursdayShow1 = getShow('4', '1011', $mysqli);
        $thursdayShow2 = getShow('4', '1112', $mysqli);
        $thursdayShow3 = getShow('4', '1201', $mysqli);
        $thursdayShow4 = getShow('4', '102', $mysqli);
        $thursdayShow5 = getShow('4', '203', $mysqli);
        $thursdayShow6 = getShow('4', '304', $mysqli);
        $thursdayShow7 = getShow('4', '0405', $mysqli);
        $thursdayShow8 = getShow('4', '506', $mysqli);
        $thursdayShow9 = getShow('4', '607', $mysqli);
        $thursdayShow10 = getShow('4', '708', $mysqli);
        $thursdayShow11 = getShow('4', '809', $mysqli);
        $thursdayShow12 = getShow('4', '910', $mysqli);

        $fridayShow1 = getShow('5', '1011', $mysqli);
        $fridayShow2 = getShow('5', '1112', $mysqli);
        $fridayShow3 = getShow('5', '1201', $mysqli);
        $fridayShow4 = getShow('5', '102', $mysqli);
        $fridayShow5 = getShow('5', '203', $mysqli);
        $fridayShow6 = getShow('5', '304', $mysqli);
        $fridayShow7 = getShow('5', '0405', $mysqli);
        $fridayShow8 = getShow('5', '506', $mysqli);
        $fridayShow9 = getShow('5', '607', $mysqli);
        $fridayShow10 = getShow('5', '708', $mysqli);
        $fridayShow11 = getShow('5', '809', $mysqli);
        $fridayShow12 = getShow('5', '910', $mysqli);

        $saturdayShow1 = getShow('6', '1011', $mysqli);
        $saturdayShow2 = getShow('6', '1112', $mysqli);
        $saturdayShow3 = getShow('6', '1201', $mysqli);
        $saturdayShow4 = getShow('6', '102', $mysqli);
        $saturdayShow5 = getShow('6', '203', $mysqli);
        $saturdayShow6 = getShow('6', '304', $mysqli);
        $saturdayShow7 = getShow('6', '0405', $mysqli);
        $saturdayShow8 = getShow('6', '506', $mysqli);
        $saturdayShow9 = getShow('6', '607', $mysqli);
        $saturdayShow10 = getShow('6', '708', $mysqli);
        $saturdayShow11 = getShow('6', '809', $mysqli);
        $saturdayShow12 = getShow('6', '910', $mysqli);
      

    ?> 
    
    <script type="text/javascript">
      var amTenToEleven = new Array(7);
      amTenToEleven[0] = <?php echo json_encode($sundayShow1); ?>; amTenToEleven[1] = <?php echo json_encode($mondayShow1); ?>; amTenToEleven[2] = <?php echo json_encode($tuesdayShow1); ?>; amTenToEleven[3] = <?php echo json_encode($wednesdayShow1); ?>; amTenToEleven[4] = <?php echo json_encode($thursdayShow1); ?>; amTenToEleven[5] = <?php echo json_encode($fridayShow1); ?>; amTenToEleven[6] = <?php echo json_encode($saturdayShow1); ?>;

      var amElevenToTwelve = new Array(7);
      amElevenToTwelve[0] = <?php echo json_encode($sundayShow2); ?>; amElevenToTwelve[1] = <?php echo json_encode($mondayShow2); ?>; amElevenToTwelve[2] = <?php echo json_encode($tuesdayShow2); ?>; amElevenToTwelve[3] = <?php echo json_encode($wednesdayShow2); ?>; 
      amElevenToTwelve[4] = <?php echo json_encode($thursdayShow2); ?>; amElevenToTwelve[5] = <?php echo json_encode($fridayShow2); ?>; amElevenToTwelve[6] = <?php echo json_encode($saturdayShow2); ?>;

      var pmTwelveToOne = new Array(7);
      pmTwelveToOne[0] = <?php echo json_encode($sundayShow3); ?>; pmTwelveToOne[1] = <?php echo json_encode($mondayShow3); ?>; pmTwelveToOne[2] = <?php echo json_encode($tuesdayShow3); ?>; pmTwelveToOne[3] = <?php echo json_encode($wednesdayShow3); ?>; 
      pmTwelveToOne[4] = <?php echo json_encode($thursdayShow3); ?>; pmTwelveToOne[5] = <?php echo json_encode($fridayShow3); ?>; pmTwelveToOne[6] = <?php echo json_encode($saturdayShow3); ?>;

      var pmOneToTwo= new Array(7);
      pmOneToTwo[0] = <?php echo json_encode($sundayShow4); ?>; pmOneToTwo[1] = <?php echo json_encode($mondayShow4); ?>; pmOneToTwo[2] = <?php echo json_encode($tuesdayShow4); ?>; pmOneToTwo[3] = <?php echo json_encode($wednesdayShow4); ?>; 
      pmOneToTwo[4] = <?php echo json_encode($thursdayShow4); ?>; pmOneToTwo[5] = <?php echo json_encode($fridayShow4); ?>; pmOneToTwo[6] = <?php echo json_encode($saturdayShow4); ?>;

      var pmTwoToThree = new Array(7);
      pmTwoToThree[0] = <?php echo json_encode($sundayShow5); ?>; pmTwoToThree[1] = <?php echo json_encode($mondayShow5); ?>; pmTwoToThree[2] = <?php echo json_encode($tuesdayShow5); ?>; pmTwoToThree[3] = <?php echo json_encode($wednesdayShow5); ?>; 
      pmTwoToThree[4] = <?php echo json_encode($thursdayShow5); ?>; pmTwoToThree[5] = <?php echo json_encode($fridayShow5); ?>; pmTwoToThree[6] = <?php echo json_encode($saturdayShow5); ?>;

      var pmThreeToFour = new Array(7);
      pmThreeToFour[0] = <?php echo json_encode($sundayShow6); ?>; pmThreeToFour[1] = <?php echo json_encode($mondayShow6); ?>; pmThreeToFour[2] = <?php echo json_encode($tuesdayShow6); ?>; pmThreeToFour[3] = <?php echo json_encode($wednesdayShow6); ?>; 
      pmThreeToFour[4] = <?php echo json_encode($thursdayShow6); ?>; pmThreeToFour[5] = <?php echo json_encode($fridayShow6); ?>; pmThreeToFour[6] = <?php echo json_encode($saturdayShow6); ?>;

      var pmFourToFive = new Array(7);
      pmFourToFive[0] = <?php echo json_encode($sundayShow7); ?>; pmFourToFive[1] = <?php echo json_encode($mondayShow7); ?>; pmFourToFive[2] = <?php echo json_encode($tuesdayShow7); ?>; pmFourToFive[3] = <?php echo json_encode($wednesdayShow7); ?>; 
      pmFourToFive[4] = <?php echo json_encode($thursdayShow7); ?>; pmFourToFive[5] = <?php echo json_encode($fridayShow7); ?>; pmFourToFive[6] = <?php echo json_encode($saturdayShow7); ?>;

      var pmFiveToSix = new Array(7);
      pmFiveToSix[0] = <?php echo json_encode($sundayShow8); ?>; pmFiveToSix[1] = <?php echo json_encode($mondayShow8); ?>; pmFiveToSix[2] = <?php echo json_encode($tuesdayShow8); ?>; pmFiveToSix[3] = <?php echo json_encode($wednesdayShow8); ?>; 
      pmFiveToSix[4] = <?php echo json_encode($thursdayShow8); ?>; pmFiveToSix[5] = <?php echo json_encode($fridayShow8); ?>; pmFiveToSix[6] = <?php echo json_encode($saturdayShow8); ?>;

      var pmSixToSeven = new Array(7);
      pmSixToSeven[0] = <?php echo json_encode($sundayShow9); ?>; pmSixToSeven[1] = <?php echo json_encode($mondayShow9); ?>; pmSixToSeven[2] = <?php echo json_encode($tuesdayShow9); ?>; pmSixToSeven[3] = <?php echo json_encode($wednesdayShow9); ?>; 
      pmSixToSeven[4] = <?php echo json_encode($thursdayShow9); ?>; pmSixToSeven[5] = <?php echo json_encode($fridayShow9); ?>; pmSixToSeven[6] = <?php echo json_encode($saturdayShow9); ?>;

      var pmSevenToEight= new Array(7);
      pmSevenToEight[0] = <?php echo json_encode($sundayShow10); ?>; pmSevenToEight[1] = <?php echo json_encode($mondayShow10); ?>; pmSevenToEight[2] = <?php echo json_encode($tuesdayShow10); ?>; pmSevenToEight[3] = <?php echo json_encode($wednesdayShow10); ?>; 
      pmSevenToEight[4] = <?php echo json_encode($thursdayShow10); ?>; pmSevenToEight[5] = <?php echo json_encode($fridayShow10); ?>; pmSevenToEight[6] = <?php echo json_encode($saturdayShow10); ?>;

      var pmEightToNine = new Array(7);
      pmEightToNine[0] = <?php echo json_encode($sundayShow11); ?>; pmEightToNine[1] = <?php echo json_encode($mondayShow11); ?>; pmEightToNine[2] = <?php echo json_encode($tuesdayShow11); ?>; pmEightToNine[3] = <?php echo json_encode($wednesdayShow11); ?>; 
      pmEightToNine[4] = <?php echo json_encode($thursdayShow11); ?>; pmEightToNine[5] = <?php echo json_encode($fridayShow11); ?>; pmEightToNine[6] = <?php echo json_encode($saturdayShow11); ?>;

      var pmNineToTen = new Array(7);
      pmNineToTen[0] = <?php echo json_encode($sundayShow12); ?>; pmNineToTen[1] = <?php echo json_encode($mondayShow12); ?>; pmNineToTen[2] = <?php echo json_encode($tuesdayShow12); ?>; pmNineToTen[3] = <?php echo json_encode($wednesdayShow12); ?>; 
      pmNineToTen[4] = <?php echo json_encode($thursdayShow12); ?>; pmNineToTen[5] = <?php echo json_encode($fridayShow12); ?>; pmNineToTen[6] = <?php echo json_encode($saturdayShow12); ?>;

    </script>

    <script src="js/amplitude.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/main.js"></script> -->
    <script src="js/main_test.js"></script>

  </body>

</html>
