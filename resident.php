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
    $mysqli = new mysqli("localhost", "root", "PinkWired1", "wiredradio");
    $resident_id = $_GET['id'];
    $sqlCommand = "SELECT * FROM residents WHERE resident_id = " . $resident_id . ";";
    $result = $mysqli->query($sqlCommand);
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
          <div class="col-sm-5 vertical-align-parent normal-player-column-colorway" id = "player-column" style="min-height: 30px;">
            <div class = "row row-eq-height">
              <div class = "container-fluid">
                <div class = "col-xs-12 vertical-align-parent" style = "display: table">
                  <p style = "display: table-cell; vertical-align: middle;">
                    <i class="fa fa-play fa-lg" aria-hidden="true" style="padding-right: 10px" id = "play-pause-icon"></i>
                    <span id = "make-this-flash">ON AIR</span> :
                    <i><b><span id = "now-playing">Resumes 16th October</span></b></i>
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
<!--         <img alt="Icon" class="brand-icon-image center-block" src="images/background-icon-dark.png">
 -->      </div>
    </div>
    <div style = "width:100%; min-height: 300px; padding: 2.5%;overflow-x:auto; overflow-y:hidden; display: block; position: relative;">
      <div class = "container-fluid">
        <div class = "row">
          <div class = "col-sm-4 col-xs-2"></div>
          <div class = "col-sm-4 col-xs-8" style = "background-color: #1e1e23; color:white; padding-top: 15px">

          <?php 
            $data = $result->fetch_assoc();
            echo "<img src = '" . $data["image_name"] . "' style = 'width:100%'><br>";
            echo $data["resident_name"] . "<br>";
            echo "Every " . $data["slot_time"];
          ?>

          </div>
          <div class = "col-sm-4 col-xs-2"></div>
        </div>
      </div>
    </div>
    <div style = "width:100%; padding: 2.5%;overflow-x:auto; overflow-y:hidden; display: block; position: relative;">
      <div class = "container-fluid">
        <div class = "row">
          <div class = "col-xs-4"></div>
          <div class = "col-xs-4" style = "text-align: center;">
            <?php
              echo $data["show_bio"];
            ?>
          </div>
          <div class = "col-xs-4"></div>
        </div>
      </div>
    </div>

    <div class = "container-fluid">
      <div class="col-xs-3" style = "">
        <i>Recorded Podcasts</i>
      </div>
    </div>
    <div style = "width:100%; min-height: 300px; background-color: #1e1e23; padding: 2.5%; overflow-x:auto; overflow-y:hidden; display: block; position: relative; color:white">

    <?php 
      $command = "SELECT link, date FROM uploaded_shows WHERE resident_id = " . $resident_id . ";";
      $recorded_shows = $mysqli->query($command);
      while($show = $recorded_shows->fetch_assoc()){

            echo "<p>" . $show['date'] . "</p>";
            
            echo "<iframe width='100%' height='120' src='https://www.mixcloud.com/widget/iframe/?hide_cover=1&light=1&feed=%2Fwiredgold%2F" . $show["link"] . "%2F' frameborder='0' ></iframe>";

            echo "<p style='width:50%; border-bottom: solid thin white;'><br></p>";
          }
    ?>
    </div>
      <!-- Footer credits -->
    <div class="footer footer-copyright navbar-fixed-bottom animated slideInUp">
      <p>Website by <a href='mailto:kelvin.van_vuuren@kcl.ac.uk' target="_blank">Kelvin</a></p>
      <p>Copyright © <script>document.write(new Date().getFullYear());</script></p>
    </div>

    <!-- Scripts -->
    <script src="js/amplitude.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


  </body>

</html>