<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Operator Test</title>

<!-- Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">

<!-- Typekit -->
<script src="https://use.typekit.net/mpr2cpx.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="tk-proxima-nova">
  <div class="container-fluid">
    <div class="row header-container">
      <div class="container">
        <div class="col-md-6 col-md-offset-3 header">
          <img class="logo" src="images/Fanfare-Logo-WEB-170x170.png" alt="Logo" />
          <h1>Operator System</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <!--
    <div class = "leftbar">
        <div class="row text-center">
          <div class="col-md-6 border-groove col-lg-12">Video Capture</div>
        </div>
        <div class="row text-left">
          <div class="col-md-6 col-md-offset-3 col-lg-offset-0 border-groove col-lg-12"> <div class="videodiv"><video autoplay src="http://raspi3-02.etc.cmu.edu:8080/camera"></video></div></div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center border-groove col-lg-12">Snapshot Button Goes Here</div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center col-lg-11"> </div>
        </div>
        <div class="row text-center">
          <div class="col-lg-5 border-groove">Crowd Simon</div>
          <div class="col-lg-1">&nbsp;</div>
          <div class="border-groove col-lg-6">Leaderboard</div>
        </div>
        <div class="row">
          <div class="col-lg-5 text-center border-groove">Start Button</div>
          <div class="col-lg-1">&nbsp;</div>
          <div class="col-lg-3 text-center border-groove" >Simon</div>
          <div class="col-lg-3 text-center border-groove" >Playbook</div>
      </div>
      <div class="row">
          <div class="col-lg-5 text-center border-groove">Stop Button</div>
          <div class="col-lg-1">&nbsp;</div>
          <div class="col-lg-3 text-center border-groove" >Top Score</div>
        <div class="col-lg-3 text-center border-groove" >Top Score</div>
      </div>
      <div class="row">
          <div class="col-lg-6">&nbsp;</div>
          <div class="text-center border-groove col-lg-6" >Stadium Overlay Button</div>
      </div>
    </div>
    -->
    <form id="play-tracker-form" method="post">
      <div class="row text-center">
        <div class="col-md-12">
          <h2 class="page-header">Play Tracker</h2>
        </div>
      </div>
      <div class="row text-left">
        <div class="col-md-12 well play-list"> 
          <label>
            <input type="checkbox" name="playList[]" value="0">
            Error</label>
          <br>
          <label>
            <input type="checkbox" name="playList[]" value="1">
            Grand Slam</label>
          <br>
          <label>
            <input type="checkbox" name="playList[]" value="2">
            Shutout Inning</label>
          <br>
          <label>
            <input type="checkbox" name="playList[]" value="3">
            Long Out</label>
          <br>
          <label>
            <input type="checkbox" name="playList[]" value="4">
            Runs Batted</label>
          <br>
          <label>
            <input type="checkbox" name="playList[]" value="5">
            Pop Fly</label>
          <br>
          <label>
            <input type="checkbox" name="playList[]" value="6">
            Triple Play</label>
          <br>
          <label>
            <input type="checkbox" name="playList[]" value="7">
            Double Play</label>
          <br>
          <label>
            <input type="checkbox" name="playList[]" value="8">
            Grounder</label>
          <br>
          <label>
            <input type="checkbox" name="playList[]" value="9">
            Steal</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="10">
            Pick Off</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="11">
            Walk</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="12">
            Blocked Run</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="13">
            Strike Out</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="14">
            Hit</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="15">
            Home Run</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="16">
            Pitch Count: 16 &amp; Under</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="17">
            Walk Off</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="18">
            Pitch Count: 17 &amp; Over</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="19">
            First Base</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="20">
            Second Base</label>
          <br>
            <label>
            <input type="checkbox" name="playList[]" value="21">
            Third Base</label>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center border-groove">
          <input class="btn btn-primary" type="submit" name="formSubmit" value="Submit">
        </div>
      </div>
    </form>
  </div>

  <div class="vertical-seperator"></div>
  <div class = "container-fluid">
      <div class="text-center">
        <h4><img src="images/etc-logo-wallpaper-1080.png" width="375" height="210.75" alt=""/></h4>
        <p>Copyright &copy; 2017 &middot; All Rights Reserved &middot; <a href="http://www.etc.cmu.edu/projects/fanfare/" >ETC Fanfare</a></p>
      </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="js/jquery-1.11.2.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="js/bootstrap.js"></script>

  <script>
    <?php
    $playbook_notifier_host = isset($_ENV['PLAYBOOK_NOTIFIER_HOST']) ? $_ENV['PLAYBOOK_NOTIFIER_HOST'] : 'localhost';
    $playbook_notifier_port = isset($_ENV['PLAYBOOK_NOTIFIER_PORT']) ? $_ENV['PLAYBOOK_NOTIFIER_PORT'] : 9001;
    echo "const url = 'ws://${playbook_notifier_host}:${playbook_notifier_port}';\n";
    ?>
    const connection = new WebSocket(url);
    connection.addEventListener('open', function () {
      console.log('Connected to WebSocket server at ' + connection.url);

      // Listen on the play tracker form.
      const playTrackerForm = document.getElementById('play-tracker-form');
      playTrackerForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const selected = Array.from(playTrackerForm.elements['playList[]'])
          .filter(item => item.checked)
          .map(item => parseInt(item.value));
        console.log('Sending events: ', selected);
        connection.send(JSON.stringify(selected));

        // Submit the data to the server.
        jQuery.ajax({
          url: '/Web Application/insert.php',
          method: 'POST',
          data: jQuery(playTrackerForm).serialize(),
          success: function (data, textStatus, jqXHR) {
            console.log('Events successfully persisted to server');

            // Clear the fields.
            Array.from(playTrackerForm.elements['playList[]'])
              .forEach(item => item.checked = false);
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log('Error persisting data to server: ', errorThrown);
          }
        });
      });
    });
  </script>
</body>
</html>
