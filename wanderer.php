<!DOCTYPE HTML>
<html>
   <head>
	
      <script type="text/javascript">
         function updateWanderer()
         {
	   var intervalID = setInterval(updateWanderer,2000);
           if ("WebSocket" in window)
            {
              <?php
              $treasurehunt_host = isset($_ENV['TREASUREHUNT_HOST']) ? $_ENV['TREASUREHUNT_HOST'] : 'localhost';
              $treasurehunt_port = isset($_ENV['TREASUREHUNT_PORT']) ? $_ENV['TREASUREHUNT_PORT'] : 9000;
              echo "const url = 'ws://${treasurehunt_host}:${treasurehunt_port}';\n";
              ?>
		var ws = new WebSocket(url);
		const sectionIdInput = document.getElementById('section-id');		
               ws.onopen = function()
               {
                  // Web Socket is connected, send data using send()
		  var msg = {
    			section: sectionIdInput.value,
    			slection: 3,
    			method: "get"
  				};
                  ws.send(JSON.stringify(msg));
                  
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
               
            }
            
            else
            {
               // The browser doesn't support WebSocket
               alert("WebSocket NOT supported by your Browser!");
            }
                      
         }
      </script>
		
   </head>
   <body>
       <input id="section-id" type="text" placeholder="Section ID" />

	<br></br>
        <div id="sse">
         <a id="getaggregate" type="button" href="javascript:updateWanderer()">Get Aggregate!</a>
        </div>
      
</body>
</html>
