<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<!--<input id="section-id" type="text" placeholder="Section ID" />-->
<div id="sse">
<a id="getaggregate" type="button" href="#">Get Aggregate!</a>
<br>
  <div>
  <p id="flag1" style="color:black;font-size:12px;font-weight:bold"></p> 
  </div>
  <div>
  <img id="flagstatus1" width="30" height="30" style="background-color:white" >
  </div>
  <div >
  <p id="flag2" style="color:black;font-size:12px;font-weight:bold"></p> 
  </div>
  <div>
  <img id="flagstatus2" width="30" height="30" style="background-color:white" >
  </div>
  <div >
  <p id="flag3" style="color:black;font-size:12px;font-weight:bold"></p> 
  </div>
  <div>
  <img id="flagstatus3" width="30" height="30" style="background-color:white" >
  </div>
</div>
<script type="text/javascript">
      if ("WebSocket" in window) {
      <?php
      $treasurehunt_host = isset($_ENV['TREASUREHUNT_HOST']) ? $_ENV['TREASUREHUNT_HOST'] : 'localhost';
      $treasurehunt_port = isset($_ENV['TREASUREHUNT_PORT']) ? $_ENV['TREASUREHUNT_PORT'] : 9000;
      echo "const url = 'ws://${treasurehunt_host}:${treasurehunt_port}';\n";
      ?>

      const getAggregate = function () {
        
      // Create a WebSocket.
      var ws = new WebSocket(url);
      ws.onopen = function()
      {
       // console.log('ws.onopen');
      };
                        
      ws.onmessage = function (evt) 
      { 
      if (evt.data == "plus10warmer" || evt.data == "plus10colder" || evt.data == "plus10marker" ) 
      {
        console.log("Ignoring the server side aggregate broadcast");
      }//ifplusten
      else
      {   
      var msg = evt.data.split(","); 
      if(msg.includes("wanderer"))
      {
      if(msg[1] > msg[2] && msg[1] > msg[3])
            {       
                 
                  document.body.style.backgroundColor = "red";
            }
      else if(msg[2] > msg[1] && msg[2] > msg[3])
            {       
                    
                  document.body.style.backgroundColor = "yellow";
            }
      else if(msg[3] > msg[1] && msg[3] > msg[2])
            {       
                        
                  document.body.style.backgroundColor = "lightblue";
            }
	    else {}
      } //ifwanderer
      else
      {
        //{"event":"state","game_on":true,"flag1":true,"flag2":true,"flag3":false,"game_off":false}
      var page = JSON.parse(evt.data);
      console.log(page.game_on,page.flag1,page.flag2,page.flag3,page.game_off);
      if(page.game_on===true)
      {
      
      if(page.flag1===true && page.flag2===false && page.flag3===false)
      {
         document.getElementById('flag1').innerHTML="Flag 1";
         document.getElementById('flagstatus1').src="../images/approved.png";
      }
      if(page.flag1===false && page.flag2===false && page.flag3===false)
      {
        document.getElementById('flag1').innerHTML="Flag 1";
       document.getElementById('flagstatus1').src="../images/declined.png";
      }
      if(page.flag2===true && page.flag1===true && page.flag3===false)
      {
         document.getElementById('flag2').innerHTML="Flag 2";
         document.getElementById('flagstatus2').src="../images/approved.png";
      }
      if(page.flag2===false && page.flag1===true && page.flag3===false)
      {
         document.getElementById('flag2').innerHTML="Flag 2";
         document.getElementById('flagstatus2').src="../images/declined.png";
      }
      if(page.flag3===true && page.flag2===true && page.flag1===true)
      {
         document.getElementById('flag3').innerHTML="Flag 3";
         document.getElementById('flagstatus3').src="../images/approved.png";
      }
      if(page.flag3===false && page.flag2===true && page.flag1===true)
      {
         document.getElementById('flag3').innerHTML="Flag 3";
         document.getElementById('flagstatus3').src="../images/declined.png";
      }
      
      }//ifgameon 
      if(page.game_off)
      {
        document.getElementById('flag1').innerHTML="";
        document.getElementById('flagstatus1').src="";
        document.getElementById('flag2').innerHTML="";
        document.getElementById('flagstatus2').src="";
        document.getElementById('flag3').innerHTML="";
        document.getElementById('flagstatus3').src=""; 
      }//ifgameoff
      } //elsewanderer
      } //elseplusten
       
      };
                        
      ws.onclose = function()
      { 
        // websocket is closed.
        alert("Connection is closed..."); 
      };
    };

    const getAggregateBtn = document.getElementById('getaggregate');
    getAggregateBtn.addEventListener('click', getAggregate);
    }
    else
    {
        // The browser doesn't support WebSocket
        alert("WebSocket NOT supported by your Browser!");
    }
</script>    
</body>
</html>
