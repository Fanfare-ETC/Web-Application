<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <input id="section-id" type="text" placeholder="Section ID" />

  <br></br>
  <div id="sse">
    <a id="getaggregate" type="button" href="#">Get Aggregate!</a>
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
              method: "get"
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
      
      var msg = evt.data.split(" "); 
      console.log(evt.data);

      if(msg[0] >= msg[1] && msg[0] >= msg[2])
            {       
                  console.log("red");  
                  document.body.style.backgroundColor = "red";
            }
      else if(msg[1] > msg[0] && msg[1] > msg[2])
            {       
                  console.log("red");          
                  document.body.style.backgroundColor = "blue";
            }
      else
            {       
                  console.log("green");        
                  document.body.style.backgroundColor = "green";
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
