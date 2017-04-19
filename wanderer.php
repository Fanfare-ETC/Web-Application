<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <input id="section-id" type="text" placeholder="Section ID" />

  <br><br>
  <div id="sse">
    <a id="getaggregate" type="button" href="#">Get Aggregate!</a>
    <br><br>
    <p id="status" >Keep going!</p>
  </div>
  

  <script type="text/javascript">
  if ("WebSocket" in window) {
    <?php
    $treasurehunt_host = isset($_ENV['TREASUREHUNT_HOST']) ? $_ENV['TREASUREHUNT_HOST'] : 'localhost';
    $treasurehunt_port = isset($_ENV['TREASUREHUNT_PORT']) ? $_ENV['TREASUREHUNT_PORT'] : 9000;
    echo "const url = 'ws://${treasurehunt_host}:${treasurehunt_port}';\n";
    ?>

    const getAggregate = function () {
      // Update the wanderer state.
      const updateWanderer = function () {
         document.body.style.backgroundColor = "white";
        const sectionIdInput = document.getElementById('section-id');
        if (ws.readyState === ws.OPEN) {
          var msg = {
              section: parseInt(sectionIdInput.value) - 1,
              slection: 3,
              method: "getFromWanderer"
          };
          ws.send(JSON.stringify(msg));
        }
      };

      // Request for updates every 1 second.
      var intervalID = setInterval(updateWanderer, 1000);

      // Create a WebSocket.
      var ws = new WebSocket(url);
      ws.onopen = function()
      {
        // Web Socket is connected, send data using send()
        console.log('ws.onopen');
        updateWanderer();
      };
                        
      ws.onmessage = function (evt) 
      { 
      if (evt.data == "plus10warmer" || evt.data == "plus10colder" || evt.data == "plus10plant" ) console.log("Ignoring the server side aggregate broadcast");
      else if ( evt.data == "flag1correct" || evt.data == "flag2correct" || evt.data == "flag3correct")
      {
        console.log(evt.data);
        document.getElementById('status').innerHTML= "GOOD JOB! Go for the next one!";
      }
      else if( evt.data == "flag1wrong" || evt.data == "flag2wrong" || evt.data == "flag3wrong")
      {
        console.log(evt.data);
        document.getElementById('status').innerHTML="You dropped the marker at the wrong place! TRY AGAIN!";
      }
      else
      {
        
      //document.getElementById('status').innerHTML="Keep Going!";
        
      var msg = evt.data.split(" "); 
      console.log(evt.data);

      if(msg[0] > msg[1] && msg[0] > msg[2])
            {       
                  console.log("red");  
                  document.body.style.backgroundColor = "red";
            }
      else if(msg[1] > msg[0] && msg[1] > msg[2])
            {       
                  console.log("blue");          
                  document.body.style.backgroundColor = "blue";
            }
      else if(msg[2] > msg[0] && msg[2] > msg[1])
            {       
                  console.log("yellow");        
                  document.body.style.backgroundColor = "yellow";
            }
	 else
	 {
		 console.log("white");        
         document.body.style.backgroundColor = "white";
	 }
      }
		  

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
