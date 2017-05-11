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
      $treasurehunt_1_host = isset($_ENV['TREASUREHUNT_1_HOST']) ? $_ENV['TREASUREHUNT_1_HOST'] : 'localhost';
      $treasurehunt_1_port = isset($_ENV['TREASUREHUNT_1_PORT']) ? $_ENV['TREASUREHUNT_1_PORT'] : 9000;
      $treasurehunt_2_host = isset($_ENV['TREASUREHUNT_2_HOST']) ? $_ENV['TREASUREHUNT_2_HOST'] : 'localhost';
      $treasurehunt_2_port = isset($_ENV['TREASUREHUNT_2_PORT']) ? $_ENV['TREASUREHUNT_2_PORT'] : 9003;
      echo "const treasurehunt_1_url = 'ws://${treasurehunt_1_host}:${treasurehunt_1_port}';\n";
      echo "const treasurehunt_2_url = 'ws://${treasurehunt_2_host}:${treasurehunt_2_port}';\n";
      ?>

      const getAggregate = function () {
        
      // Create a WebSocket.
      var ws = new WebSocket(treasurehunt_1_url);
      ws.onopen = function()
      {
       // console.log('ws.onopen');
      };
      
      var f1 = false;
      var f2 = false;
      var f3 = false;
                        
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
        msg[1] = parseInt(msg[1]);
        msg[2] = parseInt(msg[2]);
        msg[3] = parseInt(msg[3]);
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
      console.log(page.game_on,page.flag1,page.flag2,page.flag3,page.game_off,f1);       
      //identify reset state
      if(page.game_on === false && page.game_off === false)
      {
      f1=false;
      }
      if(page.game_on===true)
      {
      
      if(f1 && page.flag1===true && page.flag2===false && page.flag3===false)
      {
         document.getElementById('flag1').innerHTML="Marker-1";
         document.getElementById('flagstatus1').src="../images/approved.png";
         f1=true;
      }
      if(f1 && page.flag1===false && page.flag2===false && page.flag3===false)
      {
        document.getElementById('flag1').innerHTML="Marker-1";
        document.getElementById('flagstatus1').src="../images/declined.png";
        f1=false;
      }
      if(f1===false){ f1=true;}
      else
      {
      if(f2 &&page.flag2===true && page.flag1===true && page.flag3===false)
      {
         document.getElementById('flag2').innerHTML="Marker-2";
         document.getElementById('flagstatus2').src="../images/approved.png";
         f2=true;
      }
      if( f2 && page.flag2===false && page.flag1===true && page.flag3===false)
      {
         document.getElementById('flag2').innerHTML="Marker-2";
         document.getElementById('flagstatus2').src="../images/declined.png";
         f2=false;
      }
      if(f2===false){ f2=true;}
      else
      {
      if(f3 && page.flag3===true && page.flag2===true && page.flag1===true)
      {
         document.getElementById('flag3').innerHTML="Marker-3";
         document.getElementById('flagstatus3').src="../images/approved.png";
         f3=true;
      }
      if(f3 && page.flag3===false && page.flag2===true && page.flag1===true)
      {
         document.getElementById('flag3').innerHTML="Marker-3";
         document.getElementById('flagstatus3').src="../images/declined.png";
         f3=false;
      }
      if(f3===false){ f3=true;}
      }//f2
      }//f1
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
