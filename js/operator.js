(function () {
    // Operator interface globals.
    let connection = null;

    // Fetch the list of plays from the server.
    const getPlays = function () {
        return new Promise((resolve, reject) => {
            const request = new XMLHttpRequest();

            request.addEventListener('load', function () {
                try {
                    resolve(JSON.parse(this.response));
                } catch (e) {
                    reject(e);
                }
            });

            request.addEventListener('error', reject);
            request.open('GET', '/api/plays.json', true);
            request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            request.send(null);
        });
    };

    // Populate list of plays in the UI.
    const populatePlaysList = function (plays) {
        const playListFieldingElem = document.getElementsByClassName('play-list-fielding')[0];
        const playListBattingElem = document.getElementsByClassName('play-list-batting')[0];
        const playListNullElem = document.getElementsByClassName('play-list-null')[0];

        plays.sort((a, b) => {
            const A = a.name.toUpperCase();
            const B = b.name.toUpperCase();

            if (A < B) {
                return -1;
            } else if (A > B) {
                return 1;
            } else {
                return 0;
            }
        });

        const createPlay = function (container) {
            return function (play) {
                // <div class="checkbox">
                const playElem = document.createElement('div');
                playElem.classList.add('checkbox');
                switch (play.team) {
                case 'fielding':
                    playElem.classList.add('team-fielding');
                    break;
                case "batting":
                    playElem.classList.add('team-batting');
                    break;
                default:
                }

                //   <label>
                const playElemLabel = document.createElement('label');

                //     <input>
                //     {{ play.name }}
                const playElemLabelInput = document.createElement('input');
                playElemLabelInput.type = 'checkbox';
                playElemLabelInput.name = 'playList[]';
                playElemLabelInput.value = play.value;
                const playElemLabelText = document.createTextNode(play.name);

                //   </label>
                playElemLabel.appendChild(playElemLabelInput);
                playElemLabel.appendChild(playElemLabelText);

                // </div>
                playElem.appendChild(playElemLabel);
                container.appendChild(playElem);
            }
        };

        plays.filter(play => play.team === 'fielding').forEach(createPlay(playListFieldingElem));
        plays.filter(play => play.team === 'batting').forEach(createPlay(playListBattingElem));
        plays.filter(play => play.team === null).forEach(createPlay(playListNullElem));
    };

    // Form submission callback.
    const playTrackerFormHandler = function (e) {
        e.preventDefault();

        const form = e.target;
        const selected = Array.from(form.elements['playList[]'])
            .filter(item => item.checked)
            .map(item => parseInt(item.value));
        console.log('Sending events: ', selected);
        connection.send(JSON.stringify({
            event: 'operator:createPlays',
            data: selected
        }));
    };

    // Clear predictions button callback.
    const clearPredictionsBtnHandler = function () {
        connection.send(JSON.stringify({
            event: 'operator:clearPredictions'
        }));
    };
    
    //

    // Handlers for server messages.
    const messageHandlers = {
        'server:error': (message) => {
            toastr.error('The server reported an error.')
        },
        'server:playsCreated': (message) => {
            toastr.success('Plays successfully submitted!');

            // Uncheck everything.
            const form = document.getElementById('play-tracker-form');
            Array.from(form.elements['playList[]'])
                .forEach(item => item.checked = false);
        }
    };

    // Connect to the notifier server.
    getPlays()
        .then(function (plays) {
            populatePlaysList(plays);

            connection = new WebSocket(PLAYBOOK_NOTIFIER_URL);
            
            connection.addEventListener('open', function () {
                console.log('Connected to WebSocket server at ' + connection.url);

                // Listen on the play tracker form.
                const playTrackerForm = document.getElementById('play-tracker-form');
                playTrackerForm.addEventListener('submit', playTrackerFormHandler);

                // Listen on clear predictions button.
                const clearPredictionsBtn = document.getElementsByClassName('btn-clear-predictions')[0];
                clearPredictionsBtn.addEventListener('click', clearPredictionsBtnHandler);
                
                const start_th = document.getElementsByClassName('btn-clear-predictions')[0];
                clearPredictionsBtn.addEventListener('click', clearPredictionsBtnHandler);
            });

            connection.addEventListener('message', function (e) {
                message = JSON.parse(e.data);
                const handler = messageHandlers[message.event];
                if (handler === undefined) {
                    console.log('Unknown message ', message.event, ' received!');
                    return;
                }

                handler.call(connection, message);
            });

            connection.addEventListener('close', function () {
                console.log('Disconnected from server!');
                toastr.error('Disconnected from server. Refresh to try again.');
            });
        })
        .catch(function (e) {
            console.log('Error loading operator console: ', e);  
        });
})();

(function () {
    
    const thwinnerFormHandler = function (e) {
        e.preventDefault();

        const form = e.target;
        const winner = form.elements['winner'].value; 
        console.log('Sending winner: ', winner);
        connection.send(JSON.stringify({
            method:'winner',
            name:winner
        }));
    };
    
     const start_thBtnHandler = function () {
        console.log('Sending start signal');
        connection.send(JSON.stringify({
            method:'start'
        }));
    };
    const stop_thBtnHandler = function () {
        console.log('Sending stop signal');
        connection.send(JSON.stringify({
            method:'stop'
        }));
    };
    // Operator interface globals.
    let connection = null;
    connection = new WebSocket(TREASUREHUNT_URL);
    connection.addEventListener('open', function () {
                console.log('Connected to WebSocket server at ' + connection.url);
        
                const thwinnerForm = document.getElementById('thwinner-form');
                thwinnerForm.addEventListener('submit', thwinnerFormHandler);
        
                const start_th = document.getElementsByClassName('btn-start-treasurehunt')[0];
                start_th.addEventListener('click', start_thBtnHandler);
        
                const stop_th = document.getElementsByClassName('btn-stop-treasurehunt')[0];
                stop_th.addEventListener('click', stop_thBtnHandler);
            });
    
})();