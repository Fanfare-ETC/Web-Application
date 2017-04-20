<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Operator Test</title>

<!-- Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link href="css/operator.css" rel="stylesheet">

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
    <div class="col-md-8">
      <form id="play-tracker-form" method="post">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="page-header">Play Tracker</h2>
          </div>
        </div>
        <div class="row text-left">
          <!-- Populated in JS -->
          <div class="col-md-6 play-category">
            <div class="well">
              <h3>Fielding</h3>
              <div class="play-list play-list-fielding"></div>
            </div>
          </div>
          <div class="col-md-6 play-category">
            <div class="well">
              <h3>Batting</h3>
              <div class="play-list play-list-batting"></div>
            </div>
          </div>
          <div class="col-md-6 play-category">
            <div class="well">
              <h3>Others</h3>
              <div class="play-list play-list-null"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 text-center border-groove">
            <input class="btn btn-primary" type="submit" name="formSubmit" value="Submit">
            <button type="button" class="btn btn-clear-predictions">Clear Predictions</button>
          </div>
        </div>
      </form>
    </div>

    <!-- Updated in JS: populateGameControl -->
    <div class="col-md-4 game-control">
      <div class="row text-center">
        <div class="col-md-12">
          <h2 class="page-header">Game Control</h2>
        </div>
      </div>
      <div class="row text-left">
        <div class="col-md-12">
          <div class="well">
            <div class="form-group">
              <label for="state-inning">Current Inning</label>
              <input type="number" class="form-control" id="state-inning" placeholder="None" required />
            </div>
            <div class="form-group">
              <label for="state-half">Current Half</label>
              <select id="state-half" class="form-control" required>
                <option value="">None</option>
                <option value="T">Top</option>
                <option value="B">Bottom</option>
              </select>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="state-break-active">Break Active</input>
              </label>
            </div>
            <button id="state-apply" class="btn btn-primary" type="submit">Apply</button>
          </div>
        </div>
      <div class="row">
        <div class="col-md-12 text-center border-groove">
          <input class="btn btn-primary" type="submit" name="formSubmit" value="Submit">
          <button type="button" class="btn btn-clear-predictions">Clear Predictions</button>		
        </div>
      </div>	 
    </form>
  </div>
	</div>
	
	      <div class="row text-center">
          <div class="col-md-12">
          <h2 class="page-header">Treasure Hunt</h2>
         </div>
         </div>
     
       <div class="col-md-6 team-left">
            <div class="well">
              <h3>Section 1</h3>
              <div class="buttons">

                <button hidden id= "flag1-correct" type="button" class="btn-flag-correct">Flag 1 - Correct</button>
	              <button hidden id= "flag1-wrong" type="button" class="btn-flag-wrong">Flag 1 - Wrong</button>
                <img hidden align="right" id="left-1-correct" class="btn-flag-correct-img" src="images/approved.png" width="5%" height="5%"/>
                <img hidden align="right" id="left-1-wrong" class="btn-flag-wrong-img" src="images/declined.png" width="5%" height="5%"/>
	              <br><br>
                <button hidden id= "flag2-correct" type="button" class="btn-flag-correct">Flag 2 - Correct</button>
                <button hidden id= "flag2-wrong" type="button" class="btn-flag-wrong">Flag 2 - Wrong</button>
                <img hidden align="right" id="left-2-correct" class="btn-flag-correct-img" src="images/approved.png" width="5%" height="5%"/>
                <img hidden align="right" id="left-2-wrong" class="btn-flag-wrong-img" src="images/declined.png" width="5%" height="5%"/>
                <br><br>
                <button hidden id= "flag3-correct" type="button" class="btn-flag-correct">Flag 3 - Correct</button>
                <button hidden id= "flag3-wrong" type="button" class="btn-flag-wrong">Flag 3 - Wrong</button>
                <img hidden align="right" id="left-3-correct" class="btn-flag-correct-img" src="images/approved.png" width="5%" height="5%"/>
                <img hidden align="right" id="left-3-wrong" class="btn-flag-wrong-img" src="images/declined.png" width="5%" height="5%"/>

                <br><br>
               </div>
            </div>
            
              
            <div class="well">
              <h3>Map Reference</h3>
              <img align="right" id="img" class="final-img" src="images/crane.png" width="100%" height="100%"/>
               <br><br>
                <br><br> 
                <br><br>
                 <br><br>
                  <br><br>
                   <br><br>
                    <br><br>
              </div>
            
        <div class="row">
            <div class="col-md-12 text-right border-groove">
              <button type="button" class="btn-start-treasurehunt">Start Connect the Dots! </button>
              <button type="button" class="btn-stop-treasurehunt">Stop Connect the Dots!</button>
              <br><br>
            </div>
           </div>

          </div>
    </div>
      

  <div class="vertical-seperator"></div>
  <div class = "container-fluid">
      <div class="text-center">
        <h4><img src="images/etc-logo-wallpaper-1080.png" width="375" height="210.75" alt=""/></h4>
        <p>Copyright &copy; 2017 &middot; All Rights Reserved &middot; <a href="http://www.etc.cmu.edu/projects/fanfare/" >ETC Fanfare</a></p>
      </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script>
    <?php
    $playbook_notifier_host = isset($_ENV['PLAYBOOK_NOTIFIER_HOST']) ? $_ENV['PLAYBOOK_NOTIFIER_HOST'] : 'localhost';
    $playbook_notifier_port = isset($_ENV['PLAYBOOK_NOTIFIER_PORT']) ? $_ENV['PLAYBOOK_NOTIFIER_PORT'] : 9001;
	$treasurehunt_host = isset($_ENV['TREASUREHUNT_HOST']) ? $_ENV['TREASUREHUNT_HOST'] : 'localhost';
    $treasurehunt_port = isset($_ENV['TREASUREHUNT_PORT']) ? $_ENV['TREASUREHUNT_PORT'] : 9000;
    echo "const PLAYBOOK_NOTIFIER_URL = 'ws://${playbook_notifier_host}:${playbook_notifier_port}';\n";
	echo "const TREASUREHUNT_URL = 'ws://${treasurehunt_host}:${treasurehunt_port}';\n";
    ?>
  </script>
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="js/bootstrap.js"></script>
  <script src="js/operator.js"></script>
</body>
</html>
